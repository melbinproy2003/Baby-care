<?php 
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>
<body>
<h1 align="center">WELCOME SHOP</h1>
<h1 align="center"><?php echo $_SESSION["shop_name"]?></h1>
<ul>
 <li><a href="ShopProfile.php">PROFILE</a></li>
 <br /><li><a href="Shopcomplaint.php">FEEDBACK AND COMPLAINT TO ADMIN</a></li>
 <br /><li><a href="ChangePassword.php">CHANGE PASSWORD</a></li>
 <br /><li><a href="Product.php">ADD PRODUCT</a></li>
 <br /><li><a href="ViewProduct.php">VIEW PRODUCT</a></li>
 <br /><li><a href="ViewBooking.php">VIEW BOOKINGS</a></li>
</ul>
</body>
</html>