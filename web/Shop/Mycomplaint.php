<?php
include('../Assets/Connection/Connection.php');
ob_start();
include("Header.php");

$sel = "select * from tbl_shopcomplaint where shop_id='" . $_SESSION['shop_id'] . "' ORDER BY shopcomplaint_id DESC ";
$row = $con->query($sel);
$i = 0;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>My Complaint</title>
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

        /* Style for the complaint list */
        .complaint-container {
            margin: 80px auto;
            width: 80%;
        }

        .complaint-item {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }

        .complaint-item:hover {
            background-color: #eee;
        }
    </style>
</head>

<body>
<div class="complaint-container">
<div class="button-container">
    <a href="Shopcomplaint.php"><button class="button">Complaint</button></a>
    <a href="ViewReplay.php"><button class="button">All Complaints</button></a>
</div>


    <h2 style="text-align: center; text-decoration: underline;">My Complaints</h2>
    <?php
    while ($val = $row->fetch_assoc()) {
        $i++;
        ?>
        <div class="complaint-item">
            <strong>Complaint Date:</strong>
            <?php echo $val['shopcomplaint_date'] ?><br/>
            <strong>Complaint:</strong>
            <?php echo $val['shopcomplaint_complaint'] ?><br/>
            <strong>Replay:</strong>
            <?php echo $val['shopcomplaint_replay'] ?>
        </div>
        <?php
    }
    ?>
</div>


</body>
<?php
include("Footer.php");
ob_flush();
?>
</html>
