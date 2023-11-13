<?php 
  include("../Assets/Connection/Connection.php");
  ob_start();
  include("Header.php");
	  
  $id=$_SESSION['user_id'];
  $inq=("select * from tbl_usercomplainttoadmin where user_id='".$id."'");
  $row=$con->query($inq);
  $i=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint to admin</title>
    <style>
        /* Add some basic styles for the form container */
        .form-container {
            text-align: center;
            margin: 87px auto;
            width: 300px;
            margin-top: 5px;
        }

        /* Style the text input */
        .text-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Style the submit button */
        .submit-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Add some hover effect to the submit button */
        .submit-button:hover {
            background-color: #0056b3;
        }

        .link-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-left: auto;
            font-size: 16px;
            cursor: pointer;
        }
        .link-button:hover {
            background-color: #0056b3;
        }

        /* Style the complaint list */
        .complaint-list {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Style each complaint row */
        .complaint-row {
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<nav
      class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5"
    >
      <a href="Home.php" class="navbar-brand d-flex align-items-center">
        <h1 class="m-0">
          <?php include('../Assets/File/Logo/Logo.php') ?>
        </h1>
      </a>
      <button
        type="button"
        class="navbar-toggler"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
          <a href="Home.php" class="nav-item nav-link">Home</a>
          <a href="SearchProduct.php" class="nav-item nav-link">Shop</a>
          <a href="MyCart.php" class="nav-item nav-link">My Cart</a>
          <div class="nav-item dropdown">
            <a
              href="#"
              class="nav-link dropdown-toggle active"
              data-bs-toggle="dropdown"
              >Pages</a
            >
            <div class="dropdown-menu bg-light border-0 m-0">
              <a href="Mybooking.php" class="dropdown-item">My Booking</a>
              <a href="Userfeedbacktoadmin.php" class="dropdown-item">Feedback</a>
              <a href="UserComplainttoadmin.php" class="dropdown-item active">Complaint</a>
            </div>
          </div>
          <!-- <a href="contact.html" class="nav-item nav-link">Contact Us</a> -->
        </div>
      </div>
      <a href="MyProfile.php" class="btn btn-primary px-3 d-none d-lg-block">Profile</a>
    </nav>
    <!-- Navbar End -->

    <a href="UserComplainttoadmin.php"><button class="link-button">Complaint Box</button></a>
    <a href="Allcomplaints.php"><button class="link-button">View Complaint</button></a>
    
    <form method="post">
        <div class="form-container">
            <h2>M<u>y complain</u>t</h2><br>
            <div class="complaint-list">
                <?php 
                while($val=$row->fetch_assoc())
                {
                    $i++;
                ?>
                <div class="complaint-row">
                    <p><strong>Complaint:</strong> <?php echo $val['usercomplainttoadmin_complaint'] ?></p>
                    <p><strong>Replay:</strong> <?php echo $val['usercomplainttoadmin_replay'] ?></p>
                    <p><strong>Date:</strong> <?php echo $val['usercomplainttoadmin_date'] ?></p>
                </div>
                <?php 
                }
                ?>
            </div>
        </div>
    </form>
</body>
<?php 
 include("Footer.php");
 ob_flush();
?>
</html>
