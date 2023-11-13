<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");

if(isset($_POST["sub_subcategory"]))
{
    $category=$_POST['sel_category'];
    $subcategory=$_POST['txt_sub'];
    $ins="insert into tbl_subcategory (category_id,subcategory_name) value('".$category."','".$subcategory."')";
    if ($con->query($ins)) {
        header("Location:Subcategory.php");
      }
}
?>

<html>
<head>
    <title>Subcategory</title>
    <style>
        /* body {
            background-color: #f0f5f9;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            text-align: center;
        } */

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

        select, input[type="text"] {
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
    <h1>Subcategory</h1>
        <form method="POST">
            <table border="2" align="center">
                <tr>
                    <td><strong>Category</strong></td>
                    <td>
                        <select name="sel_category">
                            <option value=" ">---select---</option>
                            <?php
                            $selcategory = "select * from tbl_category";
                            $resl = $con->query($selcategory);
                            while ($rowc = $resl->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $rowc["category_id"]?>"><?php echo $rowc["category_name"]?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><strong>Subcategory</strong></td>
                    <td><input type="text" name="txt_sub"></td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <input type="submit" name="sub_subcategory" value="Save">
                        <input type="reset" name="reset" value="Cancel">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <table width="200" border="1" class="table-container">
        <tr>
            <th>SL.NO</th>
            <th>CATEGORY NAME</th>
            <th>SUBCATEGORY NAME</th>
            <th>ACTION</th>
        </tr>
        <?php
        $cname = "select * from tbl_subcategory s inner join tbl_category c on s.category_id=c.category_id ORDER by s.subcategory_id DESC";
        $rowp = $con->query($cname);
        $i = 0;
        while ($val = $rowp->fetch_assoc()) {
            $i++;
        ?>
        <tr>
            <td>&nbsp;<?php echo $i?></td>
            <td>&nbsp;<?php echo $val["category_name"]?></td>
            <td>&nbsp;<?php echo $val["subcategory_name"]?></td>
            <td>
                &nbsp;<a href="Subcategory.php?del=<?php echo $val["subcategory_id"]?>" class="delete-button">Delete</a>
            </td>
            <?php
            if (isset($_GET["del"])) {
                $delquery = "delete from tbl_subcategory where subcategory_id= '".$_GET["del"]."' ";
                if ($con->query($delquery)) {
                    header("Location:Subcategory.php");
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
