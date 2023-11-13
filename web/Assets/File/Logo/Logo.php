<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Baby Care Logo</title>
    <style>
        /* body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        } */

        .logo {
            font-family: 'Arial', sans-serif;
            font-size: 36px;
            font-weight: bold;
        }

        .baby, .care {
            color: darkcyan;
        }

        .heart {
            color: red;
            animation: beat 1s infinite;
        }

        /* @keyframes beat {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        } */
    </style>
</head>

<body>
    <div class="logo">
        <span class="baby">Baby</span><span class="heart">&hearts;</span><span class="care">Care</span>
    </div>
</body>

</html>
