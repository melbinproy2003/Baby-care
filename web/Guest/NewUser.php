<?php
include("../Assets/Connection/Connection.php");

if (isset($_POST["submit"])) {
  $name = $_POST["username"];
  $contact = $_POST["usercontact"];
  $address = $_POST["useraddress"];
  $place = $_POST["userplace"];
  $email = $_POST["useremail"];
  $password = $_POST["userpassword"];
  $cpassword = $_POST["conpassword"];
  $gender = $_POST["gender"];
  $dob = $_POST["dob"];
  $photo = $_FILES["userphoto"]["name"];
  $temp = $_FILES["userphoto"]["tmp_name"];
  move_uploaded_file($temp, '../Assets/File/User/' . $photo);
  $ins = ("insert into tbl_newuser(user_name,user_contact,user_address,place_id,user_email,user_password,user_photo,user_dob,user_gender,user_doj) values('" . $name . "','" . $contact . "','" . $address . "','" . $place . "','" . $email . "','" . $password . "','" . $photo . "','" . $dob . "','" . $gender . "',curdate())");

  //age checking
  // Create DateTime objects for birthdate and current date
  $birthdateObj = new DateTime($dob);
  $currentDateObj = new DateTime();
  // Calculate the difference between birthdate and current date
  $ageInterval = $currentDateObj->diff($birthdateObj);
  $ageYears = $ageInterval->y;



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
    if ($ageYears >= 18)
    {
      if ($password == $cpassword)
      {
        if($place == 0)
        {
          echo "<script>alert('select district and place')</script>";
        }
        else
        {
          if ($con->query($ins))
          {
            header("Location:Login.php");
          }
        }
      }
      else
      {
        echo "<script>alert('entered password is different')</script>";
      }
    }
    else
    {
      echo "<script>alert('not able to join')</script>";
    }
  }
}
?>

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
                        <input type="text" class="login__input" name="username"  placeholder="Name" pattern="^[A-Za-z ]*$" required>
                    </div>
                    <div class="login__field">
                    <span class="material-symbols-outlined">mail</span>
                        <input type="email" class="login__input" name="useremail" placeholder="Email" required>
                    </div>
                    <div class="login__field">
                    <span class="material-symbols-outlined">contacts</span>
                        <input type="text"  class="login__input" name="usercontact" placeholder="contact" pattern="[0-9+]{10,13}" required>
                    </div>
                    <div class="login__field">
                    <span class="material-symbols-outlined">home_pin</span>
                        <textarea class="login__input" name="useraddress" placeholder="Address" required></textarea>
                    </div>
                    <div class="login__field">
                        <select name="userdistrict" class="login__input" onChange="getPlace(this.value)">
            <option value=""  required="required">----District----</option>
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
                        <select name="userplace" class="login__input" id="userplace" required >
            <option value="">----Place----</option>
          </select>
                    </div>
                    <div class="login__field">
                        <b>Gender</b>
                        <input type="radio" name="gender"  value="Male" required>Male
                        <input type="radio" name="gender" value="Female" required>Female
                    </div>
                    <div class="login__field">
                        <input type="date" name="dob"  class="login__input" placeholder="Date of Birth" required>
                    </div>
                    <div class="login__field">
                    <span class="material-symbols-outlined">account_circle</span>
                        <input type="file" name="userphoto"  class="login__input">
                    </div>
                    <div class="login__field">
                    <span class="material-symbols-outlined">lock</span>
                        <input type="password" class="login__input" name="userpassword" placeholder="Password" pattern="^[A-Za-z0-9]*$" required>
                    </div>
                    <div class="login__field">
                    <span class="material-symbols-outlined">lock</span>
                        <input type="password" class="login__input" name="conpassword" placeholder="Conform Password" pattern="^[A-Za-z0-9]*$" required>
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