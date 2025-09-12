<?php
class CheckoutController extends Controller {
    // Trang checkout chính
    public function index() {
        $this->view("checkout/index");
    }

    // Trang thank you
    public function thankyou() {
        $this->view("checkout/thankyou");
    }
}
?>