<?php 
  include("../Assets/Connection//Connection.php");
  include("Header.php");
  if(isset($_POST["submit"]))
  {
	  $feedback=$_POST["feedback"];
	  $review=$_POST["review"];
	  $inq=("insert into tbl_userfeedbacktoshop(userfeedbacktoshop_feedback,userfeedbacktoshop_review) values('".$feedback."','".$review."')");
	  if($con->query($inq))
	  {
		  header("Location:Userfeedbacktoshop.php");
	  }
  }
?>
<html>
 <head>
  <title>Feedback</title>
 </head>
 <body>
  <form method="post">
   <table border="2" align="center">
    <tr>
     <td>Feedback</td>
     <td><textarea name="feedback"></textarea></td>
    </tr>
    <tr>
     <td>Review</td>
     <td>
      <input type="radio" name="review" value="1"><label for="star1">1</label>
      <input type="radio" name="review" value="2"><label for="star2">2</label>
      <input type="radio" name="review" value="3"><label for="star3">3</label>
      <input type="radio" name="review" value="4"><label for="star4">4</label>
      <input type="radio" name="review" value="5"><label for="star5">5</label>
     </td>
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
 ?>
</html>