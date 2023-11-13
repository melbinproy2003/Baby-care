<?php
include("../Assets/Connection/Connection.php");
include("Header.php");


if (isset($_POST["submit"])) {
    $in = "select * from tbl_newuser where user_id=" . $_SESSION["user_id"];
    $row = $con->query($in);
    $val = $row->fetch_assoc();
    $old = $val["user_password"];
    $cp = $_POST["cpassword"];
    $newp = $_POST["newpassword"];
    $cnewp = $_POST["conpassword"];
    if ($cp == $old) {
        if ($newp == $cnewp) {
            $up = ("update tbl_newuser set user_password ='" . $newp . "' where user_id = " . $_SESSION["user_id"]);
            if ($con->query($up)) {
                ?>
                <script>
                    alert("Password is updated");
                    window.location = "MyProfile.php";
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        /* Add some basic styles for the form container */
        .form-container {
            text-align: center;
            margin: 87px auto;
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
?>
</html>
