<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "my_database"; 


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number']; 
    $address = $_POST['address'];
    $password = password_hash(password: $_POST['password'], algo: PASSWORD_DEFAULT); 

    $sql = "INSERT INTO users (username, email, phone_number, address, password) VALUES ('$username', '$email', '$phone_number', '$address', '$password')";

    if ($conn->query($sql) === TRUE) {
        header(header: "Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    
</head>
<body>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="create_account.css">

<div class="container">
    <h2>KOTSI</h2>
    <form method="post" action="" onsubmit="return validatePasswords()">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" class="input-field" name="username" placeholder="Enter your username" required>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" class="input-field" name="email" placeholder="Enter your email" required>
        </div>
        <div class="input-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="input-field" name="phone_number" placeholder="Enter your phone number" required>
        </div>
        <div class="input-group">
            <label for="address">Address</label>
            <input type="text" class="input-field" name="address" placeholder="Enter your address" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <div style="position: relative; width: 100%;">
                <input type="password" id="password" class="input-field" name="password" placeholder="Enter your password" required style="width: 85%; padding-right: 40px;">
                
                <i class="fas fa-eye" id="togglePassword" style="position: absolute; right: 10px; top: 40%; transform: translateY(-50%); cursor: pointer; font-size: 18px; color: #666;"></i>
            </div>
        </div>
        <div class="input-group">
            <label for="confirm_password">Confirm Password</label>
            <div style="position: relative; width: 100%;">
                <input type="password" id="confirm_password" class="input-field" name="confirm_password" placeholder="Confirm your password" required style="width: 85%; padding-right: 40px;">
                
                <i class="fas fa-eye" id="toggleConfirmPassword" style="position: absolute; right: 10px; top: 40%; transform: translateY(-50%); cursor: pointer; font-size: 18px; color: #666;"></i>
            </div>
        </div>
        <input type="submit" class="btn-submit" value="CREATE ACCOUNT">
    </form>
    <p>Already have an account? <a href="login.php">Login</a>.</p>
</div>

<script>

    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('password');
    
    togglePassword.addEventListener('click', function () {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });


    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const confirmPasswordField = document.getElementById('confirm_password');
    
    toggleConfirmPassword.addEventListener('click', function () {
        const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPasswordField.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });

 
    function validatePasswords() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;

        if (password !== confirmPassword) {
            alert("Passwords do not match!");
            return false;
        }
        return true;
    }
</script>


</body>
</html>
