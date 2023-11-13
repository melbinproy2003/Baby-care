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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
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
              <span class="hide-menu"><?php echo $_SESSION['admin_name']?></span>
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
              <a class="sidebar-link" href="NewShops.php" aria-expanded="false">
                <span>
                <i class="ti ti-file-check"></i>
                </span>
                <span class="hide-menu">Verifying Shop</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="ShopAcceptList.php" aria-expanded="false">
                <span>
                <i class="ti ti-clipboard-list"></i>
                </span>
                <span class="hide-menu">List Shop</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="Brands.php" aria-expanded="false">
                <span>
                <i class="ti ti-plus"></i>
                </span>
                <span class="hide-menu">Add Brand</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="Category.php" aria-expanded="false">
                <span>
                <i class="ti ti-category"></i>
                </span>
                <span class="hide-menu">Add Category</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="Subcategory.php" aria-expanded="false">
                <span>
                <i class="ti ti-category-2"></i>
                </span>
                <span class="hide-menu">Add Subcategory</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="ViewShopcomplaint.php" aria-expanded="false">
                <span>
                <i class="ti ti-mail-cog"></i>
                </span>
                <span class="hide-menu">View Shop Complaint</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="ViewShopFeedback.php" aria-expanded="false">
                <span>
                <i class="ti ti-mail-heart"></i>
                </span>
                <span class="hide-menu">View Shop Feedback</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="ViewUsercomplaint.php" aria-expanded="false">
                <span>
                <i class="ti ti-user-cog"></i>
                </span>
                <span class="hide-menu">View User Complaint</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="ViewUserFeedback.php" aria-expanded="false">
                <span>
                <i class="ti ti-user-heart"></i>
                </span>
                <span class="hide-menu">View User Feedback</span>
              </a>
            </li>
            <!-- <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-4 rounded"> -->
            <!-- <div class="d-flex"> -->
              <!-- <div class="unlimited-access-title me-3"> -->
                <a href="../Logout.php" class="btn btn-primary fs-2 fw-semibold lh-sm"><i class="ti ti-logout"></i>Logout</a>
              <!-- </div> -->
            <!-- </div> -->
          </ul>
         
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
     <!--  Main wrapper -->
     <div class="body-wrapper">
      <!--  Header Start -->
      <!-- <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
          
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/" target="_blank" class="btn btn-primary">Download Free</a>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="ShopProfile.php" id="drop2" aria-expanded="false">
                  <div class="rounded-circle"><i class="ti ti-user-circle"></i></div>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header> -->
      <!--  Header End -->