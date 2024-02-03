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
        <?php include "css/isadmin.css" ?>
    </style>
</head>
<body>
<div class="toggle-panel-btn" onclick="togglePanel()"><button>More</button></div>

<div class="panel" id="myPanel">

    <a href="logout.php"><button class="log-out">Log out</button></a>

</div>

<div class="table">
    <?php
    foreach ($users as $instance) {
        $instance->GiveCard();
    }
    ?>
</div>

<script>
    function togglePanel() {
    var panel = document.getElementById("myPanel");
    panel.classList.toggle("active");
}

</script>
</body>
</html>

