<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");

if (isset($_POST["submit"])) {
    $complaint = $_POST["complaint"];
    $id = $_SESSION['shop_id'];
    $inq = ("insert into tbl_shopcomplaint(Shopcomplaint_complaint,shop_id,Shopcomplaint_date) values('" . $complaint . "','" . $id . "',curdate())");
    if ($con->query($inq)) {
        header("Location:Shopcomplaint.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Complaint</title>
    <style>
        /* Style for the buttons */
        .button-container {
            text-align: center;
            margin: 20px auto;
        }

        .button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin: 0 10px;
        }

        /* Add hover effect to buttons */
        .button:hover {
            background-color: #0056b3;
        }

        /* Style for the complaint form */
        .complaint-form {
            margin: 100px auto;
            width: 50%;
            text-align: center;
        }

        .complaint-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .complaint-form .button-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="complaint-form">
<div class="button-container">
    <a href="ViewReplay.php"><button class="button">All Complaints</button></a>
    <a href="Mycomplaint.php"><button class="button">My Complaints</button></a>
</div>

    <h2><u>Complaint</u></h2>
    <form method="post">
        <label for="complaint">Complaint:</label><br>
        <textarea name="complaint" id="complaint" placeholder="Enter your complaint" rows="4" cols="50"></textarea><br>
        <div class="button-container">
            <input type="submit" name="submit" value="Submit" class="button">
            <input type="reset" name="reset" value="Cancel" class="button">
        </div>
    </form>
</div>

</body>
<?php
include("Footer.php");
ob_flush();
?>
</html>
