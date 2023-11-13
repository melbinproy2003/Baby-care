<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");
$sel = "select * from tbl_shop where shop_vstatus='2'";
$row = $con->query($sel);
$i = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Shop Decline List</title>
    <style>
        /* body {
            background-color: #f0f5f9;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            text-align: center;
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
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table th, table td {
            border: 1px solid #ddd;
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

        .accept-button{
            background-color: #0074cc;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .accept-button:hover {
            background-color: #00ff00;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Shop Decline List</h1>
            <a href="ShopAcceptList.php"><input type="submit" class="accept-button" value="Accept List"></a>
            <label class="button" bgcolor="#66FFCC"><u>Decline List</u></label>
    <table border="0">
        <tr>
            <th>SL.NO</th>
            <th>Shop name</th>
            <th>Shop contact</th>
            <th>Shop address</th>
            <th>Shop email</th>
            <th>Shop Logo</th>
            <th>Shop Proof</th>
        </tr>
        <?php 
        while($val = $row->fetch_assoc()) {
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
