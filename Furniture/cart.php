<?php
include('includes/connect.php');
session_start();
error_reporting(E_ERROR | E_PARSE);
if (!isset($_SESSION['email'])) {
    echo "
    <script>
      window.location.href = 'login.php';
    </script>";
}


?>

<?php
include('./header.php');
// if(isset($_GET['quantity'])){

$cart = $_SESSION['cart'];

if (is_array($cart) || is_object($cart)) {

    foreach ($cart as $key => $value) {
        // echo $key . " : " .  "<br>";
        // echo $value['quantity'] . "<br>";
    }
}
// print_r($cart);
// }



if (isset($_GET['product_cart_id'])) {

    if (isset($_GET['quantity'])) {
        $quantity = $_GET['quantity'];
    } else {
        $quantity = 1;
    }

    $cart_id = $_GET['product_cart_id'];

    $_SESSION['cart'][$cart_id] = array('quantity' => $quantity);

    // echo "<pre>";
    // print_r($_SESSION['cart']);
    // echo "</pre>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

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


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">

                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>

                    </thead>
                    <tbody class="align-middle">
                        <?php
                        $total = 0;
                        // if(is_array($cart) || is_object($cart)){
                            foreach ($cart as $key => $value) {
                                $sql = "SELECT * FROM `product` WHERE `product_id`='$key'";
                                $res = mysqli_query($con, $sql);
                                $row = mysqli_fetch_assoc($res);
                                $pro_id = $row['product_id'];
                        // }
                        
                        ?>
                            <tr>
                                <td class="align-middle"><img src="./Admin/upload/<?php echo $row['product_img']; ?>" style="width: 50px;"></td>
                                <?php echo '<td class="align-middle"><a style="color:black"; href="detail.php?productid=' . $row['product_id'] . '">' . $row['product_title'] . '</a></td>'; ?>
                                <td class="align-middle">₹<?php echo $row['product_price']; ?></td>
                                <td class="align-middle"><?php echo $value['quantity']; ?></td>
                                <td class="align-middle">
                                    ₹<?php echo (int)$row['product_price'] * (int)$value['quantity']; ?></td>
                                <?php echo ' <td class="align-middle"> <a href="deleteCart.php?deleteCart=' . $pro_id . '" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>'; ?>

                                <?php
                                $total = $total + ((int)$row['product_price'] * (int)$value['quantity']);
                                ?>
                            <?php } ?>
                            </tr>

                    </tbody>
                </table>


            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                        Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>₹<?php echo $total; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium"><span style="font-size: 15px" ;> </span>₹699/-</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>₹<?php echo $total; ?>/-</h5>
                        </div>
                        <a href="checkout.php"><button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To
                                Checkout</button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Cart End -->

    <!-- Footer -->
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

</html>