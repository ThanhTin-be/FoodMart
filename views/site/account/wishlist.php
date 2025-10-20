<?php
$pageTitle = 'Wishlist';
$title = 'My Wishlist';
$subtitle = 'Your favorite products saved for later';
$color = 'primarydb';
$icon = '
<svg class="w-6 h-6 mr-3 text-red-500" fill="currentColor" viewBox="0 0 20 20">
  <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
</svg>';

ob_start();

// 🧩 Bảo vệ và chuẩn hóa dữ liệu
$wishlist = $wishlist ?? [];
?>

<div class="max-w-6xl p-6 mx-auto">
    <div class="space-y-6">

        <!-- Page Header -->
        <div class="p-6 text-white shadow-sm bg-gradient-to-r from-primarydb-500 to-primarydb-600 dark:from-primarydb-600 dark:to-primarydb-700 rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="flex items-center text-2xl font-bold text-white">
                        <?= $icon ?> <?= htmlspecialchars($title) ?>
                    </h1>
                    <p class="mt-1 text-white">
                        <?= htmlspecialchars($subtitle) ?>
                    </p>
                </div>
            </div>
        </div>

        <?php if (empty($wishlist)): ?>
            <!-- Empty Wishlist -->
            <div class="p-12 text-center bg-white shadow-sm dark:bg-gray-800 rounded-xl">
                <svg class="w-16 h-16 mx-auto mb-6 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
                <h3 class="mb-2 text-lg font-medium text-gray-900 dark:text-white">Your wishlist is empty</h3>
                <p class="mb-6 text-gray-500 dark:text-gray-400">
                    Discover amazing products and add them to your wishlist to save for later!
                </p>
                <a href="<?= BASE_URL ?>shop" class="inline-flex items-center px-6 py-3 text-base font-medium text-white transition-colors duration-200 border border-transparent rounded-md bg-primarydb-600 hover:bg-primarydb-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primarydb-500 dark:ring-offset-gray-800">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 01.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                    </svg>
                    Start Shopping
                </a>
            </div>
        <?php else: ?>
            <!-- Wishlist Items -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($wishlist as $item): ?>
                    <div data-product-id="<?= $item['id'] ?>" class="relative p-4 bg-white shadow-sm dark:bg-gray-800 rounded-xl transition-all duration-300 hover:shadow-md">

                        <!-- Remove Button -->
                        <button type="button" onclick="removeFromWishlist(<?= $item['id'] ?>)" class="absolute top-4 right-4 flex items-center justify-center w-10 h-10 text-gray-600 transition-all duration-300 rounded-full bg-white/90 backdrop-blur-sm hover:text-red-500 hover:bg-white">
                            <i class="fa-solid fa-heart text-red-500"></i>
                        </button>

                        <!-- Product Image -->
                        <img src="<?= BASE_URL ?>assets/images/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="object-cover w-full h-48 mb-4 rounded-lg">

                        <!-- Product Info -->
                        <h3 class="mb-1 text-lg font-medium text-gray-900 dark:text-white"><?= htmlspecialchars($item['name']) ?></h3>
                        <p class="mb-3 text-sm text-gray-500 dark:text-gray-400"><?= htmlspecialchars($item['unit'] ?? '') ?></p>
                        <p class="mb-4 text-lg font-semibold text-primarydb-600 dark:text-primarydb-400"><?= number_format($item['price'], 0, ',', '.') ?> ₫</p>

                        <!-- Add to Cart -->
                        <button type="button" onclick="addToCart(<?= $item['id'] ?>)" class="flex items-center justify-center flex-shrink-0 w-full px-4 py-3 text-base font-medium text-gray-700 bg-white border border-green-300 rounded-full hover:bg-green-50">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 000 2h1l1.2 6.4A2 2 0 007.17 13h6.66a2 2 0 001.97-1.6L17 5H6.24l-.2-1H3zm6 14a1 1 0 100 2 1 1 0 000-2zm4-1a1 1 0 110 2 1 1 0 010-2z" clip-rule="evenodd" />
                            </svg>
                            Add to Cart
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    function removeFromWishlist(productId) {
        if (!confirm('Remove this item from your wishlist?')) return;

        const productCard = document.querySelector(`[data-product-id="${productId}"]`);

        fetch(BASE_URL + "wishlist/toggle/" + productId)
            .then(res => res.json())
            .then(data => {
                if (data.success && data.status === 'removed') {
                    productCard.style.transition = 'all 0.3s ease-out';
                    productCard.style.transform = 'scale(0.8)';
                    productCard.style.opacity = '0';
                    setTimeout(() => {
                        productCard.remove();
                        if (document.querySelectorAll('[data-product-id]').length === 0) {
                            location.reload();
                        }
                    }, 300);
                } else {
                    alert(data.message || 'Error removing from wishlist');
                }
            })
            .catch(err => alert('Error removing from wishlist'));
    }
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/dashboard-layout.php';
?>