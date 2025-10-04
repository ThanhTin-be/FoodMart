<?php
class CartController extends Controller {

    // Trang giỏ hàng chính
    public function index() {
        $cart = $_SESSION['cart'] ?? [];
        $total = $this->getCartTotal();

        $this->view("cart/index", [
            'cart' => $cart,
            'total' => $total
        ]);
    }

    // Thêm sản phẩm vào giỏ
    public function add() {
        if (!isset($_GET['id'])) {
            echo json_encode(['success' => false, 'error' => 'Thiếu ID sản phẩm']);
            exit;
        }

        $id = intval($_GET['id']);
        $productModel = $this->model("ProductModel");
        $product = $productModel->getById($id);

        if (!$product) {
            echo json_encode(['success' => false, 'error' => 'Không tìm thấy sản phẩm']);
            exit;
        }

        // Tạo giỏ hàng nếu chưa có
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

        // Nếu đã có thì tăng số lượng
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty']++;
        } else {
            $_SESSION['cart'][$id] = [
                'id'    => $product['id'],
                'name'  => $product['name'],
                'price' => (float)$product['price'],
                'qty'   => 1,
                'image' => $product['image']
            ];
        }

        // Tính tổng và count
        $total = $this->getCartTotal();
        $count = $this->getCartCount();

        // Nếu gọi AJAX thì trả JSON
        if (isset($_GET['ajax'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'count'   => $count,
                'total'   => $total,
                'cart'    => $_SESSION['cart']
            ]);
            exit;
        }

        // Nếu không phải AJAX thì quay lại trang trước
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Xóa sản phẩm khỏi giỏ
    public function remove() {
        if (isset($_GET['id']) && isset($_SESSION['cart'][$_GET['id']])) {
            unset($_SESSION['cart'][$_GET['id']]);
        }
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Tính tổng tiền giỏ hàng
    private function getCartTotal() {
        $total = 0;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $total += $item['price'] * $item['qty'];
            }
        }
        return $total;
    }

    // Đếm tổng số sản phẩm
    private function getCartCount() {
        $count = 0;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $count += $item['qty'];
            }
        }
        return $count;
    }
}
?>
