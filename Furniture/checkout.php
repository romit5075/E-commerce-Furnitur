<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include('includes/connect.php');
if (!isset($_SESSION['email'])) {
    echo "
    <script>
      window.location.href = 'login.php';
    </script>";
}

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $total = 0;
    foreach ($cart as $key => $value) {
        $sql_cart = "SELECT * FROM `product` WHERE `product_id`='$key'";
        $res_cart = mysqli_query($con, $sql_cart);
        $row_cart = mysqli_fetch_assoc($res_cart);
        $total = $total + ($row_cart['product_price'] * $value['quantity'] + 699);
    }
}

$userid = $_SESSION['userid'];

// checkout *****

if (isset($_POST['submit'])) {
    $payment = $_POST['payment'];
   
    if (!empty($payment)) {
        
        $paymentmode = $_POST['payment'];
        $userid = $_SESSION['userid'];
        $insertorder = "INSERT INTO `orders`(`user_id`, `total_price`,`payment_mode`) VALUES ('$userid','$total','$paymentmode')";
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
               
                $romit=1;
                if(mysqli_query($con, $insertorderitems)){
                    // data submit in order and orderitem
                    unset($_SESSION['cart']);

                    $update_status="UPDATE orders SET order_status = 'Pending' WHERE order_status IS NULL OR order_status = ''";
                    $run=mysqli_query($con,$update_status);
                    echo "
                    <script>
                      window.location.href = 'user_orders.php';
                    </script>";
                    // now payment intigration and reditect  myorders.php *-**-*-*-*-*-*-*-*-*-*-***-
                }
            }
        }
      
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Smile Home</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body style="overflow-x: hidden">

    <!-- Navbar -->
    <?php
    include('./header.php');
    //   print_r($_SESSION['cart']);
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        $total = 0;
        foreach ($cart as $key => $value) {
            $sql_cart = "SELECT * FROM `product` WHERE `product_id`='$key'";
            $res_cart = mysqli_query($con, $sql_cart);
            $row_cart = mysqli_fetch_assoc($res_cart);
            $total = $total + ($row_cart['product_price'] * $value['quantity'] + 699);
        }
    }
    ?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <a class="breadcrumb-item text-dark" href="shop.php">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <form method="post" >
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <?php

                            $sql = "SELECT * FROM `registration` WHERE `id`='$userid'";
                            $res = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($res)) {

                            ?>
                                <div class="col-md-6 form-group">
                                    <label>Full Name</label>
                                    <input class="form-control" type="text" value="<?php echo $row['username']; ?>" readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Email Id</label>
                                    <input class="form-control" type="text" value="<?php echo $row['email']; ?>" readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Phone Number</label>
                                    <input class="form-control" type="text" value="<?php echo $row['phone']; ?>" readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Pin Code</label>
                                    <input class="form-control" type="text" value="<?php echo $row['pincode']; ?>" readonly>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Address</label>
                                    <input class="form-control" type="text" value="<?php echo $row['address']; ?>" readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>City</label>
                                    <input class="form-control" type="text" value="<?php echo $row['city']; ?>" readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>State</label>
                                    <input class="form-control" type="text" value="<?php echo $row['state']; ?>" readonly>
                                </div>

                            <?php } ?>
                            <div class="col-md-12 form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="newaccount">
                                    <!-- <label class="custom-control-label" for="newaccount">Create an account</label> -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="shipto">
                                    <!-- <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Ship to different address</label> -->
                                </div>
                            </div>
                            <a href="./user_profile.php" style="color:cornflowerblue" ;>You Can Change Your Address</a>
                        </div>
                    </div>
                 
                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                    <div class="bg-light p-30 mb-5">

                        <div class="border-bottom pt-3 pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Totale product</h6>
                                <?php
                                $car = $_SESSION['cart'];
                                $cou = count($car);
                                ?>
                                <h6><?php echo $cou; ?></h6>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6>₹<?php echo $total; ?></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">699/-</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5>₹<?php echo $total; ?>/-</h5>
                                <input type="text" value="<?php echo $total; ?>" hidden id="amt">
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                        <div class="bg-light p-30">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" value="COD" id="paypal">
                                    <label class="custom-control-label" for="paypal">PayNow</label>
                                </div>
                            </div>
                            
                            <input type='submit' value="pay Now" class="btn btn-block btn-primary font-weight-bold py-3" name="submit" >
                            <input type='button' value="pay Now" class="btn btn-block btn-primary font-weight-bold py-3" onclick="pay_now()">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Checkout End -->

    <!-- Footer  -->
    <?php
    include('./footer.php');
    ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

<script>

    var y="<?php echo $romit?>";
    
    if(y==1){

        // var amt=jQuery('#amt').val();
        var amt=100;
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt,
               success:function(result){
                   var options = {
                        "key": "rzp_test_leHV5g0tLW6Om5", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Acme Corp",
                        "description": "Test Transaction",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });

        }
        
        
</script>
<script>
    function pay_now(){
        var amt=jQuery('#amt').val();
        jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt,
               success:function(result){
                   var options = {
                        "key": "rzp_test_leHV5g0tLW6Om5", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Acme Corp",
                        "description": "Test Transaction",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });

    }
</script>
</html>
</html>