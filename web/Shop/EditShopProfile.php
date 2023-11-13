<?php 
include('../Assets/Connection/Connection.php');
ob_start();
include("Header.php");
  
$myprofile = "select * from tbl_shop where shop_id=" . $_SESSION['shop_id'];
$row = $con->query($myprofile);
$val = $row->fetch_assoc();
	 
// Update
if(isset($_POST["save"])) {
    $name = $_POST["name"];
    $contact = $_POST["contact"]; 
    $address = $_POST["address"];
    $email = $_POST["email"];
    $editprofile = "update tbl_shop set shop_name='".$name."',shop_contact='".$contact."',shop_address='".$address."',shop_email='".$email."' where shop_id=".$_SESSION['shop_id'];
    if($con->query($editprofile)) {
        header("Location:ShopProfile.php");
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit shop profile</title>
<style>
    /* Style the form container */
    .form-container {
        text-align: center;
        margin: 40px 310px;
        width: 300px;
    }

    /* Style the form elements */
    .form-item {
        margin-bottom: 10px;
        text-align: left;
    }

    .form-item label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-item input[type="text"],
    .form-item input[type="number"],
    .form-item textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    /* Style the buttons */
    .button {
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    /* Add hover effect to buttons */
    .button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
<form method="post" class="form-container">
<h1><u>Edit PROFILE</u></h1><br>
    <div class="form-item">
        <label for="name">SHOP NAME:</label>
        <input type="text" name="name" id="name" value="<?php echo $val['shop_name']; ?>" pattern="^[A-za-z0-9]*$" >
    </div>
    <div class="form-item">
        <label for="contact">SHOP CONTACT:</label>
        <input type="text" name="contact" id="contact" value="<?php echo $val['shop_contact']; ?>" pattern="^[0-9]*$">
    </div>
    <div class="form-item">
        <label for="address">SHOP ADDRESS:</label>
        <textarea name="address" id="address"><?php echo $val['shop_address']; ?></textarea>
    </div>
    <div class="form-item">
        <label for="email">SHOP EMAIL:</label>
        <input type="email" name="email" id="email" value="<?php echo $val['shop_email']; ?>">
    </div>
    <div class="form-item">
        <input type="submit" name="save" value="Save" class="button">
        <input type="reset" name="cancel" value="Cancel" class="button">
    </div>
</form>
</body>
<?php 
include("Footer.php");
ob_flush();
?>
</html>
