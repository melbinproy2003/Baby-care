<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");

if (isset($_POST["submit"])) {
    $sid = $_SESSION['shop_id'];
    $name = $_POST["productname"];
    $details = $_POST["productdetails"];
    $photo = $_FILES["productphoto"]["name"];
    $temp = $_FILES["productphoto"]["tmp_name"];
    move_uploaded_file($temp, '../Assets/File/Shop/' . $photo);
    $price = $_POST["productprice"];
    $subcategory = $_POST["productsubcategory"];
    $brand = $_POST['brand'];
    $in = ("insert into tbl_product(product_name,product_details,product_photo,product_price,subcategory_id,shop_id,brand_id) values('" . $name . "','" . $details . "','" . $photo . "','" . $price . "','" . $subcategory . "','" . $sid . "','" . $brand . "')");

    if ($con->query($in)) {
        header("Location: ViewProduct.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Product</title>
    <style>
        /* Styles for form container */
        .form-container {
            text-align: center;
            margin: 40px 240px;
            width: 50%;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 10px;
        }

        /* Style for form elements */
        .form-input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Style for buttons */
        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin: 0 10px;
        }

        /* Add hover effect to buttons */
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2><u>Add Product</u></h2>
    <form method="post" enctype="multipart/form-data">
        <label for="productname">Product Name:</label><br>
        <input type="text" name="productname" placeholder="Name" class="form-input"  required><br>

        <label for="productdetails">Product Details:</label><br>
        <textarea name="productdetails" placeholder="Details" class="form-input" rows="4" cols="50" required></textarea><br>

        <label for="productphoto">Product Photo:</label><br>
        <input type="file" name="productphoto" class="form-input" required><br>

        <label for="productprice">Product Price:</label><br>
        <input type="text" name="productprice" placeholder="cost" class="form-input" pattern="^[0-9]*$" required><br>

        <label for="productcategory">Category:</label><br>
        <select name="productcategory" class="form-input" onChange="getsubcategory(this.value)" required>
            <option value="">----select----</option>
            <?php
            $selcategory = "select * from tbl_category";
            $result = $con->query($selcategory);
            while ($row = $result->fetch_assoc()) {
                ?>
                <option value="<?php echo $row["category_id"] ?>"><?php echo $row["category_name"] ?></option>
                <?php
            }
            ?>
        </select><br>

        <label for="productsubcategory">Subcategory:</label><br>
        <select name="productsubcategory" id="productsubcategory" class="form-input" required>
            <option value="">----select----</option>
        </select><br>

        <label for="brand">Brand:</label><br>
        <select name="brand" class="form-input" required>
            <option value="">----select----</option>
            <?php
            $selbrand = "select * from tbl_brands";
            $rowb = $con->query($selbrand);
            $i = 0;
            while ($valb = $rowb->fetch_assoc()) {
                $i++;
                ?>
                <option value="<?php echo $valb['brand_id'] ?>"><?php echo $valb['brand_name'] ?></option>
                <?php
            }
            ?>
        </select><br>

        <div class="button-container">
            <input type="submit" name="submit" value="Submit" class="button">
            <input type="reset" name="reset" value="Cancel" class="button">
        </div>
    </form>
</div>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
    function getsubcategory(did) {
        $.ajax({
            url: "../Assets/AjaxPages/Ajaxsubcategory.php?did=" + did,
            success: function (html) {
                $("#productsubcategory").html(html);
            }
        });
    }
</script>
</body>
<?php
include("Footer.php");
ob_flush();
?>
</html>
