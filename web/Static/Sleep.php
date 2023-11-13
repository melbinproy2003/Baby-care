<?php 
ob_start();
include("Header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sleep</title>
    <style>
        .container {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        h2 {
            text-align: left;
            margin-top: 30px;
        }

        ol {
            margin-top: 10px;
            margin-left: 30px;
        }

        li {
            margin-bottom: 10px;
        }

        .tips-section {
            margin-top: 30px;
            background-color: #f4f4f4;
            padding: 15px;
            border-radius: 5px;
        }

        .tip {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<!-- nav start -->
<nav
      class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5"
    >
      <a href="#" class="navbar-brand d-flex align-items-center">
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
          <a href="Sleep.php" class="nav-item nav-link active">Sleep</a>
          <a href="Health.php" class="nav-item nav-link ">Health</a>
          <a href="Feeding.php" class="nav-item nav-link ">Feeding</a>
        </div>
      </div>
    </nav>
<!-- nav end -->

<div class="container">
        <h1>Baby Sleep Instructions</h1>

        <h2>Newborn (0-3 Months):</h2>
        <ol>
            <li>Sleep Duration: Newborns sleep 14-17 hours a day, in short 2-4 hour bursts.</li>
            <li>Safe Sleep Environment: Place baby on back in a crib with a firm mattress and no loose bedding.</li>
            <li>Night Feeding: Expect frequent nighttime feedings every 2-3 hours.</li>
            <li>Bedtime Routine: Establish a simple bedtime routine with soothing activities.</li>
        </ol>

        <h2>Infant (3-6 Months):</h2>
        <ol>
            <li>Sleep Duration: Babies start sleeping longer but still need nighttime feedings.</li>
            <li>Consistent Sleep Schedule: Establish a regular sleep schedule with set bedtime and wake-up times.</li>
            <li>Sleep Associations: Encourage self-soothing and avoid sleep associations like rocking or feeding to sleep.</li>
        </ol>

        <h2>Baby (6-12 Months):</h2>
        <ol>
            <li>Sleep Duration: Babies need about 12-16 hours of sleep per day, including naps.</li>
            <li>Nap Transition: Transition to fewer, longer naps. Maintain a consistent nap schedule.</li>
            <li>Nighttime Sleep: Most babies can sleep for longer stretches at night.</li>
            <li>Sleep Training: Consider gentle sleep training methods after consulting with your pediatrician.</li>
        </ol>

        <div class="tips-section">
            <h2>General Sleep Tips:</h2>
            <div class="tip">Respond to Cues: Pay attention to your baby's sleep cues to avoid overtiredness.</div>
            <div class="tip">Soothing Techniques: Use calming methods like rocking or singing lullabies.</div>
            <div class="tip">Avoid Overstimulation: Create a calm, dimly lit environment before bedtime.</div>
            <div class="tip">Daylight Exposure: Encourage natural daylight exposure during the day.</div>
            <div class="tip">Consult a Pediatrician: Seek medical advice if your baby consistently has sleep issues.</div>
        </div>
    </div>
</body>
<?php 
 include("Footer.php");
 ob_flush();
?>
</html>