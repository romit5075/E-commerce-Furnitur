<?php
session_start();
include('includes/connect.php');
if(!isset($_SESSION['userid'])){
    echo "
    <script>
      window.location.href = 'main.php';
    </script>";
}else{

$product_id=$_GET['p_id']; //delete id aj product id
$user_id=$_GET['cid'];

$del="DELETE FROM `wishlist` WHERE `pid`='$product_id' AND `uid`='$user_id'";
$done=mysqli_query($con,$del);


if($done){
    echo "
    <script>
      window.location.href = 'wishlist.php';
    </script>";
}

}
?>