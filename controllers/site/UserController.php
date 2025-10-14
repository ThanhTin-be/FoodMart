<?php
class UserController extends Controller
{
    public function login()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $userModel = $this->model('User');
            $user = $userModel->getByEmail($email);

            if ($user) {
                // 🐞 Debug
                // var_dump("Nhập:", $password);
                // var_dump("Hash trong DB:", $user['password']);
                // var_dump("Verify:", password_verify($password, $user['password']));

                if (password_verify($password, $user['password'])) {
                    // ✅ Login thành công
                    $_SESSION['user'] = [
                        'id'    => $user['id'],
                        'name'  => $user['name'],
                        'email' => $user['email'],
                        'phone' => $user['phone'],
                        'role'  => $user['role'],
                        'address' => $user['address'],
                    ];

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

    // Hiển thị trang profile
    public function profile()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "account/login");
            exit;
        }
        $userModel = $this->model('User');
        $user = $userModel->getByEmail($_SESSION['user']['email']);
        $this->view("user/profile", ['user' => $user]);
    }

    public function updateProfile()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        $id = $_SESSION['user']['id'];
        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'phone' => trim($_POST['phone'] ?? ''),
            'address' => trim($_POST['address'] ?? ''),
        ];

        $userModel = $this->model('User');
        $result = $userModel->updateProfile($id, $data);

        if ($result) {
            $_SESSION['user'] = array_merge($_SESSION['user'], $data);
            header("Location: " . BASE_URL . "user/profile?success=1");
        } else {
            header("Location: " . BASE_URL . "user/profile?error=1");
        }
        exit;
    }

    // Trang đổi mật khẩu
    public function changePassword()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }
        $this->view("user/change_password");
    }

    // Xử lý đổi mật khẩu
    public function updatePassword()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        $id = $_SESSION['user']['id'];
        $currentPassword = $_POST['current_password'] ?? '';
        $newPassword = $_POST['new_password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
            header("Location: " . BASE_URL . "user/changePassword?error=empty");
            exit;
        }

        if ($newPassword !== $confirmPassword) {
            header("Location: " . BASE_URL . "user/changePassword?error=notmatch");
            exit;
        }

        $userModel = $this->model('User');
        $user = $userModel->getByEmail($_SESSION['user']['email']);

        if (!password_verify($currentPassword, $user['password'])) {
            header("Location: " . BASE_URL . "user/changePassword?error=wrongpass");
            exit;
        }

        $result = $userModel->updatePassword($id, $newPassword);
        if ($result) {
            header("Location: " . BASE_URL . "user/changePassword?success=1");
        } else {
            header("Location: " . BASE_URL . "user/changePassword?error=updatefail");
        }
        exit;
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "user/login");
        exit;
    }

    // 📝 Register (chưa làm UI, chừa để sau này code)
    public function register()
    {
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     // Xử lý tạo user mới qua User->create()
        // }
        // else {
        //     $this->view('user/register');
        // }
    }
}
