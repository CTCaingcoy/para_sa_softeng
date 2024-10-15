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

$error_message = ""; // Initialize the error message variable   

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submitted_username = $_POST['username'];
    $submitted_password = $_POST['password']; 

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $submitted_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $hashed_password = $user['password'];

        if (password_verify($submitted_password, $hashed_password)) {
            $_SESSION['username'] = $user['username'];
            header("Location: productsss.php");
            exit();
        } else {
            $error_message = "Invalid password. Please try again."; // Set error message
        }
    } else {
        $error_message = "No account found with that username."; // Set error message
    }
    $stmt->close(); // Close the statement
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        background-image: url('bg_login.png'); /* Add your image path here */
        background-size: cover; /* Ensures the image covers the entire background */
        background-position: center; /* Centers the background image */
        background-repeat: no-repeat; /* Prevents the image from repeating */
        margin: 0;
        padding: 20px;
        }
        h2 {
            color: #333;
        }
        .container {
            max-width: 300px;
            margin: 150px auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 20px;
            text-align: center;
            color: white;
        }
        .container h2 {
            margin-bottom: 0px;
            font-family: 'trajan Pro';
            color: white;
            font-size: 50px;
        }
        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: white;
            text-align: left;
        }
        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 30px;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 300px;
            cursor: pointer;
            font-size: 16px;
            width: 300px;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        p {
            margin-top: 15px;
            color: white;
        }
        p a {
            color: #7F00FF;
            text-decoration: underline;
        }
        .error-message {
            color: red; 
            height: 20px;
            margin: 10px 0; 
        }
    </style>
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container">
    <h2>Log In</h2>
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
