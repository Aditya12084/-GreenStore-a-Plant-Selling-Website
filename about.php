<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" style="border: radius 10px; overflow:hidden;" href="logo1.png" type="image/x-icon">
   
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Eczar&family=Montserrat:wght@500&family=Space+Grotesk&display=swap" rel="stylesheet">
<style>
      header{
            position: sticky;
      }
  </style>
</head>
<body>
<div class="topb">
    </div>
    <header>
        <div class="logo">
            <a href="index.php">
            <img src="logo1.png" alt="">
            </a>

        </div>

        <nav>
            <ul class="mainnav">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contactus.php">Contact us</a></li>
                <li><a href="productsearch.php">Plants</a></li>
                <li><a href="PlantBlog.php">Plantcare</a></li>
            </ul>

            <ul class="others">
                <li id="item1">
                    <a href="productsearch.php"><img src="search.png" alt="" id="img1" class="imgothers"></a>
                </li>
                <li id="item2">
                    <a href="Cartpage.php">
                   <img src="shopping-cart.png" alt="" id="img2" class="imgothers"></a>
                </li>
                <li id="item3">
                    <a href="<?php echo isset($_SESSION['userid']) ? 'Indacc.php':'Account.php';?>"><img src="user.png" alt="" id="img3" class="imgothers"></a>
                </li>
            </ul>

            <div class="hamburger" onclick="show()" id="hambu">
                <div class="bar" id="bar1"></div>
                <div class="bar" id="bar2"></div>
                <div class="bar" id="bar3"></div>
            </div>

        </nav>

        <div class="hamburgernav" id="hambunav">
            <ul align="Right">
                <li><a href="productsearch.php">Search</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contactus.php">Contact us</a></li>
                <li><a href="productsearch.php">Plants</a></li>

                <li><a href="Cartpage.php">Go to Cart</a></li>
                <li><a href="<?php echo isset($_SESSION['userid']) ? 'Indacc.php':'Account.php';?>">My Account</a></li>

            </ul>

        </div>

    </header>
    
    <div class="aboutinfo">
        <h1>About us</h1>
        <p >At GreenStore, we believe that greenery can transform your life. We are 
passionate about connecting people with nature and bringing the beauty of plants into your homes 
and workplaces. Our journey began with a simple idea  to make it easy and convenient for plant 
lovers to access a wide variety of plants and have them delivered right to their doorstep.</p>
    </div>
    
    <?php  include("footer.php");  ?>
   <script src="script.js"></script>
</body>
</html>