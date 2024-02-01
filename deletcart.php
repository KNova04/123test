<?php
session_start();    
$item=$_REQUEST["id"];
$user=$_SESSION['user_id'];
require_once __DIR__ ."/database.php";
//var_dump ($_REQUEST['checkout']);

if(isset($_REQUEST['checkout'])){
    
    
    $sql = " INSERT INTO Sales SELECT * FROM Cart WHERE userId=$user";
    $mysqli->query($sql);
    $sql = "DELETE  FROM cart WHERE userid=$user";
}else{
    $sql = "DELETE  FROM cart WHERE bookid = $item";
}


if ($mysqli->query($sql)) {
   printf("Table tutorials_tbl record deleted successfully.<br />");
 }





if(isset($_REQUEST["checkout"])){
    header("Location: Home.php");

}else{
    
    header("Location: cart.php");
}

