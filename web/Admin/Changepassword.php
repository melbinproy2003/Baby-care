<?php 
 include("../Assets/Connection/Connection.php");
 session_start();
 
 
 if(isset($_POST["submit"]))
 {
	
	 $in="select * from tbl_admin where admin_id=".$_SESSION["admin_id"];
	 $row=$con->query($in);
	 $val=$row->fetch_assoc();
	 $old= $val["admin_password"];
	 $cp=$_POST["cpassword"];
	 $newp=$_POST["newpassword"];
	 $cnewp=$_POST["conpassword"];
	 if($cp == $old)
	 {
		 if($newp == $cnewp)
		 {
			$up=("update tbl_admin set admin_password ='".$newp."' where admin_id = ".$_SESSION["admin_id"]); 
			if($con->query($up))
			{
				 ?>
             <script>
                alert("Password is updated")
				window.location="Home.php";
             </script>
             <?php
			}
		 }
		 else
		 {
			 ?>
             <script>
                alert("Confirm password is not same")
				window.location="Changepassword.php";
             </script>
             <?php
		 }
	 }
	 else
	 {
		 ?>
		<script>
             alert("Current password is not same")
		     window.location="Changepassword.php";
        </script>
         <?php
	 }
 }
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Change Password of Admin</title>
    <style>
        body {
            background-color: #f0f5f9;
            margin: 0;
            padding: 0;
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

        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 5px 0;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #0074cc;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
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
<h1>Change Password of Admin</h1>
<a class="button" href="Home.php">Back</a>
<form method="post">
    <table border="1" align="center">
        <tr>
            <td><strong>Current Password</strong></td>
            <td><input type="password" name="cpassword" placeholder="Old Password" required /></td>
        </tr>
        <tr>
            <td><strong>New Password</strong></td>
            <td><input type="password" name="newpassword" placeholder="New Password" required /></td>
        </tr>
        <tr>
            <td><strong>Confirm Password</strong></td>
            <td><input type="password" name="conpassword" placeholder="Re-Enter New Password" required /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="OK" />
                <input type="reset" name="reset" value="Cancel" />
            </td>
        </tr>
    </table>
</form>
</body>
</html>
