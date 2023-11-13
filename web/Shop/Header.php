<?php 
 include("SessionValidation.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Baby Care</title>
  <link rel="stylesheet" href="../Assets/Templates/Dashboard/css/styles.min.css" />
</head>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="Home.php" class="text-nowrap logo-img">
            <?php include("../Assets/File/Logo/Logo.php") ?>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu"><?php echo $_SESSION["shop_name"]?></span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="Home.php" aria-expanded="false">
                <span>
                <i class="ti ti-home-2"></i>
                </span>
                <span class="hide-menu">Home</span>
              </a>
            </li> 
            <li class="sidebar-item">
              <a class="sidebar-link" href="ViewBooking.php" aria-expanded="false">
                <span>
                <i class="ti ti-inbox"></i>
                </span>
                <span class="hide-menu">Orders</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="ViewProduct.php" aria-expanded="false">
                <span>
                <i class="ti ti-clipboard-list"></i>
                </span>
                <span class="hide-menu">Products</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="Product.php" aria-expanded="false">
                <span>
                <i class="ti ti-new-section"></i>
                </span>
                <span class="hide-menu">Add Product</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="Shopcomplaint.php" aria-expanded="false">
                <span>
                <i class="ti ti-send"></i>
                </span>
                <span class="hide-menu">Response</span>
              </a>
            </li>
            <!-- <li class="sidebar-item">
              <a class="sidebar-link" href="ShopProfile.php" aria-expanded="false">
                <span>
                <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Profile</span>
              </a>
            </li> -->
            <a href="ShopProfile.php" class="btn btn-primary fs-2 fw-semibold lh-sm"><i class="ti ti-user"></i></i>Profile</a>
            <a href="../Logout.php" class="btn btn-primary fs-2 fw-semibold lh-sm"><i class="ti ti-logout"></i>Logout</a>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
     <!--  Main wrapper -->
     <div class="body-wrapper">
      <!--  Header Start -->
      
      <!--  Header End -->