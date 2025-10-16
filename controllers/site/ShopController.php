<?php
class ShopController extends Controller
{
    public function index() {
        require_once ROOT . "models/CategoryModel.php";
        require_once ROOT . "models/ProductModel.php";

        $categoryModel = new CategoryModel();
        $productModel  = new ProductModel();

        // Lấy danh mục hiện tại (nếu có slug hoặc id)
        $cat = null;
        if (!empty($_GET['category'])) {
            $catId = (int) $_GET['category'];
            $cat = $categoryModel->getCategoryById($catId);
        } elseif (!empty($_GET['slug'])) {
            $cat = $categoryModel->getBySlug($_GET['slug']);
        }

        // Lấy tất cả danh mục
        $categories = $categoryModel->getAllCategories();

        // Bộ lọc
        $filters = [
            "keyword"  => $_GET['keyword']  ?? '',
            "category" => $_GET['category'] ?? '',
            "min"      => $_GET['min']      ?? '',
            "max"      => $_GET['max']      ?? '',
        ];
        if (!empty($cat)) $filters['category'] = $cat['id'];

        $sort     = $_GET['sort'] ?? '';
        $page     = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $perPage  = 12;
        $offset   = ($page - 1) * $perPage;

        // Lấy sản phẩm
        $total    = $productModel->countByShopFilter($filters);
        $products = $productModel->getShopProducts($filters, $perPage, $offset, $sort);
        $totalPages = max(1, ceil($total / $perPage));

        // ✅ Lấy tổng tất cả sản phẩm (dành cho “Xem tất cả sản phẩm”)
        $totalAll = $productModel->countByShopFilter([]);
        // Truyền sang view
        $this->view("shop/index", [
            "title"       => $cat['name'] ?? "Shop",
            "cat"         => $cat,
            "categories"  => $categories ?? [],
            "products"    => $products ?? [],
            "filters"     => $filters,
            "currentPage" => $page,
            "totalPages"  => $totalPages,
            "total"       => $total,
            "totalAll"    => $totalAll,
            "sort"        => $sort
        ]);
    }

    // ✅ API AJAX trả về HTML partial sản phẩm
    public function ajaxProducts() {
        require_once ROOT . "models/ProductModel.php";
        $productModel = new ProductModel();

        $filters = [
            "keyword"  => $_GET['keyword']  ?? '',
            "category" => $_GET['category'] ?? '',
            "min"      => $_GET['min']      ?? '',
            "max"      => $_GET['max']      ?? '',
        ];
        $sort     = $_GET['sort'] ?? '';
        $page     = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $perPage  = 12;
        $offset   = ($page - 1) * $perPage;

        $total    = $productModel->countByShopFilter($filters);
        $products = $productModel->getShopProducts($filters, $perPage, $offset, $sort);
        $totalPages = max(1, ceil($total / $perPage));

        ob_start();
        include ROOT . "views/site/shop/_productGrid.php";
        $html = ob_get_clean();

        header('Content-Type: application/json');
        echo json_encode([
            "success" => true,
            "html" => $html,
            "pagination" => [
                "page" => $page,
                "totalPages" => $totalPages
            ]
        ]);
        exit;
    }
}
