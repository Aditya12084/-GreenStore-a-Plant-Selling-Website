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
<h1 id="bighead">Update plant information</h1>
<hr>

<?php  

require_once "dbc.php";

$hp_id=$_POST['hp_eprod_id'];

$sqle="SELECT * FROM `prod_sch_house` WHERE `hp_id`='$hp_id'";

$resultt=mysqli_query($con,$sqle);

$roww=mysqli_fetch_assoc($resultt);


?>


<form  id="editprod" action="Upload.php" method="post">
<div class="form-group">
          <label for="">Plant name*</label>
          <input type="text" class="form-control" placeholder="Plant name" name="hs_namee" value="<?php echo $roww['hp_name'];?>">
        </div>
        <div class="form-group">
          <label for="">Image URL*</label>
          <input type="text" class="form-control" placeholder="Enter image url" name="hs_urll" value="<?php echo $roww['hp_img'];?>">
        </div>
        <div class="form-group">
          <label for="">Description*</label>
          <textarea name="hs_descc"  class="form-control" id="" cols="30" rows="10"><?php echo $roww['hp_desc'];?></textarea>
        </div>
        <div class="form-group">
          <label for="">Price*</label>
          <input type="text" name="hs_pricee" class="form-control" placeholder="Enter plant price" value="<?php echo $roww['hp_price'];?>">
        </div>
        
    
      <div class="modal-footer">
        <button type="submit" name="edit_prod_house"  class="btn btn-primary">Save changes</button>
        <input type="hidden" name="edit_prodid" value="<?php echo $roww['hp_id'];?>">
      </div>
</form>




</div>





<?php

include('includes/footer.php');


?>