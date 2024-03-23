<?php

require_once "dbcon.php";


if(isset($_POST['ad-sub'])){

    $username=$_POST['username'];
    $passwd=$_POST['passw'];


    $sql="SELECT `Password` FROM `admin` WHERE `Username`='$username'";

    $result=mysqli_query($con,$sql);

    if($result){
        $row3=mysqli_fetch_assoc($result);
        $hashedpwd=$row3['Password'];
        if($passwd==$hashedpwd){
            session_start();
            $_SESSION['admin']="admin";
            header("Location:index.php");
        }
        else{
            echo "<script> alert('Invalid Password!') </script>";
            header("Location:login.php");
        }
        
    }
    else{
        echo "<script> alert('NOT INSERTED') </script>";
    }


}

if(isset($_POST['logout-ad'])){
    session_start();
    session_unset();
    session_destroy();
    
    header("Location:login.php");
 }
 


?>