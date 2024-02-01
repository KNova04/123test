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
<header>
        <div class="topnav">
            <img src="imgs/booklogo.png"   alt="">
            <h2>Books with Anton</h2>
            <form action="Home.php" method="post">
            <input type="text"  name='search' placeholder="Search..">
            <button class="Search">
              <ion-icon name="search-outline">
            </ion-icon></button>
            </form>
            <button class="cart">
              <a href="cart.php"><ion-icon name="cart-outline"></a>
            </ion-icon></button>
            <button class="Log-in"><a href="logout.php">Log out</a></button>
          </div>
        <nav>
            <ul>
                <li><a href="#home">Books</a></li>
                <li><a href="#about">Fiction</a></li>
                <li><a href="#services">Nonfiction</a></li>
                <li><a href="#contact">eBooks</a></li>
                <li><a href="#home">Audiobooks</a></li>
                <li><a href="#about">Teens & YA</a></li>
                <li><a href="#services">Kids</a></li>              
            </ul>
        </nav>
</div>
</header>


<main>
1<div class="shopping-cart">
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
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>