<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailModel {

    public function sendWelcomeEmail($toEmail, $toName) {
        $mail = new PHPMailer(true);

        try {
            // Cấu hình SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ngongocson39@gmail.com';
            $mail->Password = 'pkbw iegh kxsa ahxz'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Cấu hình mã hóa UTF-8
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';

            // 👤 Người gửi và người nhận
            $mail->setFrom('ngongocson39@gmail.com', 'FoodMart');
            $mail->addAddress($toEmail, $toName);

            // Nội dung email
            $mail->isHTML(true);
            $mail->Subject = 'Chào mừng đến với FoodMart!';
            $mail->Body = '
                <h2>Chào ' . htmlspecialchars($toName) . ',</h2>
                <p>Chào mừng bạn đến với FoodMart! Chúc bạn có một trải nghiệm thật tuyệt vời và hữu ích cùng chúng tôi 💚.</p>
                <p>FoodMart xin tặng bạn <strong>voucher DISCOUNT20</strong> dành cho đơn hàng trên 90k.</p>
                <p>Xin cảm ơn!</p>
                <p>Trân trọng,<br>Đội ngũ FoodMart</p>
            ';
            $mail->AltBody = "Chào $toName,\n\nChào mừng bạn đến với FoodMart! Chúc bạn có một trải nghiệm thật tuyệt vời và hữu ích.\nFoodMart xin tặng bạn voucher DISCOUNT20 dành cho đơn hàng trên 90k.\nXin cảm ơn.\n\nTrân trọng,\nĐội ngũ FoodMart";
            // Gửi email
            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Lỗi gửi email: {$mail->ErrorInfo}");
            return false;
        }
    }
}
