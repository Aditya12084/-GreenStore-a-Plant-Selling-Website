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
<style>
    .topbar{
        margin-bottom: 0;
    }
</style>
<body class="ckbody">
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
    
                    <li><a href="">Go to Cart</a></li>
                    <li><a href="">My Account</a></li>
    
                </ul>
    
            </div>
        </header>
        <div>
            <?php
 if(isset($_SESSION['order_success'])){
    // echo "<script>alert(".$_SESSION['order_success'].")</script>";
    echo "<div  class='order_placed_message'>".$_SESSION['order_success']."</div>";
    // echo "<script>givealertmsg(".$_SESSION['order_success'].")</script>";
    unset($_SESSION['order_success']);
 }

// echo "<div >Your order has been placed successfully!</div>";


?>
            <h1 class="ckheading">Checkout</h1>
        </div>

        <?php       

require_once "db.php";

if(isset($_SESSION['userid'])){

$usid=$_SESSION['userid'];

$fetch_cartdata="SELECT * FROM `registeruser` WHERE `sno`='$usid'";

$checkout_user_query=mysqli_query($con,$fetch_cartdata);

$checkout_row=mysqli_fetch_assoc($checkout_user_query);

}

?>
       
        <div class="checkformcont">
            <h2>Billing Details</h2>
            <hr>
            <form action="Upload.php" method="post">
            <div class="checkname">
                <div class="ckfirstname">
                    <p>First name<span>*</span></p>
                    
                    <div class="ckinput">
                    <input type="text" name="checkfirstname" value="" id="checkfirstname">
                    </div>
                </div>

                <div class="cklastname">
                    <p>
                        Last name<span>*</span>
                    </p>
                
                <div class="ckinput">
                    <input type="text" name="checkLastname" id="checkLastname">
                </div>
                </div>

            </div>

            <div class="ckstreetaddress ckform_divs">
                <p>Street name<span>*</span></p>
               
                <div class="ckinput forminput_divs">
                    <input type="text" name="checkstreetaddress" id="checkstreetaddress">
                </div>
            </div>
            <div class="cklandmark ckform_divs">
                <p> Landmark</p>
               
                <div class="ckinput forminput_divs">
                    <input type="text" name="checklandmark" id="checklandmark">
                </div>
            </div>
            <div class="ckstreetaddress ckform_divs">
                <p>Town/City<span>*</span></p>
              
                <div class="ckinput forminput_divs">
                    <input type="text" name="checktowncity" id="checktowncity">
                </div>
            </div>
            <div class="ckstreetaddress ckform_divs">
                <p>State<span>*</span></p>
               
                <div class="ckinput forminput_divs">
                    <input type="text" name="checkstate" id="checkstate">
                </div>
            </div>
            <div class="ckstreetaddress ckform_divs">
                <p>Pincode/ZIP<span>*</span></p>
                
                <div class="ckinput forminput_divs forminput_short">
                    <input type="text" name="checkpincode" id="checkpincode">
                </div>
            </div>
            <div class="ckstreetaddress ckform_divs">
                 <p>Phone<span>*</span></p>
                <div class="ckinput forminput_divs forminput_short">
                    <input type="text" name="checkphone" value="<?php  if(isset($_SESSION['userid'])){echo $checkout_row['Mobilenum']; }
                      ?>" id="checkphone">
                </div>
            </div>
            <div class="ckstreetaddress ckform_divs">
                <p>
                Email<span>*</span>
                </p>
                      
               
                <div class="ckinput forminput_divs forminput_short">
                    <input type="text" name="checkemail" value="<?php 
                    
                    if(isset($_SESSION['userid'])){
                        echo $checkout_row['Email'];
                     } ?>"   id="checkemail">
                </div>
            </div>
            <hr>

            
            

            <h2>Your Order:</h2>
    
            <table id="orderinfo_table">
                <thead>
                    <tr>
                        <th id="bigspace">
                            Product
                        </th>
                        <th>
                            Price
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody>


                <?php

    require_once "db.php";


    $salestax=10;
    $shipping=40;


if(isset($_POST['buy_it_now'])){

    $plt_id=$_POST['plant_id'];
    $plt_quant=$_POST['plant_quant'];
    
    $fetch_only_one="SELECT * FROM `all_products` WHERE `plant_id`='$plt_id'";

    $fetch_onlyone_res=mysqli_query($con,$fetch_only_one);

    $fetch_only_one_row=mysqli_fetch_assoc($fetch_onlyone_res);

    $plt_full_price=$fetch_only_one_row['plant_price']*$plt_quant;


    echo "<input type='hidden' name='bin_order' value='".$fetch_only_one_row['plant_name']."(".$fetch_only_one_row['plant_price'].")(".$plt_quant.")'>";

    echo "<input type='hidden' name='bin_order_total' value='".$plt_full_price+$salestax+$shipping."'>";

    echo "<tr>
    <td>
        ".$fetch_only_one_row['plant_name']."
    </td>
    <td class='practprice'>

    ₹".$fetch_only_one_row['plant_price']."/-
    </td>
    <td class='qty_cont'>
        ".$plt_quant."
    </td>
    <td>  
    ₹".$plt_full_price."/-
    </td>
    </tr>";

}

else{
if(isset($_SESSION['userid'])){

$usrid=$_SESSION['userid'];

$fetch_cartdata_ck="SELECT * FROM `cart` WHERE `user_id`='$usrid'";

$ckquery=mysqli_query($con,$fetch_cartdata_ck);

$ttl=0;
$cart_order=null;


while($ck_row=mysqli_fetch_assoc($ckquery)){
    echo "<tr>
    <td>
        ".$ck_row['prname']."
    </td>
    <td class='practprice'>

    ₹".$ck_row['practprice']."/-
    </td>
    <td class='qty_cont'>
        ".$ck_row['qty']."
    </td>
    <td>
    ₹".$ck_row['prprice']."/-
    </td>
    </tr>";
    $ttl+=$ck_row['prprice'];

    $cart_order=$cart_order." ".$ck_row['prname']."(".$ck_row['practprice'].")(".$ck_row['qty'].")";
}

echo "<input type='hidden' name='cart_full_order' value='".$cart_order."'>";
echo "<input type='hidden' name='cart_order_total' value='".$ttl+$salestax+$shipping."'>";

}
    




}
 ?>
             

    

                    
                </tbody>
            </table>

            <hr>


            <h2>Price Details:</h2>
           
            
            <table id="orderinfo_table">
                <tbody>

                
                <tr>
                   <td class="takespace">
                      Subtotal:
                   </td>
                   <td>
                      <?php   
                   if(isset($_POST['buy_it_now'])){

                      echo "₹".$plt_full_price."/-";

                   } else{
                      echo "₹".$ttl."/-";

                   }


                    ?>
                   </td>
                   </tr>


                    <tr>
                   <td class="takespace">
                      Shipping:
                   </td>
                   <td>
                   <?php   
            
                    echo  "₹".$shipping."/-";


                    ?>
                   </td>
                   </tr>
               
                   
                
                   <tr>
                      <td class="takespace">
                         Sales tax:
                      </td>
                      <td>
                        <?php
                      echo "₹".$salestax."/-";


                      ?>
                      </td>
                      
                   </tr>
                   
                   <tr>
                      <th class="takespace red_font">
                       Grand Total:
                      </th>
                      <th class="red_font">
                      <?php



if(isset($_POST['buy_it_now'])){
    
    echo "₹".$plt_full_price+$salestax+$shipping."/-";

 } else{


    echo "₹".$ttl+$salestax+$shipping."/-";

 }
                      
                      


                      ?>
                      </th>
                      
                   </tr>
                </tbody>
            </table>

              <div class='termandconditions'>
               
              <input type="checkbox" id="ck_box"><h5>By ticking this box i am committed to accepting the order when product is delivered to my doorstep<span>*</span></h5>

              </div>
              <?php

if(isset($_POST['buy_it_now'])){

    
    echo "<button type='submit' name='bin_ck_clicked' id='checkout_btn' onclick='return checkcheckout()'>Place Order</button>";

 } else{
    echo "<button type='submit' name='cart_ck_clicked' id='checkout_btn' onclick='return checkcheckout()'>Place Order</button>";

 }
?>   
            </form>
        </div>

    <?php  include("footer.php");       
    
    
    ?>


    <script src="script.js"></script>
</body>
</html>