<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['Email_address'];
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Database connection (Make sure to update this with your DB credentials)
    $conn = new mysqli('localhost', 'root', '', 'shop_db');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user data into respective tables
    if ($role === 'admin') {
        // Insert into admin table
        $sql = "INSERT INTO admin_table (email, password) VALUES ('$email', '$password')";
    } else {
        // Insert into user table
        $sql = "INSERT INTO user_table (email, password) VALUES ('$email', '$password')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('location:jewellery/index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
