<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password for storage
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Connect to the database (use your credentials)
    $servername = "localhost";
    $username = "root";
    $dbPassword = "root123";
    $dbname = "testdb";  // Database name

    $conn = new mysqli($servername, $username, $dbPassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user data into database
    $sql = "INSERT INTO users (firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
