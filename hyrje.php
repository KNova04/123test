<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Hyrje.css">
    <style>
        body{
            background: url(imgs/books.jpeg);
            background-position: center;
            background-size: cover;
            position: relative;
        }
    </style>


</head>
    <body>

    <header>
        <h2 class="lg"><img src="imgs/booklogo.png" alt="">
            "Unlocking Worlds, One Page at a Time –
             Your Online Haven for Endless Stories!"</h2>
        <nav class="nav">
            <a href="#">Home</a>
            <a href="About.html">About Us</a>
            <a href="contact.html">Contact</a>
            <button class="Log-in">Log-in</button>
        </nav>
    </header>
    <main>
        <div class="box">
            <span class="close"><ion-icon 
                name="close"></ion-icon></span>
        <div class="Login">
        <form action ="loginpost.php" method="post">
            <h2>Log-in</h2>
    
            <input type="text" name="e-mail" 
            id="email" class="entryfiled" placeholder="e-mail">
            <div class="error-message" id="emailError"></div>
    
            <input type="password" name="password" 
            class="entryfiled" placeholder="password" 
            id="password"> 
           <div class="remembr-forgot">
            <label><input type="checkbox">
            Remember me</label>
            <a href="#" style="margin-left: 25px;">Forgot Password?</a>
           </div>
                <button type="submit" class="Log" onclick="validateForm()">Log-in</button>
                <div class="register">
                    <p>Don't have an account? <a href="#">
                        Register
                    </a></p>
                </div>
            </form>

        </div>




     <form class="sign" action ="sightuppost.php" method="post">

        <h2>Sign-in</h2>
        
        <input type="text" 
        style="margin-top: 20px;" class="entryfiled" 
         name="Name" placeholder="Username" id="name">
        <div class="error-message" id="nameError"></div>

        <input type="text" name="e-mail" 
        id="email" class="entryfiled" placeholder="e-mail">
        <div class="error-message" id="emailError"></div>

        <input type="password" name="password" 
        class="entryfiled" placeholder="password" 
        id="password">
       
        <input type="password" name="confirmPassord" 
        class="entryfiled" id="confirmPassord" 
        placeholder="Confirm your password">

        <label style="color:rgb(0, 0, 0); margin-top: 10px;">
            <input type="checkbox" >
            I agree to the tearms and conditions
        </label>
            <button class="Sign-in" onclick="validateForm()">Sign-in</button>
         <div class="Loginlink">
            <p>Already have an account? <a href="#">
                Log-in
            </a></p>
        </div>

    </from>
         

        

    </main>
    <script src="SHyrje.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    </body>
</html>
