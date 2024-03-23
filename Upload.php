
<?php



require_once "db.php";


// if(isset($_POST['registernow'])){
    
//     $regusername=$_POST['regusername'];
//     $regphonenum=$_POST['regphonenum'];
//     $regemail=$_POST['regemail'];

//     $password=$_POST['regpasswd'];

//     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//     // $regpasswd= $hashedPassword;
//     $confpassw=$_POST['regconfpasswd'];

//     $chusname="SELECT COUNT(*) FROM `registeruser` WHERE `Username`='$regusername'";

//     $result0=mysqli_query($con,$chusname);

//     if($result0){
//             $row1=mysqli_fetch_assoc($result0);
//             $count=$row1['COUNT(*)'];

//             if($count>0){
//                 echo "<script> alert('Username already exists, Please choose another.') </script>";
//             }
//             else{
//                 $sql="INSERT INTO `registeruser` (`Username`, `Mobilenum`, `Email`, `Password`) VALUES ( '$regusername', '$regphonenum', '$regemail', '$hashedPassword')";

//                 $result=mysqli_query($con,$sql);

//     if($result){
        
//         $getthidquery="SELECT `sno` FROM `registeruser` WHERE `Username`='$regusername'";

//         $result1=mysqli_query($con,$getthidquery);

//         $row2=mysqli_fetch_assoc($result1);
        
//         $usid=$row2['sno'];

//         $sql3="INSERT INTO `gs_login_tbl` (`Username`,`Password`,`user_id`) VALUES ( '$regusername','$hashedPassword','$usid')";

//         $result2=mysqli_query($con,$sql3);

//         session_start();
//         $_SESSION['username']=$regusername;
//         $_SESSION['userid']=$usid;

//         header("Location:Indacc.php");
//         exit;
//     }
//     else{
//         echo "<script> alert('NOT INSERTED') </script>";
//     }
//         }

//     }

// }


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




if(isset($_POST['conbtn'])){
   $conname=$_POST['conname'];
   $conemail=$_POST['conemail'];
   $conmessage=$_POST['conmessage'];

   $sql="INSERT INTO `contact_info` (`name`, `email`, `message`) VALUES ('$conname','$conemail','$conmessage')";

   $result=mysqli_query($con,$sql);

   if($result){
        header("Location:contactus.php");
       }
   else{
        echo "<script>alert('Submission Failed!!');</script>";
   }


}


if(isset($_POST['logout'])){
   session_start();
   session_unset();
   session_destroy();
   
   header("Location:Account.php");
}

if(isset($_POST['chpwd_btn'])){
    $chpwd=$_POST['chpwd_pwd'];
    $cnfchpwd=$_POST['chpwd_cnfpwd'];

    session_start();

    $userid=$_SESSION['userid'];

    $chpwd_query="UPDATE `gs_login_tbl` SET `Password`='$chpwd' WHERE `user_id`='$userid'";

    $result4=mysqli_query($con,$chpwd_query);

    if($result4){
        header("Location:Indacc.php");
    }
   else{
        echo "<script>alert('Submission Failed!!');</script>";
   }

}

if(isset($_POST['rm_from_cart'])){

   $cart_delid=$_POST['cart_del_id'];

    $rm_from_cartq="DELETE FROM `cart`
    WHERE `pr_id` = '$cart_delid'";

    $result_del_cart=mysqli_query($con,$rm_from_cartq);

    if($result_del_cart){
        header("Location:Cartpage.php");
    }
    else{
        echo "<script>alert('Something went wrong!!')</script>";
    }
}




if(isset($_POST['bin_ck_clicked'])){
    $checkfirstname=$_POST['checkfirstname'];
    $checkLastname=$_POST['checkLastname'];
    $checkstreetaddress=$_POST['checkstreetaddress'];
    $checklandmark=$_POST['checklandmark'];
    $checktowncity=$_POST['checktowncity'];
    $checkstate=$_POST['checkstate'];
    $checkpincode=$_POST['checkpincode'];

    $checkphone=$_POST['checkphone'];
    $checkemail=$_POST['checkemail'];

    $bin_order=$_POST['bin_order'];
    $bin_order_total=$_POST['bin_order_total'];


    $full_address=$checkstreetaddress.", ".$checklandmark.", ".$checktowncity.", ".$checkstate." ".$checkpincode;


    $cust_name=$checkfirstname." ".$checkLastname;


    $bin_query="INSERT INTO `order_table` (`cust_id`,`cust_name`,`cust_address`,`cust_phone`,`cust_email`,`cust_order`,`cust_order_total`) VALUES ('0','$cust_name','$full_address','$checkphone','$checkemail','$bin_order','$bin_order_total')";

    $bin_result=mysqli_query($con,$bin_query);

    giveordermsg($bin_result);

   
}

if(isset($_POST['cart_ck_clicked'])){

    $checkfirstname=$_POST['checkfirstname'];
    $checkLastname=$_POST['checkLastname'];
    $checkstreetaddress=$_POST['checkstreetaddress'];
    $checklandmark=$_POST['checklandmark'];
    $checktowncity=$_POST['checktowncity'];
    $checkstate=$_POST['checkstate'];
    $checkpincode=$_POST['checkpincode'];

    $checkphone=$_POST['checkphone'];
    $checkemail=$_POST['checkemail'];

    $cart_order=$_POST['cart_full_order'];
    $cart_order_total=$_POST['cart_order_total'];

    $full_address=$checkstreetaddress.", ".$checklandmark.", ".$checktowncity.", ".$checkstate." ".$checkpincode;

    $cust_name=$checkfirstname." ".$checkLastname;


    session_start();

    $custid=$_SESSION['userid'];

    $today_date = date("d-m-Y");

   

    $cart_order_query="INSERT INTO `order_table` (`cust_id`,`cust_name`,`cust_address`,`cust_phone`,`cust_email`,`cust_order`,`cust_order_total`,`date_col`) VALUES ('$custid','$cust_name','$full_address','$checkphone','$checkemail','$cart_order','$cart_order_total','$today_date')";

    $cart_order_result=mysqli_query($con,$cart_order_query);

    echo "alert('.$cart_order_result.')";

    giveordermsg($cart_order_result);

}

function giveordermsg($value){

    session_start();

    if($value){
       $_SESSION['order_success']="Your order has been successfully placed!!";
    }
    else{
        $_SESSION['order_success']="Something went wrong!";
    }

    header("Location: checkout.php");
}
?>



