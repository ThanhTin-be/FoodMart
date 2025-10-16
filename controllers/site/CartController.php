<?php
class CartController extends Controller
{

    // Trang giỏ hàng chính
    public function index()
    {
        $cart = $_SESSION['cart'] ?? [];
        $total = $this->getCartTotal();

        $this->view("cart/index", [
            'cart' => $cart,
            'total' => $total
        ]);
    }


    // Thêm sản phẩm vào giỏ
    public function add($id = null)
    {
        if (!$id && isset($_GET['id'])) {
            $id = intval($_GET['id']);
        }

        if (!$id) {
            echo json_encode(['success' => false, 'error' => 'Thiếu ID sản phẩm']);
            return;
        }

        // ✅ Lấy số lượng từ query string (nếu không có thì mặc định là 1)
        $qty = isset($_GET['qty']) ? max(1, intval($_GET['qty'])) : 1;

        $productModel = $this->model("ProductModel");
        $product = $productModel->getById($id);

        if (!$product) {
            echo json_encode(['success' => false, 'error' => 'Không tìm thấy sản phẩm']);
            return;
        }

        // ✅ Bảo đảm session cart tồn tại
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // ✅ Thêm hoặc cộng thêm đúng số lượng
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$id] = [
                'id'    => $product['id'],
                'name'  => $product['name'],
                'price' => (float)$product['price'],
                'qty'   => $qty,
                'image' => $product['image']
            ];
        }

        // ✅ Tính tổng tiền
        $total = 0;
        $totalQty = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['qty'];
            $totalQty += $item['qty'];
        }

        // ✅ Debug log (chỉ in khi dev)
        error_log("[🛒 ADD] ID={$id}, QTY={$qty}, TOTAL={$total}, COUNT={$totalQty}");

        // ✅ Trả JSON response
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'count'   => $totalQty,
            'total'   => $total,
            'cart'    => array_values($_SESSION['cart'])
        ]);
    }


    // Cập nhật số lượng sản phẩm trong giỏ (AJAX)
    public function update($id = null)
    {
        if (!isset($_SESSION)) session_start();
        header('Content-Type: application/json');

        if (!$id) {
            echo json_encode(['success' => false, 'error' => 'Thiếu ID sản phẩm']);
            return;
        }

        $qty = isset($_GET['qty']) ? (int)$_GET['qty'] : 1;

        // Nếu qty = 0 thì xoá luôn sản phẩm
        if ($qty <= 0) {
            unset($_SESSION['cart'][$id]);
        } else {
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['qty'] = $qty;
            }
        }

        // Tính lại tổng tiền + tổng số món
        $total = 0;
        $totalQty = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['qty'];
            $totalQty += $item['qty'];
        }

        echo json_encode([
            'success' => true,
            'count' => $totalQty,
            'total' => $total,
            'cart' => array_values($_SESSION['cart'])
        ]);
    }




    // Xóa sản phẩm khỏi giỏ
    public function remove()
    {
        if (isset($_GET['id']) && isset($_SESSION['cart'][$_GET['id']])) {
            unset($_SESSION['cart'][$_GET['id']]);
        }
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Tính tổng tiền giỏ hàng
    private function getCartTotal()
    {
        $total = 0;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $total += $item['price'] * $item['qty'];
            }
        }
        return $total;
    }

    // Đếm tổng số sản phẩm
    private function getCartCount()
    {
        $count = 0;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $count += $item['qty'];
            }
        }
        return $count;
    }
}
