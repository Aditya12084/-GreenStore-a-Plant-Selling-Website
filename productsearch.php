<?php
session_start();
?>

<?php
require_once "db.php";

if(isset($_POST['product_id'])  && isset($_POST['qty'])){

echo "<script>console.log('got it')</script>";

$add_prod_id=$_POST['product_id'];
$add_prod_qty=$_POST['qty'];

$fetchprod_query="SELECT * FROM `all_products` WHERE `plant_id`='$add_prod_id'";
$resfetchit=mysqli_query($con,$fetchprod_query);

$addrow=mysqli_fetch_assoc($resfetchit);

$getmulprice=$addrow['plant_price']*$add_prod_qty;

$userr_id=$_SESSION['userid'];

$addtocart_query="INSERT INTO `cart` (`id`, `prname`, `prprice`, `user_id`, `qty`, `primage`,`practprice`)
VALUES ('".$addrow['plant_id'] . "', '". $addrow['plant_name'] ."', '$getmulprice', '$userr_id', '$add_prod_qty',  '" . $addrow['plant_img'] . "', '".$addrow['plant_price']."')";


$addmaincart=mysqli_query($con,$addtocart_query);

if($addmaincart){
      echo "<script>jushowit()</script>";
}
else{
      echo "<script>alert('OK')</script>";
}


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="style.css">
      <script src="script.js"></script>
      <script src="https://kit.fontawesome.com/a2cb7bb034.js" crossorigin="anonymous"></script>

      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Eczar&family=Montserrat:wght@500&family=Space+Grotesk&display=swap" rel="stylesheet">
<link rel="shortcut icon" style="border: radius 10px; overflow:hidden;" href="logo1.png" type="image/x-icon">
   
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
      header{
            position: sticky;
      }
  </style>

</head>

<body>

      
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

              <li><a href="PlantBlog.php">Go to Cart</a></li>
              <li><a href="<?php echo isset($_SESSION['userid']) ? 'Indacc.php':'Account.php';?>">My Account</a></li>

          </ul>

      </div>






  </header>

      <div class="header1">

      <div class="filter-cont"  >
      
            <div class="filter" style="flex:1">
            <h2>Category:</h2>
                  <button class="cat" onclick="tt(0)" style="background-color: green;">All</button>
                  <button class="cat" onclick="tt(1)">House </button>
                  <button class="cat" onclick="tt(2)">Outdoor</button>
                  <button class="cat" onclick="tt(3)">Office </button>

            </div>
            </div>
            <input type="text" name="" id="find" placeholder="Search here......" onkeyup="search()">

      </div>

      <div class="prodmatrix">
        
           

            <?php


            require_once "db.php";

            $sql22="SELECT * FROM `prod_sch_house`"; 
            $result22=mysqli_query($con,$sql22);
            
            while($row22=mysqli_fetch_assoc($result22)){
            
            echo "
            <div class='prod Indoor'  data-name='hp-".$row22['hp_id']."'>
                  <img src=".$row22['hp_img']." alt=''>
                  <h3>".$row22['hp_name']."</h3>
                  <div class='prodprice'>
                  <h4>₹".$row22['hp_price']."</h4> 
                  </div>
                  <button>VIEW PRODUCT</button>
            </div> ";

            }

            $sql52="SELECT * FROM `prod_sch_house_sale`";
         
            $result52=mysqli_query($con,$sql52);
           

            while( $row52=mysqli_fetch_assoc($result52)){
            echo "
            <div class='prod Indoor'  data-name='hps-".$row52['hps_id']."'>
                  <img src=".$row52['hps_img']." alt=''>
                  <h3>".$row52['hps_name']."</h3>
                  <div class='prodprice'>
                 <del>₹".$row52['hps_delprice']."</del><h4>₹".$row52['hps_price']."</h4>
                 <div class='saleindex'>SALE</div> 
                  </div>
                  <button>VIEW PRODUCT</button>
            </div> ";
            }


            ?>

      
            <?php


            require_once "db.php";

            $sql21="SELECT * FROM `prod_sch_office`"; 

            

            $result21=mysqli_query($con,$sql21);
            
            while($row21=mysqli_fetch_assoc($result21)){
            
            echo "
            <div class='prod Office'  data-name='op-".$row21['op_id']."'>
                  <img src=".$row21['op_img']." alt=''>
                  <h3>".$row21['op_name']."</h3>
                  <div class='prodprice'>
                  <h4>₹".$row21['op_price']."</h4> 
                  </div>
                  <button>VIEW PRODUCT</button>
            </div> ";

            }

            $sql51="SELECT * FROM `prod_sch_office_sale`";
         
            $result51=mysqli_query($con,$sql51);
           

            while( $row51=mysqli_fetch_assoc($result51)){
            echo "
            <div class='prod Office'  data-name='ops-".$row51['ops_id']."'>
                  <img src=".$row51['ops_img']." alt=''>
                  <h3>".$row51['ops_name']."</h3>
                  <div class='prodprice'>
                 <del>₹".$row51['ops_delprice']."</del><h4>From ₹".$row51['ops_price']."</h4>
                 <div class='saleindex'>SALE</div> 
                  </div>
                  <button>VIEW PRODUCT</button>
            </div> ";
            }


            ?>
            <?php


            require_once "db.php";

            $sql100="SELECT * FROM `prod_search`"; 

          

            $resultt=mysqli_query($con,$sql100);
            // $row100=mysqli_fetch_assoc($resultt);


            while($row100=mysqli_fetch_assoc($resultt)){

            echo "
            <div class='prod Outdoor'  data-name='odp-".$row100['prid']."'>
                  <img src=".$row100['primg']." alt=''>
                  <h3>".$row100['prname']."</h3>
                  <div class='prodprice'>
                  <h4>₹".$row100['prprice']."</h4> 
                  </div>
                  <button>VIEW PRODUCT</button>
            </div> ";

            }


            $sql50="SELECT * FROM `prod_search_sale`";
          
            $result50=mysqli_query($con,$sql50);
            // $row50=mysqli_fetch_assoc($result50);

            while($row50=mysqli_fetch_assoc($result50)){
            echo "
            <div class='prod Outdoor'  data-name='odps-".$row50['pridd']."'>
                  <img src=".$row50['primgg']." alt=''>
                  <h3>".$row50['prnamee']."</h3>
                  <div class='prodprice'>
                 <del>₹".$row50['prdelpricee']."</del><h4>From ₹".$row50['prpricee']."</h4>
                 <div class='saleindex'>SALE</div> 
                  </div>
                  <button>VIEW PRODUCT</button>
            </div> ";

            }
            
            ?>

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


      <div class="products-preview">
           

            <?php


            require_once "db.php";

            $sql20="SELECT * FROM `prod_search`";

            $resultt=mysqli_query($con,$sql20);
            


            while($row20=mysqli_fetch_assoc($resultt)){

                   
            
            echo "
            
            <div class='preview' data-target='odp-".$row20['prid']."'>

                  <div class='leftpartprev'>
                        <img src=".$row20['primg']." alt=''>
                  </div>
                  <div class='rightpartprev'>
                  <button onclick='closeit()' onclick='return preventit()' type='submit' id='prood_btn'><img src='close_2976286.png' alt='' ></button>
                        <div class='proddescription'>
                        
                        <h1>".$row20['prname']."</h1>
                        <div class='ratings'>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star-half-stroke'></i>
                        </div>
                        <div class='contppanind'>
                        <h2>₹".$row20['prprice']."</h2>
                        
                        </div>
                        <p>".$row20['prod_desc']."</p>
                        </div>

                  <form action='checkout.php' method='post'>
                        <label for=''>Enter quntity:</label>
                        <input class='quantity' type='number' name='plant_quant' value='1' min='1' max='5'>
                        <input  type='hidden' name='plant_id' value='".$row20['prid']."'>
                        
                        <div class='twobuttons'>
                        <button type='button' class='addittoCart'  data-product-id='".$row20['prid']."'>Add to Cart</button>
                        
                              <button type='submit' name='buy_it_now' >Buy it now</button>
                        
                        </div>
                  </form>
                  </div>
            </div>
            
            ";
            }

            $sql30="SELECT * FROM `prod_search_sale`";

            $result30=mysqli_query($con,$sql30);
            


            while($row30=mysqli_fetch_assoc($result30)){
            
            echo "
            <div class='preview' data-target='odps-".$row30['pridd']."'>

                  <div class='leftpartprev'>
                        <img src=".$row30['primgg']." alt=''>
                  </div>
                  <div class='rightpartprev'>
                  <button onclick='closeit()' id='prood_btn'><img src='close_2976286.png' alt=''></button>
                        <div class='proddescription'>
                        
                        <h1>".$row30['prnamee']."</h1>
                        <div class='ratings'>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star-half-stroke'></i>
                        </div>
                        <div class='contppanind'>
                        <h2>₹".$row30['prpricee']."</h2>
                        <div class='saleindex'>SALE</div>
                        
                        </div>
                        <p>".$row30['prod_descc']."</p>
                        </div>

                        <form action='checkout.php' method='post'>

                        <label for=''>Enter quntity:</label>
                        <input class='quantity' type='number' name='plant_quant' value='1' min='1' max='5'>
                        <input  type='hidden' name='plant_id' value='".$row30['pridd']."'>
                        
                        <div class='twobuttons'>
                              <button class='addittoCart' data-product-id='".$row30['pridd']."'>Add to Cart</button>
                              <button type='submit' name='buy_it_now' >Buy it now</button>
                        </div>


                        </form>
                  </div>
            </div>
            
            ";
            }


            $sql23="SELECT * FROM `prod_sch_house`";

            $result23=mysqli_query($con,$sql23);
            


            while($row23=mysqli_fetch_assoc($result23)){
            
            echo "
        
            <div class='preview' data-target='hp-".$row23['hp_id']."'>
                  <div class='leftpartprev'>
                        <img src=".$row23['hp_img']." alt=''>
                  </div>
                  <div class='rightpartprev'>
                  <button onclick='closeit()' id='prood_btn'><img src='close_2976286.png' alt=''></button>
                        <div class='proddescription'>
                        
                        <h1>".$row23['hp_name']."</h1>
                        <div class='ratings'>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star-half-stroke'></i>
                        </div>
                        <div class='contppanind'>
                        <h2>₹".$row23['hp_price']."</h2>
                        </div>
                        
                        <p>".$row23['hp_desc']."</p>
                        </div>
                        

                        <form action='checkout.php' method='post'>

                        <label for=''>Enter quntity:</label>
                        <input class='quantity' type='number' name='plant_quant' value='1' min='1' max='5'>
                        <input  type='hidden' name='plant_id' value='".$row23['hp_id']."'>

                        <div class='twobuttons'>
                              
                              <button type='button' class='addittoCart'data-product-id='".$row23['hp_id']."'>Add to Cart</button>
                             
                              <button type='submit' name='buy_it_now'>Buy it now</button>
                             
                        </div>

                        </form>
                  </div>
            </div>
            
            ";

            }

            $sql29="SELECT * FROM `prod_sch_house_sale`";

            $result29=mysqli_query($con,$sql29);
            


            while($row29=mysqli_fetch_assoc($result29)){
            echo "
            <div class='preview' data-target='hps-".$row29['hps_id']."'>

                  <div class='leftpartprev'>
                        <img src=".$row29['hps_img']." alt=''>
                  </div>
                  <div class='rightpartprev'>
                  <button onclick='closeit()' id='prood_btn'><img src='close_2976286.png' alt=''></button>
                        <div class='proddescription'>
                        
                        <h1>".$row29['hps_name']."</h1>
                        <div class='ratings'>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star-half-stroke'></i>
                        </div>
                        <div class='contppanind'>
                        <h2>₹".$row29['hps_price']."</h2>
                        <div class='saleindex'>SALE</div>
                        </div>

                        <p>".$row29['hps_desc']."</p>
                        </div>


                        <form action='checkout.php' method='post'>

                        <label for=''>Enter quntity:</label>
                        <input class='quantity' type='number' name='plant_quant' value='1' min='1' max='5'>
                        <input  type='hidden' name='plant_id' value='".$row29['hps_id']."'>

                        <div class='twobuttons'>
                              
                              <button type='button' class='addittoCart' data-product-id='".$row29['hps_id']."'>Add to Cart</button>
                             
                              <button type='submit' name='buy_it_now'>Buy it now</button>
                             
                        </div>

                        </form>

                  </div>
            </div>
            
            ";

            }


            $sql33="SELECT * FROM `prod_sch_office`";

            $result33=mysqli_query($con,$sql33);
            


            while($row33=mysqli_fetch_assoc($result33)){
            
            echo "
            <div class='preview' data-target='op-".$row33['op_id']."'>

                  <div class='leftpartprev'>
                        <img src=".$row33['op_img']." alt=''>
                  </div>
                  <div class='rightpartprev'>
                  <button onclick='closeit()' id='prood_btn'><img src='close_2976286.png' alt=''></button>
                        <div class='proddescription'>
                        
                        <h1>".$row33['op_name']."</h1>
                        <div class='ratings'>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star-half-stroke'></i>
                        </div>
                        <div class='contppanind'>
                        <h2>₹".$row33['op_price']."</h2>
                        </div>
                        <p>".$row33['op_desc']."</p>
                        </div>

                        <form action='checkout.php' method='post'>

                        <label for=''>Enter quntity:</label>
                        <input class='quantity' type='number' name='plant_quant' value='1' min='1' max='5'>
                        <input  type='hidden' name='plant_id' value='".$row33['op_id']."'>

                        <div class='twobuttons'>
                              
                              <button type='button'  onclick='showAddCart()' data-product-id='".$row33['op_id']."'>Add to Cart</button>
                             
                              <button type='submit' name='buy_it_now'>Buy it now</button>
                             
                        </div>

                        </form>

                  </div>
            </div>
            
            ";
            }

            $sql34="SELECT * FROM `prod_sch_office_sale`";

            $result34=mysqli_query($con,$sql34);
            

            while($row34=mysqli_fetch_assoc($result34)){
            
            echo "
            <div class='preview' data-target='ops-".$row34['ops_id']."'>

                  <div class='leftpartprev'>
                        <img src=".$row34['ops_img']." alt=''>
                  </div>
                  <div class='rightpartprev'>
                  <button onclick='closeit()' id='prood_btn'><img src='close_2976286.png' alt=''></button>
                        <div class='proddescription'>
                        
                        <h1>".$row34['ops_name']."</h1>
                        <div class='ratings'>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star '></i>
                        <i class='fa-solid fa-star-half-stroke'></i>
                        </div>
                        <div class='contppanind'>
                        <h2>₹".$row34['ops_price']."</h2>
                        <div class='saleindex'>SALE</div>
                        <label for=''>Enter quntity:</label>
                        <input class='quantity' type='number' name='' value='1' min='1' max='5'>
                        </div>
                        <p>".$row34['ops_desc']."</p>
                        </div>
                        
                        <div class='twobuttons'>
                        <button class='addittoCart'  data-product-id='".$row34['ops_id']."'>Add to Cart</button>
                              <button>Buy it now</button>
                        </div>
                  </div>
            </div>
            
            ";
            }

            ?>


            

            
      </div>


      <script>
      

      
            
      
      
      
      let previewContainer=document.querySelector('.products-preview')
      console.log(previewContainer)

      let previewBox=previewContainer.querySelectorAll('.preview')

      console.log(previewBox)

     document.querySelectorAll('.prod').forEach(element=>{

      element.onclick=()=>{

            console.log(element)

            previewContainer.style.display='flex';
            let name=element.getAttribute('data-name');
            console.log(name)

            previewBox.forEach(preview=>{
                  let target=preview.getAttribute('data-target');
                  console.log(target)
                  if(name==target){
                        preview.classList.add('active')
                  }
            })
      }

     })


     function closeit() {
          
          document.querySelector('.products-preview').style.display = "none"


          previewBox.forEach(close => {
              if (close.classList.contains('active')) {
                  close.classList.toggle('active')
              }

              console.log(close);


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
                },
                success: function (response) {
                    // Handle the success response here
                    console.log("AJAX request successful");
                    console.log(response); // Log the response from the server
                },
                error: function (xhr, status, error) {
                    // Handle errors here
                    console.log("AJAX request error");
                    console.error(error); // Log the error message
                }
            });

                        
                  });
                  
            });
      });



      </script>



      


<?php


require_once "db.php";

if(isset($_POST['officeplantbtn'])){
     echo "<script>tt(3)</script>";
}
if(isset($_POST['houseplantbtn'])){
      echo "<script>tt(1)</script>";
}
if(isset($_POST['outdoorplantbtn'])){
      echo "<script>tt(2)</script>";
}



?>


</body>

</html>