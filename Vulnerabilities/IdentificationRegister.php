<!DOCTYPE html>
<html lang="tr">
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
    }
    .password-message {
      font-weight: bold;
    }
    .password-message.error {
      color: red;
    }
    .password-message.success {
      color: green;
    }
  </style>
  <script>
    function validatePassword() {
      var password = document.getElementById("password");
      var confirm_password = document.getElementById("confirm-password");
      if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Kelimeler şifre eşleşmiyor");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    function checkPasswordStrength() {
      var password = document.getElementById("password").value;
      var passwordStrength = document.getElementById("password_strength");
      var strength = 0;
      var tips = "";

      if (password.length < 8) {
        tips += "Şifrenizi daha uzun yapın. ";
      } else {
        strength += 1;
      }

      if (password.match(/[a-z]/) && password.match(/[A-Z]/)) {
        strength += 1;
      } else {
        tips += "Büyük ve küçük harflerden oluşan bir şifre kullanın. ";
      }

      if (password.match(/\d/)) {
        strength += 1;
      } else {
        tips += "En az bir rakam içerir. ";
      }

      if (password.match(/[^a-zA-Z\d]/)) {
        strength += 1;
      } else {
        tips += "En az bir özel karakter içerir. ";
      }

      if (strength < 2) {
        passwordStrength.innerHTML = "Kolay tahmin edilebilir. " + tips;
        passwordStrength.className = "password-message error";
      } else if (strength === 2) {
        passwordStrength.innerHTML = "Orta seviye zorluk. " + tips;
        passwordStrength.className = "password-message error";
      } else if (strength === 3) {
        passwordStrength.innerHTML = "Zor. " + tips;
        passwordStrength.className = "password-message error";
      } else {
        passwordStrength.innerHTML = "Çok zor. " + tips;
        passwordStrength.className = "password-message success";
      }
    }
  </script>
</head>
<body class="bg-dark">
  <header id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <a href="/index.html">
        <img src="images/SnowNoVa22222.png" alt="logo">
      </a>
    </nav>
  </header>
  
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_management1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Bağlantı başarısız: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password']; PASSWORD_DEFAULT;

    $sql = "SELECT id FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $message = "E-posta zaten kayıtlı.";
    } else {
      $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
      if ($conn->query($sql) === TRUE) {
        $message = "Yeni kayıt başarıyla oluşturuldu. Artık kayıtlısınız.";
      } else {
        $message = "Hata: " . $conn->error;
      }
    }
    $conn->close();
  }
  ?>

  <div class="centered-form">
    <div class="form-container">
      <h1 class="text-center">Kayıt Ol</h1>
      <form action="IdentificationRegister.php" method="POST" onsubmit="validatePassword()">
        <div class="mb-3">
          <label for="email" class="form-label">E-posta</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="E-postanızı girin" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Şifre</label>
          <input type="text" class="form-control" id="password" name="password" placeholder="Şifrenizi girin" required oninput="checkPasswordStrength()">
          <span id="password_strength" class="password-message"></span>
        </div>
        <div class="mb-3">
          <label for="confirm-password" class="form-label">Şifreyi Onayla</label>
          <input type="text" class="form-control" id="confirm-password" name="confirm-password" placeholder="Şifrenizi onaylayın" required>
        </div>
        <div class="btn-container">
          <button type="submit" class="btn btn-primary">Kayıt Ol</button>
        </div>
      </form>
      <?php if (!empty($message)): ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
      <?php endif; ?>
      <div class="btn-container">
        <a href="Identification sum.html" class="btn btn-secondary" style="background-color: #7289da; border: none;">Simülasyonu Tamamlamak İçin Geri Dön</a>
      </div>
    </div>
  </div>
</body>
</html>
