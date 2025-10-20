<?php
class WishlistController extends Controller
{
    // 💖 Toggle sản phẩm trong wishlist (AJAX)
    public function toggle($product_id)
    {
        header('Content-Type: application/json; charset=utf-8');

        // ⚙️ Kiểm tra đăng nhập
        if (!isset($_SESSION['user'])) {
            echo json_encode([
                'success' => false,
                'message' => 'Bạn cần đăng nhập để sử dụng Wishlist.'
            ]);
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $wishlistModel = $this->model('WishlistModel');

        // Kiểm tra sản phẩm có trong wishlist chưa
        if ($wishlistModel->exists($user_id, $product_id)) {
            // Nếu đã có → Xóa
            $wishlistModel->remove($user_id, $product_id);
            echo json_encode([
                'success' => true,
                'status' => 'removed'
            ]);
        } else {
            // Nếu chưa có → Thêm mới
            $wishlistModel->add($user_id, $product_id);
            echo json_encode([
                'success' => true,
                'status' => 'added'
            ]);
        }
        exit;
    }

    // 💖 Trang danh sách wishlist (khi user mở “Tài khoản / Wishlist”)
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "user/login");
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $wishlistModel = $this->model('WishlistModel');
        $wishlist = $wishlistModel->getByUser($user_id);

        $this->view('account/wishlist', [
            'wishlist' => $wishlist
        ]);
    }
}
