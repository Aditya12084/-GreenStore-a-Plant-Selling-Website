<?php

require_once "dbcon.php";

if(isset($_POST['delconallent'])){

    $sql="TRUNCATE TABLE `contact_info`";

    $result=mysqli_query($con,$sql);

    if($result){
       
        header("Location:Contactinfo.php");
        echo "<script> alert('All Entries Deleted Successfully!!') </script>";
        exit;
    }
    else{
        echo "<script> alert('Deletion Failed!') </script>";
    }

}


if(isset($_POST['dlt_cinfo_one'])){

    $coninfoent_id=$_POST['coninfoent_id'];

    $sql="DELETE FROM `contact_info` WHERE `srno` = $coninfoent_id";

    $result=mysqli_query($con,$sql);

    if($result){
       
        header("Location:Contactinfo.php");
        echo "<script> alert('All Entries Deleted Successfully!!') </script>";
        exit;
    }
    else{
        echo "<script> alert('Deletion Failed!') </script>";
    }

}



if(isset($_POST['dlt_proh_one'])){  

    $getitid=$_POST['hp_prod_id'];

    delthatprod($getitid,$con);

    $sql="DELETE FROM `prod_sch_house` WHERE `hp_id` = '$getitid'";

    $result=mysqli_query($con,$sql);

    if($result){
       
        header("Location:edithplants.php");
        echo "<script> alert('All Entries Deleted Successfully!!') </script>";
        exit;
    }
    else{
        echo "<script> alert('Deletion Failed!') </script>";
    }

}

if(isset($_POST['dlt_proh_one_sale'])){  

    $getitid=$_POST['hp_prod_id_sale'];

    delthatprod($getitid,$con);

    $sql="DELETE FROM `prod_sch_house_sale` WHERE `hps_id` = '$getitid'";

    $result=mysqli_query($con,$sql);

    if($result){
        header("Location:edithplants.php");
        echo "<script> alert('All Entries Deleted Successfully!!') </script>";
        exit;
    }
    else{
        echo "<script> alert('Deletion Failed!') </script>";
    }

}
if(isset($_POST['dlto_proh_one_sale'])){  

    $getitid=$_POST['hp_prod_id_sale'];

    delthatprod($getitid,$con);

    $sql="DELETE FROM `prod_sch_office_sale` WHERE `ops_id` = '$getitid'";

    $result=mysqli_query($con,$sql);

    if($result){
        header("Location:edito_sale_plants.php");
        echo "<script> alert('All Entries Deleted Successfully!!') </script>";
        exit;
    }
    else{
        echo "<script> alert('Deletion Failed!') </script>";
    }

}


if(isset($_POST['dlt_proh_one_office'])){  

    $getitid=$_POST['hp_prod_id'];

    delthatprod($getitid,$con);

    $sql="DELETE FROM `prod_sch_office` WHERE `op_id` = '$getitid'";

    $result=mysqli_query($con,$sql);

    if($result){
       
        header("Location:edithplants.php");
        echo "<script> alert('All Entries Deleted Successfully!!') </script>";
        exit;
    }
    else{
        echo "<script> alert('Deletion Failed!') </script>";
    }

}
if(isset($_POST['dlt_proh_one_out'])){  

    $getitid=$_POST['hp_prod_id'];

    delthatprod($getitid,$con);

    $sql="DELETE FROM `prod_search` WHERE `prid` = '$getitid'";

    $result=mysqli_query($con,$sql);

    if($result){
       
        header("Location:editodplants.php");
        echo "<script> alert('All Entries Deleted Successfully!!') </script>";
        exit;
    }
    else{
        echo "<script> alert('Deletion Failed!') </script>";
    }

}
if(isset($_POST['dlt_proh_one_bsh'])){  

    $getitid=$_POST['hp_prod_id'];

    delthatprod($getitid,$con);

    $sql="DELETE FROM `bs_house` WHERE `bsh_id` = '$getitid'";

    $result=mysqli_query($con,$sql);

    if($result){
       
        header("Location:editodplants.php");
        echo "<script> alert('All Entries Deleted Successfully!!') </script>";
        exit;
    }
    else{
        echo "<script> alert('Deletion Failed!') </script>";
    }

}

if(isset($_POST['dlt_proh_one_bso'])){  

    $getitid=$_POST['hp_prod_id'];

    delthatprod($getitid,$con);

    $sql="DELETE FROM `bs_office` WHERE `bso_id` = '$getitid'";

    $result=mysqli_query($con,$sql);

    if($result){
       
        header("Location:editodplants.php");
        echo "<script> alert('All Entries Deleted Successfully!!') </script>";
        exit;
    }
    else{
        echo "<script> alert('Deletion Failed!') </script>";
    }

}
if(isset($_POST['dlt_proh_one_bsod'])){  

    $getitid=$_POST['hp_prod_id'];

    delthatprod($getitid,$con);

    $sql="DELETE FROM `bs_outdoor` WHERE `bsod_id` = '$getitid'";

    $result=mysqli_query($con,$sql);

    if($result){
       
        header("Location:editodplants.php");
        echo "<script> alert('All Entries Deleted Successfully!!') </script>";
        exit;
    }
    else{
        echo "<script> alert('Deletion Failed!') </script>";
    }

}






if(isset($_POST['sdlt_proh_one_sale'])){  

    $getitid=$_POST['hp_prod_id'];

    delthatprod($getitid,$con);

    $sql="DELETE FROM `prod_search_sale` WHERE `pridd` = '$getitid'";

    $result=mysqli_query($con,$sql);

    if($result){
       
        header("Location:editodplants.php");
        echo "<script> alert('All Entries Deleted Successfully!!') </script>";
        exit;
    }
    else{
        echo "<script> alert('Deletion Failed!') </script>";
    }

}




if(isset($_POST['add_prod_house'])){

    $hs_name=$_POST['hs_name'];
    $hs_url=$_POST['hs_url'];
    $hs_desc=$_POST['hs_desc'];
    $hs_price=$_POST['hs_price'];

    $gotidd=getIdDetails($hs_name,$hs_url,$hs_desc,$hs_price,$con);

    
    $sql2="INSERT INTO `prod_sch_house` (`hp_id`,`hp_img`,`hp_name`,`hp_price`,`hp_desc`) VALUES ('$gotidd','$hs_url','$hs_name','$hs_price','$hs_desc')";
    
    $result=mysqli_query($con,$sql2);
    
    if($result){
        echo "<script>GOT IT</script>";
        header("Location:edithplants.php");
        exit;
    }
    else{
    
    }
    
    
    }


if(isset($_POST['bs_house_add'])){

    $hs_name=$_POST['hs_name'];
    $hs_url=$_POST['hs_url'];
    $hs_desc=$_POST['hs_desc'];
    $hs_price=$_POST['hs_price'];

    $gotidd=getIdDetails($hs_name,$hs_url,$hs_desc,$hs_price,$con);

    
    $sql2="INSERT INTO `bs_house` (`bsh_id`,`bsh_img`,`bsh_name`,`bsh_price`,`bsh_desc`) VALUES ('$gotidd','$hs_url','$hs_name','$hs_price','$hs_desc')";
    
    $result=mysqli_query($con,$sql2);
    
    if($result){
        echo "<script>GOT IT</script>";
        header("Location:edithplants.php");
        exit;
    }
    else{
    
    }
    
    
    }

if(isset($_POST['bs_office_add'])){

    $hs_name=$_POST['hs_name'];
    $hs_url=$_POST['hs_url'];
    $hs_desc=$_POST['hs_desc'];
    $hs_price=$_POST['hs_price'];

    $gotidd=getIdDetails($hs_name,$hs_url,$hs_desc,$hs_price,$con);

    
    $sql2="INSERT INTO `bs_office` (`bso_id`,`bso_img`,`bso_name`,`bso_price`,`bso_desc`) VALUES ('$gotidd','$hs_url','$hs_name','$hs_price','$hs_desc')";
    
    $result=mysqli_query($con,$sql2);
    
    if($result){
        echo "<script>GOT IT</script>";
        header("Location:edithplants.php");
        exit;
    }
    else{
    
    }
    
    
    }


if(isset($_POST['bs_outdoor_add'])){

    $hs_name=$_POST['hs_name'];
    $hs_url=$_POST['hs_url'];
    $hs_desc=$_POST['hs_desc'];
    $hs_price=$_POST['hs_price'];

    $gotidd=getIdDetails($hs_name,$hs_url,$hs_desc,$hs_price,$con);

    
    $sql2="INSERT INTO `bs_outdoor` (`bsod_id`,`bsod_img`,`bsod_name`,`bsod_price`,`bsod_desc`) VALUES ('$gotidd','$hs_url','$hs_name','$hs_price','$hs_desc')";
    
    $result=mysqli_query($con,$sql2);
    
    if($result){
        echo "<script>GOT IT</script>";
        header("Location:edithplants.php");
        exit;
    }
    else{
    
    }
    
    
    }



   



if(isset($_POST['add_prod_outdoor'])){

    $hs_name=$_POST['hs_name'];
    $hs_url=$_POST['hs_url'];
    $hs_desc=$_POST['hs_desc'];
    $hs_price=$_POST['hs_price'];

    $gotidd=getIdDetails($hs_name,$hs_url,$hs_desc,$hs_price,$con);

    
    $sql2="INSERT INTO `prod_search` (`prid`,`primg`,`prname`,`prprice`,`prod_desc`) VALUES ('$gotidd','$hs_url','$hs_name','$hs_price','$hs_desc')";
    
    $result=mysqli_query($con,$sql2);
    
    if($result){
        echo "<script>GOT IT</script>";
        header("Location:editodplants.php");
        exit;
    }
    else{
    
    }
    
    
    }

    if(isset($_POST['add_prod_house_sale'])){

        $hs_name=$_POST['hs_name'];
        $hs_url=$_POST['hs_url'];
        $hs_desc=$_POST['hs_desc'];
        $hs_price=$_POST['hs_price'];
        $hs_sprice=$_POST['hs_sprice'];

        
    
        $gotidd=getIdDetails($hs_name,$hs_url,$hs_desc,$hs_sprice,$con);
    
        
        $sql2="INSERT INTO `prod_sch_house_sale` (`hps_id`,`hps_img`,`hps_name`,`hps_price`,`hps_delprice`,`hps_desc`) VALUES ('$gotidd','$hs_url','$hs_name','$hs_sprice','$hs_price','$hs_desc')";
        
        $result=mysqli_query($con,$sql2);
        
        if($result){
            echo "<script>GOT IT</script>";
            header("Location:edithsplants.php");
            exit;
        }
        else{
        
        }
        
        
        }
    if(isset($_POST['add_prod_out_sale'])){

        $hs_name=$_POST['hs_name'];
        $hs_url=$_POST['hs_url'];
        $hs_desc=$_POST['hs_desc'];
        $hs_price=$_POST['hs_price'];
        $hs_sprice=$_POST['hs_sprice'];

        
    
        $gotidd=getIdDetails($hs_name,$hs_url,$hs_desc,$hs_sprice,$con);
    
        
        $sql2="INSERT INTO `prod_search_sale` (`pridd`,`primgg`,`prnamee`,`prpricee`,`prdelpricee`,`prod_descc`) VALUES ('$gotidd','$hs_url','$hs_name','$hs_sprice','$hs_price','$hs_desc')";
        
        $result=mysqli_query($con,$sql2);
        
        if($result){
            echo "<script>GOT IT</script>";
            header("Location:edithplants.php");
            exit;
        }
        else{
        
        }
        
        
        }
    if(isset($_POST['add_prod_office_sale'])){

        $hs_name=$_POST['hs_name'];
        $hs_url=$_POST['hs_url'];
        $hs_desc=$_POST['hs_desc'];
        $hs_price=$_POST['hs_price'];
        $hs_sprice=$_POST['hs_sprice'];

        
    
        $gotidd=getIdDetails($hs_name,$hs_url,$hs_desc,$hs_sprice,$con);
    
        
        $sql2="INSERT INTO `prod_sch_office_sale` (`ops_id`,`ops_img`,`ops_name`,`ops_price`,`ops_delprice`,`ops_desc`) VALUES ('$gotidd','$hs_url','$hs_name','$hs_sprice','$hs_price','$hs_desc')";
        
        $result=mysqli_query($con,$sql2);
        
        if($result){
            echo "<script>GOT IT</script>";
            header("Location:edithplants.php");
            exit;
        }
        else{
        
        }
        
        
        }


        if(isset($_POST['add_prod_office'])){

            $hs_name=$_POST['hs_name'];
            $hs_url=$_POST['hs_url'];
            $hs_desc=$_POST['hs_desc'];
            $hs_price=$_POST['hs_price'];
        
            $gotidd=getIdDetails($hs_name,$hs_url,$hs_desc,$hs_price,$con);
        
            
            $sql2="INSERT INTO `prod_sch_office` (`op_id`,`op_img`,`op_name`,`op_price`,`op_desc`) VALUES ('$gotidd','$hs_url','$hs_name','$hs_price','$hs_desc')";
            
            $result=mysqli_query($con,$sql2);
            
            if($result){
                echo "<script>GOT IT</script>";
                header("Location:edithplants.php");
                exit;
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

    $tablename="prod_sch_house";

    makeChangeAllProd($tablename,$hpe_name,$hs_urll,$hs_descc,$hs_pricee,$edit_prodid,$con);
    
    $sql3="UPDATE `prod_sch_house`  SET `hp_name`='$hpe_name',`hp_img`='$hs_urll',`hp_desc`='$hs_descc',`hp_price`='$hs_pricee' where `hp_id`='$edit_prodid'";
    
    $result3=mysqli_query($con,$sql3);
    
    if($result3){
        echo "<script>GOT IOT</script>";
        header("Location:edithplants.php");
    }


}
    if(isset($_POST['edit_prod_out'])){
    
    $hpe_name=$_POST['hs_namee'];
    $hs_urll=$_POST['hs_urll'];
    $hs_descc=$_POST['hs_descc'];
    $hs_pricee=$_POST['hs_pricee'];
    $edit_prodid=$_POST['edit_prodid'];

    $tablename="prod_search";

    makeChangeAllProd($tablename,$hpe_name,$hs_urll,$hs_descc,$hs_pricee,$edit_prodid,$con);
    
    $sql3="UPDATE `prod_search`  SET `prname`='$hpe_name',`primg`='$hs_urll',`prod_desc`='$hs_descc',`prprice`='$hs_pricee' where `prid`='$edit_prodid'";
    
    $result3=mysqli_query($con,$sql3);
    
    if($result3){
        echo "<script>GOT IOT</script>";
        header("Location:editodplants.php");
    }


}
   
    // if(isset($_POST['edit_prod_house'])){
    
    // $hpe_name=$_POST['hs_namee'];
    // $hs_urll=$_POST['hs_urll'];
    // $hs_descc=$_POST['hs_descc'];
    // $hs_pricee=$_POST['hs_pricee'];
    // $edit_prodid=$_POST['edit_prodid'];

    // $tablename="prod_sch_house";

    // makeChangeAllProd($tablename,$hpe_name,$hs_urll,$hs_descc,$hs_pricee,$edit_prodid,$con);
    
    // $sql3="UPDATE `prod_sch_house`  SET `hp_name`='$hpe_name',`hp_img`='$hs_urll',`hp_desc`='$hs_descc',`hp_price`='$hs_pricee' where `hp_id`='$edit_prodid'";
    
    // $result3=mysqli_query($con,$sql3);
    
    // if($result3){
    //     echo "<script>GOT IOT</script>";
    //     header("Location:edithplants.php");
    // }
    
    // }

    if(isset($_POST['edit_prod_office'])){
    
    $hpe_name=$_POST['hs_namee'];
    $hs_urll=$_POST['hs_urll'];
    $hs_descc=$_POST['hs_descc'];
    $hs_pricee=$_POST['hs_pricee'];
    $edit_prodid=$_POST['edit_prodid'];

    $tablename="prod_sch_office";

    makeChangeAllProd($tablename,$hpe_name,$hs_urll,$hs_descc,$hs_pricee,$edit_prodid,$con);
    
    $sql3="UPDATE `prod_sch_office`  SET `op_name`='$hpe_name',`op_img`='$hs_urll',`op_desc`='$hs_descc',`op_price`='$hs_pricee' where `op_id`='$edit_prodid'";
    
    $result3=mysqli_query($con,$sql3);
    
    if($result3){
        echo "<script>GOT IOT</script>";
        header("Location:edithplants.php");
    }
    
    }

    if(isset($_POST['edit_prod_bsh'])){
    
    $hpe_name=$_POST['hs_namee'];
    $hs_urll=$_POST['hs_urll'];
    $hs_descc=$_POST['hs_descc'];
    $hs_pricee=$_POST['hs_pricee'];
    $edit_prodid=$_POST['edit_prodid'];

    $tablename="prod_sch_office";

    makeChangeAllProd($tablename,$hpe_name,$hs_urll,$hs_descc,$hs_pricee,$edit_prodid,$con);
    
    $sql3="UPDATE `bs_house`  SET `bsh_name`='$hpe_name',`bsh_img`='$hs_urll',`bsh_desc`='$hs_descc',`bsh_price`='$hs_pricee' where `bsh_id`='$edit_prodid'";
    
    $result3=mysqli_query($con,$sql3);
    
    if($result3){
        echo "<script>GOT IOT</script>";
        header("Location:edithplants.php");
    }
    
    }


    if(isset($_POST['edit_prod_bso'])){
    
    $hpe_name=$_POST['hs_namee'];
    $hs_urll=$_POST['hs_urll'];
    $hs_descc=$_POST['hs_descc'];
    $hs_pricee=$_POST['hs_pricee'];
    $edit_prodid=$_POST['edit_prodid'];

    $tablename="bs_office";

    makeChangeAllProd($tablename,$hpe_name,$hs_urll,$hs_descc,$hs_pricee,$edit_prodid,$con);
    
    $sql3="UPDATE `bs_office`  SET `bso_name`='$hpe_name',`bso_img`='$hs_urll',`bso_desc`='$hs_descc',`bso_price`='$hs_pricee' where `bso_id`='$edit_prodid'";
    
    $result3=mysqli_query($con,$sql3);
    
    if($result3){
        echo "<script>GOT IOT</script>";
        header("Location:edithplants.php");
    }
    
    }


    if(isset($_POST['edit_prod_bsod'])){
    
    $hpe_name=$_POST['hs_namee'];
    $hs_urll=$_POST['hs_urll'];
    $hs_descc=$_POST['hs_descc'];
    $hs_pricee=$_POST['hs_pricee'];
    $edit_prodid=$_POST['edit_prodid'];

    $tablename="bs_outdoor";

    makeChangeAllProd($tablename,$hpe_name,$hs_urll,$hs_descc,$hs_pricee,$edit_prodid,$con);
    
    $sql3="UPDATE `bs_outdoor`  SET `bsod_name`='$hpe_name',`bsod_img`='$hs_urll',`bsod_desc`='$hs_descc',`bsod_price`='$hs_pricee' where `bsod_id`='$edit_prodid'";
    
    $result3=mysqli_query($con,$sql3);
    
    if($result3){
        echo "<script>GOT IOT</script>";
        header("Location:bs_outdoor.php");
    }
    
    }








  



    

    if(isset($_POST['edit_prod_house_sale'])){
    
    $hpe_name=$_POST['hs_namee'];
    $hs_urll=$_POST['hs_urll'];
    $hs_descc=$_POST['hs_descc'];
    $hs_pricee=$_POST['hs_pricee'];
    $hs_spricee=$_POST['hs_spricee'];
    $edit_prodid=$_POST['edit_prodid'];


    $tablename="prod_sch_house_sale";

    makeChangeAllProd($tablename,$hpe_name,$hs_urll,$hs_descc,$hs_spricee,$edit_prodid,$con);
    
    $sql3="UPDATE `prod_sch_house_sale`  SET `hps_name`='$hpe_name',`hps_img`='$hs_urll',`hps_desc`='$hs_descc',`hps_price`='$hs_spricee',`hps_delprice`='$hs_pricee' WHERE `hps_id`='$edit_prodid'";
    
    $result3=mysqli_query($con,$sql3);
    
    if($result3){
        echo "<script>GOT IOT</script>";
        header("Location:edithplants.php");
    }
   
    
    
    }

    if(isset($_POST['edit_prod_office_sale'])){
    
    $hpe_name=$_POST['hs_namee'];
    $hs_urll=$_POST['hs_urll'];
    $hs_descc=$_POST['hs_descc'];
    $hs_pricee=$_POST['hs_pricee'];
    $hs_spricee=$_POST['hs_spricee'];
    $edit_prodid=$_POST['edit_prodid'];


    $tablename="prod_sch_office_sale";

    makeChangeAllProd($tablename,$hpe_name,$hs_urll,$hs_descc,$hs_spricee,$edit_prodid,$con);
    
    $sql3="UPDATE `prod_sch_office_sale`  SET `ops_name`='$hpe_name',`ops_img`='$hs_urll',`ops_desc`='$hs_descc',`ops_price`='$hs_spricee',`ops_delprice`='$hs_pricee' WHERE `ops_id`='$edit_prodid'";
    
    $result3=mysqli_query($con,$sql3);
    
    if($result3){
        echo "<script>GOT IOT</script>";
        header("Location:edito_sale_plants.php");
    }
   
    
    
    }
    if(isset($_POST['edit_prod_out_sale'])){
    
    $hpe_name=$_POST['hs_namee'];
    $hs_urll=$_POST['hs_urll'];
    $hs_descc=$_POST['hs_descc'];
    $hs_pricee=$_POST['hs_pricee'];
    $hs_spricee=$_POST['hs_spricee'];
    $edit_prodid=$_POST['edit_prodid'];


    $tablename="prod_search_sale";

    makeChangeAllProd($tablename,$hpe_name,$hs_urll,$hs_descc,$hs_spricee,$edit_prodid,$con);
    
    $sql3="UPDATE `prod_search_sale`  SET `prnamee`='$hpe_name',`primgg`='$hs_urll',`prod_descc`='$hs_descc',`prpricee`='$hs_spricee',`prdelpricee`='$hs_pricee' WHERE `pridd`='$edit_prodid'";
    
    $result3=mysqli_query($con,$sql3);
    
    if($result3){
        echo "<script>GOT IOT</script>";
        header("Location:editod_sale_plants.php");
    }
   
    
    
    }




    
    


    function getIdDetails($hs_name,$hs_url,$hs_desc,$hs_price,$conn){

        // require_once "dbcon.php";

        $sql_main="INSERT INTO `all_products` (`plant_name`, `plant_img`, `plant_price`, `plant_desc`) VALUES ('$hs_name', '$hs_url', '$hs_price', '$hs_desc')";

        $result_main=mysqli_query($conn,$sql_main);

        if($result_main){

        $getitsID="SELECT `plant_id` FROM `all_products` ORDER BY `plant_id` DESC LIMIT 1";

        $res_getitsID=mysqli_query($conn,$getitsID);
        $res_getid=mysqli_fetch_assoc($res_getitsID);

        $that_id=$res_getid['plant_id'];
        return $that_id;
        }


    }


    function makeChangeAllProd($tablename,$hpe_name,$hs_urll,$hs_descc,$hs_pricee,$edit_prodid,$conn){

        $sqledit="UPDATE  `all_products` SET `plant_name`='$hpe_name',`plant_img`='$hs_urll',`plant_desc`='$hs_descc',`plant_price`='$hs_pricee' where `plant_id`='$edit_prodid'";

        $makeedit=mysqli_query($conn,$sqledit);


    }

    function delthatprod($prod_gotid,$conn){

        $sqldel_that_prod="DELETE FROM `all_products` WHERE `plant_id` = '$prod_gotid'";

        $result=mysqli_query($conn,$sqldel_that_prod);

    }












?>



