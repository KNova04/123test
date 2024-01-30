<?php

session_start();
var_dump($_SESSION["user_id"]);
if(isset($_SESSION["user_id"])){
    if($_SESSION["user_isAdmin"]==1){header("Location: isadmin.php"); }
    else{
    header("Location: Home.php"); 
}
}
else{
   header("Location: hyrje.php");
}



