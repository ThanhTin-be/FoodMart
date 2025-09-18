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
+
+    public function subscribe() {
+        if (session_status() === PHP_SESSION_NONE) {
+            session_start();
+        }
+
+        header('Content-Type: application/json');
+
+        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
+            http_response_code(405);
+            echo json_encode([
+                'success' => false,
+                'message' => 'Phương thức không được hỗ trợ.'
+            ], JSON_UNESCAPED_UNICODE);
+            return;
+        }
+
+        if (empty($_SESSION['user']['email']) || empty($_SESSION['user']['id'])) {
+            http_response_code(401);
+            echo json_encode([
+                'success' => false,
+                'message' => 'Bạn cần đăng nhập để đăng ký nhận bản tin.'
+            ], JSON_UNESCAPED_UNICODE);
+            return;
+        }
+
+        if (empty($_POST['subscribe'])) {
+            http_response_code(400);
+            echo json_encode([
+                'success' => false,
+                'message' => 'Vui lòng đồng ý nhận bản tin để tiếp tục.'
+            ], JSON_UNESCAPED_UNICODE);
+            return;
+        }
+
+        $email = $_SESSION['user']['email'];
+        $userId = (int) $_SESSION['user']['id'];
+
+        $subscriberModel = $this->model('Subscriber');
+
+        if ($subscriberModel->findByEmail($email)) {
+            echo json_encode([
+                'success' => true,
+                'message' => 'Email của bạn đã được đăng ký trước đó.'
+            ], JSON_UNESCAPED_UNICODE);
+            return;
+        }
+
+        if (!$subscriberModel->create($userId, $email)) {
+            http_response_code(500);
+            echo json_encode([
+                'success' => false,
+                'message' => 'Không thể đăng ký nhận bản tin vào lúc này.'
+            ], JSON_UNESCAPED_UNICODE);
+            return;
+        }
+
+        $discountCode = 'DISC-' . strtoupper(bin2hex(random_bytes(4)));
+
+        $subject = 'FoodMart Discount Code';
+        $name = $_SESSION['user']['name'] ?? '';
+        $greeting = $name ? "Chào $name," : "Chào bạn,";
+        $message = $greeting . "\n\nCảm ơn bạn đã đăng ký nhận bản tin từ FoodMart. Mã giảm giá độc quyền của bạn là: " . $discountCode . "\n\nChúc bạn mua sắm vui vẻ!";
+
+        mail($email, $subject, $message);
+
+        echo json_encode([
+            'success' => true,
+            'message' => 'Đăng ký thành công. Mã giảm giá đã được gửi qua email của bạn.',
+            'discount_code' => $discountCode
+        ], JSON_UNESCAPED_UNICODE);
+    }
 }
