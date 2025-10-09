<section class="min-h-screen bg-gray-50 py-10">
  <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-8">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">
      Chi tiết đơn hàng #<?= $order['id'] ?>
    </h2>

    <p class="text-gray-500 mb-4">
      Ngày đặt: <?= date('d/m/Y H:i', strtotime($order['created_at'])) ?><br>
      Trạng thái: <strong class="text-blue-600"><?= ucfirst(str_replace('_',' ', $order['status'])) ?></strong>
    </p>

    <table class="w-full text-sm border border-gray-200 table-fixed">
    <thead class="bg-gray-100">
        <tr>
        <th class="px-4 py-2 border w-1/2">Sản phẩm</th>
        <th class="px-4 py-2 border w-1/6 text-center">Số lượng</th>
        <th class="px-4 py-2 border w-1/6 text-right">Đơn giá</th>
        <th class="px-4 py-2 border w-1/6 text-right">Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($order['items'] as $item): ?>
        <tr>
            <td class="px-4 py-2 border flex items-center gap-2 whitespace-normal break-words">
            <img src="<?= BASE_URL ?>assets/images/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="rounded w-10 h-10 object-cover">
            <?= htmlspecialchars($item['name']) ?>
            </td>
            <td class="px-4 py-2 border text-center"><?= $item['quantity'] ?></td>
            <td class="px-4 py-2 border text-right"><?= number_format($item['price']) ?> đ</td>
            <td class="px-4 py-2 border text-right"><?= number_format($item['price'] * $item['quantity']) ?> đ</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>

    <div class="mt-6 text-right">
      <p class="text-lg font-semibold">Tổng cộng: <?= number_format($order['total_price']) ?> đ</p>
    </div>

    <div class="mt-5 text-center">
      <a href="<?= BASE_URL ?>order/myorders" class="text-blue-600 hover:underline">← Quay lại danh sách</a>
    </div>
  </div>
</section>
