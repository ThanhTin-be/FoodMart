<?php
class ShopController extends Controller
{
    public function index()
    {
        // Manual require models
        require_once ROOT . "models/CategoryModel.php";
        require_once ROOT . "models/ProductModel.php";

        // Init models
        $categoryModel = new CategoryModel();
        $productModel  = new ProductModel();

        // Lấy danh mục
        $categories = $categoryModel->getAll();

        // Lọc dữ liệu (keyword, category, price range, sort)
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

        // Lấy sản phẩm
        $total    = $productModel->countByFilter($filters);
        $products = $productModel->filterAndPaginate($filters, $perPage, $offset, $sort);
        $totalPages = max(1, ceil($total / $perPage));

        // Debug: log ra file khi DEV_MODE = true
        if (defined('DEV_MODE') && DEV_MODE) {
            error_log("[ShopController] Loaded " . count($categories) . " categories");
            error_log("[ShopController] Loaded " . count($products) . " products");
            error_log("[ShopController] Filters: " . json_encode($filters));
        }

        // Truyền sang view
        $this->view("shop/index", [
            "title"       => "Shop",
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
