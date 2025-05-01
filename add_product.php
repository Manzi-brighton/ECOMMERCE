<?php
include 'includes/db.php';
include 'includes/footer.php';
include 'includes/header.php';

//sample real product data

$products = [ ["apple iphone 15", 999.99, "the latest iphone with A17 chip and improved camera."],
["samsung Galaxy S24", 899.99, "Flagship Android phone with 120Hz display and triple camera."], 
["sony WH-1000XM5 Headphones", 349.99, "industry-leading noise canceling over-ear headphones."],
["Dell XPS 13 Laptop", 1249.99, "13-inch ultra-portable laptop with intel i7 and 16GB RAM."],
["NIke Air Max 270", 149.99, "comfortable and stylish running shoes from Nike."],
["Fossil Men's Leather wallet", 39.99, "Genuine leather Wallet with RFID blocking."],
["LOgitech MX Master 3S MOuse", 99.9, "ergonomic Wireless mouse for productivity and design."]
];

//insert each product

foreach ($products as $p) {
    $stmt = $conn->prepare("INSERT INTO products (name, price, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $p[0], $p[1], $p[2]);
    $stmt->execute();
}

    echo "products inserted successfully!";

?>