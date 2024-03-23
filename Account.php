<?php

require_once "db.php";

if(isset($_POST['registernow'])){

    $regusername=$_POST['regusername'];
    $regphonenum=$_POST['regphonenum'];
    $regemail=$_POST['regemail'];
    $regpasswd=$_POST['regpasswd'];
    $confpassw=$_POST['regconfpasswd'];

    $chusname="SELECT COUNT(*) FROM `registeruser` WHERE `Username`='$regusername'";

    $result0=mysqli_query($con,$chusname);

    if($result0){
            $row1=mysqli_fetch_assoc($result0);
            $count=$row1['COUNT(*)'];

            if($count>0){
                echo "<script> alert('Username already exists, Please choose another.') </script>";
            }
            else{

                $sql="INSERT INTO `registeruser` (`Username`, `Mobilenum`, `Email`, `Password`) VALUES ( '$regusername', '$regphonenum', '$regemail', '$regpasswd')";

                $result=mysqli_query($con,$sql);

    if($result){
        
        $getthidquery="SELECT `sno` FROM `registeruser` WHERE `Username`='$regusername'";

        $result1=mysqli_query($con,$getthidquery);

        $row2=mysqli_fetch_assoc($result1);
        
        $usid=$row2['sno'];

        $sql3="INSERT INTO `gs_login_tbl` (`Username`,`Password`,`user_id`) VALUES ( '$regusername','$regpasswd','$usid')";

        $result2=mysqli_query($con,$sql3);

        session_start();
        $_SESSION['username']=$regusername;
        $_SESSION['userid']=$usid;

        header("Location:Indacc.php");
        exit;
    }
    else{
        echo "<script> alert('NOT INSERTED') </script>";
    }
        }

    }

}


if(isset($_POST['loginnow'])){

    $username=$_POST['username'];
    $passwd=$_POST['passwd'];


    $sql="SELECT `Password`,`user_id` FROM `gs_login_tbl` WHERE `Username`='$username'";

    $result=mysqli_query($con,$sql);

    if($result){
        $row3=mysqli_fetch_assoc($result);
        $hashedpwd=$row3['Password'];
        $usidet=$row3['user_id'];
        if($passwd==$hashedpwd){
            session_start();
            $_SESSION['username']=$username;
            $_SESSION['userid']=$usidet;
            header("Location:Indacc.php");
        }
        else{
            echo "<script> alert('Invalid Password!') </script>";
        }
    }
    else{
        echo "<script> alert('NOT INSERTED') </script>";
    }
}

if(isset($_POST['ch_pwd_reset'])){
     $uschname=$_POST['ch_username'];
     $ch_passwd=$_POST['ch_passwd'];

     $sql2="SELECT COUNT(*) FROM `gs_login_tbl` WHERE `Username`='$uschname'";

     $result2=mysqli_query($con,$sql2);

     if($result2){
        $row=mysqli_fetch_assoc($result2);
        $count2=$row['COUNT(*)'];

        if($count2==1){
        $sql4="UPDATE `gs_login_tbl` SET `Password`='$ch_passwd' WHERE `Username`='$uschname'";

        $result11=mysqli_query($con,$sql4);

        if($result11){
            echo "<script>alert('Password Changed Successfully!')</script>";
        }
        else{
            echo "<script>alert('Something went wrong..')</script>";
        }
        }
        else{
            echo "<script>alert('Username not Exist..')</script>";
        }
        
     }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" style="border: radius 10px; overflow:hidden;" href="logo1.png" type="image/x-icon">
   
    <title>Document</title>
     <link rel="stylesheet" href="style.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Eczar&family=Montserrat:wght@500&family=Space+Grotesk&display=swap" rel="stylesheet">

    <style>

        span{
            color:red;
            font-weight:bold;
        }
        
    </style>
       

   
   
</head>

<body id="Accountbody">


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

                <li><a href="Cartpage.php">Go to Cart</a></li>
                <li><a href="<?php echo isset($_SESSION['userid']) ? 'Indacc.php':'Account.php';?>">My Account</a></li>

            </ul>

        </div>






    </header>

    <div class="heading">
    </div>
    



    <div class="Logincenter">
        <h1 align="center">Login</h1>
        <hr>

        <div id="Loginform">
            
            <form  action="Account.php" method="post">
            
                <div class="txt_field formdivs">
                    <input type="text" required id="fielduser" placeholder="Username" name="username">
                    <span id="usernameerror"></span>
                   
                </div>
                <div class="txt_field formdivs">
                    <input type="password" required id="fieldpass" placeholder="Password" name="passwd">
                    <span id="passworderror"></span>
                                     
                </div>
                <b><a href="#" onclick="showit(2)">forgot password?</a></b>  
                <div class="button_loginnow formdivs" >
                    <input type="submit" value="Login Now" id="login" name="loginnow" onclick="return validateLogin()">
                </div>

                <div class="signup_link formdivs">
                    <b>Not a member? </b><a href="#" onclick="showit(0)"><b>Signup!</b></a>
                </div>

            </form>

         
        </div>
    </div>


    <div class="registercenter">
        <h1 align="center" >Register</h1>
        <hr>

        <div class="registerform" >

        <form  action="Account.php" method="post">

        <!-- <div class="txt_field formdivs">
                    <input type="text" required id="fielduser" placeholder="Enter firstname" name="username">
                    <span id="usernameerror"></span>
                   
                </div>
                <div class="txt_field formdivs">
                    <input type="text" required id="fielduser" placeholder="Enter lastname" name="username">
                    <span id="usernameerror"></span>
                   
                </div> -->
            
            <div class="formdivs">
                <div>
                <span id="usernameerr"></span>

<div class="txt_field">
    <input type="text" required id="reguser" placeholder="enter username" name="regusername">
</div>
                </div>
            </div>


             <div class="formdivs">

            <div>
            <span id="phnoerr"></span>
            <div class="txt_field">
                <input type="text" required  id="regphno" placeholder="enter your mobile number"  name="regphonenum">
                
            </div>
            </div>
            
            </div>


             <div class="formdivs">

             <div>
             <span id="emailerr" ></span>
            <div class="txt_field ">
                <input type="text" required id="regemail" placeholder="enter your email"  name="regemail">
               
            </div>
             </div>
           
           
           </div>

           <div class="formdivs">
            <div>
            <span id="passwderr"></span>
            <div class="txt_field ">
                <input type="password" required  id="regpassw" placeholder="enter your password"  name="regpasswd">
                
            </div>
            </div>
           
    </div>
             <div class="formdivs">
            <div class="txt_field">
                <input type="password" required  id="regconfpassw" placeholder="confirm your password"  name="regconfpasswd">
            </div>
    </div>


            <div class="button_resisternow formdivs">
                <input type="submit" value="Register Now" id="login" name="registernow" onclick="return validateRegister()" >
            </div>
            
            <div class="signup_link formdivs">
            
                <b>Already have an account?</b> <a href="#" onclick="showit(1)"><b>Login now!</b></a>
            </div>

            
        </form> 

        
    
        </div>
    </div>

    <div class="forgot_pwd_center Logincenter">
        <h1 align="center" >Reset Password</h1>
        <hr>

        <div id="Loginform">
            <form  action="Account.php" method="post">
                <div class="txt_field formdivs">
                    <input type="text" required id="ch_fielduser" placeholder="Enter Username" name="ch_username">
                    <span id="usernameer"></span>
                </div>
                <div class="txt_field formdivs">
                    <input type="password" required id="ch_fieldpass" placeholder="Enter Password" name="ch_passwd">
                    <span id="passworder"></span>
                                     
                </div>
                <div class="txt_field formdivs">
                    <input type="password" required id="chcnf_fieldpass" placeholder="Confirm Password" name="chcnf_passwd">
                    <span id="passworder"></span> 
                </div>
                
                <div class="button_loginnow formdivs" >
                    <input type="submit" value="Reset Password" id="login" name="ch_pwd_reset" onclick="return validateRePaswword()">
                </div>

                <div class="signup_link formdivs">
                    <a href="#" onclick="showit(1)"><b>Back To Login</b></a>
                </div>
            </form>
        </div>
    </div>
    </div>


    <?php  include("footer.php"); ?>

    
    <script src="script.js"></script>
   
</body>

</html>