<?php 
 include("../Assets/Connection/Connection.php");
 ob_start();
 include("Header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Shop Products Line Chart</title>
</head>
<body>
  <canvas id="productsChart" height="100"></canvas>

  <script>
    <?php
    // SQL query to count products for each shop
    $sql = "SELECT s.shop_name, COUNT(p.product_id) as num_products 
            FROM tbl_shop s
            LEFT JOIN tbl_product p ON s.shop_id = p.shop_id
            GROUP BY s.shop_id";

    $result = $con->query($sql);

    // Fetch data from the result set and encode it as JSON
    $salesData = array();
    while ($row = $result->fetch_assoc()) {
        $salesData[] = $row;
    }
    ?>

    // Get the sales data from the server-side (PHP in this case)
    var salesData = <?php echo json_encode($salesData); ?>;

    // Get the canvas element and its context
    var canvas = document.getElementById('productsChart').getContext('2d');

    // Create a line chart (changed 'bar' to 'line')
    var productsChart = new Chart(canvas, {
      type: 'line', // Changed this from 'bar' to 'line'
      data: {
        labels: salesData.map(item => item.shop_name),
        datasets: [{
          label: 'Number of Products',
          data: salesData.map(item => item.num_products),
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
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
</body>
<?php 
 include("Footer.php");
 ob_flush();
?>
</html>
