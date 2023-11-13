<?php
 include('Assets/Connection/Connection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Baby Care</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    /> -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- Libraries Stylesheet -->
    <link href="Assets/Templates/Main/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="Assets/Templates/Main/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Assets/Templates/Main/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="Assets/Templates/Main/css/style.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  </head>

  <body>
    <!-- Spinner Start -->
    <!-- <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div class="spinner-grow text-primary" role="status"></div>
    </div> -->
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div
      class="container-fluid bg-dark text-white-50 py-2 px-0 d-none d-lg-block"
    >
      <div class="row gx-0 align-items-center">
        <div class="col-lg-7 px-5 text-start">
          <div class="h-100 d-inline-flex align-items-center me-4">
            <small class="fa fa-phone-alt me-2"></small>
            <small>+012 345 6789</small>
          </div>
          <div class="h-100 d-inline-flex align-items-center me-4">
            <small class="far fa-envelope-open me-2"></small>
            <small>info@example.com</small>
          </div>
          <div class="h-100 d-inline-flex align-items-center me-4">
            <small class="far fa-clock me-2"></small>
            <small>Mon - Fri : 09 AM - 09 PM</small>
          </div>
        </div>
        <div class="col-lg-5 px-5 text-end">
          <div class="h-100 d-inline-flex align-items-center">
            <a class="text-white-50 ms-4" href=""
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a class="text-white-50 ms-4" href=""
              ><i class="fab fa-twitter"></i
            ></a>
            <a class="text-white-50 ms-4" href=""
              ><i class="fab fa-linkedin-in"></i
            ></a>
            <a class="text-white-50 ms-4" href=""
              ><i class="fab fa-instagram"></i
            ></a>
          </div>
        </div>
      </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav
      class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5"
    >
      <a href="index.php" class="navbar-brand d-flex align-items-center">
        <h1 class="m-0">
          <?php include('Assets/File/Logo/Logo.php') ?>
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
          <!-- <a href="index.php" class="nav-item nav-link active">Home</a> -->
          <!-- <a href="#" class="nav-item nav-link">About Us</a> -->
          <!-- <a href="#" class="nav-item nav-link">Our Services</a> -->
          <!-- <a href="#" class="nav-item nav-link">Contact Us</a> -->
        </div>
      </div>
      <a href="Guest/Login.php" class="btn btn-primary px-3 d-none d-lg-block">Login</a>
    </nav>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
      <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="w-100" src="Assets/Templates/Main/img/carousel-1.jpg" alt="Image" />
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
            <img class="w-100" src="Assets/Templates/Main/img/carousel-2.jpg" alt="Image" />
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

    <!-- About Start -->
    <!-- <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div
              class="position-relative overflow-hidden rounded ps-5 pt-5 h-100"
              style="min-height: 400px"
            >
              <img
                class="position-absolute w-100 h-100"
                src="Assets/Templates/Main/img/about.jpg"
                alt=""
                style="object-fit: cover"
              />
              <div
                class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3"
                style="width: 200px; height: 200px"
              >
                <div
                  class="d-flex flex-column justify-content-center text-center bg-primary rounded h-100 p-3"
                >
                  <h1 class="text-white mb-0">25</h1>
                  <h2 class="text-white">Years</h2>
                  <h5 class="text-white mb-0">Experience</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="h-100">
              <h1 class="display-6 mb-5">
                We're Here To Assist You With Exploring Protection
              </h1>
              <p class="fs-5 text-primary mb-4">
                Aliqu diam amet diam et eos. Clita erat ipsum et lorem sed stet
                lorem sit clita duo justo erat amet
              </p>
              <div class="row g-4 mb-4">
                <div class="col-sm-6">
                  <div class="d-flex align-items-center">
                    <img
                      class="flex-shrink-0 me-3"
                      src="Assets/Templates/Main/img/icon/icon-04-primary.png"
                      alt=""
                    />
                    <h5 class="mb-0">Flexible Insurance Plans</h5>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="d-flex align-items-center">
                    <img
                      class="flex-shrink-0 me-3"
                      src="Assets/Templates/Main/img/icon/icon-03-primary.png"
                      alt=""
                    />
                    <h5 class="mb-0">Money Back Guarantee</h5>
                  </div>
                </div>
              </div>
              <p class="mb-4">
                Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit.
                Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit,
                sed stet lorem sit clita duo justo magna dolore erat amet
              </p>
              
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- About End -->

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
              <a class="btn btn-light px-3" href="Static/Sleep.php">Read More</a>
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
              <a class="btn btn-light px-3" href="Static/Health.php">Read More</a>
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
              <a class="btn btn-light px-3" href="Static/Feeding.php">Read More</a>
            </div>
          </div>   
    <!-- Service End -->


    <!-- Testimonial Start -->
    <?php 
     $sel="select * from tbl_userfeedbacktoadmin f inner join tbl_newuser n on f.user_id=n.user_id";
     $row=$con->query($sel);
     $i=0;
    ?>
    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px">
          <h1 class="display-6 mb-5">What Do They Say About Us</h1>
        </div>
        <br>
        <div class="row g-5">
          <?php 
          while($val=$row->fetch_assoc())
          {
            $i++;
          ?>
          <div class="row justify-content-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
              <div class="owl-carousel testimonial-carousel">
                <?php while ($val = $row->fetch_assoc()) { ?>
                <div class="testimonial-item text-center">
                  <p class="fs-5">
                  <?php echo $val['userfeedbacktoadmin_feedback'] ?>
                  </p>
                  <h5><?php echo $val['user_name'] ?></h5>
                </div>
              <?php } ?>
              </div>
            </div>
          </div>
            <?php 
            }
            ?>  
        </div>
      </div>
    </div>  
    <!-- Testimonial End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn"
      data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg-3 col-md-6">
            <h1 class="text-white mb-4">
             Babay Care
            </h1>
            <p>
              ...
            </p>
            <div class="d-flex pt-2">
              <a class="btn btn-square me-1" href=""
                ><i class="fab fa-twitter"></i
              ></a>
              <a class="btn btn-square me-1" href=""
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a class="btn btn-square me-1" href=""
                ><i class="fab fa-youtube"></i
              ></a>
              <a class="btn btn-square me-0" href=""
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5 class="text-light mb-4">Address</h5>
            <p>
              <i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA
            </p>
            <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
            <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5 class="text-light mb-4">Quick Links</h5>
            <a class="btn btn-link" href="">About Us</a>
            <a class="btn btn-link" href="">Contact Us</a>
            <a class="btn btn-link" href="">Support</a>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5 class="text-light mb-4">Newsletter</h5>
            <p>Login to our website</p>
            <div class="position-relative mx-auto" style="max-width: 400px">
              <input
                class="form-control bg-transparent w-100 py-3 ps-4 pe-5"
                type="text"
                placeholder="Your email"
              />
              <a href="Guest/NewUser.php">
              <button
                type="button"
                class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2"
              >
                SignUp
              </button>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
              &copy; <a href="index.php">Baby Care</a>
            </div>
            <div class="col-md-6 text-center text-md-end">
              <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
              Designed By <a href="#">..</a>
              <br />Distributed By:
              <a href="#" target="_blank">..</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Assets/Templates/Main/lib/wow/wow.min.js"></script>
    <script src="Assets/Templates/Main/lib/easing/easing.min.js"></script>
    <script src="Assets/Templates/Main/lib/waypoints/waypoints.min.js"></script>
    <script src="Assets/Templates/Main/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="Assets/Templates/Main/lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="Assets/Templates/Main/js/main.js"></script>

    <script>
      $(document).ready(function () {
      $(".testimonial-carousel").owlCarousel({
      items: 1,
      loop: true,
      autoplay: true,
      autoplayTimeout: 5000, // Adjust the time between slides
      autoplayHoverPause: true,
      dots: true, // Add navigation dots
       });
      });
</script>

  </body>
</html>
