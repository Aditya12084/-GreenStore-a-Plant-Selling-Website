<?php

$servername="localhost";
$username="root";
$password="";
$database="project sem5";


//Connection

$con=mysqli_connect($servername,$username,$password,$database);


if(!$con){
    header("Location: ../errors/db.php");
    die();
}









?>