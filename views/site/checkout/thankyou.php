<section class="py-5 " style="background: url('<?= asset('background-pattern.jpg') ?>') center/cover no-repeat;">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="page-title pb-2">Cảm ơn bạn!</h1>
      <nav class="breadcrumb fs-6">
        <a class="breadcrumb-item nav-link" href="<?= BASE_URL ?>">Trang chủ</a>
        <span class="breadcrumb-item active">Hoàn tất đơn hàng</span>
      </nav>
    </div>
  </div>
</section>

<section id="thank-you" class=" bg-light-grey">
  <div class="d-flex justify-content-center align-items-center" style="min-height:70vh;">
    <div class="thankyou-content p-5 bg-white rounded-4 shadow-sm text-center">
      <div class="d-flex flex-column align-items-center justify-content-center">
        <img src="<?= asset('icons/success.svg') ?>" alt="success" width="90" class="mb-4 mx-auto">
        <h2 class="text-success mb-3"> Đặt hàng thành công!</h2>
        <p class="fs-5 text-black-secondary mb-4">
          Cảm ơn bạn đã tin tưởng FoodMart.<br>
          Đơn hàng của bạn đang được xử lý và sẽ sớm được giao đến địa chỉ của bạn.
        </p>
      </div>

      <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
        <a href="<?= BASE_URL ?>order/myorders" class="btn btn-outline-primary px-4 py-2">
          <i class="bi bi-receipt"></i> Xem đơn hàng của tôi
        </a>
        <a href="<?= BASE_URL ?>site/home/index" class="btn btn-primary px-4 py-2">
          <i class="bi bi-shop"></i> Tiếp tục mua sắm
        </a>
      </div>
    </div>
  </div>
</section>

