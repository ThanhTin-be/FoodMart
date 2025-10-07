<section class="py-5 mb-5" style="background: url(<?= asset('assets/images/background-pattern.jpg') ?>);">
  <div class="container-fluid">
    <div class="d-flex justify-content-between">
      <h1 class="page-title pb-2">Login</h1>
      <nav class="breadcrumb fs-6">
        <a class="breadcrumb-item nav-link" href="<?= BASE_URL ?>home/index">Home</a>
        <span class="breadcrumb-item active" aria-current="page">Login</span>
      </nav>
    </div>
  </div>
  <div class="container-sm">
    <div class="row justify-content-center">
      <div class="col-lg-4 p-5 bg-white border shadow-sm">
        <h5 class="text-uppercase mb-4">Login</h5>

        <?php if (!empty($data['error'])): ?>
          <div class="alert alert-danger"><?= $data['error'] ?></div>
        <?php endif; ?>

        <form method="POST" action="<?= BASE_URL ?>site/user/login">
          <div class="col-12 pb-3">
            <input type="email" name="email" placeholder="Email" class="form-control" required>
          </div>
          <div class="col-12 pb-3">
            <input type="password" name="password" placeholder="Password" class="form-control" required>
          </div>
          <div class="col-12 pb-3">
            <label>
              <input type="checkbox" name="remember">
              <span class="label-body">Remember me</span>
            </label>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary text-uppercase w-100">Log in</button>
            <p class="mt-2"><a href="#">Lost your password?</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
