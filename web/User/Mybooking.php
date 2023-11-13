<?php 
include('../Assets/Connection/Connection.php');
ob_start();
include('Header.php');
if(isset($_GET['id'])) {
    $update = "update tbl_cart set cart_status = 6 where cart_id = '" . $_GET['id'] . "'";
    $con->query($update);
}

$sel = "select * from tbl_cart c 
        inner join tbl_booking b on c.booking_id = b.booking_id 
        inner join tbl_product p on c.product_id = p.product_id 
        where c.cart_status >= 1 and b.user_id = '" . $_SESSION['user_id'] . "'";
$row = $con->query($sel);
$i = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Booking</title>
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

main {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 20px;
}

.product {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    margin: 10px;
    text-align: center;
    width: 300px;
}

.product img {
    max-width: 100%;
    height: auto;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
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
              class="nav-link dropdown-toggle active"
              data-bs-toggle="dropdown"
              >Pages</a
            >
            <div class="dropdown-menu bg-light border-0 m-0">
              <a href="Mybooking.php" class="dropdown-item active">My Booking</a>
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

    <main>
        <?php 
            while($val = $row->fetch_assoc()) {
            $i++;
            ?>
        <div class="product">
            <a href="DetailsOfProduct.php?pid=<?php echo $val["product_id"]?>" >
            <img src="../Assets/File/Shop/<?php echo $val['product_photo'] ?>" alt="<?php echo $val['product_name'] ?>"></a>
            <h2><?php echo $val['product_name'] ?></h2>
            <p>Price: <?php echo $val['product_price'] ?></p>
            <p>Quantity: <?php echo $val['cart_qty'] ?></p>
            <p>
                Status:
                <?php 
                $s = $val['booking_status'];
                if($s == 1) {
                    echo "Payment Failed";
                } else if($s == 2) {
                    $c = $val['cart_status'];
                    if($c == 1) {
                        echo "Payment Completed<br>(Waiting for Approval)";
                    } elseif($c == 2) {
                        echo "Approved";
                    } elseif($c == 3) {
                        echo "Packed";
                    } elseif($c == 4) {
                        echo "Shipped";
                    } elseif($c == 5) {
                        echo "Delivered";
                    } elseif($c == 6) {
                        echo "Cancelled";
                    }
                }
                ?> 
            </p>
            <p>Total: <?php echo $val['product_price'] * $val['cart_qty'] ?></p>
            <?php
                if($c >= 1 && $c <= 4) {
                ?>
                    <!-- Cancel -->
                    <a href="Mybooking.php?id=<?php echo $val['cart_id'] ?>"><button>Cancel</button></a>
                    <?php
                    
                } else if($c == 5) {
                ?>
                    <!-- Review -->
                    <a href="Rating.php?pid=<?php echo $val['product_id'] ?>"><button>Review</button></a>
                <?php
                }
                ?>
                <a href="bill.php?id=<?php echo $val['cart_id'] ?>"><button>Bill</button></a>
        </div>
        <?php } ?>
    </main>
</body>
<?php
include('Footer.php');
ob_flush();
?>
</html>
