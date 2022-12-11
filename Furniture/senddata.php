<?php

$amountrecive=$_POST['amount'];
echo "recive amount= $amountrecive";

$payment = $_POST['payment'];
   
if (!empty($payment)) {
    
    $paymentmode = $_POST['payment'];
    $userid = $_SESSION['userid'];
    $insertorder = "INSERT INTO `orders`(`user_id`,`total_price`,`payment_mode`) VALUES ('$userid','$total','$paymentmode')";

    if (mysqli_query($con, $insertorder)) {
        $orderid = mysqli_insert_id($con);
         $cart = $_SESSION['cart'];
        foreach ($cart as $key => $value) {
            $sql_cart = "SELECT * FROM `product` WHERE `product_id`='$key'";
            $res_cart = mysqli_query($con, $sql_cart);
            $row_cart = mysqli_fetch_assoc($res_cart);
            $productPrice = $row_cart['product_price'];
            $quan = $value['quantity'];
            $insertorderitems = "INSERT INTO `orderitems`(`order_id`, `product_id`, `quantity`, `product_price`) VALUES ('$orderid','$key','$quan','$productPrice')";
            if(mysqli_query($con, $insertorderitems)){
                // data submit in order and orderitem
                unset($_SESSION['cart']);
                // echo "<script>
                // document.getElementById('btn').addEventListener('click',pay_now );
                // event.preventDefault();
                // </script>";


                // echo "
                // <script>
                //   window.location.href = 'user_orders.php';
                // </script>";
                // now payment intigration and reditect  myorders.php *-**-*-*-*-*-*-*-*-*-*-***-
            }
        }
    }
  
}

?>