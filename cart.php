<?php
session_start();
$mysqli = require __DIR__ . "/database.php";
$userid=$_SESSION['user_id'];
$sql = sprintf("SELECT * FROM `Cart`  INNER JOIN BookS on Cart.bookid = BookS.id WHERE `userid` =  $userid");
$total=0;
$DS=0;



$result = $mysqli->query($sql);
require_once __DIR__ ."/Bookmaker.php";
//var_dump($result);
$CartList=[];
foreach ($result  as $books) {
  array_push($CartList,new Bookmaker($books['id'],$books['title'], $books['rating'], $books['qantaty'], $books['Text'],$books['LANGUAGE'],$books['Price'],$books['Publisher'],$books['pbdate'],$books['DS'],$books['img'],$books['sales']));
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
         <?php include "css/cart.css" ?>
    </style>
</head>
<body>


<main>
<div class="shopping-cart">
  <h1>Shopping Cart</h1>
  <?php
  for ($i = 0; $i < count($CartList); $i++) { 
    $CartList[$i]->give_cart();
    
    $total+=$CartList[$i]->getPrice() *$CartList[$i]->getQuantityInStock();
    $DS+=$CartList[$i]->getDS()*$CartList[$i]->getQuantityInStock();
  }
  ?>
    <div class="cart-total">
        <span>Subtotal (1 item):</span><span>$<?php echo $total;?></span>
    </div>
</div>

<div class="checkout">
    <div class="total">
        total (1 item): $<?php echo $total;?>
    </div>
    <div class="discount">
    discount (1 item): $<?php echo $DS;?>
  </div>

<div class="subtotal">
    Subtotal (1 item): $<?php echo $total-$DS;?>
  </div>
  <a href="deletcart.php?checkout=1"><button class="checkout-button">Proceed to checkout</button></a>
</div>
</main>
</body>
</html>