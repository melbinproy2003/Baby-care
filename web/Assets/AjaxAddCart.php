
<?php 
session_start();
include("../connection/connection.php");
?>
<?php
    $id = $_GET["id"];
	//echo $id;
    $selQry = "select count(*) as count from tbl_booking where retail_id='" .$_SESSION['rid']. "' and booking_status='0'";
   $rsC = $con->query($selQry);
    $rscc=$rsC->fetch_assoc();
    if ($rscc["count"] > 0) {
       $sel = "select booking_id as id from tbl_booking where retail_id='" .$_SESSION['rid']. "' and booking_status='0'";
        $rs = $con->query($sel);
        if ($dat=$rs->fetch_assoc()) {
           $sqlQry = "select count(*) as count from tbl_cart where booking_id='" .$dat["id"] . "' and product_id='" .  $id . "'";
           $rsc = $con->query($sqlQry);
            $rsct=$rsc->fetch_assoc();
            if ($rsct["count"] > 0) {
                echo "Already Added to Cart";
            } else {
               $insQry = "insert into tbl_cart(booking_id,product_id)values('" . $dat["id"] . "','" . $id . "')";
                if ($con->query($insQry)) {
                   echo "Added to Cart";
                } else {
                      echo "Failed to Add Cart";
                }
            }
        }
    } else {
        $ins = "insert into tbl_booking(retail_id)values('" .$_SESSION['rid']. "')";
        if ($con->query($ins)) {
            $sel = "select Max(booking_id) as id from tbl_booking";
            $rs = $con->query($sel);
            if ($rsse=$rs->fetch_assoc()) {
              $insQry = "insert into tbl_cart(booking_id,product_id)values('" . $dat["id"] . "','" . $id . "')";
                if ($con->query($insQry)) {
                    echo "Added to Cart";
                } else {
                    echo "Failed to Add Cart";
                }
            }
        }
    }


?>