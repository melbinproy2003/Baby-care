<?php 
include('../Assets/Connection/Connection.php');
ob_start();
include("Header.php");

//retrieve booking dates and amounts
$sql = "SELECT booking_date, SUM(booking_amount) AS total_amount FROM tbl_cart c inner join tbl_booking b on c.booking_id=b.booking_id inner join tbl_product p on c.product_id=p.product_id inner join tbl_shop s on p.shop_id=s.shop_id WHERE s.shop_id='".$_SESSION['shop_id']."'  GROUP BY booking_date";
$result = $con->query($sql);
$dates = array();
$amounts = array();

while ($row = $result->fetch_assoc()) {
    $dates[] = $row['booking_date'];
    $amounts[] = $row['total_amount'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    .container-fluid {
      margin-top: 50px;
    }
  </style>
</head>
<body>
<div class="container-fluid">
  <!-- Graph -->
  <canvas id="myChart"  height="auto"></canvas>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($dates); ?>,
            datasets: [{
                label: 'Booking Amount',
                data: <?php echo json_encode($amounts); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'blue',
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
  <!-- Graph end -->

  
    <div class="col-lg-8 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Recent Orders</h5>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Product</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Customer</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Status</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Budget</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $sel="select * from tbl_cart c inner join tbl_booking b on c.booking_id=b.booking_id inner join tbl_newuser n on b.user_id=n.user_id inner join tbl_product p on c.product_id=p.product_id inner join tbl_shop s on p.shop_id=s.shop_id where s.shop_id='".$_SESSION['shop_id']."'";
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
                  <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><?php echo $i ?></h6></td>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1"><?php echo $val['product_name'] ?></h6>                         
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal"><?php echo $val['user_name'] ?></p>
                  </td>
                  <td class="border-bottom-0">
                    <div class="d-flex align-items-center gap-2">
                      <span class="badge bg-primary rounded-3 fw-semibold"><?php 
                      $s=$val['cart_status'];
                      if($s == 1)
                      {
                       echo "Not Approved";
                      }
                      elseif ($s == 2) 
                      {
                        echo "Approved";
                      }
                      elseif ($s == 3) 
                      {
                        echo "Packed";
                      }
                      elseif ($s == 4) 
                      {
                        echo "Shipped";
                      }
                      elseif ($s == 5) 
                      {
                        echo "Delivered";
                      }
                    ?></span>
                    </div>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4"><i class="ti ti-currency-rupee"></i><?php echo $val['product_price'] ?></h6>
                  </td>
                </tr>
                <?php 
                  }
                }
                ?>                      
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <ul>
    <br />
    <li><a href="Shopcomplaint.php">FEEDBACK AND COMPLAINT TO ADMIN</a></li>
  </ul>
</body>

<?php 
include("Footer.php");
ob_flush();
?>

</html>
