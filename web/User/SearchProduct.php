<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Products</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        /* Styles for custom alert box */
        .custom-alert-box {
            width: 20%;
            height: 10%;
            position: fixed;
            bottom: 0;
            right: 0;
            left: auto;
            z-index: 1;
        }

        .alert-box {
            display: none;
        }

        .success {
            color: #fff; /* White text */
            background-color: #007bff; /* Blue background */
            border-color: #0056b3; /* Darker blue border */
        }

        .failure {
            color: #fff; /* White text */
            background-color: #dc3545; /* Red background */
            border-color: #c82333; /* Darker red border */
        }

        .warning {
            color: #8a6d3b;
            background-color: #fcf8e3;
            border-color: #faebcc;
        }

        
    </style>
</head>
<body>
    
<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");
?>

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
          <a href="Home.php" class="nav-item nav-link">Home</a>
          <a href="SearchProduct.php" class="nav-item nav-link active">Shop</a>
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

<div class="custom-alert-box">
    <div class="alert-box success">Successful Added to Cart !!!</div>
    <div class="alert-box failure">Failed to Add Cart !!!</div>
    <div class="alert-box warning">Already Added to Cart !!!</div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <h5>Filter Product</h5>
            <hr>

            <!-- Search -->
            <h6 class="text-info">Search</h6>
            <ul class="list-group">
                <li class="list-group-item">
                    <input type="text" name="txt_name" id="txt_name" onkeyup="productCheck()">
                    <span class="material-symbols-outlined">feature_search</span>
                </li>
            </ul>

            <!-- Select Brand -->
            <h6 class="text-info">Select Brand</h6>
            <ul class="list-group">
                <li class="list-group-item">
                    <?php
                    $selbrand = "select * from tbl_brands";
                    $rowb = $con->query($selbrand);
                    while ($datab = $rowb->fetch_assoc()) {
                        ?>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input onclick="" value="<?php echo $datab["brand_id"] ?>" id="brand" type="checkbox"
                                       class="form-check-input product_check"><?php echo $datab["brand_name"] ?>
                            </label>
                        </div>
                        <?php
                    }
                    ?>
                </li>
            </ul>

            <!-- Select Category -->
            <h6 class="text-info">Select Category</h6>
            <ul class="list-group">
                <?php
                $selcat = "SELECT * from tbl_category";
                $row = $con->query($selcat);
                while ($data = $row->fetch_assoc()) {
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" onclick="changeSub()" class="form-check-input product_check"
                                       value="<?php echo $data["category_id"] ?>" id="category"><?php echo $data["category_name"] ?>
                            </label>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>

            <!-- Select Subcategory -->
            <h6 class="text-info">Select Subcategory</h6>
            <ul class="list-group" id='subcat'>
                <li class="list-group-item">

                </li>
            </ul>
        </div>

        <div class="col-lg-9">
            <h5 class="text-center" id="textChange">All Products</h5>
            <div class="row" id="result">
                <?php
                $selProduct = "select * from tbl_product a inner join tbl_subcategory s on s.subcategory_id=a.subcategory_id inner join tbl_category c on c.category_id=s.category_id";
                $rowp = $con->query($selProduct);
                while ($datap = $rowp->fetch_assoc()) {
                    ?>
                    <div class="col-md-3 mb-2">
                        <div class="card-deck">
                            <div class="card border-secondary">
                                <img src="../Assets/File/Shop/<?php echo $datap["product_photo"] ?>"
                                     class="card-img-top" height="250">
                                <div class="card-img-secondary">
                                    <h6 class="text-light bg-info text-center rounded p-1">
                                        <?php echo $datap["product_name"] ?>
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title text-danger">
                                        Price : <?php echo $datap["product_price"] ?>/-</h4>
                                    <p>
                                        Category &nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $datap["category_name"] ?><br>
                                        Subcategory : <?php echo $datap["subcategory_name"] ?><br>
                                    </p>
                                    <?php
                                    $stockSql = "select sum(stock_quantity) as stock from tbl_stock where product_id = '" . $datap["product_id"] . "'";
                                    $rsST = $con->query($stockSql);
                                    $rsstp = $rsST->fetch_assoc();
                                    if ($rsstp["stock"] != "") {
                                    $stockcart= "select sum(cart_qty) as stock from tbl_cart where product_id= '".$datap["product_id"]."'";
                                    $rs = $con->query($stockcart);
                                    $rst = $rs->fetch_assoc(); 
                                    $stock = $rsstp["stock"] - $rst['stock'];
                                        if ($stock > 0) {
                                            ?>
                                            <a href="javascript:void(0)" onclick="addCart(<?php echo $datap['product_id'] ?>)"
                                               class="btn btn-success btn-block">Add to Cart</a>
                                            <?php
                                        } else if ($stock == 0) {
                                            ?>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                                        <?php
                                    }
                                    ?>
                                        <a href="DetailsOfProduct.php?pid=<?php echo $datap["product_id"]?>" class="btn btn-warning btn-block">View More</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script src="../assets/JQ/jQuery.js"></script>
<script>
    function get_filter_text(text_id) {
        var filterData = [];
        $('#' + text_id + ':checked').each(function () {
            filterData.push($(this).val());
        });
        return filterData;
    }

    function productCheck() {
        var action = 'data';
        var brand = get_filter_text('brand');
        var category = get_filter_text('category');
        var subcategory = get_filter_text('subcategory');
        var name = document.getElementById("txt_name").value;
        $.ajax({
            url: "../Assets/AjaxPages/AjaxSearchProduct.php?action=" + action + "&name=" + name + "&brand=" + brand + "&category=" + category + "&subcat=" + subcategory,
            success: function (response) {
                $("#result").html(response);
                $("#textChange").text("Filtered Products");
            }
        });
    }

    function addCart(id) {
        $.ajax({
            url: "../assets/AjaxPages/AjaxAddCart.php?pid=" + id,
            success: function (response) {
                if (response.trim() === "Added to Cart") {
                    $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                } else if (response.trim() === "Already Added to Cart") {
                    $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                } else {
                    $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                }
            }
        });
    }

    function changeSub() {
        var cat = get_filter_text('category');
        if (cat.length !== 0) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxSearchSubCat.php?data=" + cat,
                success: function (response) {
                    $("#subcat").html(response);
                }
            });
        } else {
            $("#subcat").html("");
        }
    }

    $(document).ready(function () {
        $(".product_check").click(function () {
            var action = 'data';
            var brand = get_filter_text('brand');
            var category = get_filter_text('category');
            var subcategory = get_filter_text('subcategory');
            var name = document.getElementById("txt_name").value;
            $.ajax({
                url: "../Assets/AjaxPages/AjaxSearchProduct.php?action=" + action + "&name=" + name + "&brand=" + brand + "&category=" + category + "&subcat=" + subcategory,
                success: function (response) {
                    $("#result").html(response);
                    $("#textChange").text("Filtered Products");
                }
            });
        });
    });
</script>
</body>
<?php
include("Footer.php");
ob_flush();
?>
</html>