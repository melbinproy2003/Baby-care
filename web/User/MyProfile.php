<?php 
 include('../Assets/Connection/Connection.php');
 ob_start();
 include("Header.php");
  
	 $myprofile="select * from tbl_newuser n inner join tbl_place p on n.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where n.user_id=".$_SESSION['user_id'];
	 $row=$con->query($myprofile);
     $val=$row->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        /* body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
} */
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fdd;
}
.profile-img {
            text-align: center;
        }

        .profile-img img {
            width: 200px;
            height: 200px;
            border-radius: 50%; /* This creates a circular shape */
            object-fit: cover; /* To maintain the aspect ratio */
        }
        
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-edit-btn {
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: black; /* Black color */
            cursor: pointer;
            margin: 0 auto; /* Center-align the button */
            display: block; /* Ensure it's a block-level element for centering */
        }
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
    </style>
</head>
<body>
    <div class="container emp-profile">
                <form method="post">
                    <div class="row">
                        <div class="col-md-4">
                        <div class="profile-img">
                        <?php 
                         if($val['user_photo'] !=0 )
                         {
                        ?>
                        <img src="../Assets/File/User/<?php echo $val['user_photo'] ?>" alt="Profile Image"/>
                                <div class="file btn btn-lg btn-primary">
                                    <a href="../Assets/File/User/<?php echo $val['user_photo'] ?>">view profile</a>
                                </div>
                        <?php
                         }
                         else{
                            ?>
                            <img src="../Assets/File/User/user.png" alt="Profile Image"/>
                                <div class="file btn btn-lg btn-primary">
                                    <a href="../Assets/File/User/user.png">view profile</a>
                                </div>
                            <?php
                         }
                        ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-head">
                                <h5>
                                <?php echo $val['user_name'];?>
                                </h5>
                            </div>
                        </div>
                        <!-- <div class="col-md-2">
                        <a href="EditProfile.php" class="btn btn-primary profile-edit-btn">Edit Profile</a>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $val['user_name'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $val['user_email'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $val['user_contact'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $val['user_address'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>District</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $val['district_name'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Place</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $val['place_name']?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date of birth</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $val['user_dob'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $val['user_gender'];?></p>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-5">
                        <a href="EditProfile.php" class="btn btn-primary profile-edit-btn">Edit Profile</a><br>
                        <a href="ChangePassword.php" class="btn btn-primary profile-edit-btn">Change Password</a>
                        </div>
                    </div>
                </form>           
            </div>
</body>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php 
  include("Footer.php");
  ob_flush();
?>
</html>