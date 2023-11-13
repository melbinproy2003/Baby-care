<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");

if (isset($_GET['id'])) 
{
    $delete = "DELETE FROM tbl_product WHERE product_id = '" . $_GET['id'] . "'";
    $con->query($delete);
}

$sid = $_SESSION['shop_id'];
$sel = "SELECT * FROM tbl_product p
        INNER JOIN tbl_subcategory sc ON p.subcategory_id = sc.subcategory_id
        INNER JOIN tbl_category c ON sc.category_id = c.category_id
        WHERE p.shop_id = '" . $sid . "' ORDER BY product_id DESC ";
$row = $con->query($sel);
$i = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Products</title>
    <style>
        /* Styles for table */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 50px;
        }

        th, td {
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        td {
            color: black;
            font-size: medium;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Styles for buttons */
        .button {
            display: block !important;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Add hover effect to buttons */
        .button:hover {
            background-color: #0056b3;
        }

        /* Styles for images */
        .product-photo img {
            height: 50px;
            width: 50px;
        }

        /* Center-align text in table cells */
        td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>SL.NO</th>
        <th>Product Name</th>
        <th>Product Photo</th>
        <th>Category</th>
        <th>Subcategory</th>
        <th>total Stock</th>
        <th>remaining Stock</th>
        <th colspan="2" width="400px">Action</th>
    </tr>
    <?php
    while ($val = $row->fetch_assoc()) {
        $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $val["product_name"] ?></td>
            <td class="product-photo">
                <a href="../Assets/File/Shop/<?php echo $val["product_photo"] ?>" target="_blank">
                    <img src="../Assets/File/Shop/<?php echo $val["product_photo"] ?>" alt="Product Photo"/>
                </a>
            </td>
            <td><?php echo $val["category_name"] ?></td>
            <td><?php echo $val["subcategory_name"] ?></td>
            <?php
            $sel = "SELECT sum(stock_quantity) as stock FROM tbl_stock WHERE product_id = '" . $val['product_id'] . "'";
            $rows = $con->query($sel);
            ?>
            <td>
                <?php
                if ($vals = $rows->fetch_assoc()) {
                    echo $vals["stock"];
                } else {
                    echo "0";
                }
                ?>
            </td>
            <td>
                <?php
                 $stockcart= "select sum(cart_qty) as stock from tbl_cart where product_id= '".$val["product_id"]."' and cart_status>0";
                 $rowc = $con->query($stockcart);
                 $valc= $rowc->fetch_assoc();
                 $stock = $vals["stock"] - $valc['stock'];
                 echo $stock;         
                ?>
            </td>
            <td><a href="Stock.php?pid=<?php echo $val['product_id']; ?>"
                   class="button">Add Stock</a></td>
                   <td>
                   <a href="ViewProduct.php?id=<?php echo $val['product_id'] ?>" class="button">Remove</a></td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
<?php
include("Footer.php");
ob_flush();
?>
</html>