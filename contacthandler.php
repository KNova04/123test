<?php
session_start();
var_dump($_REQUEST);

$mysqli = require __DIR__ . "/database.php";

$user=$_SESSION['user_id'];
$sql = "INSERT INTO Conctact (usersid, name, email,info)
VALUES (?, ?, ?,?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("isss",
                  $_SESSION['user_id'],
                  $_POST['Name'],
                  $_POST['E-mail'],
                   $_POST['text']);
$sql ="UPDATE `Users` SET `Contacted`=1 WHERE userid=$user";
$mysqli->query($sql);
if ($stmt->execute()) {
    echo "its working yay";
    header("Location: Home.php");
    exit;
}

