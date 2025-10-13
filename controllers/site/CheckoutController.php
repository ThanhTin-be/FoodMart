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

        $userId = (int)$_SESSION['user']['id'];
        $subtotal = $this->calcCartSubtotal($cart);
        $discount = !empty($_SESSION['voucher']['discount']) ? (float)$_SESSION['voucher']['discount'] : 0;
        $grand = max($subtotal - $discount, 0);

        // ✅ Lấy dữ liệu người nhận từ form POST
        $fullname = trim($_POST['fullname'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $address = trim($_POST['address'] ?? '');
        $paymentMethod = $_POST['payment_method'] ?? 'cod';

        if ($fullname === '' || $phone === '' || $address === '') {
            die("<h3 style='color:red'>❌ Thiếu thông tin người nhận. Vui lòng kiểm tra lại!</h3>");
        }

        // ✅ Gọi model lưu đơn hàng
        $orderModel = $this->model('OrderModel');
        $orderId = $orderModel->createOrder($userId, $fullname, $phone, $address, $paymentMethod, $cart, $grand);

        if ($orderId) {
            // Giảm lượt dùng voucher (nếu có)
            if (!empty($_SESSION['voucher']['voucher_id'])) {
                $voucherId = (int)$_SESSION['voucher']['voucher_id'];
                try {
                    $voucherModel = $this->model('VoucherModel');
                    if (method_exists($voucherModel, 'decreaseUsage')) {
                        $voucherModel->decreaseUsage($voucherId);
                    }
                } catch (\Throwable $e) { /* ignore */ }
            }

            // Clear cart + voucher
            unset($_SESSION['cart'], $_SESSION['voucher']);

            // ✅ Lưu session order ID để thankyou sử dụng
            $_SESSION['last_order_id'] = $orderId;

            // ✅ Điều hướng sang trang cảm ơn
            header("Location: " . BASE_URL . "checkout/thankyou?order_id=" . $orderId);
            exit;
        }

        echo "<h3 style='color:red'>❌ Có lỗi xảy ra khi đặt hàng. Vui lòng thử lại!</h3>";
    }

    // Trang cảm ơn
   public function thankyou() {
    $userId = $_SESSION['user']['id'] ?? null;
    $orderId = $_GET['order_id'] ?? ($_SESSION['last_order_id'] ?? null);

    if (!$orderId || !$userId) {
        header("Location: " . BASE_URL . "order/myorders");
        exit;
    }

    $orderModel = $this->model('OrderModel');
    $order = $orderModel->getOrderDetail($orderId, $userId);

    if (!$order) {
        header("Location: " . BASE_URL . "order/myorders");
        exit;
    }

    $this->view("checkout/thankyou", ["order" => $order]);
    }


    // --------- Helpers ----------
    private function calcCartSubtotal(array $cart): float {
        $sum = 0;
        foreach ($cart as $it) {
            $sum += ((float)$it['price']) * ((int)$it['qty']);
        }
        return (float)$sum;
    }
}
