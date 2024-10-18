<?php
// Database connection details
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "my_database"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number']; 
    $address = $_POST['address'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    // Prepared statement to insert data into the users table
    $stmt = $conn->prepare("INSERT INTO users (username, email, phone_number, address, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $email, $phone_number, $address, $password);

    // Execute the query
    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
