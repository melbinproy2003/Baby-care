<?php
$placename = "";
$placeid = 0;
include("../Assets/Connection/Connection.php");

if(isset($_GET["delete"])) {
    $deletequrey = "delete from tbl_place where place_id= '".$_GET["delete"]."'";
    if($con->query($deletequrey)) {
        header("Location:place.php");
    }
}

if(isset($_GET["update"])) {
    $selup = "select * from tbl_place where place_id= '".$_GET["update"]."'";
    $dataup = $con->query($selup);
    $ftup = $dataup->fetch_assoc();
    $placeid = $ftup["place_id"];
    $placename = $ftup["place_name"];
}

if(isset($_POST["sub_save"])) {
    $dis = $_POST["sel_district"];
    $place = $_POST["txt_place"];
    if($placeid == 0) {
        $in = "insert into tbl_place (district_id,place_name)  value('".$dis."','".$place."')";
        if($con->query($in)) {
            header("Location:Place.php");
        }
    } else {
        $upquery = "update tbl_place set place_name='".$placename."' where place_id='".$placeid."'";
        if($con->query($upquery)) {
            header("Location:Place.php");
        }
    }
}
?>

<html>
<head>
    <title>place</title>
    <style>
        body {
            background-color: #f0f5f9;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            text-align: center;
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
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #0074cc;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        input[type="submit"]:hover {
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
    <h1>PLACE</h1>

    <a class="button" href="Home.php">BACK</a>

    <div class="form-container">
        <form method="POST">
            <table border="2" align="center">
                <tr>
                    <td><strong>District</strong></td>
                    <td>
                        <select name="sel_district">
                            <option value=" ">--select--</option>
                            <?php
                            $selectdistrict = "select * from tbl_district";
                            $result = $con->query($selectdistrict);
                            while($row = $result->fetch_assoc())
                            {
                            ?>
                            <option value="<?php echo $row["district_id"]?>"><?php echo $row["district_name"]?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><strong>Place</strong></td>
                    <td>
                        <input type="text" name="txt_place" placeholder="Place Name" value="<?php echo $placename ?>">
                        <input type="hidden" name="placeid" value="<?php echo $placeid ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="sub_save" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div class="table-container">
        <table width="217" height="138" border="1">
            <tr>
                <th>SL.NO</th>
                <th>District</th>
                <th>Place</th>
                <th colspan="2" align="center">Action</th>
            </tr>
            <?php
            $dname = "select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
            $rowp = $con->query($dname);
            $i = 0;
            while($val = $rowp->fetch_assoc())
            {
                $i++;
            ?>
            <tr>
                <td>&nbsp;<?php echo $i ?></td>
                <td>&nbsp;<?php echo $val["district_name"]?></td>
                <td>&nbsp;<?php echo $val["place_name"]?></td>
                <td>&nbsp;<a href="place.php?delete=<?php echo $val["place_id"]?>"><input type="submit" value="Delete"></a></td>
                <td>&nbsp;<a href="place.php?update=<?php echo $val["place_id"]?>"><input type="submit" value="Update"></a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
