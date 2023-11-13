  <!-- Footer Start -->
  <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn"
      data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg-3 col-md-6">
            <h1 class="text-white mb-4">
             <?php include("../Assets/File/Logo/Logo.php"); ?>
            </h1>
            <p>
              ....
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
          <!-- <div class="col-lg-3 col-md-6">
            <h5 class="text-light mb-4">Newsletter</h5>
            <p>Login to our website</p>
            <div class="position-relative mx-auto" style="max-width: 400px">
              
              <a href="../Guest/NewUser.php">
              <button
                type="button"
                class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2"
              >
                SignUp
              </button>
              </a>
            </div> -->
          </div>
        </div>
      </div>
      <div class="container-fluid copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
              &copy; <a href="Home.php">Baby Care</a>
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
    <script src="../Assets/Templates/Main/lib/wow/wow.min.js"></script>
    <script src="../Assets/Templates/Main/lib/easing/easing.min.js"></script>
    <script src="../Assets/Templates/Main/lib/waypoints/waypoints.min.js"></script>
    <script src="../Assets/Templates/Main/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../Assets/Templates/Main/lib/counterup/counterup.min.js"></script>

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
