<?php
session_start();
$bookslist=[];
$show=true;
$mysqli = require __DIR__ . "/database.php";
if(isset($_REQUEST["search"])){
  $search = $_REQUEST["search"];


  $sql = sprintf("SELECT * FROM `Books` WHERE title = '$search'");
  $result = $mysqli->query($sql);
  
  if(!$result || $result->num_rows == 0){
    $sql = sprintf("SELECT * FROM `BookS` ORDER BY sales DESC");
    $result = $mysqli->query($sql);
  }else{$show=false;}
}else{
  $sql = sprintf("SELECT * FROM `BookS` ");
}

$result = $mysqli->query($sql);
$range=$_SESSION['index'];

require_once __DIR__ ."/Bookmaker.php";


$plus='a';
foreach ($result  as $value) {
  array_push($bookslist,new Bookmaker($value['id'],$value['title'], $value['rating'], $value['quantity_in_stock'], $value['Text'],null,null,null,null,null,$value['img'],null));
}
$max=count($bookslist);

?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    <?php include "css/Home.css" ?>
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
                <li><a href="contact.html">Books</a></li>
                <li><a href="#about">Fiction</a></li>
                <li><a href="#services">Nonfiction</a></li>
                <li><a href="#contact">eBooks</a></li>
                <li><a href="#home">Audiobooks</a></li>
                <li><a href="#about">Teens & YA</a></li>
                <li><a href="#services">Kids</a></li>              
            </ul>
        </nav>
</header>
</div>

<!-- <div class="mainbooks" style="width: 160px; ">
            <img class="s "id="1"src="imgs/English_Harry_Potter_7_Epub_9781781100264.jpg" alt="decentbook">
            <h5> Title</h5>
            <p > DESCRIPTION </p>
          </div>
-->
<main>
    
        <div class="mainpart" style=" justify-content: space-around; display: flex;  flex-wrap: wrap;">
        <?php
          $checker=$max-$range;
          if($checker>10){


         for ($i = $range; $i < $range+10; $i++) {
            $bookslist[$i]->give_html(); 
            
          }
        }else{

            for ($i = $range; $i < $range+$checker; $i++) {
              $bookslist[$i]->give_html(); 
            }
          }
         
          ?>
        </div>

<?php if($show): ?>
  <div class="bow">
    
    <?php
    for ($i = 0; $i < 3; $i++ ) {
    $bookslist[$i]->give_html();
    }
      ?>

  </div>
  

  <div class="und"> <?php
  
  echo "<a href='sessionhandler.php?max=$max&opt=p'><button>prev</button></a>";
  for ($i = 0; $i < count($bookslist); $i+=10 ) {
    $count=$i/10;
    echo "<a href='sessionhandler.php?max=$i&opt=go'><button>{$count}</button></a>";

  }
  echo "<a href='sessionhandler.php?max=$max&opt=n'><button>next</button></a>";
  ?>
  </div>
  
</div>
<?php else: ?>
<?php endif; ?>
   

</div>
</main>

</div>

<footer>
    <div class="footer-content">
      <div class="footer-section about">
       <a href="About.php"><h3>About Us</h3></a> 
        <p>Anton Book-Store...</p>
      </div>
      <div class="footer-section contact">
       <a href="contact.php"><h3>Contact Us</h3></a> 
        <p>Email: anton@books.com</p>
        <p>Phone: +1 123 456 7890</p>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2024 Anton Book-Store. All rights reserved.</p>
    </div>
  </footer>


</body>
<script>




let currentImage = 0 
const totalImages = 2 
let a=['imgs/English_Harry_Potter_7_Epub_9781781100264.jpg',"imgs/they-both-die-at-the-end-9781471166204_hr.jpg","imgs/PERCY-CHALICE-FINALcover2.21-final.jpg"]
function changeImage(direction) {
    currentImage += direction;

    if (currentImage > totalImages) {
        currentImage = 0;
    } else if (currentImage < 0){
        currentImage = totalImages;
    }
    for(let i=1;i<=4;i++){
    const imageElement1= document.getElementById(i);
    imageElement1.src =a[currentImage];
}

}

</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
function myFunction() {
  fetch('/Applications/XAMPP/xamppfiles/htdocs/Book-Store/script.php')
    .then(response => response.text())
    .then(data => {
      console.log(data);
    });
}


</script>
</html>



</body>
</html>