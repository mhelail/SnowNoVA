<?php
session_start(); // Oturumu başlat veya devam ettir

// Veritabanı bağlantısı
$conn = new mysqli("localhost", "root", "", "security_logs");
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}

// Olay kaydetme fonksiyonu
function logEvent($conn, $username, $action, $ip) {
    $sql = "INSERT INTO event_logs (username, action, ip_address) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $action, $ip);
    $stmt->execute();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username']; 
    $pass = $_POST['password'];
    $ip_address = $_SERVER['REMOTE_ADDR'];

    $action = "Giriş başarılı";
    logEvent($conn, $user, $action, $ip_address);

    if ($user == "admin" && $pass == "admin123") {
        $_SESSION['success'] = "Başarıyla giriş yapıldı";
        unset($_SESSION['error']); 
    } else {
        $_SESSION['error'] = "Kullanıcı adı veya şifre yanlış";
    }
}

// Kayıtları göstermek için sürekli sorgu yap
$sql = "SELECT id, username, action, ip_address, timestamp FROM event_logs";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <title>SnowNoVA - Giriş Yap</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    .centered-form, .login-log {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .form-container {
      background-color: #2c2f33;
      color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.3);
      width: 100%;
      max-width: 500px;
      margin-bottom: 50px; 
    }
    .form-control {
      background-color: #3c3f41;
      border: 1px solid #555;
      color: #ffffff;
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
    .table-container {
      width: 100%;
      max-width: 600px; 
      margin: auto;
      color: #ffffff;
    }
  </style>
</head>
<body class="bg-dark">
  <header id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <a href="index1.html">
        <img src="images/SnowNoVa22222.png" alt="logo">
      </a>
    </nav>
  </header>
  <div class="centered-form">
    <div class="form-container">
      <h1 class="text-center">Giriş Yap</h1>
      <form action="SecuritySum.php" method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Kullanıcı Adı:</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Kullanıcı adınızı girin" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Şifre:</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Şifrenizi girin" required>
    </div>
    <?php if (isset($_SESSION['error'])): ?>
        <p class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>
    <?php if (isset($_SESSION['success'])): ?>
        <p class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></p>
    <?php endif; ?>
    <div class="btn-container">
        <button type="submit" class="btn btn-primary">Giriş Yap</button>
    </div>
    <div class="mb-3 text-center">
        <a href="reset_password.html">Şifremi Unuttum?</a>
    </div>
</form>

    </div>
  </div>
  <div class="login-log">
    <div class="table-container">
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Action</th>
            <th>IP Address</th>
            <th>Timestamp</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["username"] ?></td>
                <td><?= $row["action"] ?></td>
                <td><?= $row["ip_address"] ?></td>
                <td><?= $row["timestamp"] ?></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr><td colspan='5'>Kayıt bulunamadı</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
