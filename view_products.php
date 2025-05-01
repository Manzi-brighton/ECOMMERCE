<?php
include 'includes/db.php';
include 'includes/footer.php';
include 'includes/header.php';
$result = $conn->query("SELECT * FROM products");
?>

<h2>All products</h2>
<div style="display: flex; flex_wrap: wrap;">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div style="border:1px solid #ccc; padding:10px; margin:10px; width: 200px;">
            <h3><?php echo $row['name']; ?></h3>
            <p><strong>$<?php echo $row['price']; ?></strong></p>
    </div>
    <?php } ?>
    </div>