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
    public function add($id = null) {
       

        if (!$id && isset($_GET['id'])) {
            $id = intval($_GET['id']);
        }

        if (!$id) {
            echo json_encode(['success' => false, 'error' => 'Thiếu ID sản phẩm']);
            return;
        }

        $productModel = $this->model("ProductModel");
        $product = $productModel->getById($id);

        if (!$product) {
            echo json_encode(['success' => false, 'error' => 'Không tìm thấy sản phẩm']);
            return;
        }

        // ✅ giữ dữ liệu cũ
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // ✅ nếu sản phẩm đã có, tăng số lượng
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty'] += 1;
        } else {
            $_SESSION['cart'][$id] = [
                'id'    => $product['id'],
                'name'  => $product['name'],
                'price' => (float)$product['price'],
                'qty'   => 1,
                'image' => $product['image']
            ];
        }

        $cart = $_SESSION['cart'];

        // ✅ Tính tổng
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        header('Content-Type: application/json');

        // Tính tổng số lượng sản phẩm
        $totalQty = 0;
        foreach ($_SESSION['cart'] as $item) {
            $totalQty += $item['qty'];
        }
        echo json_encode([
            'success' => true,
            'count'   => $totalQty,
            'total'   => $total,
            'cart'    => array_values($cart)
        ]);
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
