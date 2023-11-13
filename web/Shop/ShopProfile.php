<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");

// Fetch shop profile data
$in = ("SELECT * FROM tbl_shop s 
        INNER JOIN tbl_place p ON s.place_id=p.place_id 
        INNER JOIN tbl_district d ON p.district_id=d.district_id 
        WHERE shop_id=" . $_SESSION["shop_id"]);
$row = $con->query($in);
$val = $row->fetch_assoc();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Shop Profile</title>
    <style>
        /* Add some basic styles for the profile container */
        
        .profile-container {
            text-align: center;
            margin: 40px 310px;
            width: 300px;
        }

        /* Style the profile items */
        .profile-item {
            margin: 10px 0;
        }

        /* Style the buttons */
        .edit-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Add some hover effect to the buttons */
        .edit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="profile-container">
    <h1><u>PROFILE</u></h1><br>
        <div class="profile-item">
            <strong>Shop name:</strong> <?php echo $val["shop_name"] ?>
        </div>
        <div class="profile-item">
            <strong>Shop contact:</strong> <?php echo $val["shop_contact"] ?>
        </div>
        <div class="profile-item">
            <strong>Shop address:</strong> <?php echo $val["shop_address"] ?>
        </div>
        <div class="profile-item">
            <strong>District:</strong> <?php echo $val["district_name"] ?>
        </div>
        <div class="profile-item">
            <strong>Place:</strong> <?php echo $val["place_name"] ?>
        </div>
        <div class="profile-item">
            <strong>Shop Logo:</strong>
            <a href="../Assets/File/Shop/<?php echo $val["shop_logo"] ?>" target="_blank">
                <img src="../Assets/File/Shop/<?php echo $val["shop_logo"] ?>" height="50" width="50" />
            </a>
        </div>
        <div class="profile-item">
            <strong>Shop Proof:</strong>
            <a href="../Assets/File/Shop/<?php echo $val["shop_proof"] ?>" target="_blank">
                <img src="../Assets/File/Shop/<?php echo $val["shop_proof"] ?>" height="50" width="50" />
            </a>
        </div>
        <div class="profile-item">
            <strong>Shop Email:</strong> <?php echo $val["shop_email"] ?>
        </div>
        <div class="profile-item">
            <a href="EditShopProfile.php"><button class="edit-button">Edit</button></a>
            <a href="ChangePassword.php"><button class="edit-button">Change Password</button></a>
        </div>
    </div>

</body>
<?php
include("Footer.php");
ob_flush();
?>
</html>
