<?php
class CheckoutController extends Controller {

    // Trang checkout chính
    public function index() {
        if (empty($_SESSION['user'])) {
            $_SESSION['return_url'] = 'checkout/index';
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        $cart = $_SESSION['cart'] ?? [];
        if (empty($cart)) {
            header("Location: " . BASE_URL . "cart/index");
            exit;
        }

        // Lấy user
        $userModel = $this->model('User');
        $user = $userModel->getByEmail($_SESSION['user']['email']);

        // Tính tiền
        $subtotal = $this->calcCartSubtotal($cart);

        // Nếu đã có voucher trong session thì áp dụng để hiển thị
        $voucherDiscount = !empty($_SESSION['voucher']['discount']) ? (float)$_SESSION['voucher']['discount'] : 0;
        $total = max($subtotal - $voucherDiscount, 0);

        $this->view("checkout/index", [
            'user'     => $user,
            'cart'     => $cart,
            'total'    => $total,
            'subtotal' => $subtotal,
            'voucher'  => $_SESSION['voucher'] ?? null
        ]);
    }

    // Tính tổng tiền tạm tính của giỏ hàng
    private function calcCartSubtotal(array $cart): float {
        $sum = 0;
        foreach ($cart as $it) {
            $sum += ((float)$it['price']) * ((int)$it['qty']);
        }
        return (float)$sum;
    }

    // Áp dụng voucher (AJAX)
    public function validateVoucher() {
        header('Content-Type: application/json; charset=utf-8');

        if (empty($_SESSION['user'])) {
            echo json_encode(['valid' => false, 'message' => 'Vui lòng đăng nhập']);
            return;
        }

        $code = isset($_GET['code']) ? trim($_GET['code']) : '';
        if ($code === '') {
            echo json_encode(['valid' => false, 'message' => 'Vui lòng nhập mã voucher']);
            return;
        }
        // Chuẩn hóa code (tuỳ chính sách)
        $code = strtoupper($code);

        $cart = $_SESSION['cart'] ?? [];
        if (empty($cart)) {
            echo json_encode(['valid' => false, 'message' => 'Giỏ hàng trống']);
            return;
        }

        $subtotal = $this->calcCartSubtotal($cart);

        // Lấy voucher từ DB
        $voucherModel = $this->model('VoucherModel');
        $voucher = $voucherModel->getActiveVoucher($code); // YÊU CẦU: hàm này nên so sánh DATE(start_date/end_date) với CURDATE()

        if (!$voucher) {
            echo json_encode(['valid' => false, 'message' => 'Mã không hợp lệ hoặc đã hết hạn']);
            return;
        }

        // Điều kiện tối thiểu
        $minOrder = (float)($voucher['min_order_value'] ?? 0);
        if ($minOrder > 0 && $subtotal < $minOrder) {
            echo json_encode(['valid' => false, 'message' => 'Đơn hàng chưa đạt giá trị tối thiểu']);
            return;
        }

        // Tính giảm
        $discount = (float)$voucher['discount_amount'];
        // Không để tổng âm
        $newTotal = max($subtotal - $discount, 0);

        // Lưu session để placeOrder dùng
        $_SESSION['voucher'] = [
            'code'       => $voucher['code'],
            'discount'   => $discount,
            'voucher_id' => (int)$voucher['id']
        ];

        echo json_encode([
            'valid'                 => true,
            'message'               => 'Áp dụng mã thành công!',
            'discount'              => $discount,
            'discount_formatted'    => number_format($discount, 0, ',', '.'),
            'new_total'             => $newTotal,
            'new_total_formatted'   => number_format($newTotal, 0, ',', '.')
        ]);
    }

    // Đặt hàng
    public function placeOrder() {
        if (empty($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        $cart = $_SESSION['cart'] ?? [];
        if (empty($cart)) {
            header("Location: " . BASE_URL . "cart/index");
            exit;
        }

        $userId   = (int)$_SESSION['user']['id'];
        $subtotal = $this->calcCartSubtotal($cart);
        $discount = !empty($_SESSION['voucher']['discount']) ? (float)$_SESSION['voucher']['discount'] : 0;
        $grand    = max($subtotal - $discount, 0);
        $paymentMethod = $_POST['payment_method'] ?? 'cod';

        // --- 1. Tạo đơn hàng ---
        $orderModel = $this->model('OrderModel');
        $orderId = $orderModel->createOrder($userId, $cart, $grand, $paymentMethod);

        if (!$orderId) {
            echo "<h3 style='color:red'>❌ Có lỗi xảy ra khi đặt hàng. Vui lòng thử lại!</h3>";
            return;
        }

        // --- 2. Nếu có voucher thì giảm lượt dùng ---
        if (!empty($_SESSION['voucher']['voucher_id'])) {
            try {
                $voucherModel = $this->model('VoucherModel');
                $voucherModel->decreaseUsage((int)$_SESSION['voucher']['voucher_id']);
            } catch (\Throwable $e) { /* ignore */ }
        }

        // --- 3. Xóa giỏ hàng ---
        require_once ROOT . 'controllers/site/CartController.php';
        $cartController = new CartController();
        $cartController->clearCartAfterPayment();
        unset($_SESSION['voucher']);

        // --- 4. Hiển thị view theo phương thức thanh toán ---
        switch ($paymentMethod) {
            case 'vietqr':
                // Gọi hàm vietqr trong cùng controller, truyền id đơn hàng
                $this->vietqr($orderId);
                break;

            case 'momo':
                $order = $orderModel->getOrderById($orderId);
                $this->view('checkout/momo', ['order' => $order]);
                break;

            case 'cod':
            default:
                header("Location: " . BASE_URL . "checkout/thankyou");
                exit;
        }
    }

    // Trang thanh toán VietQR
    public function vietqr($orderId) {
        $orderModel = $this->model('OrderModel');
        $order = $orderModel->getOrderById($orderId);

        // cấu hình tài khoản nhận tiền
        $bank_bin = "970422"; // MBbank
        $account_no = "0332306296";
        $account_name = "NGO NGOC SON";

        require_once ROOT . "core/helpers.php";
        $qr_url = VietQR::generate($bank_bin, $account_no, $account_name, $order['total_price'], $order['id']);

        $this->view("checkout/vietqr", [
            'order' => $order,
            'qr_url' => $qr_url,
            'account' => [
                'bank' => 'MBBank',
                'number' => $account_no,
                'name' => $account_name
            ]
        ]);
    }

    // Trang cảm ơn
    public function thankyou() {
        $this->view("checkout/thankyou");
    }
}
