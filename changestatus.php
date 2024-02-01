<?php
session_start();
$state=$_REQUEST['state'];
$user=$_REQUEST['id'];
if($state== 0){
    $state=1;
}else{$state=0;}

require_once __DIR__ ."/database.php";

$sql = "UPDATE Users SET isadmin=$state WHERE userid=$user";

if ($mysqli->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $mysqli->error;
}
echo $user;
echo $_SESSION['user_id'];
if($user==$_SESSION['user_id']){

    header("Location: hyrje.php");
}else{

    header("Location: isadmin.php");
}

$mysqli->close();

