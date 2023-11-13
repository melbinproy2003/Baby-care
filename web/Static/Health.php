<?php 
ob_start();
include("Header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baby Health Instructions</title>
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
          <a href="Sleep.php" class="nav-item nav-link">Sleep</a>
          <a href="Health.php" class="nav-item nav-link active">Health</a>
          <a href="Feeding.php" class="nav-item nav-link ">Feeding</a>
        </div>
      </div>
    </nav>
<!-- nav end -->

    <div class="container">
    <h1>Baby Health Instructions</h1>

    <h2>Physical Health:</h2>
    <ul>
        <li><strong>Nutrition:</strong> Follow the guidelines for breastfeeding, formula feeding, and introducing solid foods.</li>
        <li><strong>Sleep:</strong> Establish a bedtime routine, ensure safe sleep practices, and provide a comfortable sleeping environment.</li>
        <li><strong>Hygiene:</strong> Maintain proper bathing and diapering practices to ensure cleanliness.</li>
        <li><strong>Healthcare Visits:</strong> Schedule regular check-ups with the pediatrician and seek medical advice when needed.</li>
    </ul>

    <h2>Emotional and Social Well-being:</h2>
    <ul>
        <li><strong>Bonding:</strong> Engage in skin-to-skin contact, maintain eye contact, and provide a loving and nurturing environment.</li>
        <li><strong>Stimulation:</strong> Provide sensory stimulation, tummy time, and age-appropriate toys for development.</li>
        <li><strong>Social Interaction:</strong> Arrange playdates and spend quality time with family members.</li>
    </ul>

    <h2>Developmental Health:</h2>
    <ul>
        <li><strong>Milestones:</strong> Track developmental milestones and address any concerns with the pediatrician.</li>
        <li><strong>Encouragement:</strong> Encourage exploration, praise achievements, and provide a supportive atmosphere for growth.</li>
    </ul>

    <h2>Safety:</h2>
    <ul>
        <li><strong>Childproofing:</strong> Ensure the home is childproofed, supervise the baby, and provide a safe environment.</li>
        <li><strong>Car Safety:</strong> Use a rear-facing car seat and follow safety guidelines for car travel.</li>
        <li><strong>Illness Prevention:</strong> Maintain hand hygiene, keep vaccinations up-to-date, and follow recommended health practices.</li>
    </ul>
    </div>
</body>
<?php 
 include("Footer.php");
 ob_flush();
?>
</html>
