<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Welcome, <?php echo $_SESSION['admin']; ?>!</h2>
<a href="add_product.php">Add Product</a>
<a href="view_products.php">View products</a>
<a href="logout.php">Logout</a>