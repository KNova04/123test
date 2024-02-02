<?php
$mysqli = require __DIR__ . "/database.php";
$user=$_REQUEST['id'];
$sql = sprintf("SELECT * FROM `Conctact` WHERE usersid=$user");
$result = $mysqli->query($sql);
require_once __DIR__ ."/ContactMaker.php";
$CardList=[];
foreach ($result as $row){
    array_push( $CardList,new ContactCard($row['name'],$row['email'],$row['info']));
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    for ($i = 0; $i < count($CardList); $i++) {

        $CardList[$i]->giveHtml();
    }
    ?>

</body>
</html>