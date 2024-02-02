<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-Antn</title>
    
    <style>
        <?php include "css/Home.css" ?>
    </style>
</head>
<body>
    <header>
        <div class="topnav">
            <a href="Home.php"><img src="imgs/booklogo.png"   alt=""></a>
            <h2>Books with Anton</h2>
            
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
    <div class="dd">
        <input type="text" 
        style="margin-top: 20px;" class="entryfiled" 
         name="Name" placeholder="Name" id="name">
         <input type="text" 
        style="margin-top: 20px;" class="entryfiled" 
         name="E-mail" placeholder="E-mail" id="name">
         <br>
        <textarea  style="resize: none;" id="text" name="text" rows="5" cols="60"></textarea>
        <br>
        <button type="submit" id="sub">Submit</button>
    </div>

    <footer style="position: relative; top: 459px;">
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
</html>