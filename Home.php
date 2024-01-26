<?php
session_start();

$mysqli = require __DIR__ . "/database.php";

$a=$_REQUEST['data'];
$sql = sprintf("SELECT * FROM `BookS`");
$result = $mysqli->query($sql);
require_once __DIR__ ."/Bookmaker.php";
$bookslist=[];
foreach ($result  as $value) {
  // $arr[3] will be updated with each value from $arr...
  array_push($bookslist,new Bookmaker($value['title'], $value['rating'], $value['quantity_in_stock'], $value['Text'],null,null,null,null,null,$value['img']));
}
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/Home.css">
</head>
<body>
    <header>
        <div class="topnav">
            <img src="imgs/booklogo.png"   alt="">
            <h2>Books with Anton</h2>
            <input type="text" placeholder="Search..">
            <button class="Search">
              <ion-icon name="search-outline">
            </ion-icon></button>
            <button class="cart">
              <ion-icon name="cart-outline">
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
          for ($i = 0; $i < count($bookslist); $i++) {
            $bookslist[$i]->give_html(); 
          }
          ?>
        </div>
        <button onclick="myFunction()">Click me</button>
        <a href="/bookpage.php">hello</a>
        <button><a href="bookpage.php?data=The Great Gatsby">Log out</a></button>
          
    <div class="bow">
        <button class="prev" onclick="changeImage(-1)">&#10094;</button>
        <div class="slider">
          <div class="slids" style="width: 160px; margin-left:20px;">
          <a href="script.php?data=The Great Gatsby"><img class="s "id="1"src="imgs/English_Harry_Potter_7_Epub_9781781100264.jpg" alt="decentbook"></a>
            <h5> Title</h5>
            <p > DESCRIPTION </p>
          </div>
          <div class="slids">
            <img id="2"src="imgs/English_Harry_Potter_7_Epub_9781781100264.jpg" alt="decentbook" >
            <h5> Title</h5>
            <p > DESCRIPTION </p>
          </div>
          <div class="slids">
            <img id="3"src="imgs/English_Harry_Potter_7_Epub_9781781100264.jpg" alt="decentbook" >
            <h5> Title</h5>
            <p > DESCRIPTION </p>
          </div>
          <div class="slids">
            <img id="4"src="imgs/English_Harry_Potter_7_Epub_9781781100264.jpg" alt="decentbook" >
            <h5> title</h5>
            <p > DESCRIPTION </p>
          </div>
          <div class="slids">
            <a href="twitter.com"><img id="5"src="imgs/English_Harry_Potter_7_Epub_9781781100264.jpg" alt="decentbook" ></a>
            <h5> Title</h5>
            <p > DESCRIPTION </p>
          </div>
          <div class="slids">
            <img id="5"src="imgs/English_Harry_Potter_7_Epub_9781781100264.jpg" alt="decentbook" >
            <h5> Title</h5>
            <p > DESCRIPTION </p>
          </div>
        </div>
        <button class="next" onclick="changeImage(1)">&#10095;</button>
    </div>
        

    </div>
</main>

</div>



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
    for(let i=1;i<=5;i++){
    const imageElement1= document.getElementById(""+i);
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