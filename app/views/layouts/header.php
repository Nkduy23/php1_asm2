<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop giày MWC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <?php 
      $commonStyles = [
          "box-product.css",
          "main.css"
      ];

      $homeStyles = [
          "slider.css",
          "flash-sale.css",
          "box-product.css",
          "main.css"
      ];

      $saleDetailStyles = [
        "detail.css",
        "flash-sale.css",
        "main.css"
      ];

      $accountStyles = [
        "account.css",
        "main.css"
      ];

      $adminStyles = [
        "admin.css",
        "main.css"
      ];

      if ($page === 'home') {
          $styles = $homeStyles;
      }


      elseif (in_array($page, ['shoesForWomen', 'shoesForMen', 'sale', 'bags', 'depSandal'])) {
          $styles = $commonStyles;
      }

      elseif ($page === 'detail') {
        $styles = $saleDetailStyles;
      }

      elseif (in_array($page, ['login', 'register'])) {
        $styles = $accountStyles;
      }

      elseif ($page === 'admin') {
        $styles = $adminStyles;
      }

      if (!empty($styles)) {
          foreach ($styles as $style) {
              echo '<link rel="stylesheet" href="../public/css/' . $style . '">' . PHP_EOL;
          }
      }
?>
</head>
<body>
<div class="container-main">
  <header class="header">
    <div class="container-header d-flex-between flex-wrap">
      <button type="button" class="nav__button-bar d-none button" aria-controls="navbar" aria-label="Toggler navigation">
        <span class="navbar__button-icon">
          <i class="fa-solid fa-bars"></i>
        </span>
      </button>

      <div class="header__logo" aria-label="Logo MWC">
        <a href="./index.php" class="header__logo-link">
          <img src="../public/img/logo.png" alt="Logo MWC" class="header__logo-img" />
        </a>
      </div>

      <nav class="nav" aria-label="Main Navigation">
        <div class="nav__menu d-none">
          <h5 class="nav__menu-title">Menu</h5>
          <button type="button" class="nav__button-close button" aria-label="Close menu">
            <span class="nav__button-icon"><i class="fa-solid fa-xmark"></i></span>
          </button>
        </div>

        <ul class="nav__list d-flex">
          <li class="nav__item" role="menuitem" aria-haspopup="true">
            <a class="nav__link dropdown" href="#giaynam" id="dropdownMenu-1" aria-expanded="false">Giày Nam</a>
            <ul class="nav__sublist" role="submenu" aria-labelledby="dropdownMenu-1">
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Thể Thao</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Đi Chơi</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Hot</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Boot</a>
              </li>
            </ul>
          </li>

          <li class="nav__item" role="menuitem" aria-haspopup="true">
            <a class="nav__link dropdown" href="#giaynu" id="dropdownMenu-2" aria-expanded="false">Giày Nữ</a>
            <ul class="nav__sublist" role="submenu" aria-labelledby="dropdownMenu-2">
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Thể Thao</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Đi Chơi</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Hot</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Boot</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Búp Bê</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Cute</a>
              </li>
            </ul>
          </li>

          <li class="nav__item" role="menuitem" aria-haspopup="true">
            <a class="nav__link dropdown" href="#giaycap" id="dropdownMenu-2" aria-expanded="false">Giày Cặp</a>
            <ul class="nav__sublist" role="submenu" aria-labelledby="dropdownMenu-2">
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Thể Thao</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Đi Chơi</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Hot</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Boot</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Búp Bê</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Cute</a>
              </li>
            </ul>
          </li>

          <li class="nav__item" role="menuitem" aria-haspopup="true">
            <a class="nav__link dropdown" href="#bagstui" id="dropdownMenu-2" aria-expanded="false">Balo-Túi</a>
            <ul class="nav__sublist" role="submenu" aria-labelledby="dropdownMenu-2">
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">bags Laptop, Du Lịch, Thời Trang</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Đi Chơi</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Hot</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Boot</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Búp Bê</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Cute</a>
              </li>
            </ul>
          </li>

          <li class="nav__item" role="menuitem" aria-haspopup="true">
            <a class="nav__link dropdown" href="#phukien" id="dropdownMenu-2" aria-expanded="false">Phụ Kiện</a>
            <ul class="nav__sublist" role="submenu" aria-labelledby="dropdownMenu-2">
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Vớ</a>
              </li>
              <li class="nav__subitem">
                <a class="nav__sublink" href="#">Chai Xịt Giày</a>
              </li>
            </ul>
          </li>

          <!-- Thông tin shop -->
          <li class="nav__item info" role="info-shop" aria-haspopup="false">
            <a class="nav__link" href="../../views/info/info.html" id="dropdownMenu-6">Thông tin</a>
          </li>
        </ul>
      </nav>

      <div class="header__search" aria-label="Search">
        <form action="#" class="header__search-form">
          <input type="text" class="header__search-input" placeholder="Search..." />
          <button class="header__search-button button" aria-label="Search button">
            <span class="header__search-button-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
          </button>
        </form>

        <button type="button" class="header__search-button-close d-none button" aria-label="Close menu">
          <span class="header__search-button-icon"><i class="fa-solid fa-xmark"></i></span>
        </button>
      </div>

      <div class="header__action d-flex" aria-label="Action buttons">
        <button type="button" class="header__action-button-open d-none button" aria-controls="Search" aria-expanded="false" aria-label="Search button">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
        <a href="/views/cart/cart.html" class="header__action-button button" aria-label="Cart button">
          <i class="fa-solid fa-cart-shopping"></i>
        </a>
        <div class="header__user-info" style="display: none"></div>
        <!-- <a href="?page=login" class="header__action-button-login button" aria-label="Login button">
          <i class="fa-regular fa-user"></i>
        </a> -->
        <button class="button header__action-button-logout" style="display: none">
          <i class="fa-solid fa-sign-out"></i>
        </button>
        <?php if (isset($_SESSION['user'])): ?>
    <p>Xin chào, <?= htmlspecialchars($_SESSION['user']['username']) ?></p>
    <a href="?page=logout">Đăng xuất</a>

    <!-- Kiểm tra nếu người dùng là admin thì hiển thị nút truy cập trang admin -->
    <?php if ($_SESSION['user']['role'] === 'admin'): ?>
        <a href="../admin/index.php" class="admin-button">Truy cập trang admin</a>
    <?php endif; ?>

<?php else: ?>
    <a href="?page=login" class="header__action-button-login button" aria-label="Login button">
        <i class="fa-regular fa-user"></i>
    </a>
<?php endif; ?>
      </div>
    </div>
  </header>
</div>