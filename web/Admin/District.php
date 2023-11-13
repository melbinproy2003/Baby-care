<?php
include("../Assets/Connection/Connection.php");
?>

<?php
if(isset($_POST["submite"]))
{
    $dis = $_POST["district"];
    $insQry = "insert into tbl_district(district_name) value('".$dis."')";
    if($con->query($insQry))
    {
        header("Location:District.php");
    }
}

if(isset($_GET["did"]))
{
    $delQry = "delete from tbl_district where district_id='".$_GET["did"]."'";
    if($con->query($delQry))
    {
        header("Location:District.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>District</title>
    <style>
        body {
            background-color: #f0f5f9; /* Light blue background */
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            text-align: center; /* Center align content */
        }

        h1 {
            color: #333; /* Dark blue text */
            margin-top: 20px; /* Add margin to the top */
        }

        a.button {
            text-decoration: none;
            background-color: #0074cc; /* Blue button background */
            color: #fff; /* White text */
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            display: block;
            margin: 10px auto; /* Center align the buttons */
            width: 200px; /* Set a fixed width for the buttons */
        }

        a.button:hover {
            background-color: #0057a6; /* Darker blue on hover */
        }

        .form-container {
            margin: 20px auto;
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Style for input box */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Style for submit button */
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

        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container table td, .table-container table th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table-container table th {
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
    <h1>Add District</h1>

    <a class="button" href="Home.php">BACK</a>

    <div class="form-container">
        <form method="post">
            <label for="district">District:</label>
            <input type="text" name="district" placeholder="District Name" id="district">
            <br>
            <input type="submit" name="submite" value="Save">
            <input type="reset" name="reset" value="Cancel">
        </form>
    </div>

    <div class="table-container">
        <table>
            <tr>
                <th>SI.NO</th>
                <th>District</th>
                <th>Action</th>
            </tr>
            <?php
            $s = "select * from tbl_district";
            $row = $con->query($s);
            $i = 0;
            while($data = $row->fetch_assoc())
            {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data["district_name"]?></td>
                <td>
                    <a href="District.php?did=<?php echo $data["district_id"]?>" class="delete-button">Delete</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
