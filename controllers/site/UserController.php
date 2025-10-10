<?php
class UserController extends Controller {
    public function login() {
        // Kiểm tra nếu session chưa được khởi tạo
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $userModel = $this->model('User');
            $user = $userModel->getByEmail($email);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    // ✅ Đăng nhập thành công
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'phone' => $user['phone'],
                        'role' => $user['role'],
                        'address' => $user['address'],
                    ];

                    // Đồng bộ giỏ hàng từ database
                    require_once ROOT . 'controllers/site/CartController.php';
                    $cartController = new CartController();
                    $cartController->syncCartOnLogin($user['id']);

                    if (!empty($_SESSION['return_url'])) {
                        $redirectUrl = $_SESSION['return_url'];
                        unset($_SESSION['return_url']);

                        if (preg_match('#^https?://#i', $redirectUrl)) {
                            header('Location: ' . $redirectUrl);
                        } elseif (strpos($redirectUrl, '/') === 0) {
                            header('Location: ' . $redirectUrl);
                        } else {
                            header('Location: ' . BASE_URL . ltrim($redirectUrl, '/'));
                        }
                        exit;
                    }

                    // Điều hướng
                    if ($user['role'] === 'admin') {
                        header("Location: " . BASE_URL . "admin/dashboard/index");
                    } else {
                        header("Location: " . BASE_URL . "site/home/index");
                    }
                    exit;
                } else {
                    $data['error'] = "❌ Mật khẩu không đúng!";
                    $this->view('user/login', $data, 'default');
                }
            } else {
                $data['error'] = "❌ Không tìm thấy tài khoản!";
                $this->view('user/login', $data, 'default');
            }
        } else {
            // GET → hiển thị form login
            $this->view('user/login', [], 'default');
        }
    }

    public function logout() {
        // Kiểm tra nếu session chưa được khởi tạo
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // Xóa session giỏ hàng và thông tin người dùng
        unset($_SESSION['cart']);
        unset($_SESSION['user']);
        session_destroy();
        header("Location: " . BASE_URL . "user/login");
        exit;
    }

    // 📝 Register (chưa làm UI, chừa để sau này code)
    public function register() {
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     // Xử lý tạo user mới qua User->create()
        // }
        // else {
        //     $this->view('user/register');
        // }
    }
}
?>