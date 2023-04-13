<?php

require '../helpers.php';

$user = getLoggedUser();

?>

<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
  <nav class="navbar bg-secondary navbar-dark">
    <a href="#" class="navbar-brand mx-4 mb-3">
      <h3 class="text-primary">
        <i class="fa fa-car-side me-2"></i>
        Rental Mobil
      </h3>
    </a>
    <div class="d-flex align-items-center ms-4 mb-4">
      <div class="position-relative">
        <img class="rounded-circle" src="../assets/img/avatar/avatar.png" alt="" style="width: 40px; height: 40px;">
        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
        </div>
      </div>
      <div class="ms-3">
        <h6 class="mb-0"><?= $user['name']; ?></h6>
        <span><?= $user['role']; ?></span>
      </div>
    </div>
    <div class="navbar-nav w-100">
      <?php if (roles(['Member'])) : ?>
        <a href="index.html" class="nav-item nav-link <?= getPageName() == 'dashboard.php' ? 'active' : '' ?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
      <?php endif; ?>
      <?php if (roles(['Admin', 'Staff'])) : ?>
        <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
        <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
          <div class="dropdown-menu bg-transparent border-0">
            <a href="signin.html" class="dropdown-item">Sign In</a>
            <a href="signup.html" class="dropdown-item">Sign Up</a>
            <a href="404.html" class="dropdown-item">404 Error</a>
            <a href="blank.html" class="dropdown-item">Blank Page</a>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </nav>
</div>
<!-- Sidebar End -->