<?php
 include('../Assets/Connection/Connection.php');
 ob_start();
 include("Header.php");
 $ui=$_GET['uid'];
 $sel="select * from tbl_usercomplainttoadmin uc inner join tbl_newuser u on uc.user_id=u.user_id where usercomplainttoadmin_id=".$ui;
 $row=$con->query($sel);
 $val=$row->fetch_assoc();
 if(isset($_POST['submit']))
 {
	 $replay=$_POST['replay'];
	 $up="update tbl_usercomplainttoadmin set usercomplainttoadmin_replay='".$replay."' where usercomplainttoadmin_id=".$ui;
	 if($con->query($up))
	 {
		 header('Location:ViewUserComplaint.php');
	 }
 }
 if(isset($_POST['cancel']))
 {
	 header('Location:ViewUserComplaint.php');
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
            width: 60%;
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

        textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
        }

        input[type="submit"],input[type="reset"] {
            background-color: #0074cc;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #0057a6;
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
<h1>Admin Replay</h1>

<form method="post">
    <table border="1" align="center">
        <tr>
            <td colspan="2" align="center"><b>REPLAY BOX</b></td>
        </tr>
        <tr>
            <td><strong>User Name</strong></td>
            <td>&nbsp;<?php echo $val['user_name'];?></td>
        </tr>
        <tr>
            <td><strong>User Complaint</strong></td>
            <td>&nbsp;<?php echo $val['usercomplainttoadmin_complaint'];?></td>
        </tr>
        <tr>
            <td><strong>Replay</strong></td>
            <td>
                <textarea name="replay" placeholder="Enter your Replay" required></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Send" />
                <input type="reset" name="cancel" value="Cancel" />
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
