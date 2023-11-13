<?php
include('../Assets/Connection/Connection.php');
ob_start();
include("Header.php");
$ci = $_GET['id'];
$sel = "select * from tbl_shopcomplaint sc inner join tbl_shop s on sc.shop_id=s.shop_id where shopcomplaint_id=" . $ci;
$row = $con->query($sel);
$val = $row->fetch_assoc();

if (isset($_POST['submit'])) {
    $replay = $_POST['replay'];
    $up = "update tbl_shopcomplaint set shopcomplaint_replay='" . $replay . "' where shopcomplaint_id=" . $ci;
    if ($con->query($up)) {
        header('Location:ViewShopComplaint.php');
    }
}

if (isset($_POST['cancel'])) {
    header('Location:ViewShopComplaint.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin Replay</title>
    <style>
        /* body {
            background-color: #f0f5f9;
            margin: 0;
            padding: 0;
        } */

        .container{
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table td {
            padding: 10px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .strong{
            color: black;
            font-weight:700;
        }

        input[type="submit"] {
            background-color: #0074cc;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            margin-right: 10px;
        }

        input[type="submit"]:last-child {
            margin-right: 0;
        }

        input[type="submit"]:hover {
            background-color: #0057a6;
        }
    </style>
</head>
<body>
    <div class="container">
<h1>Admin Replay</h1>
<form method="post">
    <table border="1" align="center">
        <tr>
            <td colspan="2" align="center"><b>REPLAY BOX</b></td>
        </tr>
        <tr>
            <td class="strong" >Shop Name</td>
            <td>&nbsp;<?php echo $val['shop_name']; ?></td>
        </tr>
        <tr>
            <td class="strong" >Shop Complaint</td>
            <td>&nbsp;<?php echo $val['shopcomplaint_complaint']; ?></td>
        </tr>
        <tr>
            <td class="strong" >Replay</td>
            <td>
                <textarea name="replay" placeholder="Type your replay"></textarea>
                <input type="submit" name="submit" value="Send" />
                <input type="submit" name="cancel" value="Cancel" />
            </td>
        </tr>
    </table>
</form>
    </div>
</body>
<?php 
 include("Footer.php");
 ob_flush();
?>
</html>
