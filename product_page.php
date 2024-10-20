<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search_query = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$selected_color = isset($_GET['color']) ? $_GET['color'] : '';
$selected_category = isset($_GET['category']) ? $conn->real_escape_string($_GET['category']) : '';
$sort_option = isset($_GET['sort']) ? $_GET['sort'] : '';

$sql = "SELECT * FROM productsss WHERE 1=1";

if ($search_query) {
    $sql .= " AND name LIKE '%$search_query%'";
}

if ($selected_color) {
    $sql .= " AND color = '" . $conn->real_escape_string($selected_color) . "'";
}

if ($selected_category) {
    $sql .= " AND category = '" . $selected_category . "'";
}

switch ($sort_option) {
    case 'name_asc':
        $sql .= " ORDER BY name ASC";
        break;
    case 'name_desc':
        $sql .= " ORDER BY name DESC";
        break;
    case 'price_asc':
        $sql .= " ORDER BY price ASC";
        break;
    case 'price_desc':
        $sql .= " ORDER BY price DESC";
        break;
    default:
        break;
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="productses.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="login.php" class="navbar-logo">
                <img src="https://res.cloudinary.com/dw44z8kbk/image/upload/v1729222127/logo_a9uec9.png" alt="Logo">
            </a>

            <ul class="navbar-links">
                <li><a href="#">Homes</a></li>
                <li><a href="product_page.php">Products</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About</a></li>
            </ul>

            <div class="navbar-icons">
                <form class="search-bar" method="GET" action="">
                    <input type="text" name="search" placeholder="Search products..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
                <a href="#" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
    </nav>

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

            <label for="category">Select Category:</label>
            <select name="category" id="category" onchange="this.form.submit()">
                <option value="">All Categories</option>
                <option value="Race Car" <?= isset($_GET['category']) && $_GET['category'] === 'Race Car' ? 'selected' : ''; ?>>Race car</option>
                <option value="Truck" <?= isset($_GET['category']) && $_GET['category'] === 'Truck' ? 'selected' : ''; ?>>Trucks</option>
                <option value="Muscle Car" <?= isset($_GET['category']) && $_GET['category'] === 'Muscle Car' ? 'selected' : ''; ?>>Muscle Car</option>
            </select>

            <label for="sort">Sort By:</label>
            <select name="sort" id="sort" onchange="this.form.submit()">
                <option value="">Sort By</option>
                <option value="name_asc" <?= isset($_GET['sort']) && $_GET['sort'] === 'name_asc' ? 'selected' : ''; ?>>Name (A-Z)</option>
                <option value="name_desc" <?= isset($_GET['sort']) && $_GET['sort'] === 'name_desc' ? 'selected' : ''; ?>>Name (Z-A)</option>
                <option value="price_asc" <?= isset($_GET['sort']) && $_GET['sort'] === 'price_asc' ? 'selected' : ''; ?>>Price (Low to High)</option>
                <option value="price_desc" <?= isset($_GET['sort']) && $_GET['sort'] === 'price_desc' ? 'selected' : ''; ?>>Price (High to Low)</option>
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
            echo '<div class="product-details">';
            echo '<div class="product-text">';
            echo '<h3><a href="product_details.php?id=' . $row["id"] . '">' . $row["name"] . '</a></h3>';
            echo '<p class="price">₱ ' . number_format($row["price"], 2) . '</p>';
            echo '<p>Stock: ' . $row["availability"] . '</p>';
            echo '</div>';
            echo '<div class="cart-icons">';
            echo '<i class="fas fa-cart-plus"></i>';
            echo '</div>';
            echo '</div>';
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
