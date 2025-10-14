<?php

/**
 * Thanh Quick Actions hiển thị breadcrumb + nút nhanh.
 * Biến yêu cầu:
 *   - $pageTitle: tiêu đề trang hiện tại.
 */
?>
<div class="bg-gray-100 dark:bg-gray-800">
    <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col items-center justify-between py-3 sm:flex-row">

            <!-- Breadcrumb -->
            <div class="items-center hidden mb-2 text-sm text-gray-600 sm:flex dark:text-gray-400 sm:mb-0">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                        clip-rule="evenodd" />
                </svg>
                <span>Customer Dashboard</span>
                <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
                <span class="font-medium text-gray-900 dark:text-white"><?= htmlspecialchars($pageTitle) ?></span>
            </div>

            <!-- Nút bên phải -->
            <div class="flex items-center space-x-4">
                <a href="<?= BASE_URL ?>/shop"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white rounded-md bg-primary-600 hover:bg-primary-700">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    Continue Shopping
                </a>

                <a href="<?= BASE_URL ?>/cart"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white rounded-md bg-green-600 hover:bg-green-700">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M3 1a1 1 0 000 2h1l1 4h10l1-4h1a1 1 0 000-2H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                    </svg>
                    View Cart
                </a>
            </div>

        </div>
    </div>
</div>