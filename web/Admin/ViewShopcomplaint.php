<?php 
include('../Assets/Connection/Connection.php');
ob_start();
include("Header.php");
$sel = 'select * from tbl_shopcomplaint sc inner join tbl_shop s on sc.shop_id=s.shop_id';
$row = $con->query($sel);
$i = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View Shop Complaint</title>
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
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            /* text-align: left; */
        }

        table th {
            background-color: #f2f2f2;
        }

        button {
            background-color: #0074cc;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0057a6;
        }
    </style>
</head>
<body>
 <div class="container">
    <h1>View Shop Complaint</h1>
    <table border="1">
        <tr>
            <th>SL.NO</th>
            <th>Shop name</th>
            <th>Complaint</th>
            <th align="center">Replay</th>
        </tr>
        <?php 
        while($val = $row->fetch_assoc()) {
            $i++;
        ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $val['shop_name'];?></td>
            <td><?php echo $val['shopcomplaint_complaint'];?></td>
            <td align="center">
                <?php
                $c = $val['shopcomplaint_replay'];
                if($c == NULL) {
                ?>
                <a href="Replaytoshop.php?id=<?php echo $val['shopcomplaint_id'];?>"><button>Replay</button></a>
                <?php
                } else {
                    echo $val['shopcomplaint_replay'];
                }
                ?>
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
