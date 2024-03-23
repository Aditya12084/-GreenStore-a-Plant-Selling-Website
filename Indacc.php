<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php  echo "Hello ".$_SESSION['username']; ?> </title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" style="border: radius 10px; overflow:hidden;" href="logo1.png" type="image/x-icon">
   
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Eczar&family=Montserrat:wght@500&family=Space+Grotesk&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">

<style>
    .slider{
        background-repeat: repeat;
    }
</style>
</head>
<body>

<div class="topb">
        
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
                <li><a href="Account.php">My Account</a></li>

            </ul>

        </div>
    </header>



    <div class="indusercont">
    <h1 class="indhead">My account</h1>
    <hr>
    <h2> <?php  echo  "Hello ".$_SESSION['username'];  ?></h2>
    <?php

    $usname=$_SESSION['username'];

    require_once "db.php";

    $fetchdetails="SELECT * FROM `registeruser` WHERE `Username`='$usname'";

    $result=mysqli_query($con,$fetchdetails);

    $row=mysqli_fetch_assoc($result);

    echo "<p class='infohead' >Phone Number:</p>";

    echo "<p>".$row['Mobilenum']."</p>";

    echo "<p class='infohead' >Email ID:</p>";

    echo "<p>".$row['Email']."</p>";
    
    echo "<p class='infohead' >Change Password:</p>";

    echo "<a href='changepwd.php'>Click here to change password</a>";

    ?>
    <form action="Upload.php" method="post" id="lg_out">
        <div class="inda_out_chpass">
        <input type="submit" id="lgg_out" value="logout" name="logout">
        </div>
    </form>




    <div style="background:#fcf0a7; padding:4px; margin-top:10px; border-radius:8px;">
    <p> <img src="info.png" style="width:15px;" alt="">Please Note: Each item is displayed as Plant Name (Price)(Quantity). The name comes first, followed by the price in the first parentheses and the quantity in the second.</p>
<p>Example: Mango Plant (120)(4) signifies a Mango Plant at ₹120/- each with a quantity of 4.</p>
    </div>

    <div class="cust_ord_rec"  >

    <h1>Your orders:</h1>

    <table class="display" style="width:100%;" id="cst_order" >
    <thead>
        <tr>
            <th>Cust Order</th>
            <th>Order Date</th>
            <th>Cust Order Total</th>
        </tr>
    </thead>
    <tbody>
    <?php    

require_once "db.php";

$custid=$_SESSION['userid'];

$sql = "SELECT * FROM order_table WHERE cust_id = '$custid'  ORDER BY date_col DESC";

$order_query=mysqli_query($con,$sql);



if (!$order_query) {
    // Query failed, handle the error
    die('Error: ' . mysqli_error($con));
} else {
    // Query successful, fetch data
    while ($order_row = mysqli_fetch_assoc($order_query)) {
        echo  "<tr>
            <td>".$order_row['cust_order']."</td>
            <td>".$order_row['date_col']."</td>
            <td>₹".$order_row['cust_order_total']."/-</td>
        </tr>";
    }
}

?>

    </tbody>
</table>
    </div>


    </div>



    <script src="script.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
   
    <script>
        $(document).ready( function () {
    $('.display').DataTable();
} );
    </script>
</body>
</html>

