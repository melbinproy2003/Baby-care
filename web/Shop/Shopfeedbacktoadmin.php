<?php 
  include("../Assets/Connection//Connection.php");
  ob_start();
  include("Header.php");
  
  if(isset($_POST["submit"]))
  {
	  $feedback=$_POST["feedback"];
	  $inq=("insert into tbl_shopfeedbacktoadmin(shopfeedbacktoadmin_feedback,shop_id,shopfeedbacktoadmin_date) values('".$feedback."','".$_SESSION['shop_id']."',curdate())");
	  if($con->query($inq))
	  {
		  header("Location:Shopfeedbacktoadmin.php");
	  }
  }
?>
<html>
 <head>
  <title>Feedback</title>
 </head>
 <body>
 <a href="Home.php"><button>BACK</button></a>
  <table border="0" align="center">
   <tr>
    <td><u>Feedback</u></td>
    <td><a href="Shopcomplaint.php"><button>Complaint</button></a></td>
    <td><a href="ViewReplay.php"><button>Replay</button></td>
    <td><a href="Mycomplaint.php"><button>My Complaints</button></a></td>
   </tr>
  </table><br />
  <form method="post">
   <table border="2" align="center">
    <tr>
     <td>Feedback</td>
     <td><textarea name="feedback"></textarea></td>
    </tr>
    <tr>
     <td colspan="2" align="center">
       <input type="submit" name="submit" value="Submit">
       <input type="reset" name="reset" value="cancel">
     </td>
   </tr>
  </table>
  </form>
 </body>
 <?php 
  include("Footer.php");
  ob_flush();
 ?>
</html>