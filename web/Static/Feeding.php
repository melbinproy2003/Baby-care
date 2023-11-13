<?php 
ob_start();
include("Header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baby Feeding Instructions</title>
    <style>

        .container{
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
            margin-top: 20px;
        }

        ol {
            margin-top: 10px;
        }

        li {
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
          <a href="Health.php" class="nav-item nav-link">Health</a>
          <a href="Feeding.php" class="nav-item nav-link active">Feeding</a>
        </div>
      </div>
    </nav>
<!-- nav end -->

<div class="container" >
    <h1>Baby Feeding Instructions</h1>

    <h2>0 to 4 Months:</h2>
    <ol>
        <li><strong>Breastfeeding:</strong> Feed your baby about 8 to 12 times a day. Each session lasts 10 to 45 minutes per breast.</li>
        <li><strong>Formula Feeding:</strong> Newborns typically take 1 to 3 ounces of formula per feeding, following the instructions on the packaging.</li>
    </ol>

    <h2>4 to 6 Months:</h2>
    <ol>
        <li><strong>Introducing Solid Foods:</strong> Start with iron-fortified single-grain baby cereal mixed with breast milk or formula.</li>
        <li><strong>Vegetables and Fruits:</strong> Introduce purees of vegetables and fruits. Wait 3 to 5 days between new foods.</li>
    </ol>

    <h2>6 to 8 Months:</h2>
    <ol>
        <li><strong>Texture and Variety:</strong> Introduce mashed or minced foods like bananas, avocados, and well-cooked pasta.</li>
        <li><strong>Finger Foods:</strong> Offer small, bite-sized pieces of soft fruits, cooked vegetables, and cereals. Encourage self-feeding.</li>
    </ol>

    <h2>8 to 12 Months:</h2>
    <ol>
        <li><strong>Self-Feeding:</strong> Encourage self-feeding with appropriate utensils and finger foods.</li>
        <li><strong>Whole Grains:</strong> Introduce whole-grain cereals, bread, and pasta for added fiber.</li>
    </ol>

    <h2>General Tips:</h2>
    <ol>
        <li><strong>Allergenic Foods:</strong> Start introducing allergenic foods like peanuts and eggs. Watch for signs of allergies.</li>
        <li><strong>Food Safety:</strong> Wash hands and utensils. Avoid foods that pose a choking hazard.</li>
    </ol>
</div>
</body>
<?php 
 include("Footer.php");
 ob_flush();
?>
</html>
