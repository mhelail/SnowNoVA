<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    
    if (empty($username) || empty($password)) {
        
        echo "Username and password are required!";
    } else {
        
        $host = "localhost"; 
        $db_username = "root"; 
        $db_password = ""; 
        $database = "user_accounts"; 
        
        
        $conn = mysqli_connect($host, $db_username, $db_password, $database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            
            if ($password === $user['password']) {
                
                $_SESSION["username"] = $username;
                header("Location: /CryptographicFailures_applied.html");
                exit;
            } else {
                
                echo "Invalid username or password!";
            }
        } else {
            
            echo "Invalid username or password!";
        }

        
        mysqli_close($conn);
    }
}
?>
