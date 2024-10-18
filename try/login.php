<?php
session_start();

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "my_database"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = "";  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submitted_username = $_POST['username'];
    $submitted_password = $_POST['password']; 

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $submitted_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $hashed_password = $user['password'];

        if (password_verify($submitted_password, $hashed_password)) {
            $_SESSION['username'] = $user['username'];
            header("Location: product_page.php");
            exit();
        } else {
            $error_message = "Invalid password. Please try again."; 
        }
    } else {
        $error_message = "No account found with that username."; 
    }
    $stmt->close(); 
}

$conn->close();

// Redirect with error message if login fails
if (!empty($error_message)) {
    header("Location: login.html?error=" . urlencode($error_message));
    exit();
}
?>
