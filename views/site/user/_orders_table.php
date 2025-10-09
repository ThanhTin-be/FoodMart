<div id="orders-table">
  <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200 text-sm text-gray-700">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-3 border">Mã đơn</th>
          <th class="px-4 py-3 border">Ngày đặt</th>
          <th class="px-4 py-3 border">Tổng tiền</th>
          <th class="px-4 py-3 border">Trạng thái</th>
          <th class="px-4 py-3 border">Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($orders)): ?>
          <tr><td colspan="5" class="text-center py-5 text-gray-500">Chưa có đơn hàng nào.</td></tr>
        <?php else: ?>
          <?php foreach ($orders as $o): ?>
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-3 border">#<?= $o['id'] ?></td>
              <td class="px-4 py-3 border"><?= date('d/m/Y H:i', strtotime($o['created_at'])) ?></td>
              <td class="px-4 py-3 border"><?= number_format($o['total_price']) ?> đ</td>
             <td class="px-4 py-3 border">
             <?php
                $status = $o['status'];
                $color = match($status) {
                'cho_xac_nhan' => 'bg-yellow-500',
                'da_xac_nhan'  => 'bg-blue-500',
                'dang_giao'    => 'bg-indigo-500',
                'da_giao'      => 'bg-green-600',
                'thanh_cong'   => 'bg-green-700',
                'huy'          => 'bg-red-500',
                default        => 'bg-gray-400',
                };
            ?>
            <span class="px-2 py-1 rounded text-white <?= $color ?>">
                <?= ucfirst(str_replace('_',' ', $status)) ?>
            </span>
            </td>

            <td class="px-4 py-3 border text-center flex justify-center gap-2">
            <a href="<?= BASE_URL ?>order/detail/<?= $o['id'] ?>" 
                class="text-blue-600 hover:underline">Xem</a>

            <?php if ($status === 'cho_xac_nhan'): ?>
                <form action="<?= BASE_URL ?>order/cancel/<?= $o['id'] ?>" method="post" onsubmit="return confirm('Bạn có chắc muốn hủy đơn hàng này?')">
                <button type="submit" class="text-red-600 hover:underline">Hủy</button>
                </form>
            <?php endif; ?>
            </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <?php if ($totalPages > 1): ?>
    <div class="flex justify-center items-center mt-6 gap-2">
      <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <button class="page-btn px-3 py-1 border rounded <?= $i == $page ? 'bg-blue-600 text-white' : 'hover:bg-gray-100' ?>"
                data-page="<?= $i ?>">
          <?= $i ?>
        </button>
      <?php endfor; ?>
    </div>
  <?php endif; ?>
</div>
