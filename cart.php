<?php
session_start();
include 'includes/db.php';
include 'includes/footer.php';
include 'includes/header.php';

if (isset($_GET['action']) && $_GET['action'] == 'add' && ! empty($_GET['id'])) {
    $id = (int) $_GET['id'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
        header("Location: cart.php");
    
}
echo"<h1>your cart</h1>";

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $qty) {
        $result = $conn->query("SELECT * FROM products WHERE id =$id");
        $products = $result->fetch_assoc();
    $products = "Apple iphone 15";
    $price = 1000;
    //change to actual price

    $quantity = 1;
    $subtotal = $price * $quantity;
    echo "<p>$products - Quantity: $quantity - subtotal: $ $subtotal</p>";
    }
    } else {
        echo"<p>cart is empty.</p>";
}

if (! empty($_SESSION['cart'])): 
?>

<br>
<form action="checkout.php" method="get">
    <button type="submit">proceed to checkout</button>
</form>

<?php endif;?>