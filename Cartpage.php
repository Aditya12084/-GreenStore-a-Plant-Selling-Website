
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
    <link rel="shortcut icon" style="border: radius 10px; overflow:hidden;" href="logo1.png" type="image/x-icon">
   
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Eczar&family=Montserrat:wght@500&family=Space+Grotesk&display=swap" rel="stylesheet">

</head>

<body>
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


    <div class="Container">
        <?php
        require_once "db.php";
        if(isset($_SESSION['userid'])){
            $ussid=$_SESSION['userid'];

        $noof_cart_query="SELECT COUNT(*) FROM `cart` WHERE `user_id`='$ussid'";

        $noofprod_in_cartres=mysqli_query($con,$noof_cart_query);

        $row_n_cart=mysqli_fetch_assoc($noofprod_in_cartres);

        $cart_count=$row_n_cart['COUNT(*)'];

        if($cart_count>0){
            echo " <h1>Shopping-cart</h1> ";

        }
        else{
            echo "<h1>Your Cart is Empty!</h1>";
        }

        

        }
        else{
            echo "<h1>Create an Account first or Login!</h1>";
        }


        ?>
       
       <div class="small-sc-vis">
       <table id="sm-cart-tb" >
        <thead>
            <tr>
                <th id="prd_sc_tb">Product</th>
                <th id="desc_sc_tb">Description</th>
            </tr>
        </thead>
       <tbody>
       <?php
                require_once "db.php";

                if(isset($_SESSION['userid'])){

                $usid=$_SESSION['userid'];

                $sub_total=0;

                $sales_tax=10;
                $shipping_tax=40;

                $fetch_cartdata="SELECT * FROM `cart` WHERE `user_id`='$usid'";

                $cart_query=mysqli_query($con,$fetch_cartdata);
                
                while($cart_row=mysqli_fetch_assoc($cart_query)){
                echo " 
                <form action='Upload.php' method='post'> 
                       <tr classname='small-sc-tr'>

                        <td class='itemimgtbl-sm'>
                         <img src='".$cart_row['primage']."' alt=''>
                        </td>

                        <td class='itmdesc-sm' >  
                        <h3>".$cart_row['prname']."</h3>  <h5>Qty: ".$cart_row['qty']."</h5> <h5>₹".$cart_row['prprice']."/-</h5> <button onclick='showMessage();' id='cart_remove' name='rm_from_cart'>REMOVE</button>  <input type='hidden' name='cart_del_id' value='".$cart_row['pr_id']."'></td> 
                        </tr>
                        </form>";
                    $sub_total+=$cart_row['prprice'];
                }
              }
           
                ?>
       </tbody>
    </table>

    <div class="ttlcostcont">
            <div class="ttlcost">
              <table id="cost_tbl">
                <tbody>
                    <tr>
                        <th>
                            Subtotal:
                        </th>
                        <td>
                           <?php 
                           if(isset($_SESSION['userid'])){ 
                             echo "₹".$sub_total."/-";
                           }
                           else{
                            echo "₹0/-";
                           }
                           ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Sales Tax:
                        </th>
                        <td>
                            
                           <?php 
                           if(isset($_SESSION['userid'])){
                           if($sub_total>0){
                             echo "₹".$sales_tax."/-";
                           }
                           else{
                            echo "₹0/-";
                         } 
                          
                        }
                        else{
                            echo "₹0/-";
                           } ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Shipping:
                        </th>
                        <td>
                        <?php
                        if(isset($_SESSION['userid']) ) {if($sub_total>0){
                             echo "₹".$shipping_tax."/-";
                           }
                           else{
                            echo "₹0/-";
                         } 
                            
                        }
                        else{
                            echo "₹0/-";
                         }?>
                        </td>
                    </tr>
                 
                    <tr>
                        <th>
                            Grand total:
                        </th>
                       <th>
                            
                            <?php
                            if(isset($_SESSION['userid'])){if($sub_total>0){
                             echo "₹".$sub_total+$shipping_tax+$sales_tax."/-";
                           }
                           else{
                            echo "₹0.00/-";
                         } 
                           
                        }
                        else{
                            echo "₹0.00/-";
                         } ?>
                       </th>
                    </tr>
                </tbody>
                </table>


                <form action="checkout.php" method="post">

                
                <?php
                if(isset($_SESSION['userid'])){

                    if($sub_total>0){
                        // echo "<input type='hidden' value='".$_SESSION['userid']."' name='user_id'>";
                        echo '<input type="submit" value="Checkout" id="ckout_btn" onclick="location.href=\'checkout.php\';" name="ckout_btn"> ';

                    }
                }
                 
                 ?>
                </form>
            
        </div>

            </div>
    </div>


    <div class="cart-container">
    
     <table id='cartordtbl'>
                <thead>
                    <tr>
                       <th>Product</th>
                       <th>Price</th>
                       <th>Quantity</th>
                       <th>Total</th>
                       <th>Action</th>
                    </tr>
                </thead>
                <tbody>


               
            <?php
                require_once "db.php";

                if(isset($_SESSION['userid'])){

                $usid=$_SESSION['userid'];

                $sub_total=0;

                $sales_tax=10;
                $shipping_tax=40;

                $fetch_cartdata="SELECT * FROM `cart` WHERE `user_id`='$usid'";

                $cart_query=mysqli_query($con,$fetch_cartdata);
                
                while($cart_row=mysqli_fetch_assoc($cart_query)){
                echo " 
                <form action='Upload.php' method='post'> 
                       <tr>
                        <td class='itemimgnametbl'>
                         <img src='".$cart_row['primage']."' alt=''>
                         <h3>".$cart_row['prname']."</h3>
                        </td>
                        <td>₹".$cart_row['practprice']."/-</td>
                        <td>".$cart_row['qty']."</td>
                        <td>₹".$cart_row['prprice']."/-</td>
                        <td><button id='cart_remove' onclick='showMessage();' name='rm_from_cart'>REMOVE</button>
                        <input type='hidden' name='cart_del_id' value='".$cart_row['pr_id']."'></td>

                        </tr>
                        </form>";
                
                    $sub_total+=$cart_row['prprice'];
                }
              }
           
                ?>
                </tbody>

            </table>

            <div class="ttlcostcont bg-sc-tbl">
            <div class="ttlcost">
              <table id="cost_tbl">
                <tbody>
                    <tr>
                        <th>
                            Subtotal:
                        </th>
                        <td>
                           <?php 
                           if(isset($_SESSION['userid'])){ 
                             echo "₹".$sub_total."/-";
                           }
                           else{
                            echo "₹0/-";
                           }
                           ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Sales Tax:
                        </th>
                        <td>
                            
                           <?php 
                           if(isset($_SESSION['userid'])){
                           if($sub_total>0){
                             echo "₹".$sales_tax."/-";
                           }
                           else{
                            echo "₹0/-";
                         } 
                          
                        }
                        else{
                            echo "₹0/-";
                           } ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Shipping:
                        </th>
                        <td>
                        <?php
                        if(isset($_SESSION['userid']) ) {if($sub_total>0){
                             echo "₹".$shipping_tax."/-";
                           }
                           else{
                            echo "₹0/-";
                         } 
                            
                        }
                        else{
                            echo "₹0/-";
                         }?>
                        </td>
                    </tr>
                 
                    <tr>
                        <th>
                            Grand total:
                        </th>
                       <th>
                            
                            <?php
                            if(isset($_SESSION['userid'])){if($sub_total>0){
                             echo "₹".$sub_total+$shipping_tax+$sales_tax."/-";
                           }
                           else{
                            echo "₹0.00/-";
                         } 
                           
                        }
                        else{
                            echo "₹0.00/-";
                         } ?>
                       </th>
                    </tr>
                </tbody>
                </table>


                <form action="checkout.php" method="post">

                
                <?php
                if(isset($_SESSION['userid'])){

                    if($sub_total>0){
                        // echo "<input type='hidden' value='".$_SESSION['userid']."' name='user_id'>";
                        echo '<input type="submit" value="Checkout" id="ckout_btn" onclick="location.href=\'checkout.php\';" name="ckout_btn"> ';

                    }
                }
                 
                 ?>
                </form>
            
        </div>

            </div>

              
            </div>

    <?php include("footer.php");   ?>

    <script src="script.js" ></script>

    <script>
        function showMessage(){
            alert('Do you want to remove this item from cart?');
        }
    </script>

</body>

</html>