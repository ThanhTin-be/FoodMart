<?php
class ShopController extends Controller
{
    public function index() {
        require_once ROOT . "models/CategoryModel.php";
        require_once ROOT . "models/ProductModel.php";

        $categoryModel = new CategoryModel();
        $productModel  = new ProductModel();

        // --- Lấy danh mục hiện tại (nếu có query param 'category' hoặc 'slug') ---
        $cat = null;
        if (!empty($_GET['category'])) {
            $catId = (int) $_GET['category'];
            $cat = $categoryModel->getCategoryById($catId);
        } elseif (!empty($_GET['slug'])) {
            $cat = $categoryModel->getBySlug($_GET['slug']);
        }

        // --- Lấy tất cả danh mục để hiển thị sidebar ---
        $categories = $categoryModel->getAllCategories();

        // --- Lọc sản phẩm ---
        $filters = [
            "keyword"  => $_GET['keyword']  ?? '',
            "category" => $_GET['category'] ?? '',
            "min"      => $_GET['min']      ?? '',
            "max"      => $_GET['max']      ?? '',
        ];

        // ✅ Nếu có slug → ép lại ID danh mục thật
        if (!empty($cat)) {
            $filters['category'] = $cat['id'];
        }

        $sort     = $_GET['sort'] ?? '';
        $page     = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $perPage  = 12;
        $offset   = ($page - 1) * $perPage;

        // --- Lấy sản phẩm ---
        $total    = $productModel->countByShopFilter($filters);
        $products = $productModel->getShopProducts($filters, $perPage, $offset, $sort);
        $totalPages = max(1, ceil($total / $perPage));

        // --- Truyền sang view ---
        $this->view("shop/index", [
            "title"       => $cat['name'] ?? "Shop",
            "cat"         => $cat,
            "categories"  => $categories ?? [],
            "products"    => $products ?? [],
            "filters"     => $filters,
            "currentPage" => $page,
            "totalPages"  => $totalPages,
            "total"       => $total,
            "sort"        => $sort
        ]);
    }
}
