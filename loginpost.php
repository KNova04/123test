<?php


$mysqli = require __DIR__ . "/database.php";


$sql = sprintf("SELECT * FROM Users
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["e-mail"]));
    
$result = $mysqli->query($sql);

$user = $result->fetch_assoc();


if ($user) {
        
    if (password_verify($_POST["password"], $user["password_hash"])) {
            session_start();
            
            session_regenerate_id();
            $_SESSION["index"]=0;
            $_SESSION["user_id"] = $user["userid"];
            $_SESSION["user_isAdmin"]=$user["isadmin"];
            header("Location: index.php");
    }else{header("Location: hyrje.php");}
    
}else{
    header("Location: hyrje.php");
}




