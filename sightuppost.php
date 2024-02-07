<?php

if (empty($_POST["Name"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["e-mail"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["confirmPassord"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO Users (name,password_hash,email)
VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["Name"],
                  $password_hash,
                  $_POST["e-mail"]);
                  
if ($stmt->execute()) {
    echo "its working yay";
    session_start();
            
    session_regenerate_id();
    $_SESSION["index"]=0;
    $_SESSION["user_id"] = $user["userid"];
    $_SESSION["user_isAdmin"]=$user["isadmin"];
    header("Location: index.php");
    header("Location: Home.php");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}




