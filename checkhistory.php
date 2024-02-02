<?php
$mysqli = require __DIR__ . "/database.php";
$user=$_REQUEST['name'];
$sql = sprintf("SELECT * FROM Users INNER JOIN Sales ON Users.userid  = Sales.userId INNER JOIN BookS ON Sales.bookid = BookS.id WHERE name ='$user' ORDER BY Sales.saleDate DESC");
$result = $mysqli->query($sql);
require_once __DIR__ ."/editoreMaker.php";
$editorlist=[];
$time=0;
foreach ($result as $row){
    array_push( $editorlist,new editoer($row['saleDate'],$row['title'],$row['Price'],$row['quantity']));
    
}
if(count($editorlist)> 0){
  $time=$editorlist[0]->get_Date();
}else{$time=0;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>


table {
    margin-left: 35%;
  border-collapse: collapse;
}

th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: center;
}

th {
  background-color: #f2f2f2;
}

tr:nth-child(even) {
  background-color: #f9f9f9;
}

tr:hover {
  background-color: #f1f1f1;
}

.highlighted {
  background-color: yellow;
}


  </style>
</head>
<body>

  <table>
    <tr>
      <th>title</th>
      <th>saleDate</th>
      <th>Price </th>
      <th>quantity</th>
    </tr>
    <?php 
        for ($i = 0; $i < count($editorlist); $i++) {
            if($editorlist[$i]->get_Date()!=$time){
                $editorlist[$i]->specrateHtml();
                $time=$editorlist[$i]->get_Date();
            }
                $editorlist[$i]->giveHtml();
            
        }
    ?>
  </table>
</body>
</html>