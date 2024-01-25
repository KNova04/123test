<?php

session_start();
var_dump($_SESSION["user_id"]);
if(isset($_SESSION["user_id"])){
    header("Location: Home.php"); 
}
else{
   header("Location: hyrje.php");
}



?>