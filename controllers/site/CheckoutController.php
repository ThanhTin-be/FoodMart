<?php
class CheckoutController extends Controller {

    // Trang checkout chính
    public function index() {
        if (!isset($_SESSION['user'])) {
            $_SESSION['return_url'] = 'checkout/index';
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        $cart = $_SESSION['cart'] ?? [];
        if (empty($cart)) {
            header("Location: " . BASE_URL . "cart/index");
            exit;
        }

        $userModel = $this->model('User');
        $user = $userModel->getByEmail($_SESSION['user']['email']);

        $total = 0;
        foreach ($cart as $item) $total += $item['price'] * $item['qty'];

        $this->view("checkout/index", [
            'user'  => $user,
            'cart'  => $cart,
            'total' => $total
        ]);
    }

    // Xử lý đặt hàng
    public function placeOrder() {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        $cart = $_SESSION['cart'] ?? [];
        if (empty($cart)) {
            header("Location: " . BASE_URL . "cart/index");
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $total = 0;
        foreach ($cart as $item) $total += $item['price'] * $item['qty'];

        $orderModel = $this->model('OrderModel');
        $order_id = $orderModel->createOrder($user_id, $cart, $total);

        if ($order_id) {
            unset($_SESSION['cart']);
            header("Location: " . BASE_URL . "checkout/thankyou");
        } else {
            echo "<h3 style='color:red'>❌ Có lỗi xảy ra khi đặt hàng. Vui lòng thử lại!</h3>";
        }
    }

    // Trang cảm ơn
    public function thankyou() {
        $this->view("checkout/thankyou");
    }
}
