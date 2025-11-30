<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        echo "<script>localStorage.setItem('loginError', 'Invalid credentials. Please try again.'); window.location.href = 'login.html';</script>";
        exit;
    }

    $conn = mysqli_connect("localhost", "root", "", "user_accounts");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if ($password === $user['password']) {
            $_SESSION["username"] = $username;
            echo "<script>localStorage.removeItem('loginError'); window.location.href = 'index.html';</script>";
            exit;
        } else {
            echo "<script>localStorage.setItem('loginError', 'Invalid credentials. Please try again.'); window.location.href = 'login.html';</script>";
            exit;
        }
    } else {
        echo "<script>localStorage.setItem('loginError', 'Invalid credentials. Please try again.'); window.location.href = 'login.html';</script>";
        exit;
    }

    mysqli_close($conn);
}
?>
