<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");

// Check if the 'pid' parameter is set in the URL
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    // Select product information based on the given product ID
    $sel = "SELECT * FROM tbl_product WHERE product_id = '" . $pid . "'";
    $row = $con->query($sel);
    $val = $row->fetch_assoc();

    // Handle form submission
    if (isset($_POST["submit"])) {
        $quantity = $_POST["quantity"];

        // Insert stock information into the database
        $in = "INSERT INTO tbl_stock(stock_quantity, product_id, stock_date) VALUES('" . $quantity . "','" . $pid . "',curdate())";

        if ($con->query($in)) {
            header("Location: ViewProduct.php");
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Stock List</title>
    <style>
        /* Styles for the container */
        .container {
            text-align: center;
            margin: 20px auto;
            padding: 20px;
        }

        /* Styles for table */
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
        }

        th, td {
            padding: 10px;
        }

        td {
            text-align: center;
        }

        /* Styles for buttons */
        .button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Add hover effect to buttons */
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <form method="post">
        <table>
            <tr>
                <td><strong>Product Name</strong></td>
                <td><b><?php echo $val['product_name'] ?></b></td>
            </tr>
            <tr>
                <td><strong>Product Quantity</strong></td>
                <td><input type="number" name="quantity" min="0" placeholder="Add stock" /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Submit" class="button">
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
