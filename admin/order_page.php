<?php
session_start();

if(isset($_SESSION['admin'])){
 
} 
else{
  header("Location:login.php");
}

include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    


   
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table " id="mytable">
  <thead>
    <tr>
      <th scope="col">Serial No</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone number</th>
      <th scope="col">Email</th>
      <th scope="col">Order</th>
      <th scope="col">Total</th>
      <!-- <th scope="col">Actions</th> -->
    </tr>
  </thead>
  <tbody>

  <?php
         //DIisplay the Recordes;-->

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



         $sql="SELECT * FROM `order_table`";

         $result=mysqli_query($con,$sql);

         $srno=1;

         while($row = mysqli_fetch_assoc($result)){

              echo "<tr>
              <th scope='row'> ".$srno."</th>
              <td>".$row['cust_name']."</td>
              <td>".$row['cust_address']."</td>
              <td>".$row['cust_phone']."</td>
              <td>".$row['cust_email']."</td>
              <td>".$row['cust_order']."</td>
              <td>₹".$row['cust_order_total']."/-</td>
            </tr>
              ";
              $srno++;
         }

        ?>

  

  
  </tbody>
</table>

            </div>


    </div>

    
</div>






<?php

include('includes/footer.php');


?>