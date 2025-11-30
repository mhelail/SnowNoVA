<!DOCTYPE html>
<html lang="en">

<head>
    <title>SnowNoVA</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="modified_style_based_on_logo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700;800;900&display=swap"
        rel="stylesheet">
    <script src="js/modernizr.js"></script>
    <style>
        body.bg-dark {
            background-color: #343a40;
        }

        nav.bg-dark {
            background-color: #343a40;
            width: 100%;
            padding: 0 20px;
        }

        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 56px;
        }

        .navbar-toggler {
            position: absolute;
            right: 15px;
            top: 10px;
        }

        .centered-form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #2c2f33;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 500px;
        }

        .form-control {
            background-color: white;
            border: 1px solid #555;
            color: black;
        }

        .form-control:focus {
            color: #ffffff;
            /* Keeps text white on focus */
            background-color: #3c3f41;
            /* Ensures the background stays dark */
            border-color: #7289da;
            /* Optional: changes border color to indicate focus */
        }


        .btn-primary {
            background-color: #7289da;
            border: none;
            display: block;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #5a6eaa;
        }

        .btn-container {
            text-align: center;
        }

        h1 {
            color: white;
            /* Sets the color of the heading text to white */
        }
    </style>
</head>

<body class="bg-dark">
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="main-logo">
                <a href="index1.html">
                    <img src="images/SnowNoVa22222.png" alt="logo">
                </a>
            </div>
        </nav>
    </header>
    <div class="centered-form">
        <div class="form-container">
            <h1 class="text-center">Adınızı girin</h1>
            <form method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Adınız</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                </div>
                <div class="btn-container">
                    <button type="submit" class="btn btn-primary">Onaylayın</button>
                </div>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "<p class='text-center mt-3'>Hoş geldiniz, " . $_POST['name'] . "!</p>"; // Vulnerable to XSS
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>