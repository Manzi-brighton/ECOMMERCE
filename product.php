<?php
session_start();
include 'includes/db.php';
include 'includes/footer.php';
include 'includes/header.php';

if (!isset($_GET['id'])){
    echo "product not found.";
    exit;
} 

$id = (int) $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);

//add this check

if (!$result){
    echo "Query Error: " . $conn->error;
    exit;
}

if($result->num_rows == 0){
    echo"product does not exist.";
    exit;
}
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php
                echo htmlspecialchars($product['name']);
                ?>
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php
            echo htmlspecialchars($product['name']);
        ?>
    </h1>
    <img src="photos/<?php echo htmlspecialchars($product['image']);?>" width="200">
    
    <p><?php echo htmlspecialchars($product['description']); ?></p>

    <P><strong>Price: $<?php echo $product['price']; ?></strong></p>

    <a href="cart.php? action=add&id=<?php echo $product['id']; ?>">Add to cart</a>
</body>
</html>