<?php 
session_start();
// ob_start();
error_reporting(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ===== Meta Tags ===== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Page Title ===== -->
    <title>Sushi</title>
    
    <!-- ===== CSS Stylesheets ===== -->
    <link rel="stylesheet" href="View/css/style.css">
    <link rel="stylesheet" href="View/css/login.css">
    <link rel="stylesheet" href="View/css/products.css">
    <link rel="stylesheet" href="View/css/admin.css">
     
    <!-- ===== AOS Animation Library ===== -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    <!-- ===== Remix Icons ===== -->
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"/>
</head>
<body>
     <!-- ===== Navbar Section ===== -->
     <nav class="navbar">
        <div class="logo">
            <img src="View/images/logo.png" alt="Logo">
        </div>
        <div class="nav-links" id="navLinks">
            <?php 
                    if(!isset($_SESSION['login'])){
                        echo '
                            <a href="index.php?act=home">Trang chủ</a>
                            <a href="index.php?act=products">Sản phẩm</a>
                            <a href="index.php?act=login">Đăng nhập</a>';
                    }else {
                        echo '<a href="index.php?act=adminPage">Quản trị</a>';
                    }
            ?>
        </div>
        <div class="cart">
            <?php 
                if(isset($_SESSION['login'])) {
                    echo '<a = href="index.php?act=logout" onClick=""return confirm(\'Bạn có muốn đăng xuất?\')><i class="ri-logout-box-r-line"></i></a>';
                }
            ?>
        </div>
        <div class="menu-toggle"">
            <i class="ri-menu-3-fill"></i>
        </div>
    </nav>
        
    <?php 
        $act = isset($_GET['act']) ? $_GET['act'] : 'home';
        if(isset($act)) {
            switch($act) {
                case 'login': include("View/login.php"); break;
                case 'logout': include("View/logout.php"); break;
                case 'products': include("View/products.php"); break;
                case 'adminPage': include("View/admin.php"); break;
                default: include("View/home.php"); break;
            }
        }
    ?>

    <!-- ===== AOS Animation Library ===== -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <!-- ===== Script JS ===== -->
    <script type="text/javascript" src="View/js/script.js"></script>
</body>
</html>