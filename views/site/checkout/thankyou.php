<?php
/**
 * views/site/checkout/thankyou.php
 * Trang hoàn tất đơn hàng – UI Tailwind (giữ nguyên 100%)
 * Dữ liệu đầu vào: $order = [
 *   'id', 'total_price', 'status', 'payment_method', 'created_at',
 *   'fullname', 'phone', 'address',
 *   'items' => [ ['product_name','price','quantity','image'] ... ]
 * ]
 */
?>

<div class="min-h-screen py-8">
  <div class="max-w-4xl px-8 mx-auto sm:px-6 lg:px-8">

    <!-- Progress Steps -->
    <div class="mt-4">
      <div class="flex items-center">
        <div class="flex items-center flex-1">
          <div class="flex items-center justify-center w-8 h-8 rounded-full bg-green-600 text-white">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <div class="flex-1 h-0.5 mx-2 bg-green-600"></div>
        </div>
        <div class="flex items-center flex-1">
          <div class="flex items-center justify-center w-8 h-8 rounded-full bg-green-600 text-white">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <div class="flex-1 h-0.5 mx-2 bg-green-600"></div>
        </div>
        <div class="flex items-center">
          <div class="flex items-center justify-center w-8 h-8 rounded-full bg-green-600 text-white">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
          </div>
        </div>
      </div>
      <div class="flex items-center mt-2">
        <a href="<?= BASE_URL ?>cart/index" class="flex-1 text-xs text-green-600 capitalize hover:text-green-800">Cart</a>
        <a href="<?= BASE_URL ?>checkout/index" class="flex-1 text-xs text-green-600 capitalize hover:text-green-800">Checkout</a>
        <span class="text-xs text-gray-500 capitalize">Complete</span>
      </div>
    </div>

    <div class="max-w-4xl px-4 py-6 mx-auto sm:px-6 lg:px-8">

      <!-- Success Header -->
      <div class="mb-6 bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="flex items-center justify-between px-6 py-4 rounded-t-lg bg-gradient-to-r from-emerald-500 to-emerald-600">
          <div class="flex items-center space-x-3">
            <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-full bg-white/20">
              <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h1 class="text-lg font-bold text-white">Order Placed Successfully!</h1>
              <p class="text-sm text-emerald-100">Thank you for your purchase</p>
            </div>
          </div>
          <div class="text-right">
            <p class="mb-1 text-xs text-emerald-100">Order #</p>
            <p class="font-mono text-lg font-bold text-white">
              ORD-<?= date('Ymd', strtotime($order['created_at'])) ?>-<?= $order['id'] ?>
            </p>
          </div>
        </div>
      </div>

      <!-- Main Grid -->
      <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

        <!-- LEFT: Order Info + Items -->
        <div class="space-y-4 lg:col-span-2">

          <!-- Order Information -->
          <div class="bg-white rounded-lg shadow-sm">
            <div class="px-4 py-3 bg-gray-100 rounded-t-lg">
              <h2 class="flex items-center text-base font-semibold text-gray-900">
                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Order Information
              </h2>
            </div>
            <div class="px-4 py-4">
              <dl class="grid grid-cols-2 gap-3 text-sm">
                <div>
                  <dt class="mb-1 font-medium text-gray-500">Order Number</dt>
                  <dd class="px-2 py-1 font-mono text-xs text-gray-900 rounded bg-gray-50">
                    ORD-<?= date('Ymd', strtotime($order['created_at'])) ?>-<?= $order['id'] ?>
                  </dd>
                </div>
                <div>
                  <dt class="mb-1 font-medium text-gray-500">Order Date</dt>
                  <dd class="text-gray-900"><?= date('M d, Y', strtotime($order['created_at'])) ?></dd>
                </div>
                <div>
                  <dt class="mb-1 font-medium text-gray-500">Payment Method</dt>
                  <dd class="flex items-center text-gray-900">
                    <svg class="w-3 h-3 mr-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"></path>
                    </svg>
                    <span class="text-xs"><?= strtoupper($order['payment_method']) ?></span>
                  </dd>
                </div>
                <div>
                  <dt class="mb-1 font-medium text-gray-500">Status</dt>
                  <dd>
                    <?php
                      $statusMap = [
                        'cho_xac_nhan' => ['Pending', 'bg-amber-100 text-amber-800'],
                        'da_xac_nhan' => ['Confirmed', 'bg-blue-100 text-blue-800'],
                        'dang_giao' => ['Shipping', 'bg-indigo-100 text-indigo-800'],
                        'da_giao' => ['Delivered', 'bg-green-100 text-green-800'],
                        'thanh_cong' => ['Completed', 'bg-emerald-100 text-emerald-800'],
                        'huy' => ['Cancelled', 'bg-red-100 text-red-800']
                      ];
                      [$label, $color] = $statusMap[$order['status']] ?? ['Pending', 'bg-gray-100 text-gray-700'];
                    ?>
                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full <?= $color ?>">
                      <span class="w-1.5 h-1.5 bg-current rounded-full mr-1"></span><?= $label ?>
                    </span>
                  </dd>
                </div>
              </dl>
            </div>
          </div>

          <!-- Order Items -->
          <div class="bg-white rounded-lg shadow-sm">
            <div class="px-4 py-3 bg-gray-100 rounded-t-lg">
              <h3 class="flex items-center text-base font-semibold text-gray-900">
                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                Order Items
              </h3>
            </div>
            <div class="px-4 py-4">
              <div class="space-y-3">
                <?php foreach ($order['items'] as $item): ?>
                  <div class="flex items-center p-3 space-x-3 rounded-lg bg-gray-50">
                    <div class="flex-shrink-0">
                      <div class="w-12 h-12 overflow-hidden bg-gray-200 rounded-lg">
                        <img src="<?= BASE_URL ?>assets/images/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['product_name']) ?>" class="object-cover w-full h-full">
                      </div>
                    </div>
                    <div class="flex-1 min-w-0">
                      <h4 class="text-sm font-medium text-gray-900 truncate"><?= htmlspecialchars($item['product_name']) ?></h4>
                      <p class="mt-1 text-xs text-gray-500">Qty: <span class="font-medium"><?= $item['quantity'] ?></span></p>
                    </div>
                    <div class="text-right">
                      <p class="text-sm font-bold text-gray-900"><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?> ₫</p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>

              <!-- Total -->
              <div class="pt-4 mt-4">
                <div class="flex items-center justify-between">
                  <span class="text-base font-semibold text-gray-900">Total</span>
                  <span class="text-xl font-bold text-emerald-600">
                    <?= number_format($order['total_price'], 0, ',', '.') ?> ₫
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- RIGHT: Shipping Address -->
        <div class="lg:col-span-1">
          <div class="sticky bg-white rounded-lg shadow-sm top-4">
            <div class="px-4 py-3 bg-gray-100 rounded-t-lg">
              <h3 class="flex items-center text-base font-semibold text-gray-900">
                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Shipping Address
              </h3>
            </div>
            <div class="px-4 py-4">
              <div class="p-3 rounded-lg bg-gray-50">
                <p class="mb-2 text-sm font-semibold text-gray-900"><?= htmlspecialchars($order['fullname']) ?></p>
                <div class="space-y-1 text-xs text-gray-600">
                  <p><?= htmlspecialchars($order['address']) ?></p>
                  <p><?= htmlspecialchars($order['phone']) ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Buttons -->
      <div class="flex flex-col justify-center gap-4 mt-12 sm:flex-row">
        <a href="<?= BASE_URL ?>shop/index" class="inline-flex items-center justify-center px-8 py-3 text-base font-medium text-blue-100 transition-all duration-200 bg-blue-700 rounded-full shadow-sm hover:bg-blue-900">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
          </svg>
          Continue Shopping
        </a>
        <a href="<?= BASE_URL ?>order/myorders" class="inline-flex items-center justify-center px-8 py-3 text-base font-medium text-white transition-all duration-200 rounded-full shadow-sm bg-emerald-600 hover:bg-emerald-700">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
          </svg>
          View My Orders
        </a>
      </div>
    </div>
  </div>
</div>
