<?php
  include("../Assets/Connection/Connection.php");
  session_start();
  if(isset($_POST["login"]))
  {
	$email=$_POST["email"];
	$password=$_POST["password"];
	$admin=("select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'");
	$shop=("select * from tbl_shop where shop_email='".$email."' and shop_password='".$password."'");
	$user=("select * from tbl_newuser where user_email='".$email."' and user_password='".$password."'"); 
	$rowadmin=$con->query($admin);
	$rowshop=$con->query($shop);
	$rowuser=$con->query($user);
	if($rowadmin->num_rows>0)
	{
		$row=$rowadmin->fetch_assoc();
		$_SESSION['admin_id']=$row['admin_id'];
		$_SESSION['admin_name']=$row['admin_name'];
		header('Location: ../Admin/Home.php');
	}
	elseif($rowshop->num_rows>0)
	{
		$row=$rowshop->fetch_assoc();
		if($row["shop_vstatus"]==1)
		{
		$_SESSION['shop_id']=$row['shop_id'];
		$_SESSION['shop_name']=$row['shop_name'];
		header('Location: ../Shop/Home.php');
		}
		elseif($row["shop_vstatus"]==2)
		{
			echo "Admin is rejected your request";
		}
		else
		{
			echo "your are not verified";
		}
	}
	elseif($rowuser->num_rows>0)
	{
		$row=$rowuser->fetch_assoc();
		$_SESSION['user_id']=$row['user_id'];
		$_SESSION['user_name']=$row['user_name'];
		header('Location: ../User/Home.php');
	}
	else
	{
		echo "Failed To Login";
	}
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../Assets/Templates/Login.css">
</head>
<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form method="post" class="login">
				<h1 class="login__heading">LOGIN</h1>				
                    <div class="login__field">
					<span class="material-symbols-outlined">mail</span>
                        <input type="text" name="email" class="login__input" placeholder="Email">
                    </div>
                    <div class="login__field">
					<span class="material-symbols-outlined">lock</span>
                        <input type="password" name="password" class="login__input" placeholder="Password">
                    </div>
                    <input type="submit" name="login" value="Login" class="login__submit">
					<p class="signup-link"><b><a href="NewUser.php">User Registration</a></b></p>
					<p class="signup-link"><b><a href="Shop.php">Shop Registration</a></b></p>
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</body>
</html>