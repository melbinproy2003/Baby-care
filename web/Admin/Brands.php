<?php
include("../Assets/connection/connection.php");
ob_start();
include("Header.php");
?>
<?php
if (isset($_POST["smt"])) {
    $br = $_POST["brand"];
    $inq = "insert into tbl_brands (brand_name) value('" . $br . "')";
    if ($con->query($inq)) {
      header("Location:Brands.php");
    }
}
if (isset($_GET["de"])) {
    $dlq = "delete from tbl_brands where brand_id='" . $_GET["de"] . "'";
    if ($con->query($dlq)) {
        header("Location:Brands.php");
    }
}
?>
<html>

<head>
    <title>brands</title>
    <style>
        body {
            background-color: #f0f5f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            margin-top: 20px;
        }

        a.button {
            text-decoration: none;
            background-color: #0074cc;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            display: block;
            margin: 10px auto;
            width: 200px;
        }

        a.button:hover {
            background-color: #0057a6;
        }

        .form-container {
            margin: 20px auto;
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            font-family: Arial, sans-serif;
            text-align: center;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #0074cc;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #0057a6;
        }

        .table-container {
            margin: 20px auto;
            width: 80%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td,
        table th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        .delete-button {
            background-color: #ff5757;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #ff0000;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Brands</h1>
        <form method="post">
            <table border="2" align="center">
                <tr>
                    <td>Brand</td>
                    <td><input type="text" name="brand"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="smt" value="OK">
                        <input type="reset" name="rst" value="Cancel">
                    </td>
                </tr>
            </table>
            <table width="200" border="1" class="table-container">
                <tr>
                    <td>Sl.No</td>
                    <td>Brand</td>
                    <td>Action</td>
                </tr>
                <?php
                $sel = "select * from tbl_brands";
                $row = $con->query($sel);
                $i = 0;
                while ($data = $row->fetch_assoc()) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $data["brand_name"] ?></td>
                        <td><a href="Brands.php?de=<?php echo $data["brand_id"] ?>" class="delete-button">Delete</a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </form>
    </div>
</body>
<?php
 include("Footer.php");
 ob_flush();
?>
</html>
