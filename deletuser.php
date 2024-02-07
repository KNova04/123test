<?php
$user=$_REQUEST["id"];
echo $item;

require_once __DIR__ ."/database.php";
$sql = "DELETE  FROM Users WHERE userid=$user";

 if ($mysqli->query($sql)) {
    printf("Table tutorials_tbl record deleted successfully.<br />");
  }
 
 
 
 

 
header("Location: isadmin.php");

