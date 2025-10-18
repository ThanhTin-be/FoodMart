<?php
class AjaxController extends Controller
{
    public function contact($action = null)
    {
        if ($action === 'send' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $nonce = $_POST['nonce'] ?? '';
            if ($nonce !== md5(session_id() . 'contact_form')) {
                echo json_encode(['status' => 'error', 'message' => 'Token không hợp lệ!']);
                return;
            }

            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $message = trim($_POST['message'] ?? '');

            if (!$name || !$email || !$message) {
                echo json_encode(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin!']);
                return;
            }

            // ⚙️ Gửi mail hoặc lưu DB (tùy mục đích)
            $to = "dev.zota@gmail.com";
            $subject = "Liên hệ từ $name - $email";
            $body = "Họ tên: $name\nEmail: $email\n\nNội dung:\n$message";

            if (mail($to, $subject, $body)) {
                echo json_encode(['status' => 'success', 'message' => 'Cảm ơn bạn! Chúng tôi sẽ phản hồi trong 24h.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Không gửi được email, vui lòng thử lại!']);
            }
            echo json_encode(['status' => 'success', 'message' => 'Cảm ơn bạn! Chúng tôi sẽ phản hồi trong 24h.']);
        }
    }
}
