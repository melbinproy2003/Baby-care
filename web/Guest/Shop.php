<?php
include("../Assets/Connection/Connection.php");

if (isset($_POST["submit"])) {
  $name = $_POST["shopname"];
  $contact = $_POST["shopcontact"];
  $address = $_POST["shopaddress"];
  $place = $_POST["shopplace"];
  $logo = $_FILES["shoplogo"]["name"];
  $temp = $_FILES["shoplogo"]["tmp_name"];
  move_uploaded_file($temp, '../Assets/File/Shop/' . $logo);
  $proof = $_FILES["shopproof"]["name"];
  $tempp = $_FILES["shopproof"]["tmp_name"];
  move_uploaded_file($tempp, '../Assets/File/Shop/' . $proof);
  $email = $_POST["shopemail"];
  $password = $_POST["userpassword"];
  $insq = ("insert into tbl_shop(shop_name,shop_contact,shop_address,place_id,shop_logo,shop_proof,shop_email,shop_password,shop_doj) values('" . $name . "','" . $contact . "','" . $address . "','" . $place . "','" . $logo . "','" . $proof . "','" . $email . "','" . $password . "',curdate())");
  $seluemail_query = "SELECT * FROM tbl_newuser WHERE user_email='" . $email . "'";
  $selsemail_query = "SELECT * FROM tbl_shop WHERE shop_email='" . $email . "'";
  $selaemail_query = "SELECT * FROM tbl_admin WHERE admin_email='" . $email . "'";
  $seluemail_result = $con->query($seluemail_query);
  $selsemail_result = $con->query($selsemail_query);
  $selaemail_result = $con->query($selaemail_query);
  if (mysqli_num_rows($seluemail_result) or mysqli_num_rows($selsemail_result) or mysqli_num_rows($selaemail_result)>0)
  {
    echo "<script>alert('This email is already used')</script>";
  }
  else
  {
    if ($con->query($insq)) {
      header("Location:Login.php");
    }
    else{
      echo "<script>alert('Failed')</script>";
    }
  }
}
?>
<html>
<head>
  <title>shopr registration</title>
</head>

<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGNUP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../Assets/Templates/signup.css">
    <style>
      .card-scroll{
	overflow-y: auto;
	  height: 600px;
	  width: 360px;
  }
  .card-scroll::-webkit-scrollbar {
	width: 0.5em; /* Width of the scrollbar */
  }
  .card-scroll::-webkit-scrollbar-thumb {
	background-color: transparent; /* Make the thumb transparent */
  }
    </style>
</head>
<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <div class="card-scroll">
                <form class="signup" method="post" enctype="multipart/form-data">
                    <h1 class="login__heading">SIGNUP</h1>
                    <div class="login__field">
                    <span class="material-symbols-outlined">person</span>
                        <input type="text" class="login__input" name="shopname"  placeholder="Shop Name" pattern="^[A-Za-z ]*$" required>
                    </div>
                    <div class="login__field">
                    <span class="material-symbols-outlined">mail</span>
                        <input type="email" class="login__input" name="shopemail" placeholder="Shop Email" required>
                    </div>
                    <div class="login__field">
                    <span class="material-symbols-outlined">contacts</span>
                        <input type="text" class="login__input" name="shopcontact" placeholder="Shop Contact" pattern="^[0-9]*$" required>
                    </div>
                    <div class="login__field">
                    <span class="material-symbols-outlined">my_location</span>
                        <textarea class="login__input" name="shopaddress" placeholder="Shop Address" required></textarea>
                    </div>
                    <div class="login__field">
                        <select name="shopdistrict" class="login__input" onChange="getPlace(this.value)" required>
            <option value="">----District----</option>
            <?php
            $seldistrict = "select * from tbl_district";
            $result = $con->query($seldistrict);
            while ($row = $result->fetch_assoc()) {
              ?>
              <option value="<?php echo $row["district_id"] ?>">
                <?php echo $row["district_name"] ?>
              </option>
              <?php
            }
            ?>
          </select>
                    </div>
                    <div class="login__field">
                        <select name="shopplace" class="login__input" id="userplace" required>
            <option value="">----Place----</option>
          </select>
                    </div>
                    <div class="login__field">
                        Logo<input type="file" name="shoplogo"  class="login__input" placeholder="" required>
                    </div>
                    <div class="login__field">
                        Proof<input type="file" name="shopproof"  class="login__input" placeholder="" required>
                    </div>
                    <div class="login__field">
                    <span class="material-symbols-outlined">lock</span>
                        <input type="password" class="login__input" name="userpassword" placeholder="Password" required>
                    </div>
                    <div class="login__field">
                    <span class="material-symbols-outlined">lock</span>
                        <input type="password" class="login__input" name="conpassword" placeholder="Conform Password" required>
                    </div>
                    <input type="submit" name="submit" value="SIGN UP" class="login__submit">
                    <p class="signup-link"><b>Do have an account? <a href="Login.php">Login</a></b></p>
                </form>
                </div>
            </div>
            <script src="../Assets/JQ/jQuery.js"></script>
            <script>
              function getPlace(did) {
                $.ajax({
                  url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
                  success: function (html) {
                    $("#userplace").html(html);
                  }
                });
              }
            </script>
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