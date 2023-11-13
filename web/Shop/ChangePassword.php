<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");

if (isset($_POST["submit"])) {
    $in = "select * from tbl_shop where shop_id=" . $_SESSION["shop_id"];
    $row = $con->query($in);
    $val = $row->fetch_assoc();
    $old = $val["shop_password"];
    $cp = $_POST["cpassword"];
    $newp = $_POST["newpassword"];
    $cnewp = $_POST["conpassword"];
    if ($cp == $old) {
        if ($newp == $cnewp) {
            $up = ("update tbl_shop set shop_password ='" . $newp . "' where shop_id = " . $_SESSION["shop_id"]);
            if ($con->query($up)) {
                ?>
                <script>
                    alert("Password is updated");
                    window.location = "ShopProfile.php";
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("Confirm password is not the same");
                window.location = "Changepassword.php";
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("Current password is not the same");
            window.location = "Changepassword.php";
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Change Password</title>
    <style>
        /* Add some basic styles for the form container */
        .form-container {
            text-align: center;
            margin: 40px auto;
            width: 300px;
            margin-top: 5px;
        }

        /* Style the text input */
        .text-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Style the submit button */
        .submit-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Add some hover effect to the submit button */
        .submit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Change Password</h2>
    <form method="post">
        <label for="cpassword">Current Password:</label>
        <input type="password" id="cpassword" name="cpassword" class="text-input" required>
        <br><br>
        <label for="newpassword">New Password:</label>
        <input type="password" id="newpassword" name="newpassword" class="text-input" required>
        <br><br>
        <label for="conpassword">Confirm Password:</label>
        <input type="password" id="conpassword" name="conpassword" class="text-input" required>
        <br><br>
        <input type="submit" name="submit" value="OK" class="submit-button">
        <input type="reset" name="reset" value="Cancel" class="submit-button">
    </form>
</div>
</body>
<?php
include("Footer.php");
ob_flush();
?>
</html>
