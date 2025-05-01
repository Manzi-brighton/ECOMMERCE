<?php
session_start();
session_destroy();
if (!isset($_SESSION['user-id'])) {
    header("Location: login.php");
    exit;
}
?>