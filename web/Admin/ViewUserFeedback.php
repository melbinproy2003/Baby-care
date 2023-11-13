<?php 
 include("../Assets/Connection//Connection.php");
 ob_start();
 include("Header.php");
 $sel='select * from tbl_userfeedbacktoadmin u inner join tbl_newuser n on u.user_id=n.user_id';
 $row=$con->query($sel);
 $i=0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ViewUserFeedback</title>
<style>
        /* body {
            background-color: #f0f5f9;
            margin: 0;           
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
            font-size: medium;
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
        <h1>view User Feedback</h1>
<table border="1" align="center">
 <tr>
  <th>User name</th>
  <th>Feedback</th>
  <th>Date</th>
 </tr>
<?php 
  while($val=$row->fetch_assoc())
  {
	  $i++;
?>
 <tr align="center">
  <td><?php echo $val['user_name']; ?></td>
  <td><?php echo $val['userfeedbacktoadmin_feedback']; ?></td>
  <td><?php echo $val['userfeedbacktoadmin_date']; ?></td>
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