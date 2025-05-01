<?php
include 'includes/db.php';
include 'includes/footer.php';
include 'includes/header.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    echo "user registered!";
}
?>

<form method="POST">
    username:<input type="text" name="username"><br>

    password:<input type="password" name="password"><br>

    <input type="submit" value="Register">
    <a href="login.php">LOGIN</a>

</form>