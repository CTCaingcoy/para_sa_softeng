<?php
session_start();

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "my_database"; 

$conn = new mysqli($servername, $username, $password, $dbname);

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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <link rel="stylesheet" href="login.css">
    
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container">
    <h1>KOTSI</h1>
    <h3>Log In</h3>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Enter UserName" required><br>
        
        <label for="password">Password:</label>
        <div style="position: relative; width: 100%;">
            <input type="password" id="password" name="password" placeholder="Enter Password" required style="width: 85%; padding-right: 40px;">
            <i class="fas fa-eye" id="togglePassword" style="position: absolute; right: 10px; top: 40%; transform: translateY(-50%); cursor: pointer; font-size: 18px; color: #666;"></i>
        </div><br>

        <?php if (!empty($error_message)) :  ?>
            <div class="error-message">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <input type="submit" value="Login">
        <p>Don't have an account? <a href="create_account.php">Create one here</a>.</p>
    </form>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>
</body>
</html>
