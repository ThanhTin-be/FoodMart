<?php
// views/cart/index.php (Tailwind full version)
// Biến $cart và $total được truyền từ CartController@index
$cartCount = 0;
if (!empty($cart)) {
  foreach ($cart as $item) $cartCount += $item['qty'];
}
?>

<div class="min-h-screen">

  <!-- Header -->
  <div class="bg-white border-b border-gray-200 shadow-sm">
    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="flex items-center justify-between">
        <div>
          <h1 class="flex items-center text-2xl font-bold text-gray-900">
            Shopping Cart
          </h1>
          <p class="mt-1 text-sm text-gray-600">
            <?= $cartCount ?> item<?= $cartCount > 1 ? 's' : '' ?> in your cart
          </p>
        </div>

        <!-- Continue Shopping -->
        <a href="<?= BASE_URL ?>shop/index"
          class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors duration-200 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
          <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M7.707 14.707a1 1 0 01-1.414 0L3 11.414V13a1 1 0 11-2 0V9a1 1 0 011-1h4a1 1 0 110 2H4.414l2.293 2.293a1 1 0 010 1.414z"
              clip-rule="evenodd"></path>
          </svg>
          Continue Shopping
        </a>
      </div>
    </div>
  </div>

  <!-- Steps Progress -->
  <div class="max-w-4xl px-8 mx-auto sm:px-6 lg:px-8">
    <div class="mt-4">
      <div class="flex items-center">
        <!-- Step 1 -->
        <div class="flex items-center flex-1">
          <div class="flex items-center justify-center w-8 h-8 rounded-full bg-green-600 text-white">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                clip-rule="evenodd"></path>
            </svg>
          </div>
          <div class="flex-1 h-0.5 mx-2 bg-gray-200"></div>
        </div>

        <!-- Step 2 -->
        <div class="flex items-center flex-1">
          <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-200 text-gray-400">
            <span class="text-xs font-medium">2</span>
          </div>
          <div class="flex-1 h-0.5 mx-2 bg-gray-200"></div>
        </div>

        <!-- Step 3 -->
        <div class="flex items-center">
          <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-200 text-gray-400">
            <span class="text-xs font-medium">3</span>
          </div>
        </div>
      </div>

      <!-- Step labels -->
      <div class="flex items-center mt-2">
        <a href="<?= BASE_URL ?>cart/index"
          class="flex-1 text-xs text-green-600 capitalize hover:text-green-800">Cart</a>
        <span class="flex-1 text-xs text-gray-500 capitalize">Checkout</span>
        <span class="text-xs text-gray-500 capitalize">Complete</span>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">

    <?php if (empty($cart)): ?>
      <!-- Empty Cart -->
      <div class="py-16 text-center">
        <div class="max-w-md mx-auto">
          <svg class="w-24 h-24 mx-auto mb-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
              d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"></path>
          </svg>
          <h2 class="mb-4 text-2xl font-bold text-gray-900">Your cart is empty</h2>
          <p class="mb-8 text-gray-600">
            Looks like you haven't added any items yet. Start shopping to fill it up!
          </p>
          <a href="<?= BASE_URL ?>shop/index"
            class="inline-flex items-center px-6 py-3 text-base font-medium text-white transition-colors duration-200 border border-transparent rounded-md bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                clip-rule="evenodd"></path>
            </svg>
            Start Shopping
          </a>
        </div>
      </div>

    <?php else: ?>
      <!-- Cart Grid -->
      <div class="lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16">

        <!-- Cart Items -->
        <div class="lg:col-span-7">
          <div class="overflow-hidden bg-white shadow-sm rounded-xl">
            <div class="px-6 py-4 border-b border-gray-200 rounded-t-xl bg-gradient-to-r from-gray-50 to-gray-100">
              <h2 class="text-lg font-semibold text-gray-900">Cart Items</h2>
            </div>

            <div class="divide-y divide-gray-200" id="cart-page-items">
              <?php foreach ($cart as $item): ?>
                <div class="items-center hidden p-6 space-x-4 lg:flex" data-item-id="<?= $item['id'] ?>">
                  <div class="flex-shrink-0 w-20 h-20 overflow-hidden bg-gray-100 rounded-lg">
                    <img src="<?= asset($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="object-contain w-full h-full">
                  </div>
                  <div class="flex-1 min-w-0">
                    <h3 class="text-lg font-medium text-gray-900 truncate"><?= htmlspecialchars($item['name']) ?></h3>
                    <p class="mt-1 text-sm text-gray-500">x<?= $item['qty'] ?></p>
                    <p class="mt-2 text-lg font-semibold text-gray-900">
                      <?= number_format($item['price'], 0, ',', '.') ?> ₫
                    </p>
                  </div>
                  <div class="flex items-center space-x-3">
                    <button type="button" class="flex items-center justify-center w-5 h-5 text-gray-600 border border-gray-300 rounded-full hover:bg-gray-50 cart-minus" data-id="<?= $item['id'] ?>">
                      <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                      </svg>
                    </button>
                    <span class="text-lg font-medium text-gray-900 min-w-[2rem] text-center cart-qty" data-id="<?= $item['id'] ?>"><?= $item['qty'] ?></span>
                    <button type="button" class="flex items-center justify-center w-5 h-5 text-gray-600 border border-gray-300 rounded-full hover:bg-gray-50 cart-plus" data-id="<?= $item['id'] ?>">
                      <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                      </svg>
                    </button>
                  </div>
                  <div class="text-right">
                    <p class="text-lg font-semibold text-red-700 cart-line-total"><?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?> ₫</p>
                    <button type="button" class="flex items-center mt-1 text-sm text-red-600 hover:text-red-800 cart-remove" data-id="<?= $item['id'] ?>">
                      <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" clip-rule="evenodd"></path>
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                      </svg>
                      Remove
                    </button>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <!-- Order Summary -->
        <div class="mt-8 lg:col-span-5 lg:mt-0">
          <div class="sticky bg-white shadow-sm rounded-xl top-8">
            <div class="px-6 py-4 border-b border-gray-200 rounded-t-xl bg-gradient-to-r from-gray-50 to-gray-100">
              <h2 class="text-lg font-semibold text-gray-900">Order Summary</h2>
            </div>
            <!-- Summary Details -->
            <div class="p-6">
              <div class="flex items-center justify-between py-3">
                <span class="text-gray-600">Subtotal</span>
                <span class="text-lg font-medium text-red-900" id="cart-subtotal">
                  <?= number_format($total, 0, ',', '.') ?> ₫
                </span>
              </div>
              <!-- Total -->
              <div class="flex items-center justify-between py-4">
                <span class="text-xl font-semibold text-gray-900">Total</span>
                <span class="text-2xl font-bold text-green-600" id="cart-total">
                  <?= number_format($total, 0, ',', '.') ?> ₫
                </span>
              </div>
              <!-- Checkout Button -->
              <div class="mt-6">
                <a href="<?= BASE_URL ?>checkout/index"
                  class="flex items-center justify-center w-full px-4 py-3 text-base font-medium text-white transition-colors duration-200 bg-green-600 rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                  <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                  </svg>
                  Proceed to Checkout
                </a>
              </div>
              <!-- Security Badge -->
              <div class="flex items-center justify-center mt-4 text-sm text-gray-500">
                <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                Secure SSL encrypted checkout
              </div>
            </div>
          </div>
        </div>

      </div>
    <?php endif; ?>
  </div>
</div>