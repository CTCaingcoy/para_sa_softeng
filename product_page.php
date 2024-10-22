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
$selected_color = isset($_GET['color']) ? $conn->real_escape_string($_GET['color']) : '';
$selected_category = isset($_GET['category']) ? $conn->real_escape_string($_GET['category']) : '';
$sort_option = isset($_GET['sort']) ? $conn->real_escape_string($_GET['sort']) : '';

$sql = "SELECT * FROM productsss WHERE 1=1";

if ($search_query) {
    $sql .= " AND name LIKE '%$search_query%'";
}

if ($selected_color) {
    $sql .= " AND color = '" . $conn->real_escape_string($selected_color) . "'";
}

if ($selected_category) {
    $sql .= " AND category = '" . $conn->real_escape_string($selected_category) . "'";
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

        <div class="search-bar-container" id="mobileSearchBar">

            <form method="GET" action="">
                <input type="text" name="search" placeholder="Search products...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        
            <!-- <div class="cart-icon" style="margin-left: 10px;">
                <a href="#cart"><i class="fas fa-shopping-cart"></i></a>
            </div> -->


        <div class="hamburger" onclick="toggleMenu()">
            &#9776;
            <!-- <span>Add to cart</span> -->
        </div>

        <ul class="navbar-links" id="navbarLinks">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="#contact">Contact</a></li>
            <!-- <li class="add-to-cart"><a href="#cart">Add to Cart</a></li> -->
        </ul>

        <!-- <div id="hamburgerMenu" style="display:none;">
            <ul>
                <li><a href="#cart"><i class="fas fa-shopping-cart"></i></a></li> 
            </ul>
        </div> -->


        <!-- <div class="hamburger" onclick="toggleMenu()">
            &#9776; <span>Add to Cart</span>
        </div> -->

        <!-- <div class="hamburger-menu" id="hamburgerMenu" style="display: none;">
            <ul>
                <li><a href="#cart">Add to Cart</a></li>
            </ul>
        </div> -->
        <!-- <div class="add-to-cart-link">
            <button>Add to Cart</button>
        </div> -->

        <!-- Search bar for desktop -->
        <div class="navbar-icons">
            <form class="search-bar" method="GET" action="">
                <input type="text" name="search" placeholder="Search products...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
            <div class="cart-icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
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
                <option value="Race Car" <?= $selected_category === 'Race Car' ? 'selected' : ''; ?>>Race Car</option>
                <option value="Truck" <?= $selected_category === 'Truck' ? 'selected' : ''; ?>>Truck</option>
                <option value="Muscle Car" <?= $selected_category === 'Muscle Car' ? 'selected' : ''; ?>>Muscle Car</option>
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
            echo '<p class="stock">Stock: ' . $row["availability"] . '</p>';
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

    <script>
        function toggleMenu() {
        console.log("Hamburger menu clicked"); // Add this line
        const navbarLinks = document.querySelector('.navbar-links');
        const mobileSearchBar = document.getElementById('mobileSearchBar');
        

        navbarLinks.classList.toggle('active');

        if (navbarLinks.classList.contains('active')) {
            mobileSearchBar.style.display = 'none';
        } else {
            mobileSearchBar.style.display = 'block';
        }
    }
    </script>
</body>
</html> 

<?php
$conn->close();
?>
