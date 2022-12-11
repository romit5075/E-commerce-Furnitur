<?php
include("../includes/connect.php");

$id=$_GET['delete_id'];

$sql="DELETE FROM `categories` WHERE `category_id`='$id'";
$res=mysqli_query($con,$sql);

if($res){
    echo "
    <script>
      window.location.href = 'view_category.php';
    </script>";
}
    


?>