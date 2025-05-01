<?php
include 'includes/db.php';
include 'includes/footer.php';
include 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SHOP HOME</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>products</h1>
    <?php
    $result = $conn->query("SELECT * FROM products");

    while ($row = $result->fetch_assoc()) {
        echo"<div>";
        echo"<img src=images/" . $row['image'] ."' width='100'/>";
        echo"<h2>" . $row['name'] . "<h2>";
        echo"<p>$" . $row['price'] . "</p>";
        echo"<a href='cart.php? action=add&id=" . $row['id'] . "'>Add to cart</a>";
        echo "</div>";
    
    }
    ?>
</body>
</html>