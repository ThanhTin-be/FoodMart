<?php
class SubscriberController extends Controller {
    public function discount() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            $requestedUrl = $_SERVER['REQUEST_URI'] ?? BASE_URL;
            $_SESSION['return_url'] = $requestedUrl;

            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        // TODO: Implement discount form handling for logged-in users.
    }
}
