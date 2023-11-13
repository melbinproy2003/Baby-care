<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");
if(isset($_GET['accept'])) {
    $up = "update tbl_shop set shop_vstatus=1 where shop_id=".$_GET['accept'];
    $con->query($up);
}

if(isset($_GET['declain'])) {
    $de = "delete from tbl_shop where shop_id=".$_GET['declain'];
    $con->query($de);
}

$sel = "select * from tbl_shop where shop_vstatus='0'";
$row = $con->query($sel);
$i = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Shop Verification</title>
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

        a.button {
            text-decoration: none;
            background-color: #0074cc;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            display: block;
            margin: 10px auto;
            width: 200px;
        }

        a.button:hover {
            background-color: #0057a6;
        }

        table {
            font-family: Arial, sans-serif;
            text-align: center;
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table td, table th {
            /* border: 1px solid #ddd; */
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }
        
        img {
            max-width: 50px;
            max-height: 50px;
        }

        button.accept-button {
            background-color: #0074cc;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button.decline-button {
            background-color: red;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button.accept-button:hover {
            background-color: #00ff00;
        }

        button.decline-button:hover {
            background-color: #ff0000;
        }
    </style>
</head>
<body>
<div class="container" >
    <h1>Shop Verification</h1>
    <table border="0">
        <tr>
            <th>SL.NO</th>
            <th>Shop name</th>
            <th>Shop contact</th>
            <th>Shop address</th>
            <th>Shop email</th>
            <th>Shop Logo</th>
            <th>Shop Proof</th>
            <th colspan="2">Action</th>
        </tr>
        <?php 
        while ($val = $row->fetch_assoc()) {
            $i++;
        ?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $val["shop_name"]?></td>
            <td><?php echo $val["shop_contact"]?></td>
            <td><?php echo $val["shop_address"]?></td>
            <td><?php echo $val["shop_email"]?></td>
            <td>
                <a href="../Assets/File/Shop/<?php echo $val["shop_logo"]?>" target="_blank">
                <img src="../Assets/File/Shop/<?php echo $val["shop_logo"]?>" alt="Shop Logo"></a>
            </td>
            <td>
                <a href="../Assets/File/Shop/<?php echo $val["shop_proof"]?>" target="_blank">
                <img src="../Assets/File/Shop/<?php echo $val["shop_proof"]?>" alt="Shop Proof"></a>
            </td>
            <td>
                <a href="NewShops.php?accept=<?php echo $val['shop_id']?>">
                <button class="accept-button">Accept</button></a>
            </td>
            <td>
                <a href="NewShops.php?declain=<?php echo $val['shop_id']?>">
                <button class="decline-button">Decline</button></a>
            </td>
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
