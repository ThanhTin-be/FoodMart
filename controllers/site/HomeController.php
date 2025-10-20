<?php
// controllers/site/HomeController.php
require_once ROOT . '/models/WishlistModel.php';

class HomeController extends Controller
{
    public function index()
    {
        // Lấy model sản phẩm
        $productModel = $this->model("ProductModel");
        $wishlistModel = new WishlistModel();

        // ✅ Lấy user_id từ session (nếu có)
        $user_id = $_SESSION['user']['id'] ?? 0;

        // ✅ Lấy danh sách wishlist cho user (nếu chưa đăng nhập thì sẽ rỗng)
        $wishlistItems = [];
        if ($user_id > 0) {
            $wishlistItems = $wishlistModel->getByUser($user_id);
        }

        // ✅ Lấy 1 bài viết mới nhất làm featured
        $blogFeatured = $this->model("BlogModel")->getBlogs(1, 0);
        $blogFeatured = $blogFeatured[0] ?? null;

        // ✅ Lấy danh sách sản phẩm nổi bật
        $featured = $productModel->getFeaturedProducts(8);

        // ✅ Truyền dữ liệu xuống view
        $this->view("home/index", [
            "blogFeatured" => $blogFeatured,
            "featured"     => $featured,
            "wishlist"     => $wishlistItems
        ]);
    }
}
