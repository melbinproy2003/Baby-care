<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");
if(isset($_GET['aid']))
{
  $in="update tbl_cart set cart_status=2 where cart_id= '".$_GET['aid']."'";
  $con->query($in);
}
if(isset($_GET['pid']))
{
  $in="update tbl_cart set cart_status=3 where cart_id= '".$_GET['pid']."'";
  $con->query($in);
}
if(isset($_GET['sid']))
{
  $in="update tbl_cart set cart_status=4 where cart_id= '".$_GET['sid']."'";
  $con->query($in);
}
if(isset($_GET['did']))
{
  $in="update tbl_cart set cart_status=5 where cart_id= '".$_GET['did']."'";
  $con->query($in);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Booking</title>
    <style>
        
        table {
            width: 90%;
            border-collapse: collapse;
            margin: auto;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        td{
          color: black;
          font-size: medium;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
  <h1><u>ORDERS</u></h1>
  <table border="1">
    <tr>
        <th>SL.NO</th>
        <th>Image</th>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Username</th>
        <th>Address</th>
        <th>Status</th>
    </tr>
    <?php 
     $sel="select * from tbl_cart c inner join tbl_booking b on c.booking_id=b.booking_id inner join tbl_newuser n on b.user_id=n.user_id inner join tbl_product p on c.product_id=p.product_id inner join tbl_shop s on p.shop_id=s.shop_id where s.shop_id='".$_SESSION['shop_id']."' ORDER BY c.booking_id DESC" ;
     $row=$con->query($sel);
     $i=0;
     while($val=$row->fetch_assoc())
     {
      $b=$val['booking_status'];
      if($b == 2)
      {
      $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><img src="../Assets/File/Shop/<?php echo $val['product_photo']?>" height="100px"></td>
        <td><?php echo $val['product_name'] ?></td>
        <td><?php echo $val['product_price'] ?></td>
        <td><?php echo $val['cart_qty'] ?></td>
        <td>
        <?php 
          $p=$val['product_price'];
          $q=$val['cart_qty'];
          $sum= $p * $q;
          echo $sum;
        ?>
        </td>
        <td><?php echo $val['user_name'] ?></td>
        <td><?php echo $val['user_address'] ?></td>
        <td>
          <?php 
            $s=$val['cart_status'];
            if($s == 1)
            {
              ?>
                <br><a href="ViewBooking.php?aid=<?php echo $val ['cart_id'] ?>"><button class="button" >Approve</button></a>
              <?php
            }
            elseif ($s == 2) 
            {
              echo "Approved";
              ?>
                <br><a href="ViewBooking.php?pid=<?php echo $val ['cart_id'] ?>"><button class="button" >Packed</button></a>
              <?php
            }
            elseif ($s == 3) 
            {
              echo "Packed";
              ?>
                <br><a href="ViewBooking.php?sid=<?php echo $val ['cart_id'] ?>"><button class="button" >Shipped</button></a>
              <?php
            }
            elseif ($s == 4) 
            {
              echo "Shipped";
              ?>
                <br><a href="ViewBooking.php?did=<?php echo $val ['cart_id'] ?>"><button class="button" >Delivered</button></a>
              <?php
            }
            elseif ($s == 5) 
            {
              echo "Delivered";
            }
          ?>
        </td>
    </tr>
    <?php 
      }
     }
    ?>
  </table>  
</body>
<?php 
 include("Footer.php");
 ob_flush();
?>
</html>
