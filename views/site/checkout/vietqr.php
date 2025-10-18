<section class="py-5 text-center" style="display: flex; justify-content: center; align-items: center; min-height: 80vh; padding: 20px;">
  <div class="container" style="max-width: 600px; padding: 20px; background-color: #f8f9fa; border-radius: 10px;">
    <h2>Thanh toán qua mã QR Ngân hàng (VietQR)</h2>
    <p>Quét mã bằng ứng dụng ngân hàng hoặc ví điện tử để thanh toán đơn hàng #<?= $order['id'] ?>.</p>
     
    <img src="<?= htmlspecialchars($qr_url) ?>" alt="QR Thanh toán" style="width:300px; height:300px;" class="my-4 d-block mx-auto">

    <p><strong>Số tiền:</strong> <?= number_format($order['total_price'], 0, ',', '.') ?> đ</p>
    <p><strong>Nội dung:</strong> ThanhToanDonHang_<?= $order['id'] ?></p>
    <p><strong>Tài khoản:</strong> <?= $account['name'] ?> (<?= $account['number'] ?>)</p>

    <p class="text-muted mt-3">Hệ thống sẽ tự động xác nhận khi giao dịch được ghi nhận từ Casso.vn.</p>

    <a href="<?= BASE_URL ?>checkout/thankyou?order_id=<?= $order['id'] ?>&payment_method=cod" class="btn btn-dark mt-5" style="background-color: #28a745; color: white; padding: 6px 15px; border-radius: 5px; display: block; margin: 0 auto; width: fit-content; text-align: center;">Tôi đã thanh toán</a>
  </div>
</section>