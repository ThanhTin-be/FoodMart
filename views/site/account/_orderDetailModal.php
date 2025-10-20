<?php if (!empty($order)): ?>
    <div id="customer-order-modal" class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

            <!-- Overlay -->
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75 dark:bg-gray-900 dark:bg-opacity-75" onclick="closeCustomerOrderModal()"></div>

            <!-- Modal content -->
            <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl dark:bg-gray-800 sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">

                <!-- Header -->
                <div class="px-6 py-4 bg-gray-100 dark:bg-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                            Đơn hàng #<?= htmlspecialchars($order['id']) ?>
                        </h3>
                        <button onclick="closeCustomerOrderModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Content -->
                <div class="px-6 py-4 overflow-y-auto bg-white dark:bg-gray-800 max-h-[80vh]" id="customer-modal-content">

                    <div class="space-y-6">

                        <!-- Order Info -->
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                            <!-- Order Information -->
                            <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-700">
                                <h4 class="flex items-center mb-3 text-sm font-semibold text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                    </svg>
                                    Thông tin đơn hàng
                                </h4>
                                <dl class="space-y-2 text-sm">
                                    <div class="flex justify-between">
                                        <dt class="text-gray-600 dark:text-gray-400">Mã đơn:</dt>
                                        <dd class="font-medium text-gray-900 dark:text-white">#<?= htmlspecialchars($order['id']) ?></dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt class="text-gray-600 dark:text-gray-400">Ngày đặt:</dt>
                                        <dd class="font-medium text-gray-900 dark:text-white">
                                            <?= date('d/m/Y H:i', strtotime($order['created_at'])) ?>
                                        </dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt class="text-gray-600 dark:text-gray-400">Trạng thái:</dt>
                                        <dd>
                                            <?php
                                            $statusColors = [
                                                'cho_xac_nhan' => 'bg-yellow-100 text-yellow-800',
                                                'dang_giao'    => 'bg-blue-100 text-blue-800',
                                                'thanh_cong'   => 'bg-green-100 text-green-800',
                                                'huy'          => 'bg-red-100 text-red-800',
                                            ];
                                            $statusText = [
                                                'cho_xac_nhan' => 'Chờ xác nhận',
                                                'dang_giao'    => 'Đang giao',
                                                'thanh_cong'   => 'Thành công',
                                                'huy'          => 'Đã hủy',
                                            ];
                                            $color = $statusColors[$order['status']] ?? 'bg-gray-100 text-gray-800';
                                            ?>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $color ?>">
                                                <?= $statusText[$order['status']] ?? ucfirst($order['status']) ?>
                                            </span>
                                        </dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt class="text-gray-600 dark:text-gray-400">Tổng tiền:</dt>
                                        <dd class="text-lg font-bold text-green-700 dark:text-green-400">
                                            <?= number_format($order['total_price'], 0, ',', '.') ?> ₫
                                        </dd>
                                    </div>
                                </dl>
                            </div>

                            <!-- Payment Info -->
                            <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-700">
                                <h4 class="flex items-center mb-3 text-sm font-semibold text-gray-900 dark:text-white">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"></path>
                                    </svg>
                                    Thanh toán
                                </h4>
                                <dl class="space-y-2 text-sm">
                                    <div class="flex justify-between">
                                        <dt class="text-gray-600 dark:text-gray-400">Phương thức:</dt>
                                        <dd class="font-medium text-gray-900 dark:text-white">
                                            <?= htmlspecialchars($order['payment_method']) ?>
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>

                        <!-- Shipping Address -->
                        <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-700">
                            <h4 class="flex items-center mb-3 text-sm font-semibold text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                                Địa chỉ giao hàng
                            </h4>
                            <div class="space-y-1 text-sm text-gray-600 dark:text-gray-400">
                                <p class="font-medium text-gray-900 dark:text-white"><?= htmlspecialchars($order['fullname']) ?></p>
                                <p><?= htmlspecialchars($order['phone']) ?></p>
                                <p><?= htmlspecialchars($order['address']) ?></p>
                            </div>
                        </div>

                        <!-- Order Items -->
                        <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-700">
                            <h4 class="flex items-center mb-3 text-sm font-semibold text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                                </svg>
                                Sản phẩm trong đơn (<?= count($order['items'] ?? []) ?>)
                            </h4>

                            <?php if (!empty($order['items'])): ?>
                                <div class="space-y-3">
                                    <?php foreach ($order['items'] as $item): ?>
                                        <div class="flex items-center py-3 space-x-4 border-b border-gray-200 dark:border-gray-600 last:border-b-0">
                                            <div class="flex-shrink-0 w-16 h-16 overflow-hidden bg-gray-200 rounded-lg dark:bg-gray-600">
                                                <img src="<?= BASE_URL ?>assets/images/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="object-cover w-full h-full">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <h5 class="text-sm font-medium text-gray-900 dark:text-white"><?= htmlspecialchars($item['name']) ?></h5>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">SL: <?= $item['quantity'] ?></p>
                                            </div>
                                            <div class="text-right">
                                                <div class="text-sm font-bold text-gray-900 dark:text-white">
                                                    <?= number_format($item['price'], 0, ',', '.') ?> ₫
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <p class="text-gray-500 dark:text-gray-400">Không có sản phẩm trong đơn hàng này.</p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <!-- Footer -->
                <div class="flex justify-end px-6 py-4 bg-gray-100 dark:bg-gray-700">
                    <button onclick="closeCustomerOrderModal()" class="px-4 py-2 text-sm font-medium text-white rounded-md bg-green-700 hover:bg-green-800">
                        Đóng
                    </button>
                </div>

            </div>
        </div>
    </div>
<?php else: ?>
    <div class="p-6 text-center text-red-500">Không tìm thấy dữ liệu đơn hàng.</div>
<?php endif; ?>