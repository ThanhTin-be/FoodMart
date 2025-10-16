<?php
class CartController extends Controller {
    private $cartModel;
    private $productModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->cartModel = $this->model("CartModel");
        $this->productModel = $this->model("ProductModel");
    }

    public function index() {
        $cart = $this->getCart();
        $total = $this->getCartTotal();
        $this->view("cart/index", [
            'cart' => $cart,
            'total' => $total
        ], 'default');
    }

    public function add($id = null) {
        if (!$id && isset($_GET['id'])) {
            $id = intval($_GET['id']);
        }

        if (!$id) {
            echo json_encode(['success' => false, 'error' => 'Thiếu ID sản phẩm']);
            return;
        }

        $product = $this->productModel->getById($id);
        if (!$product) {
            echo json_encode(['success' => false, 'error' => 'Không tìm thấy sản phẩm']);
            return;
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $quantityToAdd = 1;
        $currentQty = isset($_SESSION['cart'][$id]) ? $_SESSION['cart'][$id]['qty'] : 0;
        $newQty = $currentQty + $quantityToAdd;

        // NEW: Kiểm tra tồn kho trước khi thêm
        $stock = isset($product['stock']) ? (int)$product['stock'] : 0;
        if ($newQty > $stock) {
            $adjustedQty = $stock > 0 ? $stock : 0; // Điều chỉnh về stock hoặc 0 nếu hết
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['qty'] = $adjustedQty;
            } else if ($adjustedQty > 0) {
                $_SESSION['cart'][$id] = [
                    'id' => $product['id'],
                    'name' => $product['name'],
                    'price' => (float)$product['price'],
                    'qty' => $adjustedQty,
                    'image' => $product['image']
                ];
            }
            $message = $stock > 0 ? 'Số lượng đã quá hàng tồn kho! Đã điều chỉnh về ' . $stock . '.' : 'Đã bán hết!';
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'error' => $message,
                'count' => $this->getCartCount(),
                'total' => $this->getCartTotal(),
                'cart' => array_values($_SESSION['cart'])
            ]);
            return;
        }

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty'] += $quantityToAdd;
        } else {
            $_SESSION['cart'][$id] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => (float)$product['price'],
                'qty' => $quantityToAdd,
                'image' => $product['image']
            ];
        }

        // Lưu vào database nếu người dùng đăng nhập
        $dbSuccess = true;
        if (isset($_SESSION['user']['id'])) {
            $dbSuccess = $this->cartModel->addToCart($_SESSION['user']['id'], $id, $quantityToAdd);
            if ($dbSuccess) {
                // Cập nhật lại quantity từ database để đồng bộ
                $cartData = $this->cartModel->getCartByUserId($_SESSION['user']['id']);
                foreach ($cartData as $item) {
                    if (isset($_SESSION['cart'][$item['product_id']])) {
                        $_SESSION['cart'][$item['product_id']]['qty'] = $item['quantity'];
                    }
                }
            } else {
                error_log("Failed to add to carts table: user_id={$_SESSION['user']['id']}, product_id=$id");
            }
        }

        $cart = $_SESSION['cart'];
        $total = $this->getCartTotal();
        $totalQty = $this->getCartCount();

        header('Content-Type: application/json');
        echo json_encode([
            'success' => $dbSuccess,
            'count' => $totalQty,
            'total' => $total,
            'cart' => array_values($cart),
            'error' => $dbSuccess ? null : 'Lỗi khi lưu giỏ hàng vào cơ sở dữ liệu'
        ]);
    }

    public function update($id = null) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        header('Content-Type: application/json');

        if (!$id) {
            echo json_encode(['success' => false, 'error' => 'Thiếu ID sản phẩm']);
            return;
        }

        $qty = isset($_GET['qty']) ? (int)$_GET['qty'] : 1;

        $product = $this->productModel->getById($id);
        if (!$product) {
            echo json_encode(['success' => false, 'error' => 'Không tìm thấy sản phẩm']);
            return;
        }

        // NEW: Kiểm tra tồn kho trước khi cập nhật
        $stock = isset($product['stock']) ? (int)$product['stock'] : 0;
        $currentQty = isset($_SESSION['cart'][$id]) ? $_SESSION['cart'][$id]['qty'] : 0;
        if ($qty > $stock) {
            $adjustedQty = $stock > 0 ? $stock : 0; // Điều chỉnh về stock hoặc 0 nếu hết
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['qty'] = $adjustedQty;
            }
            $message = $stock > 0 ? 'Số lượng đã quá hàng tồn kho! Đã điều chỉnh về ' . $stock . '.' : 'Đã bán hết!';
            echo json_encode([
                'success' => false,
                'error' => $message,
                'count' => $this->getCartCount(),
                'total' => $this->getCartTotal(),
                'cart' => array_values($_SESSION['cart'] ?? [])
            ]);
            return;
        }

        $dbSuccess = true;
        if ($qty <= 0) {
            unset($_SESSION['cart'][$id]);
            if (isset($_SESSION['user']['id'])) {
                $dbSuccess = $this->cartModel->removeFromCart($_SESSION['user']['id'], $id);
            }
        } else {
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['qty'] = $qty;
                if (isset($_SESSION['user']['id'])) {
                    $dbSuccess = $this->cartModel->updateCart($_SESSION['user']['id'], $id, $qty);
                }
            }
        }

        $total = $this->getCartTotal();
        $totalQty = $this->getCartCount();

        echo json_encode([
            'success' => $dbSuccess,
            'count' => $totalQty,
            'total' => $total,
            'cart' => array_values($_SESSION['cart'] ?? []),
            'error' => $dbSuccess ? null : 'Lỗi khi cập nhật giỏ hàng trong cơ sở dữ liệu'
        ]);
    }

    public function remove() {
        $dbSuccess = true;
        if (isset($_GET['id']) && isset($_SESSION['cart'][$_GET['id']])) {
            $id = $_GET['id'];
            $originalItem = $_SESSION['cart'][$id]; // Lưu dữ liệu cũ để rollback
            unset($_SESSION['cart'][$id]);
            if (isset($_SESSION['user']['id'])) {
                $dbSuccess = $this->cartModel->removeFromCart($_SESSION['user']['id'], $id);
                if (!$dbSuccess) {
                    $_SESSION['cart'][$id] = $originalItem; // Rollback nếu database thất bại
                    error_log("Failed to remove from carts table: user_id={$_SESSION['user']['id']}, product_id=$id");
                }
            }
        }

        header('Content-Type: application/json');
        echo json_encode([
            'success' => $dbSuccess,
            'count' => $this->getCartCount(),
            'total' => $this->getCartTotal(),
            'cart' => array_values($_SESSION['cart'] ?? []),
            'error' => $dbSuccess ? null : 'Lỗi khi xóa sản phẩm khỏi giỏ hàng'
        ]);
        exit;
    }

   public function syncCartOnLogin($userId) {
        $dbCart = $this->cartModel->getCartByUserId($userId);
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Không xóa session cart, chỉ khởi tạo nếu chưa tồn tại
        // Merge session cart với db cart
        foreach ($dbCart as $item) {
            $productId = $item['product_id'];
            $product = $this->productModel->getById($productId); // NEW: Lấy thông tin sản phẩm để kiểm tra stock
            $stock = isset($product['stock']) ? (int)$product['stock'] : 0;

            if (isset($_SESSION['cart'][$productId])) {
                // Nếu sản phẩm đã tồn tại trong session, cộng dồn số lượng
                $currentQty = $_SESSION['cart'][$productId]['qty'];
                $newQty = $currentQty + $item['quantity'];

                // NEW: Kiểm tra và điều chỉnh số lượng dựa trên stock
                if ($newQty > $stock) {
                    $adjustedQty = $stock > 0 ? $stock : 0;
                    $_SESSION['cart'][$productId]['qty'] = $adjustedQty;
                    error_log("Sync cart adjusted: user_id=$userId, product_id=$productId, qty adjusted from $newQty to $adjustedQty due to stock limit.");
                } else {
                    $_SESSION['cart'][$productId]['qty'] = $newQty;
                }
            } else {
                // Nếu chưa tồn tại, thêm mới từ database
                $initialQty = $item['quantity'];
                $adjustedQty = $stock > 0 ? min($initialQty, $stock) : 0; // NEW: Điều chỉnh về stock hoặc 0

                if ($adjustedQty > 0) {
                    $_SESSION['cart'][$productId] = [
                        'id' => $item['product_id'],
                        'name' => $item['name'],
                        'price' => (float)$item['price'],
                        'qty' => $adjustedQty,
                        'image' => $item['image']
                    ];
                    if ($adjustedQty < $initialQty) {
                        error_log("Sync cart adjusted: user_id=$userId, product_id=$productId, qty adjusted from $initialQty to $adjustedQty due to stock limit.");
                    }
                }
            }
        }

        // Đồng bộ ngược lại database để đảm bảo tính nhất quán
        if (isset($_SESSION['user']['id'])) {
            foreach ($_SESSION['cart'] as $id => $item) {
                $product = $this->productModel->getById($id); // NEW: Kiểm tra stock trước khi đồng bộ
                $stock = isset($product['stock']) ? (int)$product['stock'] : 0;
                if ($item['qty'] > $stock) {
                    $adjustedQty = $stock > 0 ? $stock : 0;
                    $_SESSION['cart'][$id]['qty'] = $adjustedQty;
                    error_log("Sync cart adjusted before DB sync: user_id={$_SESSION['user']['id']}, product_id=$id, qty adjusted from {$item['qty']} to $adjustedQty due to stock limit.");
                }
                $dbSuccess = $this->cartModel->updateCart($_SESSION['user']['id'], $id, $_SESSION['cart'][$id]['qty']);
                if (!$dbSuccess) {
                    error_log("Failed to sync cart to database: user_id={$_SESSION['user']['id']}, product_id=$id");
                }
            }
        }
    }
    private function getCart() {
        if (isset($_SESSION['user']['id'])) {
            $dbCart = $this->cartModel->getCartByUserId($_SESSION['user']['id']);
            $cart = [];
            foreach ($dbCart as $item) {
                $cart[$item['product_id']] = [
                    'id' => $item['product_id'],
                    'name' => $item['name'],
                    'price' => (float)$item['price'],
                    'qty' => $item['quantity'],
                    'image' => $item['image']
                ];
            }
            foreach ($_SESSION['cart'] ?? [] as $id => $item) {
                if (!isset($cart[$id])) {
                    $cart[$id] = $item;
                    $this->cartModel->addToCart($_SESSION['user']['id'], $id, $item['qty']);
                }
            }
            $_SESSION['cart'] = $cart;
            return $cart;
        }
        return $_SESSION['cart'] ?? [];
    }

    private function getCartTotal() {
        $total = 0;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $total += $item['price'] * $item['qty'];
            }
        }
        return $total;
    }

    private function getCartCount() {
        $count = 0;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $count += $item['qty'];
            }
        }
        return $count;
    }
    public function clearCartAfterPayment() {
        if (!isset($_SESSION['user']['id'])) {
            return ['success' => false, 'error' => 'Người dùng chưa đăng nhập'];
        }

        $userId = $_SESSION['user']['id'];
        $dbSuccess = $this->cartModel->clearCart($userId);
        if ($dbSuccess) {
            $_SESSION['cart'] = []; // Làm mới giỏ hàng trong session
            return ['success' => true, 'message' => 'Giỏ hàng đã được xóa sau thanh toán'];
        } else {
            error_log("Failed to clear cart after payment: user_id=$userId");
            return ['success' => false, 'error' => 'Lỗi khi xóa giỏ hàng'];
        }
    }
}
?>