<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");

if(isset($_POST["save"]))
{
    $category=$_POST['category'];
    $ins="insert into tbl_category (category_name) value('".$category."')";
    if ($con->query($ins)) {
        header("Location:category.php");
      }
}
?>

<html>
<head>
    <title>Category</title>
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

        input[type="submit"], input[type="reset"] {
            background-color: #0074cc;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
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

        table td, table th {
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
    <h1>Category</h1>
        <form method="POST">
            <table border="2" align="center">
                <tr>
                    <td><strong>Category</strong></td>
                    <td><input type="text" name="category" placeholder="Enter Category" ></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="save" value="Save">
                        <input type="reset" name="cancel" value="Cancel">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <table border="0" class="table-container">
        <tr>
            <th>SL.NO</th>
            <th>CATEGORY</th>
            <th>ACTION</th>
        </tr>
        <?php
        $dhselect = "select * from tbl_category";
        $row = $con->query($dhselect);
        $i = 0;
        while($value = $row->fetch_assoc())
        {
            $i++;
        ?>
        <tr>
            <td>&nbsp;<?php echo $i ?></td>
            <td>&nbsp;<?php echo $value["category_name"]?></td>
            <td>
                &nbsp;<a href="Category.php?delete=<?php echo $value["category_id"]?>" class="delete-button">Delete</a>
            </td>
            <?php
            if(isset($_GET["delete"]))
            {
                $indelete = "delete from tbl_category where category_id= '".$_GET["delete"]."'";
                if($con->query($indelete))
                {
                    header("location:Category.php");
                }
            }
            ?>
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
