<?php

session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="shortcut icon" style="border: radius 10px; overflow:hidden;" href="logo1.png" type="image/x-icon">
   
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
            <img src="logo1.png" alt=""></a>

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
                    <a href="Cartpage.php"><img src="shopping-cart.png" alt="" id="img2" class="imgothers"
                            onclick="opencart()"></a>
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






    <div class="contactbar">
        <h1>Contact Us</h1>
        <p>We're thrilled that you want to get in touch with us at GreenStore. We're here to make sure your plant journey is as smooth as the leaves on your favorite houseplant. Whether you have questions, need assistance, we're here!!</p>
    </div>

    <div class="contactbox">
        <div class="coninfo">
            <div>
                <h3>Address</h3>
                <div class="coninfo_cont">
                    <img src="icons8-address-16.png" alt="" id="contimg1">
                <p>Shiv Shakti Rahiwashi Manadal, Jai Jawan Nagar, Rajendra Nagar, Borivali (E) Mumbai, Maharashtra 400066</p>
                </div>
              
            </div>
            <div><h3>Phone</h3>
                 <div class="coninfo_cont">
                <img src="icons8-phone-50.png" alt="">
                 <p>+91-9324210559</p></div>
                 </div>
               
            <div>
                <h3>Email</h3>
               <div class="coninfo_cont">
                <img src="icons8-email-50.png" alt="">
               <p>greenstore1@gmail.com</p>
               </div>
               </div>
        </div>
        <div class="conform">
            <form action="Upload.php" method="post">
                <h2>Send Message</h2>
                <div class="conform_fields" >
                    <input type="text" name="conname" id="conname" placeholder="Enter your name" required >
                </div>
                <div class="conform_fields" >
                <input type="text" name="conemail" id="conemail"  placeholder="Enter your email" required >
                </div>
                <div class="conform_fields" >
                    <textarea name="conmessage" id="conmessage" cols="30" rows="10" placeholder="Type your Message" required ></textarea>
                </div>
                <div class="conform_btn">
                <input type="submit" value="Send" name="conbtn" onclick="return validatecont()">
                </div>
            </form>
        </div>
    </div>


    <footer>
        <div class="row">
            
            <div class="footcol" id="col1">
            
                <h2>About us</h2>
                <hr class="foothead" align="left">
                <p>This The E-Nursery Website to Buy and Order Plants online</p>
            </div>
            <div class="footcol" id="col3">
                <h2>Products categories</h2>
                <form action="productsearch.php" method="post">
                <hr class="foothead" align="left" >
                <p><button type="submit" name="indoorplantbtn">House Plants</button></p>
                <hr>
                <p><button type="submit" name="outdoorplantbtn" >Outdoor Plants</button></p>
                <hr>
                <p><button type="submit" name="officeplantbtn" >Office plants</button></p>
                <hr>
                </form>

            </div>
            <div class="footcol" id="col4">
                <h2>On-sale Products</h2>
                <hr class="foothead" align="left">
                <div class="onsale_prodcont">
                    <div class="onsale_prod">
                        <div class="onsaleprod_disc">
                            <h4>Monstera Deliciosa Plant</h4>
                            <div class="onsaleprod_pp">
                            <del>₹523.00</del>
                            <h4>From ₹350</h4>
                            </div>
                            
                        </div>
                        <div class="onsaleprod_img">
                            <img src="monstera-deliciosa-plant-pot (1).jpg" alt="">
                        </div>
                    </div>
                    
                </div>
                <hr>
                <div class="onsale_prodcont">
                    <div class="onsale_prod">
                        <div class="onsaleprod_disc">
                            <h4>Pepper Face Plant</h4>
                            <div class="onsaleprod_pp">
                            <del>₹423.00</del>
                            <h4>From ₹300</h4>
                            </div>
                            
                        </div>
                        <div class="onsaleprod_img">
                            <img src="pepper-face-plant-small-pot.jpg" alt="">
                        </div>
                    </div>
                    
                </div>
                <hr>
                <div class="onsale_prodcont">
                    <div class="onsale_prod">
                        <div class="onsaleprod_disc">
                            <h4>Mango Plant</h4>
                            <div class="onsaleprod_pp">
                            <del>₹500.00</del>
                            <h4>From ₹480</h4>
                            </div>
                            
                        </div>
                        <div class="onsaleprod_img">
                            <img src="Mango.jpeg" alt="">
                        </div>
                    </div>
                    
                </div>
                <hr>

            </div>
        </div>

      
        
    </footer>
     <div class="Copyright">
       <p align="center">Copyright @ All Rights Reserved</p>
    </div>






    <script src="script.js"></script>
</body>
</html>