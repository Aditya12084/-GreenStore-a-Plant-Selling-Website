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



<!-- Content Wrapper. Contains page content -->
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
              
            </ol>
           
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <?php

   require_once "dbcon.php";

   $ret_count_order="SELECT COUNT(*) FROM `order_table`";

   $ret_c_result=mysqli_query($con,$ret_count_order);

   $ret_count=mysqli_fetch_assoc($ret_c_result);

   $retain_count=$ret_count['COUNT(*)'];

   $ret_contact="SELECT COUNT(*) FROM `contact_info`";

   $ret_conta_result=mysqli_query($con,$ret_contact);

   $fetch_contact=mysqli_fetch_assoc($ret_conta_result);

   $fetch_contact_count=$fetch_contact['COUNT(*)'];

   $ret_reguser="SELECT COUNT(*) FROM `registeruser`";

   $ret_user_result=mysqli_query($con,$ret_reguser);

   $fetch_user=mysqli_fetch_assoc($ret_user_result);

   $fetch_user_count=$fetch_user['COUNT(*)'];





?>
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php  echo $retain_count;  ?></h3>

                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="order_page.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php  echo $fetch_contact_count;   ?></h3>

                <p>Contact</p>
              </div>
              <div class="icon">
                <i class="far fa-comments"></i>
              </div>
              <a href="Contactinfo.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $fetch_user_count;    ?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="registered.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- <div class="col-lg-3 col-6"> -->
            <!-- small box -->
            <!-- <div class="small-box bg-danger"> -->
              <!-- <div class="inner">
                <h3>65</h3> -->

                <!-- <p>Unique Visitors</p>
              </div> -->
              <!-- <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>
          <!-- ./col -->
          </div>
    </section>

</div>


<?php

include('includes/footer.php')


?>