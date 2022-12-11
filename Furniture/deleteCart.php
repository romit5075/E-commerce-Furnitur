<?php
session_start();
if(isset($_GET['deleteCart'])){
    $deleteCartId=$_GET['deleteCart'];
    unset($_SESSION['cart'][$deleteCartId]);
    header('location:cart.php');
}

?>