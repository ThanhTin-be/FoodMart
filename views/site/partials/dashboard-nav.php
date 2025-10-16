<?php

/**
 * Thanh Navigation Tabs (Dashboard, Orders, Profile,...)
 * Tự nhận diện tab đang active dựa theo biến $_GET['page'].
 */

$tabs = [
    ['Dashboard', 'Overview', 'blue', 'dashboard'],
    ['My Orders', 'Order history', 'green', 'orders'],
    ['My Profile', 'Personal info', 'purple', 'profile'],
    ['Addresses', 'Shipping info', 'orange', 'addresses'],
    ['Wishlist', 'Saved items', 'red', 'wishlist'],
    ['Payments', 'Payment history', 'indigo', 'payments'],
];

$currentPage = $_GET['page'] ?? 'dashboard';
?>

<div class="pt-16 bg-white shadow-sm dark:bg-gray-950">
    <div class="max-w-6xl px-0 mx-auto sm:px-6 lg:px-8">
        <nav class="grid grid-cols-2 gap-2 md:grid-cols-3 lg:grid-cols-6" aria-label="Tabs">

            <?php foreach ($tabs as [$title, $subtitle, $color, $page]): ?>
                <?php $isActive = ($currentPage === $page); ?>

                <a href="<?= BASE_URL ?>/account/<?= $page ?>"
                    class="whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm flex items-center transition-all duration-200
           <?= $isActive
                    ? 'border-primary-500 text-primary-600 bg-primary-50 dark:border-primary-400 dark:text-primary-400 dark:bg-primary-900/20'
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-primary-300 dark:text-gray-400 dark:hover:text-gray-300'
            ?>">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-gradient-to-r from-<?= $color ?>-500 to-<?= $color ?>-600">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2L2 10h3v8h10v-8h3L10 2z" />
                        </svg>
                    </div>
                    <div>
                        <div class="font-medium"><?= htmlspecialchars($title) ?></div>
                        <div class="text-xs text-gray-500"><?= htmlspecialchars($subtitle) ?></div>
                    </div>
                </a>

            <?php endforeach; ?>

        </nav>
    </div>
</div>