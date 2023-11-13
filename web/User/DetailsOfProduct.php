<?php
include('../Assets/Connection/Connection.php');
ob_start();
include("Header.php");

$pid = $_GET['pid'];

// SQL query to retrieve product details
$sel = "SELECT * FROM tbl_product p
        INNER JOIN tbl_shop s ON p.shop_id = s.shop_id
        INNER JOIN tbl_brands b ON p.brand_id = b.brand_id
        WHERE product_id = '" . $pid . "'";

$row = $con->query($sel);
$val = $row->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- <link rel="stylesheet" href="../Assets/Templates/Search/bootstrap.min.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $val['product_name'] ?></title>

    <style>
       /* Your CSS styles here */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Style for the product list container */
.product-list {
    display: flex;
    gap: 20px;
    padding: 20px;
    align-items: flex-start;
}

/* Style for individual products */
.product {
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 20px;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Style for product images */
.product img {
    max-width: 500px;
    height: auto;
    margin-bottom: 10px;
}

/* Style for product titles */
.product-title {
    font-size: 18px;
    margin-bottom: 5px;
}

/* Style for product descriptions */
.product-description {
    font-size: 14px;
    color: #666;
    margin-bottom: 10px;
}

/* Style for product prices */
.product-price {
    font-size: 20px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

/* Style for "Add to Cart" buttons */
.add-to-cart {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.add-to-cart:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>

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
          <a href="Home.php" class="nav-item nav-link">Home</a>
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
      <a href="MyProfile.php" class="btn btn-primary px-3 d-none d-lg-block">Profile</a>
    </nav>
    <!-- Navbar End -->
<!-- form start -->
<div class="container mt-5"></div>
<form method="post">
    <table border="0" class="mx-auto">
        <tr>
            <td align="center"><a href="../Assets/File/Shop/<?php echo $val["product_photo"] ?>" target="blank"><img src="../Assets/File/Shop/<?php echo $val["product_photo"] ?>" height="100px" ></a></td>
            <td width="500px" align="center" ><h3 class="product-title"><?php echo $val["product_name"] ?></h3>
            <p class="product-description"><?php echo $val["product_details"] ?></p>
            <span class="product-price">₹ <?php echo $val["product_price"] ?></span>
            <button class="add-to-cart" onclick="addcart(<?php echo $pid ?>)">Add TO Cart</button>
            <br><br></td></tr><tr><td colspan="2">
            <p align="center" >Reviews</p>
            <?php
            $average_rating = 0;
            $total_review = 0;
            $five_star_review = 0;
            $four_star_review = 0;
            $three_star_review = 0;
            $two_star_review = 0;
            $one_star_review = 0;
            $total_feedback_count = 0;
            $review_content = array();

            $query = "SELECT * FROM tbl_userfeedbacktoshop WHERE product_id = '" . $val["product_id"] . "' ORDER BY feedback_id DESC";

            $result = $con->query($query);

            while ($row = $result->fetch_assoc()) {
                if ($row["feedback_count"] == '5') {
                    $five_star_review++;
                }
                if ($row["feedback_count"] == '4') {
                    $four_star_review++;
                }
                if ($row["feedback_count"] == '3') {
                    $three_star_review++;
                }
                if ($row["feedback_count"] == '2') {
                    $two_star_review++;
                }
                if ($row["feedback_count"] == '1') {
                    $one_star_review++;
                }
                $total_review++;
                $total_feedback_count = $total_feedback_count + $row["feedback_count"];
            }

            if ($total_review == 0 || $total_feedback_count == 0) {
                $average_rating = 0;
            } else {
                $average_rating = $total_feedback_count / $total_review;
            }
            ?>
            <p align="center" style="color:#F96;font-size:20px">
                <?php
                if ($average_rating == 5 || $average_rating == 4.5) {
                    ?>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                    <?php
                }
                if ($average_rating == 4 || $average_rating == 3.5) {
                    ?>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                    <?php
                }
                if ($average_rating == 3 || $average_rating == 2.5) {
                    ?>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                    <?php
                }
                if ($average_rating == 2 || $average_rating == 1.5) {
                    ?>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                    <?php
                }
                if ($average_rating == 1) {
                    ?>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                    <?php
                }
                if ($average_rating == 0) {
                    ?>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                    <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                    <?php
                }
                echo "(" . $total_feedback_count . ")";
                ?>
            </p></td></tr></table>
</form>
<!-- form end -->
<script src="../Assets/Templates/Search/jquery.min.js"></script>
<script src="../Assets/Templates/Search/bootstrap.min.js"></script>
<script src="../Assets/Templates/Search/popper.min.js"></script>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
    function addcart(did) {
        $.ajax({
            url: "../Assets/AjaxPages/AjaxAddCart.php?pid=" + did,
            success: function (html) {
                window.location = "DetailsOfProduct.php?pid=" + did + "&msg=" + html;
            }
        });
    }
</script>
</body>
<?php
include("Footer.php");
ob_flush();
?>
</html>
