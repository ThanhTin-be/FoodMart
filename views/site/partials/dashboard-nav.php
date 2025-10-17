<?php

/**
 * Dashboard Navigation Tabs (Dashboard, Orders, Profile, Addresses, Wishlist, Payments)
 * - Tự nhận tab đang active dựa trên URL hiện tại.
 * - Mỗi tab có icon và màu riêng.
 */

$tabs = [
    [
        'title' => 'Dashboard',
        'subtitle' => 'Overview',
        'color' => 'blue',
        'page' => 'dashboard',
        'icon' => '<path d="M10.707 2.293a1 1 0 00-1.414 0l-9 9a1 1 0 001.414 1.414L8 5.414V17a1 1 0 102 0V5.414l6.293 6.293a1 1 0 001.414-1.414l-9-9z"></path>'
    ],
    [
        'title' => 'My Orders',
        'subtitle' => 'Order history',
        'color' => 'green',
        'page' => 'orders',
        'icon' => '<path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>'
    ],
    [
        'title' => 'My Profile',
        'subtitle' => 'Personal info',
        'color' => 'purple',
        'page' => 'profile',
        'icon' => '<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>'
    ],
    [
        'title' => 'Addresses',
        'subtitle' => 'Shipping info',
        'color' => 'orange',
        'page' => 'addresses',
        'icon' => '<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>'
    ],
    [
        'title' => 'Wishlist',
        'subtitle' => 'Saved items',
        'color' => 'red',
        'page' => 'wishlist',
        'icon' => '<path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>'
    ],
    [
        'title' => 'Payments',
        'subtitle' => 'Payment history',
        'color' => 'indigo',
        'page' => 'payments',
        'icon' => '<path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path>'
    ],
];

// ✅ Lấy phần cuối URL (vd: /account/profile → profile)
$requestUri = $_SERVER['REQUEST_URI'];
$pathParts = explode('/', trim($requestUri, '/'));
$currentPage = end($pathParts) ?: 'dashboard';
?>

<div class="pt-16 bg-white shadow-sm dark:bg-gray-950">
    <div class="max-w-6xl px-0 mx-auto sm:px-6 lg:px-8">
        <nav class="grid grid-cols-2 gap-2 md:grid-cols-3 lg:grid-cols-6" aria-label="Tabs">

            <?php foreach ($tabs as $tab): ?>
                <?php
                $isActive = ($currentPage === $tab['page']);
                $activeClass = $isActive
                    ? 'border-primarydb-500 text-primarydb-600 bg-primarydb-50 dark:border-primarydb-400 dark:text-primarydb-400 dark:bg-primarydb-900/20'
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-primarydb-300 dark:text-gray-400 dark:hover:text-gray-300';
                ?>
                <a href="<?= BASE_URL ?>account/<?= $tab['page'] ?>"
                    class="whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm flex items-center transition-all duration-200 <?= $activeClass ?>">

                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-gradient-to-r from-<?= $tab['color'] ?>-500 to-<?= $tab['color'] ?>-600">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <?= $tab['icon'] ?>
                        </svg>
                    </div>

                    <div>
                        <div class="font-medium"><?= htmlspecialchars($tab['title']) ?></div>
                        <div class="text-xs text-gray-500"><?= htmlspecialchars($tab['subtitle']) ?></div>
                    </div>
                </a>
            <?php endforeach; ?>

        </nav>
    </div>
</div>