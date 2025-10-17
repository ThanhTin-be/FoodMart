<?php
// views/site/account/dashboard.php
// Biến có sẵn từ controller:
// $userData, $totalOrders, $pendingOrders, $totalSpent, $recentOrders, $wishlistCount
?>
<?php
// 🔹 Giữ an toàn tránh lỗi khi biến chưa được controller truyền vào
$wishlistCount = $wishlistCount ?? 0;
$paymentCount  = $paymentCount ?? 0;
?>

<style id="fusion-selection-styles">
    .fusion-element-highlight {
        outline: 2px solid #6366f1 !important;
        outline-style: solid !important;
    }

    .fusion-element-selected {
        outline: 5px solid #10b981 !important;
        outline-style: solid !important;
        outline-offset: 3px !important;
        animation: fusion-selected-pulse 2s ease-in-out infinite !important;
    }

    @keyframes fusion-selected-pulse {
        0% {
            outline-color: #10b981 !important;
            outline-width: 5px !important;
            outline-offset: 3px !important;
        }

        50% {
            outline-color: #059669 !important;
            outline-width: 6px !important;
            outline-offset: 4px !important;
        }

        100% {
            outline-color: #10b981 !important;
            outline-width: 5px !important;
            outline-offset: 3px !important;
        }
    }

    .fusion-selection-overlay {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: rgba(0, 0, 0, 0.05) !important;
        z-index: 2147483647 !important;
        cursor: crosshair !important;
        pointer-events: none !important;
    }

    .fusion-selection-tooltip {
        position: fixed !important;
        background: #1f2937 !important;
        color: white !important;
        padding: 8px 12px !important;
        border-radius: 6px !important;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif !important;
        font-size: 13px !important;
        font-weight: 500 !important;
        z-index: 2147483648 !important;
        pointer-events: none !important;
        transform: translate(-50%, -100%) translateY(-10px) !important;
        white-space: nowrap !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3) !important;
    }

    .fusion-selection-tooltip::after {
        content: '' !important;
        position: absolute !important;
        top: 100% !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        border: 5px solid transparent !important;
        border-top-color: #1f2937 !important;
    }


    @keyframes fusion-fade-in {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fusion-label-bounce {
        0% {
            opacity: 0;
            transform: translateY(-10px) scale(0.9);
        }

        50% {
            opacity: 1;
            transform: translateY(0) scale(1.05);
        }

        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
</style>
<div class="min-h-screen"><!-- Navigation Tabs -->
    <div class="pt-16 bg-white shadow-sm dark:bg-gray-950">
        <div class="max-w-6xl px-0 mx-auto sm:px-6 lg:px-8">

            <!-- Desktop Navigation -->
            <nav class="grid grid-cols-2 gap-2 md:grid-cols-3 lg:grid-cols-6" aria-label="Tabs">

                <!-- Dashboard Home -->
                <a class="border-primarydb-500 text-primarydb-600 bg-primarydb-50 dark:border-primarydb-400 dark:text-primarydb-400 dark:bg-primarydb-900/20 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm flex items-center transition-all duration-200" href="<?= BASE_URL ?>site/dashboard/dashboard">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-gradient-to-r from-blue-500 to-blue-600">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-9 9a1 1 0 001.414 1.414L8 5.414V17a1 1 0 102 0V5.414l6.293 6.293a1 1 0 001.414-1.414l-9-9z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="font-medium">Dashboard</div>
                        <div class="text-xs text-gray-500">Overview</div>
                    </div>
                </a>

                <!-- My Orders -->
                <a href="<?= htmlspecialchars(BASE_URL . 'account/orders') ?>" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-primarydb-300 dark:text-gray-400 dark:hover:text-gray-300 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm flex items-center transition-all duration-200">
                    <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 mr-3 rounded-lg bg-gradient-to-r from-green-500 to-green-600">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center font-medium">
                            My Orders
                            <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                <?= (int)$totalOrders ?> total
                            </span>
                        </div>
                        <div class="text-xs text-gray-500">Order history</div>
                    </div>
                </a>

                <!-- My Profile -->
                <a href="<?= htmlspecialchars(BASE_URL . 'account/profile') ?>" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-primarydb-300 dark:text-gray-400 dark:hover:text-gray-300 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm flex items-center transition-all duration-200">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-gradient-to-r from-purple-500 to-purple-600">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="font-medium">My Profile</div>
                        <div class="text-xs text-gray-500">Personal info</div>
                    </div>
                </a>

                <!-- My Addresses -->
                <a href="<?= htmlspecialchars(BASE_URL . 'user/addresses') ?>" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-primarydb-300 dark:text-gray-400 dark:hover:text-gray-300 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm flex items-center transition-all duration-200">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-gradient-to-r from-orange-500 to-orange-600">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="font-medium">Addresses</div>
                        <div class="text-xs text-gray-500">Shipping info</div>
                    </div>
                </a>

                <!-- Wishlist -->
                <a href="<?= htmlspecialchars(BASE_URL . 'user/wishlist') ?>" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-primarydb-300 dark:text-gray-400 dark:hover:text-gray-300 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm flex items-center transition-all duration-200">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-gradient-to-r from-red-500 to-red-600">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center font-medium">
                            Wishlist
                            <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                <?= (int)$wishlistCount ?>
                            </span>
                        </div>
                        <div class="text-xs text-gray-500">Saved items</div>
                    </div>
                </a>

                <!-- Payment History -->
                <a href="<?= htmlspecialchars(BASE_URL . 'user/payments') ?>" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-primarydb-300 dark:text-gray-400 dark:hover:text-gray-300 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm flex items-center transition-all duration-200">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-gradient-to-r from-indigo-500 to-indigo-600">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                            <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="font-medium">Payments</div>
                        <div class="text-xs text-gray-500">Payment history</div>
                    </div>
                </a>

            </nav>
        </div>
    </div>

    <!-- Quick Actions Bar -->
    <div class="bg-gray-100 dark:bg-gray-800">
        <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center justify-between py-3 sm:flex-row">

                <!-- Left side - Breadcrumb -->
                <div class="items-center hidden mb-2 text-sm text-gray-600 sm:flex dark:text-gray-400 sm:mb-0">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Customer Dashboard</span>
                    <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-medium text-gray-900 dark:text-white">
                        Overview </span>
                </div>

                <!-- Right side - Quick actions -->
                <div class="flex items-center space-x-4">
                    <a href="<?= htmlspecialchars(BASE_URL . 'shop') ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors duration-200 border border-transparent rounded-md bg-primarydb-600 hover:bg-primarydb-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primarydb-500">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                        </svg>
                        Continue Shopping
                    </a>

                    <a href="<?= htmlspecialchars(BASE_URL . 'cart') ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors duration-200 bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                        View Cart
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="max-w-6xl p-6 mx-auto">
        <div class="space-y-6">

            <!-- Welcome Section -->
            <div class="p-6 text-white shadow-sm bg-gradient-to-r from-primarydb-500 to-primarydb-600 dark:from-primarydb-600 dark:to-primarydb-700 rounded-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="mb-2 text-2xl font-bold">
                            Welcome back, <?= htmlspecialchars($_SESSION['user']['name'] ?? $userData['name'] ?? 'User') ?>! 👋
                        </h1>
                        <p class="text-lg text-primarydb-100">
                            Here's what's happening with your account today.
                        </p>
                        <p class="mt-2 text-sm text-primarydb-200">
                            <?php
                            // Format member since: "October 2025"
                            $memberSince = '';
                            if (!empty($userData['created_at'])) {
                                $memberSince = date('F Y', strtotime($userData['created_at']));
                            }
                            echo 'Member since ' . ($memberSince ?: '—');
                            ?>
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-center justify-center w-20 h-20 rounded-full bg-white/20">
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-4">

                <!-- Total Orders -->
                <div class="p-6 bg-white shadow-sm dark:bg-gray-800 rounded-xl ">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg dark:bg-blue-900">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Orders</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white"><?= (int)$totalOrders ?></p>
                        </div>
                    </div>
                </div>

                <!-- Pending Orders -->
                <div class="p-6 bg-white shadow-sm dark:bg-gray-800 rounded-xl ">
                    <div class="flex items-center">
                        <div class="p-2 bg-yellow-100 rounded-lg dark:bg-yellow-900">
                            <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Pending</p>
                            <p class="text-2xl font-bold text-yellow-600 dark:text-yellow-400"><?= (int)$pendingOrders ?></p>
                        </div>
                    </div>
                </div>

                <!-- Total Spent -->
                <div class="p-6 bg-white shadow-sm dark:bg-gray-800 rounded-xl ">
                    <div class="flex items-center">
                        <div class="p-2 bg-green-100 rounded-lg dark:bg-green-900">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Spent</p>
                            <p class="text-2xl font-bold text-green-600 dark:text-green-400"><?= number_format($totalSpent, 0, ',', '.') ?> ₫</p>
                        </div>
                    </div>
                </div>

                <!-- Wishlist -->
                <div class="p-6 bg-white shadow-sm dark:bg-gray-800 rounded-xl ">
                    <div class="flex items-center">
                        <div class="p-2 bg-red-100 rounded-lg dark:bg-red-900">
                            <svg class="w-6 h-6 text-red-600 dark:text-red-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Wishlist</p>
                            <p class="text-2xl font-bold text-red-600 dark:text-red-400"><?= (int)$wishlistCount ?></p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                <!-- Recent Orders -->
                <div class="lg:col-span-2">
                    <div class="bg-white shadow-sm dark:bg-gray-800 rounded-xl ">
                        <div class="px-6 py-4 bg-gray-100 dark:bg-gray-700 rounded-t-xl">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Orders</h3>
                                <a href="<?= htmlspecialchars(BASE_URL . 'account/orders') ?>" class="text-sm font-medium text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-300">
                                    View All
                                </a>
                            </div>
                        </div>

                        <div>
                            <?php if (!empty($recentOrders)): ?>
                                <?php foreach ($recentOrders as $order): ?>
                                    <?php
                                    // format values
                                    $orderId = $order['id'];
                                    $orderDate = !empty($order['created_at']) ? date('M d, Y', strtotime($order['created_at'])) : '';
                                    // tạo mã order giống mẫu: ORD-YYYYMMDD-ID
                                    $code = 'ORD-' . date('Ymd', strtotime($order['created_at'] ?? 'now')) . '-' . $orderId;
                                    $priceFormatted = number_format((float)$order['total_price'], 0, ',', '.') . ' ₫';

                                    // map trạng thái
                                    $statusLabel = $order['status'];
                                    $statusDisplay = $statusLabel;
                                    $statusClass = 'bg-gray-100 text-gray-800';
                                    // chuyển sang tiếng/label phù hợp (bạn có thể tuỳ chỉnh)
                                    $map = [
                                        'cho_xac_nhan' => ['text' => 'Pending', 'class' => 'bg-yellow-100 text-yellow-800'],
                                        'da_xac_nhan' => ['text' => 'Confirmed', 'class' => 'bg-blue-100 text-blue-800'],
                                        'dang_giao' => ['text' => 'Shipping', 'class' => 'bg-indigo-100 text-indigo-800'],
                                        'da_giao' => ['text' => 'Delivered', 'class' => 'bg-green-100 text-green-800'],
                                        'thanh_cong' => ['text' => 'Completed', 'class' => 'bg-green-100 text-green-800'],
                                        'huy' => ['text' => 'Cancelled', 'class' => 'bg-red-100 text-red-800'],
                                        'pending' => ['text' => 'Pending', 'class' => 'bg-yellow-100 text-yellow-800'],
                                        'completed' => ['text' => 'Completed', 'class' => 'bg-green-100 text-green-800'],
                                    ];
                                    if (isset($map[$statusLabel])) {
                                        $statusDisplay = $map[$statusLabel]['text'];
                                        $statusClass = $map[$statusLabel]['class'];
                                    }
                                    ?>
                                    <div class="px-6 py-4 transition-colors duration-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <div class="flex items-center justify-between">
                                            <div class="flex-1">
                                                <div class="flex items-center justify-between">
                                                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">
                                                        <?= htmlspecialchars($code) ?>
                                                    </h4>
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        <?= $priceFormatted ?>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-between mt-1">
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                                        <?= htmlspecialchars($orderDate) ?>
                                                    </p>
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $statusClass ?>">
                                                        <?= htmlspecialchars($statusDisplay) ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="px-6 py-4 text-gray-500">No recent orders.</div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <!-- Quick Actions & Wishlist -->
                <div class="space-y-6">

                    <!-- Quick Actions -->
                    <div class="p-6 bg-white shadow-sm dark:bg-gray-800 rounded-xl ">
                        <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Quick Actions</h3>
                        <div class="space-y-3">
                            <a href="<?= htmlspecialchars(BASE_URL . '/account/profile') ?>" class="flex items-center p-3 transition-colors duration-200 rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <svg class="w-5 h-5 mr-3 text-primarydb-600 dark:text-primarydb-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium text-gray-900 dark:text-white">Edit Profile</span>
                            </a>

                            <a href="<?= htmlspecialchars(BASE_URL . 'user/addresses') ?>" class="flex items-center p-3 transition-colors duration-200 rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <svg class="w-5 h-5 mr-3 text-primarydb-600 dark:text-primarydb-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium text-gray-900 dark:text-white">Manage Addresses</span>
                            </a>

                            <a href="<?= htmlspecialchars(BASE_URL . 'shop') ?>" class="flex items-center p-3 transition-colors duration-200 rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <svg class="w-5 h-5 mr-3 text-primarydb-600 dark:text-primarydb-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium text-gray-900 dark:text-white">Continue Shopping</span>
                            </a>
                        </div>
                    </div>

                    <!-- Recent Wishlist Items -->
                    <div class="p-6 bg-white shadow-sm dark:bg-gray-800 rounded-xl ">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Wishlist</h3>
                            <a href="<?= htmlspecialchars(BASE_URL . 'user/wishlist') ?>" class="text-sm font-medium text-primarydb-600 dark:text-primarydb-400 hover:text-primarydb-800 dark:hover:text-primarydb-300">
                                View All
                            </a>
                        </div>

                        <div class="space-y-3">
                            <!-- Static wishlist items as requested -->
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0 w-12 h-12 overflow-hidden bg-gray-200 rounded-lg dark:bg-gray-600">
                                    <img src="https://dev.wptheme.store/s/wppricot/wp-content/uploads/2025/09/mo-ngam-duong-pricot-2.jpg" alt="Mơ ngâm đường Pricot" class="object-cover w-full h-full">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-medium text-gray-900 truncate dark:text-white">Mơ ngâm đường Pricot</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">95.000 ₫</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0 w-12 h-12 overflow-hidden bg-gray-200 rounded-lg dark:bg-gray-600">
                                    <img src="https://dev.wptheme.store/s/wppricot/wp-content/uploads/2025/09/gallery-5.jpg" alt="Chuối organic Đà Lạt" class="object-cover w-full h-full">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-medium text-gray-900 truncate dark:text-white">Chuối organic Đà Lạt</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">40.000 ₫</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>