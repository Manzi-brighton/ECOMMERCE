<?php
session_start();
include 'includes/db.php';
include 'includes/footer.php';
include 'includes/header.php';

//check if cart is empty

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$cart = $_SESSION['cart'];
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>check out</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style> table {
        width: 70%;
        margin: auto;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
    }
    th {
        background-color: #eee;
    }
    .total {
        font-weight: bold;
    }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Checkout</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>product</th>
            <th>Price</th>
            <th>qty</th>
            <th>subtotal</th>
        </tr>

        <?php if (!empty($cart)): ?>
            <?php foreach ($cart as $item): ?>
                <?php if (is_array($item) && isset($item['name'], $item['price'], $item['qty'])) {
                    $subtotal = $item['price'] * $item['qty'];
                    $total  += $subtotal;

                    ?>
                    <tr>
                        <td>
                            <td><?php
                            
                            echo htmlspecialchars($item['name']);
                ?>
            </td>
            <td>$<?php echo number_format($item['price'],2); ?>
            </td>

            <td><?php echo $item['qty']; ?></td>
            <td>$<?php echo number_format($subtotal, 2); ?></td>
        </tr>
<?php } ?>
        <?php endforeach; ?>
        <?php else: ?>

        <tr>
            <td colspan="4" > your cart is empty</td>
        </tr>
        <?php endif; ?>
            <tr><td colspan="3" class="total"><strong>$<?php echo number_format($total, 2); ?></strong></td>
        </tr>
        </table>

        <br>
        <form method="post">
            <button type="submit" name="place_order">place order</button>
        </form>

        <?php
        if (isset($_POST['place_order'])){
            //simulate saving order(you can insert into db here)

            echo"<p>THANK YOU FOR YOUR PURCHASE!</>";

            //clear cart

            unset($_SESSION['cart']);
    
        }

        ?>
</body>
</html>