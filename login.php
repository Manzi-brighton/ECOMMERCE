<?php
include 'includes/db.php';
include 'includes/footer.php';
include 'includes/header.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $_SESSION['username'] = $username;
        header("Location:dashboard.php");
        exit();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            echo "login successfully";

        } else{
            echo "invalid password.";
        }
        $_SESSION['admin'] = $user['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "incorrect password.";

    }
}
?>

<form method="post">
    username: <input type="text" name="username"><br>
    password:<input type="password" name="password"><br>
                <input type="submit" value="Login">
</form>