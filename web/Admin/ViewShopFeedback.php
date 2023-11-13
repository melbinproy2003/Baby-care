<?php
include('../Assets/Connection/Connection.php');
include("Header.php");
ob_start();
$sel = "select * from tbl_shopfeedbacktoadmin f inner join tbl_shop s on f.shop_id=s.shop_id";
$row = $con->query($sel);
$i = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View Shop Feedback</title>
    <style>
        /* body {
            background-color: #f0f5f9;
            margin: 0;
        } */

        .container{
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* h1 {
            color: #333;
            margin-top: 20px;
        } */

        .container{
        margin: 90px auto;
        font-family: Arial, sans-serif;
        text-align: center;
        }

        h1 {
            color: #333;
            margin-top: 20px;
        }

        table {
            text-align: center;
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table td, table th {
            padding: 10px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        a.button {
            text-decoration: none;
            background-color: #0074cc;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a.button:hover {
            background-color: #0057a6;
        }
    </style>
</head>
<body>
<div class="container">
<h1>View Shop Feedback</h1>
<table border="1" align="center">
    <tr>
        <th>SL.NO</th>
        <th>SHOP NAME</th>
        <th>DATE</th>
        <th>FEEDBACK</th>
    </tr>
    <?php
    while ($val = $row->fetch_assoc()) {
        $i++;
    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $val['shop_name']; ?></td>
            <td><?php echo $val['shopfeedbacktoadmin_date']; ?></td>
            <td><?php echo $val['shopfeedbacktoadmin_feedback']; ?></td>
        </tr>
    <?php
    }
    ?>
</table>
</div>
</body>
<?php 
 include("Footer.php");
 ob_flush();
?>
</html>
