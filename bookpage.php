
<?php

session_start();

$mysqli = require __DIR__ . "/database.php";
$a=$_SESSION['Title'];
$sql = sprintf("SELECT * FROM `BookS` WHERE title ='The Great Gatsby'");
$result = $mysqli->query($sql);
$books = $result->fetch_assoc();
require_once __DIR__ ."/Bookmaker.php";
var_dump($_REQUEST["post"]);


$book=new Bookmaker($books['title'], $books['rating'], $books['quantity_in_stock'], $books['Text'],$books['LANGUAGE'],$books['Price'],$books['Publisher'],$books['pbdate'],$books['DS']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Details</title>
<link rel="stylesheet" href="css/bookpage.css">


</head>
<body>

<div class="book-container">
  <div class="book-cover">
    <img src="imgs/81WBPB-8ZmL.jpg" alt="5 Ingredients Mediterranean">
  </div>
  <div class="inter">

      <h1 class="book-title">5 Ingredients Mediterranean: Simple Incredible Food [American Measurements] Hardcover – January 23, 2024</h1>
    <p class="book-author">by Jamie Oliver</p>
    <div class="book-rating">
        ★★★★★     <?php echo $book->getRating(); ?>
    </div>
    <div class="book-metadata">
        <p><strong>Print length:</strong> <?php echo $book->getLength(); ?></p>
        <p><strong>Language:</strong> <?php echo $book->getLanguage(); ?></p>
        <p><strong>Publisher:</strong> <?php echo $book->getPushlisher(); ?></p>
        <p><strong>Publication date:</strong>  <?php echo $book->getPbdate(); ?></p>
    </div>
    <div  class="book-description">
        <p><?php echo $book->getText(); ?>
            </p>
    <!-- Add more descriptionhere -->
    </div>
  </div>
  <div class="product-card">
    <div class="product-header">
        <span class="original-price">$<?php echo $book->getPrice();?>.00</span>
        <span class="hardcover-price discounted">$<?php echo $book->getTots();?></span>
        <span class="kindle-price">$<?php echo $book->getDsPrice();?></span>
    </div>
    <div class="availability">
        <p>Available Instantly</p>
        <p><strong>Hardcover</strong></p>
    </div>
    <div class="buy-box">
        <div class="price-section">
            <span class="buy-new">Buy new:</span>
            <span class="new-price">$<?php echo $book->getDsPrice();?>.</span>
            <span class="list-price">List Price: <span class="price">$<?php echo $book->getPrice();?></span> (20%)</span>
        </div>
        <p class="delivery-details">Delivery Wednesday, February 8. Order within <strong>7 hrs 24 mins</strong></p>
        <div class="shipping-location">
            <span>Ship to Albania</span>
        </div>
        <div class="quantity-section">
            <label for="quantity">Quantity:</label>
            <select id="quantity" name="quantity">
                <option value="1" selected>1</option>
                <option value="2" selected>2</option>
                <option value="5" selected>5</option>
            </select>
        </div>
        <button class="add-to-cart-btn">Add to Cart</button>
        <button class="buy-now-btn">Buy Now</button>
    </div>
</div>


</div>

</body>
</html>