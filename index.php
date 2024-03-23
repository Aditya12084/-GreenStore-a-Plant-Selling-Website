<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenStore | Plant Selling Website</title>
    <link rel="shortcut icon" style="border: radius 10px; overflow:hidden;" href="logo1.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/a2cb7bb034.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Eczar&family=Montserrat:wght@500&family=Space+Grotesk&display=swap" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <style>  
        header{
            position:sticky;
            top: 0;
            margin-top: -9px;
        }
        
    </style>

</head>

<body>

    <div class="topbar">
        <h3>Free shipping above ₹499 | All India Delivery </h3>
        <h3>Call us: +91-9324-2105-59</h3>
    </div>

    <header>
        <div class="logo">
        <a href="index.php"><img src="logo1.png" alt=""></a>
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
                    <img src="shopping-cart.png" alt="" id="img2" class="imgothers">
                    </a>
                  
                </li>
                <li id="item3">
                    <a href="<?php echo isset($_SESSION['userid']) ? 'Indacc.php':'Account.php';?> "><img src="user.png" alt="" id="img3" class="imgothers"></a>
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

    <div class="slider">
    <div class="btn-container">
    <h2>Bringing <span>Nature's</span> Beauty to your Doorstep</h2>
        <a href="productsearch.php"><button>SHOP NOW</button></a>
        </div>
    </div>
  
    <div class="rowHeadingg">
    <img src="Question.png" alt="">
    <h1>What are you Looking For?</h1>
    </div>
    <div class="categories">
        <form action="productsearch.php" method="post">
            <button type="submit" name="officeplantbtn">
        <div class="catOffice">
        
            <img src="pexels-anna-shvets-3987020.jpg" alt="">
            <h2>Office Plants</h2>
       
        </div>
        </button>
        
     
        <button type="submit" name="outdoorplantbtn">
        
        <div class="catOutdoor">
            
            <img src="pexels-thgusstavo-santana-2102587.jpg" alt="">
            <h2>Outdoor Plants</h2>
     
        </div>
        </button>
        

        <button type="submit" name="houseplantbtn">
        <div class="catHouse">
           
            <img src="pexels-wendy-wei-2959604.jpg" alt="">
          
            <h2>House Plants</h2>
        
        </div>
        </button>
        </form>
       
        
    </div>

    <div class="matrix">

    <div class="rowHeading">
    <img src="indoor-plants_4429831.png" alt="">
    <h1>House Best Sellers</h1>
    </div>

        <div class="row1">

        <?php

require_once "db.php";

$sql22="SELECT * FROM `bs_house`"; 



$result22=mysqli_query($con,$sql22);

while($row22=mysqli_fetch_assoc($result22)){

echo " <div class='col' id='col1' data-name='".$row22['bsh_id']."'>
<img src='".$row22['bsh_img']."' alt='' class='rowimages adj_ht_nonsel'>


    <h3>".$row22['bsh_name']."</h3>

    <div class='price'>
      
        <h3>₹".$row22['bsh_price']."</h3>
        
    </div>

    <div class='ratings'>
    <i class='fa-solid fa-star '></i>
    <i class='fa-solid fa-star '></i>
    <i class='fa-solid fa-star '></i>
    <i class='fa-solid fa-star '></i>
    <i class='fa-solid fa-star-half-stroke'></i>
    </div>
 
    <button>VIEW PRODUCT</button>

</div>";

}?>
        
    </div>
  
        <div class="rowHeading">
    <img src="workspace_1599859.png" alt="">
    <h1>Office Best Sellers</h1>
    </div>

        <div class="row2">

        <?php

require_once "db.php";

$sql25="SELECT * FROM `bs_office`"; 


$result25=mysqli_query($con,$sql25);

while($row25=mysqli_fetch_assoc($result25)){

echo " <div class='col' id='col1' data-name='".$row25['bso_id']."'>
<img src='".$row25['bso_img']."' alt='' class='rowimages adj_ht_nonsel'>


    <h3>".$row25['bso_name']."</h3>

    <div class='price'>
      
        <h3>₹".$row25['bso_price']."</h3>
        
    </div>

    <div class='ratings'>
    <i class='fa-solid fa-star '></i>
    <i class='fa-solid fa-star '></i>
    <i class='fa-solid fa-star '></i>
    <i class='fa-solid fa-star '></i>
    <i class='fa-solid fa-star-half-stroke'></i>

    </div>
    <button>VIEW PRODUCT</button>
</div>";

}   ?>
</div> 

        <div class="rowHeading">
    <img src="house_2163350.png" alt="">
    <h1> Outdoor Best Sellers</h1>

    </div>

        <div class="row2">


        <?php

require_once "db.php";

$sql26="SELECT * FROM `bs_outdoor`"; 



$result26=mysqli_query($con,$sql26);

while($row26=mysqli_fetch_assoc($result26)){

echo " <div class='col' id='col1' data-name='".$row26['bsod_id']."'>
<img src='".$row26['bsod_img']."' alt='' class='rowimages adj_ht_nonsel'>


    <h3>".$row26['bsod_name']."</h3>

    <div class='price'>
      
        <h3>₹".$row26['bsod_price']."</h3>
        
    </div>

    <div class='ratings'>
    <i class='fa-solid fa-star '></i>
    <i class='fa-solid fa-star '></i>
    <i class='fa-solid fa-star '></i>
    <i class='fa-solid fa-star '></i>
    <i class='fa-solid fa-star-half-stroke'></i>
    </div>
    <button>VIEW PRODUCT</button>
</div>";

}   ?></div>

       

</div>


    <?php include("footer.php"); ?>

    <div class="indexpreview-backgd">
   <?php 

    require_once "db.php";

            $sql20="SELECT * FROM `bs_house`";

            $resultt=mysqli_query($con,$sql20);
            


            while($row20=mysqli_fetch_assoc($resultt)){
            
            echo "<div class='preview'  data-target='".$row20['bsh_id']."'>
            <div class='leftpartprev'>
                <img src='".$row20['bsh_img']."' alt=''>
            </div>
            <div class='rightpartprev'>
               
                <div class='proddescription'>
                <button type='button' onclick='closeit()'><img src='close_2976286.png' alt=''></button>
                    <h1>".$row20['bsh_name']."</h1>
                    <div class='ratings'>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star-half-stroke'></i>
                    </div>
                    
                    
                    <h2>₹".$row20['bsh_price']."</h2>  
                    <p>".$row20['bsh_desc']."</p>
                    
                </div>

                <form action='checkout.php' method='post'>

                        <label for=''>Enter quntity:</label>
                        <input class='quantity' type='number' name='plant_quant' value='1' min='1' max='5'>
                        <input  type='hidden' name='plant_id' value='".$row20['bsh_id']."'>
                        
                        <div class='twobuttons'>
                              <button type='button' class='addittoCart' data-product-id='".$row20['bsh_id']."'>Add to Cart</button>
                              <button type='submit' name='buy_it_now' >Buy it now</button>
                        </div>


                        </form>
            </div>
        </div> ";  }
        ?>

            <?php 

    require_once "db.php";

            $sql26="SELECT * FROM `bs_office`";

            $resultt=mysqli_query($con,$sql26);
            
            while($row26=mysqli_fetch_assoc($resultt)){
            
            echo "<div class='preview'  data-target='".$row26['bso_id']."'>
            <div class='leftpartprev'>
                <img src='".$row26['bso_img']."' alt=''>
            </div>
            <div class='rightpartprev'>
               
                <div class='proddescription'>
                <button type='button' onclick='closeit()'><img src='close_2976286.png' alt=''></button>
                    <h1>".$row26['bso_name']."</h1>
                    <div class='ratings'>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star-half-stroke'></i>
                    </div>
                    
                    
                    <h2>₹".$row26['bso_price']."</h2>  
                    <p>".$row26['bso_desc']."</p>
                   
                </div>


                        <form action='checkout.php' method='post'>

                        <label for=''>Enter quntity:</label>
                        <input class='quantity' type='number' name='plant_quant' value='1' min='1' max='5'>
                        <input  type='hidden' name='plant_id' value='".$row26['bso_id']."'>
                        
                        <div class='twobuttons'>
                              <button type='button' class='addittoCart' data-product-id='".$row26['bso_id']."'>Add to Cart</button>
                              <button type='submit' name='buy_it_now' >Buy it now</button>
                        </div>
                        </form>
            </div>
        </div> ";  }
        ?>


            <?php 

    require_once "db.php";

            $sql27="SELECT * FROM `bs_outdoor`";

            $resultt=mysqli_query($con,$sql27);
            
            while($row27=mysqli_fetch_assoc($resultt)){
            
            echo "<div class='preview'  data-target='".$row27['bsod_id']."'>
            <div class='leftpartprev'>
                <img src='".$row27['bsod_img']."' alt=''>
            </div>
            <div class='rightpartprev'>
               
                <div class='proddescription'>
                <button type='button' onclick='closeit()'><img src='close_2976286.png' alt=''></button>
                    <h1>".$row27['bsod_name']."</h1>
                    <div class='ratings'>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star-half-stroke'></i>
                    </div>
                    <h2>₹".$row27['bsod_price']."</h2>  
                    <p>".$row27['bsod_desc']."</p>
                </div>

                <form action='checkout.php' method='post'>

                        <label for=''>Enter quntity:</label>
                        <input class='quantity' type='number' name='plant_quant' value='1' min='1' max='5'>
                        <input  type='hidden' name='plant_id' value='".$row27['bsod_id']."'>
                        
                        <div class='twobuttons'>
                              <button type='button' class='addittoCart' data-product-id='".$row27['bsod_id']."'>Add to Cart</button>
                              <button type='submit' name='buy_it_now' >Buy it now</button>
                        </div>
                        </form>

            </div>
        </div> ";  }
        ?>

            </div>

    <script>
        let previewContainer = document.querySelector('.indexpreview-backgd')
       

        let previewBox = previewContainer.querySelectorAll('.preview')
       


        document.querySelectorAll('.col').forEach(element => {

            element.onclick = () => {

                previewContainer.style.display = 'flex';
                let name = element.getAttribute('data-name');

                previewBox.forEach(preview => {
                    let target = preview.getAttribute('data-target');
                    
                    if (name == target) { 
                        preview.classList.add('activee')
                    }
                })
            }

        })

        function closeit() {

            document.querySelector('.indexpreview-backgd').style.display = "none"


            previewBox.forEach(close => {
                if (close.classList.contains('activee')) {
                    close.classList.toggle('activee')
                }
            });
        }

        document.addEventListener("DOMContentLoaded",function(){
           
            var addToCartButtons=document.querySelectorAll(".addittoCart");

            addToCartButtons.forEach(function(btn) {
               
            btn.addEventListener("click",function (){
                <?php echo isset($_SESSION['userid']) ? 'alert("Item added to the cart")':'alert("Please login first!!")';?> 

                        var productID=btn.getAttribute("data-product-id");

                        var productDiv=btn.closest(".rightpartprev");

                        var qtyinput=productDiv.querySelector(".quantity");

                        var qtyy=qtyinput.value;
                        $.ajax({
                type: "post",
                url: "productsearch.php",
                data: {
                    product_id: productID,
                    qty: qtyy
                }
            });        
                  });
                  
            });
      });

    </script>

</body>

</html>