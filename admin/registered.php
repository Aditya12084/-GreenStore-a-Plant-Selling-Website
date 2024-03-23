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
              <li class="breadcrumb-item active">Registered users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <!-- <section class="content">
      <div class="container-fluid"> -->
        <!-- Small boxes (Stat box) -->
        <!-- <div class="row">
          <div class="col-lg-3 col-6"> -->
            <!-- small box -->
            <!-- <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
          <!-- ./col -->
          <!-- <div class="col-lg-3 col-6"> -->
            <!-- small box -->
            <!-- <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          ./col -->
          <!-- <div class="col-lg-3 col-6"> -->
            <!-- small box -->
            <!-- <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
          <!-- ./col -->
          <!-- <div class="col-lg-3 col-6"> -->
            <!-- small box -->
            <!-- <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
          <!-- ./col -->
          <!-- </div> -->
          <!-- /.container-fluid -->
    <!-- </section> -->


   
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registered users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table " id="mytable">
  <thead>
    <tr>
      <th scope="col">Serial No</th>
      <th scope="col">Username</th>
      <th scope="col">Mobilenum</th>
      <th scope="col">Email</th>
      <!-- <th scope="col">Password</th> -->
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



         $sql="SELECT * FROM `registeruser`";

         $result=mysqli_query($con,$sql);

         $srno=1;

         while($row = mysqli_fetch_assoc($result)){

              echo "<tr>
              <th scope='row'> ".$srno."</th>
              <td>".$row['Username']."</td>
              <td>".$row['Mobilenum']."</td>
              <td>".$row['Email']."</td>
             
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