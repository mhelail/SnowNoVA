<?php
// Assuming your database connection details are as follows:
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_accounts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];  // You should hash passwords before storing them!

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password);

// Set parameters and execute
$insert_success = $stmt->execute();

// After inserting into the database
if ($insert_success) {
     header("Location: login.html");
                exit;
} else {
    echo "error";
}

$stmt->close();
$conn->close();
?>
