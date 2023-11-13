<?php
include('../Assets/Connection/Connection.php');
ob_start();
include("Header.php");

$sel = 'select * from tbl_usercomplainttoadmin uc inner join tbl_newuser u on uc.user_id=u.user_id';
$row = $con->query($sel);
$i = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View User Complaint</title>
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

        .replay-button {
            text-decoration: none;
            background-color: #00aaff;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .replay-button:hover {
            background-color: #0088cc;
        }
    </style>
</head>
<body>
    <div class="container" >
<h1>View User Complaint</h1>
<table border="1" align="center">
    <tr>
        <th>SL.NO</th>
        <th>User name</th>
        <th>Complaint</th>
        <th align="center">Replay</th>
    </tr>
    <?php
    while ($val = $row->fetch_assoc()) {
        $i++;
    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $val['user_name']; ?></td>
            <td><?php echo $val['usercomplainttoadmin_complaint']; ?></td>
            <td align="center">
                <?php
                $c = $val['usercomplainttoadmin_replay'];
                if ($c == NULL) {
                    ?>
                    <a class="replay-button" href="Replaytouser.php?uid=<?php echo $val['usercomplainttoadmin_id']; ?>">Replay</a>
                    <?php
                } else {
                    echo $val['usercomplainttoadmin_replay'];
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
