



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
              <li class="breadcrumb-item active">Contacted Peoples</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

   
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Contacted Peoples</h3>
                <form action="Upload.php" method="post">
                <button class="btn btn-primary float-right bg-red" type="submit" name="delconallent" onclick="return arSure()">DELETE ALL</button>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table " id="mytable">

  
  <thead>
    <tr>
      <th scope="col">Srno</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Message</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

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



         $sql="SELECT * FROM `contact_info`";

         $result=mysqli_query($con,$sql);

         $srno=1;

         while($row = mysqli_fetch_assoc($result)){

              echo "
              <form action='Upload.php' method='post'>
              <tr>
              <th scope='row'> ".$srno."</th>
              <td>".$row['name']."</td>
              <td>".$row['email']."</td>
              <td>".$row['message']."</td>
              
              <td><input class='btn btn-primary float-left bg-red' type='submit' name='dlt_cinfo_one' value='DELETE' onclick='return arSureOneEnt()'></td>
              <td ><input type='hidden' name='coninfoent_id' value='".$row['srno']."'></td>
              </tr> 
              </form>";
              $srno++;
         }
        

        ?>

  

<input type="hidden" name="">
  
  </tbody>
</table>



            </div>


    </div>

    
</div>




<?php

include('includes/footer.php');


?>