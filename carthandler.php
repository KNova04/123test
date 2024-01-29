<?php


session_start();

$mysqli = require __DIR__ . "/database.php";
$sql = "INSERT INTO cart (userId, bookid, saleDate)
VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("iis",
                  $_SESSION['user_id'],
                  $_REQUEST['id'],
                  date("Y/m/d"));

if ($stmt->execute()) {
    echo "its working yay";
    header("Location: cart.php");
    exit;
}

