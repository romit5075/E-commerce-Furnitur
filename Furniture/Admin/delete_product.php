<?php
include("../includes/connect.php");

if(isset($_GET['delete_P_id'])){
    $id=$_GET['delete_P_id'];

    $sql="DELETE FROM `product` WHERE `product_id`='$id'";
    $res=mysqli_query($con,$sql);

if($res){
    echo "
    <script>
      window.location.href = 'view_product.php';
    </script>";
}
}

    


?>