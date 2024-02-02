<?php
$mysqli = require __DIR__ . "/database.php";
$sql = sprintf("SELECT * FROM `Users`");

$result = $mysqli->query($sql);
require_once __DIR__ ."/usermaker.php";
$users=[];
foreach ($result  as $value) {
  array_push($users,new Users($value['userid'],$value['name'],$value['email'],$value['isadmin'],$value['age'],$value['Contacted']));
}

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .tabel{display: flex; background-color: gray;flex-direction: column; justify-content: space-evenly;}
        .editter_button{width: 100; border-radius: 10px;}
        .card{display: flex;}
    </style>
</head>
<body>
<button class="Log-in"><a href="logout.php">Log out</a></button>
<div class="tabel">

<?php

foreach ($users  as $instance) {
    $instance->GiveCard();
}

?>
</div>
</body>
</html>