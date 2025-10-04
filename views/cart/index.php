<?php
// views/cart/index.php
// Biến $cart và $total đã được truyền từ CartController@index
?>

<div class="preloader-wrapper">
  <div class="preloader"></div>
</div>

<!-- Offcanvas Cart (mobile) -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
  <div class="offcanvas-header justify-content-center">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="order-md-last">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-primary">Your cart</span>
        <span class="badge bg-primary rounded-pill"><?= count($cart) ?></span>
      </h4>
      <ul class="list-group mb-3">
        <?php if (empty($cart)): ?>
          <li class="list-group-item text-muted">Giỏ hàng trống</li>
        <?php else: ?>
          <?php foreach ($cart as $item): ?>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0"><?= htmlspecialchars($item['name']) ?></h6>
                <small class="text-body-secondary">x<?= $item['qty'] ?></small>
              </div>
              <span class="text-body-secondary">
                <?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?> đ
              </span>
            </li>
          <?php endforeach; ?>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total</span>
            <strong><?= number_format($total, 0, ',', '.') ?> đ</strong>
          </li>
        <?php endif; ?>
      </ul>
      <?php if (!empty($cart)): ?>
        <a href="<?= BASE_URL ?>checkout/index" class="w-100 btn btn-primary btn-lg">Continue to checkout</a>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Breadcrumb -->
<section class="py-5 mb-5" style="background: url('<?= asset('background-pattern.jpg') ?>');">
  <div class="container-fluid">
    <div class="d-flex justify-content-between">
      <h1 class="page-title pb-2">Cart</h1>
      <nav class="breadcrumb fs-6">
        <a class="breadcrumb-item nav-link" href="<?= BASE_URL ?>">Home</a>
        <a class="breadcrumb-item nav-link" href="#">Pages</a>
        <span class="breadcrumb-item active" aria-current="page">Cart</span>
      </nav>
    </div>
  </div>
</section>

<!-- Cart table -->
<section class="py-5">
  <div class="container-fluid">
    <div class="row g-5">
      <div class="col-md-8">
        <div class="table-responsive cart">
          <table class="table">
            <thead>
              <tr>
                <th class="card-title text-uppercase text-muted">Product</th>
                <th class="card-title text-uppercase text-muted">Quantity</th>
                <th class="card-title text-uppercase text-muted">Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($cart)): ?>
                <tr>
                  <td colspan="4" class="text-center text-muted py-4">Giỏ hàng trống</td>
                </tr>
              <?php else: ?>
                <?php foreach ($cart as $item): ?>
                  <tr>
                    <td class="py-4">
                      <div class="cart-info d-flex flex-wrap align-items-center">
                        <div class="col-lg-3">
                          <img src="<?= asset($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="img-fluid">
                        </div>
                        <div class="col-lg-9 ps-3">
                          <h5 class="card-title"><?= htmlspecialchars($item['name']) ?></h5>
                        </div>
                      </div>
                    </td>
                    <td class="py-4">
                      <div class="input-group product-qty w-50">
                        <input type="text" 
                               class="form-control input-number text-center" 
                               value="<?= $item['qty'] ?>" readonly>
                      </div>
                    </td>
                    <td class="py-4">
                      <div class="total-price">
                        <span class="money text-dark">
                          <?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?> đ
                        </span>
                      </div>
                    </td>
                    <td class="py-4">
                      <a href="<?= BASE_URL ?>cart/remove/<?= $item['id'] ?>" class="text-danger">
                        <svg width="24" height="24"><use xlink:href="#trash"></use></svg>
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Cart Totals -->
      <div class="col-md-4">
        <div class="cart-totals bg-grey py-5">
          <h4 class="text-dark pb-4">Cart Total</h4>
          <div class="total-price pb-5">
            <table class="table text-uppercase">
              <tbody>
                <tr class="subtotal border-top border-bottom">
                  <th>Subtotal</th>
                  <td class="ps-5"><span class="text-dark"><?= number_format($total, 0, ',', '.') ?> đ</span></td>
                </tr>
                <tr class="order-total border-bottom">
                  <th>Total</th>
                  <td class="ps-5"><span class="text-dark"><?= number_format($total, 0, ',', '.') ?> đ</span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="button-wrap row g-2">
            <div class="col-md-6">
              <a href="<?= BASE_URL ?>shop/index" class="btn btn-dark py-3 px-4 w-100">Continue Shopping</a>
            </div>
            <?php if (!empty($cart)): ?>
            <div class="col-md-6">
              <a href="<?= BASE_URL ?>checkout/index" class="btn btn-primary py-3 px-4 w-100">Proceed to checkout</a>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
