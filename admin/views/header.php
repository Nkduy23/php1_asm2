<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,300&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../public/css/styleAdmin.css">
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
   <div class="row">
       <div class="col-md-2 ">
           <div class="logo"><img src="../public/img/logo.png" alt=""></div>
           <hr>
           <p><i class="bi bi-pie-chart-fill me-2"></i><a  href="?page=statistic"> Quản lý thống kê</a></p>
           <p><i class="bi bi-tag-fill me-2"></i><a  href="?page=category"> Quản lý danh mục</a></p>
           <p><i class="bi bi-box-seam me-2"></i><a  href="?page=product"> Quản lý sản phẩm</a></p>
           <p><i class="bi bi-people-fill me-2"></i><a  href="?page=user"> Quản lý người dùng</a></p>
           <p><i class="bi bi-cart-fill me-2"></i><a  href="?page=order"> Quản lý đơn hàng</a></p>
           <p><i class="bi bi-chat-left-text-fill me-2"></i><a  href="?page=comment"> Quản lý bình luận</a></p>
           <hr>
           <div class="logout">          
                <button>Đăng xuất</button>
           </div>
       </div>
       <div class="col-md-10">
           <div class="top">
               <p style="font-weight: bold;">TRANG QUẢN LÝ SẢN PHẨM MWC</p>
               <div><span>Admin</span><img width="30px" height="30px" src="../public/img/admin.jpg" alt=""></div>
               <a href="../app/index.php" style="color: #fff;">Quay lại</a>
           </div>
           <div class="content">