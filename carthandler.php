<?php


session_start();

$mysqli = require __DIR__ . "/database.php";


$sql = "INSERT INTO cart (userId, bookid, saleDate,qantaty)
VALUES (?, ?, ?,?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("iisi",
                  $_SESSION['user_id'],
                  $_REQUEST['id'],
                  date("Y/m/d"),
                   $_POST['quantity']);

if ($stmt->execute()) {
    echo "its working yay";
    header("Location: Home.php");
    exit;
}

