<?php


$mysqli = require __DIR__ . "/database.php";


$sql = sprintf("SELECT * FROM Users
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["e-mail"]));
    
$result = $mysqli->query($sql);

$user = $result->fetch_assoc();

var_dump($_POST["password"]);
var_dump($user);
if ($user) {
        
    if (password_verify($_POST["password"], $user["password_hash"])) {
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["userid"];
            
            header("Location: index.php");
    }else{header("Location: hyrje.php");}
    
}else{
    header("Location: hyrje.php");
}


//Unejambaba123 metishehuu@gmail.com

//helloitsme123 