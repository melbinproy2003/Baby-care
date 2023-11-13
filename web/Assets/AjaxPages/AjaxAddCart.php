<?php 
 include('../Connection/Connection.php');
  
 session_start();
 $pid=$_GET['pid'];
 $selbooking="select * from tbl_booking where user_id='".$_SESSION['user_id']."'and booking_status=0";
 $row=$con->query($selbooking);
 if($val=$row->fetch_assoc())
 {
	 $bookid= $val['booking_id'];
	 $selcart="select * from tbl_cart where booking_id='".$bookid."' and product_id='".$pid."'";
	 $crow=$con->query($selcart);
	 if($cval=$crow->fetch_assoc())
	 {
		echo "Already Added to Cart"; 
	 }
	 else
	 {
		 $cartins="insert into tbl_cart (product_id, booking_id) values('".$pid."','".$bookid."')";
		 if($con->query($cartins))
		 {
			 echo "Added to Cart";
		 }
		 else{
			 echo "Failed";
		 }
	 }
 }
 else
 {
	 $bookingins="insert into tbl_booking (user_id,booking_date) values('".$_SESSION['user_id']."',curdate())";
	 $con->query($bookingins);
	 $selnewbooking="select MAX(booking_id) as bookingid from tbl_booking where user_id='".$_SESSION['user_id']."'";
	 $brow=$con->query($selnewbooking);
	 $bval=$brow->fetch_assoc();
	 $newid= $bval['bookingid'];
	 $scart="select * from tbl_cart where product_id='".$pid."' and booking_id='".$newid."'";
	 $srow=$con->query($scart);
	 if($sval=$srow->fetch_assoc())
	 {
		 echo "Already Added to Cart";
	 }
	 else
	 {
		 $selnewcart="insert into tbl_cart (product_id,booking_id) values('".$pid."','".$newid."')";
		 if($con->query("$selnewcart")){
			 echo "Added to Cart";
		 }
		 else{
			 echo "Failed";
		 }
	 }
 }
?>