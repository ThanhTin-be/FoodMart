<?php
// views/user/register.php
?>

<section class="py-5 mb-5" style="background: url(<?= asset('assets/images/background-pattern.jpg') ?>);">
  <div class="container-fluid">
    <div class="d-flex justify-content-between">
      <h1 class="page-title pb-3">Register</h1>
      <nav class="breadcrumb fs-6">
        <a class="breadcrumb-item nav-link" href="<?= BASE_URL ?>home/index">Home</a>
        <span class="breadcrumb-item active" aria-current="page">Register</span>
      </nav>
    </div>
  </div>
  <div class="container-sm">
    <div class="row justify-content-center">
      <div class="col-lg-4 p-5 bg-white border shadow-sm">
        <h5 class="text-uppercase mb-4">Register</h5>

        <?php if (!empty($data['error'])): ?>
          <div class="alert alert-danger"><?= $data['error'] ?></div>
        <?php endif; ?>

        <form method="POST" action="<?= BASE_URL ?>user/register">
          <div class="col-12 pb-3">
            <input type="text" name="name" placeholder="Full Name" class="form-control" required>
          </div>
          <div class="col-12 pb-3">
            <input type="email" name="email" placeholder="Email" class="form-control" required>
          </div>
          <div class="col-12 pb-3">
            <input type="text" name="address" placeholder="Address" class="form-control">
          </div>
          <div class="col-12 pb-3">
            <input type="text" name="phone" placeholder="Phone" class="form-control">
          </div>
          <div class="col-12 pb-3">
            <input type="password" name="password" placeholder="Password" class="form-control" required>
          </div>
          <div class="col-12 pb-3">
            <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control" required>
          </div>  
          <div class="col-12">
            <button type="submit" class="btn btn-primary text-uppercase w-100">Register</button>
            <p class="mt-2"><a href="<?= BASE_URL ?>user/login">Already have an account? Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>