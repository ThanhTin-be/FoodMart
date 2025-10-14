

<section class="py-5 text-center">
  <div class="container">
    <h2>Thanh toán qua mã QR Ngân hàng (VietQR)</h2>
    <p>Quét mã bằng ứng dụng ngân hàng hoặc ví điện tử để thanh toán đơn hàng #<?= $order['id'] ?>.</p>
     
    <img src="<?= htmlspecialchars($qr_url) ?>"alt="QR Thanh toán"style="width:300px;height:300px"class="my-4 d-block mx-auto">


    <p><strong>Số tiền:</strong> <?= number_format($order['total_price'], 0, ',', '.') ?> đ</p>
    <p><strong>Nội dung:</strong> ThanhToanDonHang_<?= $order['id'] ?></p>
    <p><strong>Tài khoản:</strong> <?= $account['name'] ?> (<?= $account['number'] ?>)</p>

    <p class="text-muted mt-3">Hệ thống sẽ tự động xác nhận khi giao dịch được ghi nhận từ Casso.vn.</p>

    <a href="<?= BASE_URL ?>checkout/thankyou" class="btn btn-dark mt-3">Tôi đã thanh toán</a>
  </div>
</section>
