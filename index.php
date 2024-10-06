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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; 

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $hashed_password = $user['password'];

        if (password_verify(password: $password, hash: $hashed_password)) {
            $_SESSION['username'] = $user['username'];
            header(header: "Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
        echo "No account found with that username.";
    }
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
            background: url('bga.jpg');
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
            /* max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
        }

        .container h2 {
            margin-bottom: 10px;
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
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
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
    </style>
</head>
<body>
<div class="container">
    <h2>Log In</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Enter UserName" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter Password" required><br>
        <input type="submit" value="Login">
        <p>Don't have an account? <a href="create_account.php">Create one here</a>.</p>
    </form>
</div>
</body>

</html>
