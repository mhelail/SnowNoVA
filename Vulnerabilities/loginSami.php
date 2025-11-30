<!DOCTYPE html>
<html lang="tr">
<head>
  <title>SnowNoVA - Giriş Yap</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/vendor.css">
  <link rel="stylesheet" type="text/css" href="fonts/icomoon.css">
  <link rel="stylesheet" type="text/css" href="modified_style_based_on_logo.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700;800;900&display=swap" rel="stylesheet">
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
      color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.3);
      width: 100%;
      max-width: 500px;
    }
    .form-control {
      background-color: #3c3f41;
      border: 1px solid #555;
      color: #ffffff;
    }
    .form-control:focus {
      background-color: #3c3f41;
      outline: none;
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
      color: white; 
    }
    h1 {
      color: white;
    }
    a {
      color: white;
    }
    .error-message {
      background-color: #ffcccc;
      color: #ff0000;
      padding: 10px;
      border-radius: 5px;
      margin-top: 10px;
    }
  </style>
</head>
<body class="bg-dark">
  <header id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <a href="/SnowNoVA/index.html">
        <img src="images/SnowNoVa22222.png" alt="logo">
      </a>
    </nav>
  </header>
  <div class="centered-form">
    <div class="form-container">
      <h1 class="text-center">Giriş Yap</h1>
      <form action="login.php" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">E-posta</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="E-postanızı girin" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Şifre</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Şifrenizi girin" required>
        </div>
        <div class="btn-container">
          <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </div>
        <div class="mb-3 text-center">
          <a href="SifreSıfırlama.php">Şifremi Unuttum?</a>
        </div>
        <?php
        session_start();

        $servername = "localhost";  
        $username = "root";  
        $password = "";  
        $dbname = "user_management1";  

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Bağlantı hatası: " . $conn->connect_error);
        }

        if(isset($_POST['email']) && isset($_POST['password'])) {
          $email = mysqli_real_escape_string($conn, $_POST['email']);
          $password = mysqli_real_escape_string($conn, $_POST['password']);

          $sql = "SELECT * FROM users WHERE email = '$email'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
              if (password_verify($password, $user['password'])) {
                  $_SESSION['user_id'] = $user['id'];
                  header('Location: Identification and Authentication Failures.html');
                  exit();
              } else {
                  echo "<div class='error-message'>Kullanıcı adı veya şifre yanlış.</div>";
              }
          } else {
              echo "<div class='error-message'>Hata: Bu e-posta ile kullanıcı bulunamadı.</div>";
          }
        }

        $conn->close();
        ?>
      </form>
    </div>
  </div>
</body>
</html>
