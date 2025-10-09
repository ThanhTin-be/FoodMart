<section class="shopify-cart checkout-wrap py-5">
  <div class="container-fluid">
    <!-- START FORM -->
    <form action="<?= BASE_URL ?>checkout/placeOrder" method="post" class="form-group">
      <div class="row d-flex flex-wrap">
        <div class="col-lg-6">
          <h4 class="text-dark pb-4">Thông tin người nhận</h4>
          <div class="billing-details">

            <label>Họ và tên*</label>
            <input type="text" name="fullname" class="form-control mt-2 mb-4 ps-3"
                   value="<?= htmlspecialchars($_SESSION['user']['name'] ?? '') ?>" required>

            <label>Số điện thoại*</label>
            <input type="text" name="phone" class="form-control mt-2 mb-4 ps-3"
                   value="<?= htmlspecialchars($_SESSION['user']['phone'] ?? '') ?>" required>

            <label>Email*</label>
            <input type="email" name="email" class="form-control mt-2 mb-4 ps-3"
                   value="<?= htmlspecialchars($_SESSION['user']['email'] ?? '') ?>" required>

            <label>Địa chỉ giao hàng*</label>
            <input type="text" name="address" class="form-control mt-2 mb-4 ps-3"
                   value="<?= htmlspecialchars($_SESSION['user']['address'] ?? '') ?>" required>

            <label>Ghi chú đơn hàng (tuỳ chọn)</label>
            <textarea name="note" rows="3" class="form-control mt-2 mb-4 ps-3"
                      placeholder="Ghi chú cho đơn hàng (ví dụ: giao giờ hành chính)"></textarea>
          </div>
        </div>
            <!-- Cart Totals -->
            <div class="col-lg-6">
              <h4 class="display-7 text-dark pb-4">Tổng đơn hàng</h4>
              <div class="total-price">
                <table class="table border align-middle">
                  <tbody>
                    <!-- Tạm tính -->
                    <tr class="border-bottom text-uppercase">
                      <th>Tạm tính</th>
                      <td>
                        <span id="subtotal"><?= number_format($total, 0, ',', '.') ?></span> đ
                      </td>
                    </tr>

                    <!-- Voucher -->
                    <tr class="voucher border-bottom text-uppercase">
                      <th>Voucher</th>
                      <td>
                        <div class="input-group">
                          <input type="text" id="voucher-code" class="form-control" placeholder="Nhập mã giảm giá">
                          <button type="button" id="apply-voucher" class="btn btn-outline-dark">Áp dụng</button>
                        </div>
                        <small id="voucher-msg" class="text-success d-none">
                          Mã hợp lệ! Giảm <span id="discount-amount">0</span> đ
                        </small>
                        <small id="voucher-error" class="text-danger d-none">
                          Mã không hợp lệ!
                        </small>
                      </td>
                    </tr>

                    <!-- Tổng cộng -->
                    <tr class="border-bottom text-uppercase fw-bold">
                      <th>Tổng cộng</th>
                      <td>
                        <strong><span id="checkout-total"><?= number_format($total, 0, ',', '.') ?></span> đ</strong>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <!-- Phương thức thanh toán -->
                <div class="list-group mt-4 mb-3">
                  <label class="list-group-item border-0">
                    <input class="form-check-input" type="radio" name="payment_method" value="cod" checked>
                    <span><strong>Thanh toán khi nhận hàng (COD)</strong></span>
                  </label>
                  <label class="list-group-item border-0">
                    <input class="form-check-input" type="radio" name="payment_method" value="bank">
                    <span><strong>Chuyển khoản ngân hàng</strong></span>
                  </label>
                  <label class="list-group-item border-0">
                    <input class="form-check-input" type="radio" name="payment_method" value="paypal">
                    <span><strong>Thanh toán qua PayPal</strong></span>
                  </label>
                </div>

                <!-- Nút đặt hàng -->
                <button type="submit" class="btn btn-dark btn-lg w-100 text-uppercase">
                  Đặt hàng ngay
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- END FORM -->
  </div>
</section>
