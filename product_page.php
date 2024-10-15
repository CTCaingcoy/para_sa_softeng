<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$selected_color = isset($_GET['color']) ? $_GET['color'] : '';


$sql = "SELECT * FROM productsss";
if ($selected_color) {
    $sql .= " WHERE color = '" . $conn->real_escape_string($selected_color) . "'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding: 20px;
            background: url("https://images.unsplash.com/photo-1604147495798-57beb5d6af73?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2370&q=80");
            color: #333; 
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5em; 
            color: #fff; 
        }
        .filter-container {
            text-align: center;
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.8); 
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .filter-container select {
            padding: 10px;
            font-size: 1em;
            border: 1px solid #007bff; 
            border-radius: 5px; 
            background-color: #fff; 
            appearance: none; 
            cursor: pointer; 
            margin: 0 10px; 
            transition: border-color 0.3s; 
        }
        .filter-container select:hover {
            border-color: #0056b3; 
        }
        .filter-container label {
            font-weight: bold; 
            margin-right: 10px; 
        }
        .product-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); 
            gap: 50px; 
            padding: 20px;
            margin: 0 auto; 
            max-width: 1200px; 
            background: rgba(210, 180, 140, 0.8);
            border-radius: 10px; 
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); 
        }
        .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px; 
            text-align: center;
            background-color: #ddd; 
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); 
            transition: transform 0.2s, box-shadow 0.2s; 
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        .product-card:hover {
            transform: translateY(-5px); 
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2); 
        }
        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 10px; 
        }
        .product-card h3 {
            font-size: 1.5em; 
            margin: 10px 0;
            color: #007bff; 
        }
        .product-card p {
            margin: 5px 0;
            color: #666;
            font-size: 1.1em; 
        }
        .product-card .price {
            font-size: 1.3em;
            color: #e83e8c; 
            font-weight: bold;
        }
        .icon-btn {
            background-color: #007bff; 
            border: none; 
            color: white; 
            border-radius: 5px; 
            cursor: pointer; 
            font-size: 1.2em; 
            padding: 10px;
            margin: 5px 0; 
            transition: background-color 0.3s, transform 0.2s; 
        }
        .icon-btn:hover {
            background-color: #0056b3; 
            transform: scale(1.05); 
        }
        .icon-btn.wishlist {
            background-color: #dc3545; 
        }
        .icon-btn.wishlist:hover {
            background-color: #c82333; 
        }
    </style>
</head>
<body>

<h1>Kotsi</h1>


<div class="filter-container">
    <form method="GET" action="">
        <label for="color">Select Color:</label>
        <select name="color" id="color" onchange="this.form.submit()">
            <option value="">All Colors</option>
            <option value="red" <?= $selected_color === 'red' ? 'selected' : ''; ?>>Red</option>
            <option value="blue" <?= $selected_color === 'blue' ? 'selected' : ''; ?>>Blue</option>
            <option value="green" <?= $selected_color === 'green' ? 'selected' : ''; ?>>Green</option>
            <option value="yellow" <?= $selected_color === 'yellow' ? 'selected' : ''; ?>>Yellow</option>
            <option value="black" <?= $selected_color === 'black' ? 'selected' : ''; ?>>Black</option>
            <option value="white" <?= $selected_color === 'white' ? 'selected' : ''; ?>>White</option>
        </select>
    </form>
</div>

<div class="product-container">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="product-card">';
            echo '<a href="product_details.php?id=' . $row["id"] . '">';
            echo '<img src="' . $row["image_url"] . '" alt="' . $row["name"] . '">';
            echo '</a>';
            echo '<h3><a href="product_details.php?id=' . $row["id"] . '">' . $row["name"] . '</a></h3>';
            echo '<p class="price">₱ ' . number_format($row["price"], 2) . '</p>';
            echo '<p>Stock: ' . $row["availability"] . '</p>';
            echo '<button class="icon-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>';
            echo '</div>';
        }
    } else {
        echo "<p>No products available.</p>";
    }
    ?>
</div>

</body>
</html>

<?php
$conn->close();
?>
