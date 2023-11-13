<?php 
 session_start();
 include("Header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>user home page</title>
</head>

<body>

<h1 align="center">WELCOME USER</h1>
<h1 align="center"><?php echo $_SESSION['user_name']?></h1>

<ul>
  <li><a href="MyProfile.php">MY PROFILE</a></li>
  <li><a href="Userfeedbacktoadmin.php">FEEDBACK TO ADMIN</a></li>
  <li><a href="UserComplainttoadmin.php">COMPLAINT TO ADMIN</a></li>
  <li><a href="ChangePassword.php">CHANGE PASSWORD</a></li>
  <li><a href="Mybooking.php">MY BOOKING</a></li>
  <li><a href="MyCart.php">VIEW CART</a></li>
  <li><a href="SearchProduct.php">SEARCH PRODUCTS</a></li>
</ul>

</body>
<?php 
 include("Footer.php");
?>
</html>