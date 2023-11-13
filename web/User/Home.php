<?php 
 ob_start();
 include("Header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <!-- icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
</head>
<body>
    <!-- Navbar Start -->
    <nav
      class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5"
    >
      <a href="Home.php" class="navbar-brand d-flex align-items-center">
        <h1 class="m-0">
          <?php include('../Assets/File/Logo/Logo.php') ?>
        </h1>
      </a>
      <button
        type="button"
        class="navbar-toggler"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
          <a href="Home.php" class="nav-item nav-link active">Home</a>
          <a href="SearchProduct.php" class="nav-item nav-link">Shop</a>
          <a href="MyCart.php" class="nav-item nav-link">My Cart</a>
          <div class="nav-item dropdown">
            <a
              href="#"
              class="nav-link dropdown-toggle"
              data-bs-toggle="dropdown"
              >Pages</a
            >
            <div class="dropdown-menu bg-light border-0 m-0">
              <a href="Mybooking.php" class="dropdown-item">My Booking</a>
              <a href="Userfeedbacktoadmin.php" class="dropdown-item">Feedback</a>
              <a href="UserComplainttoadmin.php" class="dropdown-item">Complaint</a>
            </div>
          </div>
          <!-- <a href="contact.html" class="nav-item nav-link">Contact Us</a> -->
        </div>
      </div>
      <div class="nav-item dropdown">
            <a
              href="#"
              class="nav-link dropdown-toggle btn btn-primary px-3 d-none d-lg-block"
              data-bs-toggle="dropdown"
              ><i class="ti ti-settings-down"></i></a
            >
            <div class="dropdown-menu bg-light border-0 m-0">
              <a href="MyProfile.php" class="dropdown-item"><i class="ti ti-user-circle"></i> Profile</a>
              <a href="../Logout.php" class="dropdown-item"><i class="ti ti-logout"></i> Logout</a>
            </div>
          </div>
    </nav>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
      <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="w-100" src="../Assets/Templates/Main/img/carousel-1.jpg" alt="Image" />
            <div class="carousel-caption">
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-6">
                    <h1 class="display-3 text-dark mb-4 animated slideInDown">
                    A Baby's Smile Is An Antidote To Melt Your Day's Stress Away
                    </h1>
                    <p class="fs-5 text-body mb-5">
                      <!-- Clita erat ipsum et lorem et sit, sed stet lorem sit clita
                      duo justo magna dolore erat amet -->
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="w-100" src="../Assets/Templates/Main/img/carousel-2.jpg" alt="Image" />
            <div class="carousel-caption">
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-6">
                    <h1 class="display-3 text-dark mb-4 animated slideInDown">
                    Children make You Want To Start Life Over
                    </h1>
                    <p class="fs-5 text-body mb-5">
                      <!-- Clita erat ipsum et lorem et sit, sed stet lorem sit clita
                      duo justo magna dolore erat amet -->
                    </p>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#header-carousel"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#header-carousel"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- Carousel End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px">
          <h1 class="display-6 mb-5">
            We Provide Some Basic Instructions
          </h1>
        </div>
        <div class="row g-4 justify-content-center">
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="service-item rounded h-100 p-5">
              <div class="d-flex align-items-center ms-n5 mb-4">
                <div
                  class="service-icon flex-shrink-0 bg-primary rounded-end me-4"
                >
                <i class="ti ti-zzz" style="font-size: 64px; color:white;"></i>
                </div>
                <h4 class="mb-0">Sleep</h4>
              </div>
              <p class="mb-4">
              ​​​​​​​​​​Sleep is just as important to your children's development and well-being as nutrition and physical activity. 
              </p>
              <a class="btn btn-light px-3" href="../Static/Sleep.php">Read More</a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="service-item rounded h-100 p-5">
              <div class="d-flex align-items-center ms-n5 mb-4">
                <div
                  class="service-icon flex-shrink-0 bg-primary rounded-end me-4"
                >
                <i class="ti ti-activity" style="font-size: 64px; color:white;"></i>
                </div>
                <h4 class="mb-0">Health</h4>
              </div>
              <p class="mb-4">
              Prioritize your baby's health with proper nutrition, sleep, hygiene, and love. Encourage development, ensure safety, and seek regular healthcare. Be attentive, nurturing, and enjoy every moment
              </p>
              <a class="btn btn-light px-3" href="../Static/Health.php">Read More</a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="service-item rounded h-100 p-5">
              <div class="d-flex align-items-center ms-n5 mb-4">
                <div
                  class="service-icon flex-shrink-0 bg-primary rounded-end me-4"
                >
                  
                <i class="ti ti-baby-bottle" style="font-size: 64px; color:white;"></i>

                  
                </div>
                <h4 class="mb-0">Feeding</h4>
              </div>
              <p class="mb-4">
              Feed your baby with love and care, starting with breastfeeding or formula, and gradually introduce nutritious solids. Consult your pediatrician for guidance. 💕👶🍼
              </p>
              <a class="btn btn-light px-3" href="../Static/Feeding.php">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>    
    <!-- Service End -->
</body>
<!-- footer section -->
 <?php
  include('Footer.php');
  ob_flush();
  ?>
</html>
