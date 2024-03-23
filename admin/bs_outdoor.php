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


<?php

require_once "dbc.php";

if(isset($_POST['add_prod_house'])){

$hs_name=$_POST['hs_name'];
$hs_url=$_POST['hs_url'];
$hs_desc=$_POST['hs_desc'];
$hs_price=$_POST['hs_price'];

$sql2="INSERT INTO `prod_sch_house` (`hp_img`,`hp_name`,`hp_price`,`hp_desc`) VALUES ('$hs_url','$hs_name','$hs_price','$hs_desc')";

$result=mysqli_query($con,$sql2);

if($result){
    echo "<script>GOT IT</script>";
}
else{

}


}

if(isset($_POST['edit_prod_house'])){

$hpe_name=$_POST['hs_namee'];
$hs_urll=$_POST['hs_urll'];
$hs_descc=$_POST['hs_descc'];
$hs_pricee=$_POST['hs_pricee'];
$edit_prodid=$_POST['edit_prodid'];

$sql3="UPDATE  `prod_sch_house` SET `hp_name`='$hpe_name',`hp_img`='$hs_urll',`hp_desc`='$hs_descc',`hp_price`='$hs_pricee' where `hp_id`='$edit_prodid'";

$result3=mysqli_query($con,$sql3);

if($result3){
    echo "<script>GOT IOT</script>";
}
else{

}


}











?>



<div class="content-wrapper">


<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Plant</h1>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="Upload.php" method="post">
        <div class="form-group">
          <label for="">Plant name*</label>
          <input type="text" class="form-control" placeholder="Plant name" name="hs_name">
        </div>
        <div class="form-group">
          <label for="">Image URL*</label>
          <input type="text" class="form-control" placeholder="Enter image url" name="hs_url">
        </div>
        <div class="form-group">
          <label for="">Description*</label>
          <textarea name="hs_desc"  class="form-control" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
          <label for="">Price*</label>
          <input type="text" name="hs_price" class="form-control" placeholder="Enter plant price">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="bs_outdoor_add"  class="btn btn-primary">Add plant</button>
      </div>
      </form>
    </div>
  </div>
</div>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
            <!-- Button trigger modal -->



          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Outdoor PLants</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

  

  <button id="Add_plant" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add a plant
  </button>


   
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Outdoor Bestsellers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table " id="mytable">
  <thead>
    <tr>
      <th scope="col">Serial No</th>
      <th scope="col">Plant name</th>
      <th scope="col">Image</th>
      <th scope="col">Description</th>
      <!-- <th scope="col">Price</th> -->

      <th scope="col">Price</th>
      <th scope="col" class="Actions_block">Actions</th>
    </tr>
  </thead>
  <tbody>

  <?php
         //DIisplay the Recordes;-->

   require_once "dbc.php";


         $sql="SELECT * FROM `bs_outdoor`";

         $result=mysqli_query($con,$sql);

         $srno=1;

         while($row = mysqli_fetch_assoc($result)){

              echo "
              
              <tr>
              <th scope='row'> ".$srno."</th>
              <td>".$row['bsod_name']."</td>
              <td>".$row['bsod_img']."</td>
              <td>".$row['bsod_desc']."</td>
              
              <td>".$row['bsod_price']."</td>
              
              <form action='edit_bs_outdoor.php' method='post'>
              <td id='loot' clsss='btn_conta'><input class='btn btn-primary float-left bg-blue' type='submit' name='dlt_cinfo_one' id='looo' value='Edit'>
              </td>
              <td id='gotcha'><input type='hidden' name='hp_eprod_id' value='".$row['bsod_id']."' ></td>
              </form>

              <form action='Upload.php' method='post'>
              <td clsss='btn_conta'>
              <input class='btn btn-primary float-left bg-red' type='submit' name='dlt_proh_one_bsod' value='Delete' onclick='return arSureOnepro()'></td>
              <td><input id='gotcha' type='hidden' name='hp_prod_id' value='".$row['bsod_id']."' ></td>
              </tr>
              </form>";
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