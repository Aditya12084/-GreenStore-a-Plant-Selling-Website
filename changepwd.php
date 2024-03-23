<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" style="border: radius 10px; overflow:hidden;" href="logo1.png" type="image/x-icon">
   
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Eczar&family=Montserrat:wght@500&family=Space+Grotesk&display=swap" rel="stylesheet">
    <style>
        .chpwd_fm_cont{
    
    margin:50px auto 10px;
    width: 400px;
    background-color: rgb(244, 238, 228);
    padding: 30px 20px 30px 30px;
    border-radius: 8px;
}

.chpwd_fm_cont .chpwd_fm_divs input{
    outline: none;
    /* border: none; */
    background-color:#ffff;
    /* border-radius:4px; */
   
    padding:5px 10px 5px 10px;
    width:100%;
    font-size:20px;
    border-bottom:2px solid grey;
}

.chpwd_headings{
    font-weight: bold;
}

.chpwd_headings::after{
    content:'*';
    color:red;
    font-weight:bold;
}
.chpwd_fm_div input{
   
    border:none;
    border-radius:4px;
    background-color:green;
    padding:5px 10px 5px 10px;
    font-size:20px;
    color:white;
}

.chpwd_fm_divs{
    margin-top: 20px;
}

.chpwd_fm_divs,.chpwd_fm_div{
    display: flex;
    align-items:center;
    justify-content:center;
    margin-top: 40px;
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
    
                    <li><a href="">Go to Cart</a></li>
                    <li><a href="">My Account</a></li>
    
                </ul>
    
            </div>
        </header>

   <div class="chpwd_fm_cont">
    <h1 align="center">CHANGE PASSWORD</h1>
    <hr>
      <form action="Upload.php" method="post">
        <div class="chpwd_fm_divs">
            <input type="password" name="chpwd_pwd" placeholder="Enter a new password" id="chpwd_pwd" required>
        </div>
        <div class="chpwd_fm_divs">
            <input type="password" name="chpwd_cnfpwd" placeholder="confirm your password" id="chpwd_cnfpwd" required>
        </div>
        <div class="chpwd_fm_div">
            <input type="submit" value="Change password" id="" name="chpwd_btn" onclick="return validatechpasswd()">
        </div>
      </form>
   </div>

   <script src="script.js"></script>
</body>
</html>