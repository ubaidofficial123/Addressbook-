<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'shop_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['Email_address'];
    $password = $_POST['Password'];

    // Query to check if the user exists in the admin_table or user_table
    $sql = "SELECT * FROM admin_table WHERE email = '$email' UNION SELECT * FROM user_table WHERE email = '$email'";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // User exists
        $row = $result->fetch_assoc();
        
        // Check password
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = (isset($row['role']) && $row['role'] == 'admin') ? 'admin' : 'user';
            
            // Redirect based on role
            if ($_SESSION['role'] == 'admin') {
                // echo "New record created successfully";
                header('Location: jewellery/dashmin-1.0.0/index.php'); // Admin Dashboard
            } else {
                header('Location: jewellery/index.php'); // User Homepage
            }
        } else {
            echo "Invalid credentials!";
        }
    } else {
        echo "No user found!";
    }

    $conn->close();
}
?>
