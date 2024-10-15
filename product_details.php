<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_id = $_GET['id'];

$sql = "SELECT * FROM productsss WHERE id = $product_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        .product-details {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .product-details img {
            width: 50%;
            height: auto;
            border-radius: 10px;
            margin-left: 20px;
        }
        .product-details h2 {
            color: #333;
            display: flex;
            text-align: center;
        }
        .product-details p {
            color: #666;
        }
        .icon {
            font-size: 1.5em;
            margin: 5px;
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>

<h1>Product Details</h1>
<div class="product-details">
    <?php
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<img src="' . $row["image_url"] . '" alt="' . $row["name"] . '">';
        echo '<div>';
        echo '<h2>' . $row["name"] . '</h2>';
        echo '<p>Price: ₱ ' . number_format($row["price"], 2) . '</p>';
        echo '<p>Color: ' . $row["color"] . '</p>';
        echo '<p>Year: ' . $row["year"] . '</p>';
        echo '<p>Stock: ' . $row["availability"] . '</p>';
        echo '<a href="add_to_cart.php?id=' . $row["id"] . '" class="icon"><i class="fas fa-cart-plus"></i></a>';
        echo '<a href="add_to_wishlist.php?id=' . $row["id"] . '" class="icon"><i class="fas fa-heart"></i></a>';
        echo '</div>';
    } else {
        echo "<p>Product not found.</p>";
    }
    ?>
</div>

</body>
</html>

<?php
$conn->close();
?>
