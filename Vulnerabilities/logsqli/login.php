<?php
session_start();
header('Content-Type: application/json');  // Set the content type to application/json

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';
    $response = [
        'success' => false,
        'message' => '',
        'sql' => '',
        'results' => ''  // Add a field to hold the results
        
        
    ];

    if (empty($username) || empty($password)) {
        $response['message'] = "Username and password are required!";
        echo json_encode($response);
        exit;
    }

    // Database connection parameters
    $host = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "user_accounts";

    // Establish database connection
    $conn = new mysqli($host, $db_username, $db_password, $database);
    if ($conn->connect_error) {
        $response['message'] = "Connection failed: " . $conn->connect_error;
        echo json_encode($response);
        exit;
    }

    // Vulnerable SQL query
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $response['sql'] = $sql;

    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $userDetails = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $userDetails[] = $row['username'] . " - " . $row['password'];  // Collect user details
            }
            $response['results'] = implode(", ", $userDetails);
            $response['success'] = true;
            
        } else {
            $response['message'] = "Invalid username or password!";
        }
    } else {
        $response['message'] = "SQL Error: " . $conn->error;
    }

    mysqli_close($conn);
    echo json_encode($response);
    exit;
}
?>
