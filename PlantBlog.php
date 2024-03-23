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
    <link rel="shortcut icon" style="border: radius 10px; overflow:hidden;" href="logo1.png" type="image/x-icon">
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Eczar&family=Montserrat:wght@500&family=Space+Grotesk&display=swap" rel="stylesheet">
<style>
    header{
        position:sticky;
        
    }
</style>
</head>
<body id="blogbody">
    <header>
        <div class="logo">
            <img src="logo1.png" alt="">

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
                   <a href="Cartpage.php"><img src="shopping-cart.png" alt="" id="img2" class="imgothers"></a>
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


<div class="plantsblogcont">

  <div class="headcontainer">
  <h1>Welcome to Plant Care Page!</h1>
  <p>
  At GreenStore, we believe that thriving plants bring life and vibrancy to any space, whether it's your cozy home, bustling office, or your outdoor sanctuary. We understand that each plant is unique, with its own set of care requirements, and we're here to help you become the best plant parent you can be. </p>

<p>Our Plant Care page is your one-stop resource for nurturing and nourishing your green companions. Whether you're a seasoned plant enthusiast or just starting your journey into the world of indoor and outdoor greenery, we've got you covered.</p>

<p>Our mission is to empower you with the knowledge and guidance you need to create a thriving oasis in your surroundings. Whether you're looking to add a touch of nature to your indoor spaces, create a serene outdoor garden, or enhance the ambiance of your workplace, GreenStore is here to support your plant-loving journey.</p>

 <p>So, let's embark on this green adventure together. Explore our plant care resources, ask questions, and watch your plants flourish with the care and attention they deserve.</p>

 <p>

GreenStore - Where Your Love for Plants Grows.  </p>
  </p>
  </div>
<div class="House_blogcont blogcont">
    <h2>1. House Plants:</h2>
<div class="tophouse_cont">
    <div class="houseplt_img">
        <img src="pexels-wendy-wei-2959604.jpg" alt="">
    </div>
    <div class="someinfo">
        <h3>1. Choose the Right Pot:</h3>
        <p>
        - Select pots with drainage holes: This prevents water from accumulating at the bottom of the pot, reducing the risk of root rot.
        </p>
        <p>
        - Ensure the pot is 1-2 inches larger in diameter than the plant's current pot: This allows room for root growth without overwhelming the plant.
        </p>
        <h3>2. Watering:</h3>
        <p>
        - Water thoroughly: Give your plant enough water so that it reaches the root zone, but don't leave it sitting in standing water.</p>
        <p>- Let the top inch of soil dry before watering for most indoor plants: Stick your finger into the soil to check moisture levels; if it's dry to that depth, it's time to water.</p>
        <p>- Adjust watering frequency based on plant type and environment: Some plants need more water than others, and factors like humidity, temperature, and season can affect watering needs.</p>

    </div>
</div>

        <h3>3. Lighting:</h3>
        <p>
        - Place low-light plants away from direct sunlight: Low-light plants thrive in indirect or filtered light and can burn if exposed to direct sunlight.
        </p>
        <p>- Provide bright, indirect light for medium-light plants: These plants need moderate, indirect sunlight to flourish.
        </p>
        <p>- Give high-light plants direct sunlight for several hours daily: High-light plants require direct sunlight to thrive; a south-facing window is ideal for them.</p> 

<h3>4. Humidity:</h3>
   <p>- Increase humidity for tropical plants by misting: Regularly misting the plant leaves with water can help replicate their natural humid environment.</p>
   <p>- Use a humidity tray: Placing the pot on a tray filled with water and pebbles can increase humidity around the plant.</p>
   <p>- Grouping plants: Grouping plants together can create a microclimate with higher humidity.</p>

<h3>5. Temperature:</h3>
   <p>- Most houseplants thrive in temperatures between 60-75°F (15-24°C): Keep your home within this temperature range for optimal growth.</p>
   <p>- Avoid drastic temperature fluctuations: Rapid temperature changes can stress plants; keep them away from drafts.</p>

<h3>6.Fertilization:</h3>
   <p>- Use a balanced, water-soluble fertilizer during the growing season (spring and summer): Fertilize according to package instructions to provide essential nutrients.</p>
   <p>- Reduce or stop fertilizing during the dormant season (fall and winter): Many plants slow down their growth during these months and require fewer nutrients.</p>
</div>
<hr>

<div class="plantsblogcont">
<div class="House_blogcont blogcont">
    <h2>2. Office Plants:</h2>
<div class="tophouse_cont">
    <div class="houseplt_img">
        <img src="pexels-anna-shvets-3987020.jpg" alt="">
    </div>
    <div class="someinfo">
        <h3>1. Low-Maintenance Choices:</h3>
        <p>
        - Opt for low-light and low-water plants like snake plants, pothos, or ZZ plants: These plants require minimal care and can thrive in office conditions.</p>
        <p>
        - Ensure the pots have drainage to prevent overwatering: Even low-maintenance plants need proper drainage to avoid root problems.
        </p>

        <h3>2. Minimal Watering:</h3>
        <p>
        - Water sparingly: These plants can tolerate longer periods between watering; allow the soil to partially dry before watering again.</p>
        <p>Consider self-watering pots for longer-lasting hydration: Self-watering pots can help maintain consistent moisture levels.</p>
    </div>
</div>

        <h3>3. Low Light Tolerance:</h3>
        <p>- Place office plants near windows with indirect sunlight: Low-light plants can thrive in indirect or fluorescent office lighting.</p>
        <p>- Choose plants that can thrive in the typical office lighting conditions: Plants like snake plants, peace lilies, and pothos are excellent choices.
</p>
        

<h3>4. Dusting and Cleaning:</h3>
   <p>- Wipe down leaves to remove dust and promote photosynthesis: Dust can block light absorption, so regularly clean leaves with a damp cloth.
</p>
   <p>-Keep the plant's environment clean and free of debris: A clean workspace is essential for plant health.</p>
  
<h3>5. Temperature:</h3>
   <p>

-Maintain a consistent office temperature between 65-75°F (18-24°C): These temperatures are generally comfortable for most office plants.</p>
   <p>- Avoid placing plants near heaters or air vents: Extreme temperature fluctuations can stress plants</p>
   
</div>
<hr>
<div class="plantsblogcont">
<div class="House_blogcont blogcont">
    <h2>2. Outdoor Plants:</h2>
<div class="tophouse_cont">
    <div class="houseplt_img">
        <img src="pexels-thgusstavo-santana-2102587.jpg" alt="">
    </div>
    <div class="someinfo">
        <h3>1. Soil Preparation:</h3>


        <p>- Ensure well-draining soil by adding organic matter: Good drainage prevents waterlogged roots.</p>
        <p>
        - Test the soil's pH and adjust as needed for specific plant types: Some plants prefer acidic soil, while others thrive in alkaline conditions.
        </p>

        <h3>2. Watering:</h3>
        <p>
        - Water deeply and less frequently to encourage root growth: Frequent shallow watering can lead to shallow root systems.
        </p>
        <p>- Early morning is the best time to water outdoor plants: This allows the soil to absorb moisture before the heat of the day.</p>
    </div>
</div>

        <h3>3. Sunlight:</h3>
        <p>- Research each plant's sunlight requirements and position accordingly: Some plants need full sun, while others thrive in partial or full shade.</p>
        <p>- Use shade cloth for sensitive plants during scorching summers: Protect delicate plants from excessive sun and heat.
</p>
        

<h3>4. Mulching:</h3>


   <p>- Apply mulch to conserve moisture, regulate soil temperature, and deter weeds: Mulch helps retain soil moisture and prevents weed growth.
</p>
  
<h3>5. Pest and Disease Management:</h3>
   <p>

- Regularly inspect plants for pests and diseases: Early detection allows for prompt treatment.

</p>
   <p>- Use organic or chemical treatments as appropriate: Choose the right method for the specific issue, keeping environmental concerns in mind.</p>
   <p>

   <h3>
   Pruning and Deadheading:
   </h3>
   <p>
   - Prune to remove dead or overgrown branches: Pruning helps maintain plant shape and health.
   </p>
   <p>
   - Deadhead spent flowers to encourage continuous blooming: Removing spent flowers redirects energy into new growth and blooms.
   </p>

   <h3>
   Seasonal Care:
   </h3>
   <p>
   - Adjust care routines according to seasonal changes and plant requirements: Different plants may need different care during different seasons.
   </p>
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