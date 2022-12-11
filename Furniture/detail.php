<?php
session_start();
include('includes/connect.php');
if (!isset($_SESSION['email'])) {
    echo "
    <script>
      window.location.href = 'login.php';
    </script>";
}
$product_id = $_GET['productid'];

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
    <style>
        p.a{
            word-break: break-all;
        }
    </style>
</head>

<body style="overflow-x: hidden">

    <!-- Navbar -->

    <?php
    include('./header.php');
    ?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <a class="breadcrumb-item text-dark" href="shop.php">Shop</a>
                    <span class="breadcrumb-item active">Shop Detail</span>

                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <?php
        $que = "SELECT * FROM `product` WHERE `product_id`='$product_id'";
        $res = mysqli_query($con, $que);

        while ($row = mysqli_fetch_assoc($res)) :
            $p_name = $row['product_title'];
            $p_img = $row['product_img'];
            $p_price = $row['product_price'];
            $p_id = $row['product_id'];
            $p_description = $row['product_description'];
        ?><h1></h1>

            <div class="row px-xl-5">
                <div class="col-lg-5  mb-30">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner bg-light">
                            <div class="carousel-item active">
                                <?php echo '<img class="w-100 h-100" src="./Admin/upload/' . $p_img .'" alt="Image">'; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 h-auto mb-30">
                    <div class="h-100 bg-light p-30">
                        <?php echo '<h3>' . $p_name . '</h3>'; ?>
                        <?php echo '<h6 class="font-weight-semi-bold mb-4 ">₹ '. $p_price . '</h6>'; ?>
                        <?php echo '<p class="a" >' . $p_description . '</p>'; ?>
                        <?php 
                        // echo '<ul>
                        //     <li>'.$p_description.'</li>
                        // </ul>';
                        ?>

                        <form action="cart.php">  
                            <div class="d-flex align-items-center mb-4 pt-2">
                                    <input type="hidden" name="product_cart_id" value="<?php echo $p_id;?>">
                                    <input type="number" min="1" max="5" name="quantity" style="margin-right:10px ;" value="1">
                                 <!-- <a class="btn btn-primary px-3" style="margin-right:10px";  type="submit"><i class="fa fa-shopping-cart mr-1"></i></a>
                                <a href="checkout.php"><button class="btn btn-primary px-3"><i class="fa fa-buy mr-1"></i> Buy Now</button></a> -->
                                <a><button class="btn btn-primary px-3" type="submit"><i class="fa fa-buy mr-1"></i> Add TO Cart</button></a>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        <?php endwhile ?>
        <div class="row px-xl-5">
            <div class="col">
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/image/p-1.jpg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="" type="submit"><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <!-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a> -->
                                <a class="btn btn-outline-dark btn-square" href="detail.php"><i class="fa fa-search"></i></a>
                            </div>
                            </form>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>₹123.00</h5>
                                <!-- <h6 class="text-muted ml-2"><del>₹123.00</del></h6> -->
                            </div>
                         
                        </div>
                    </div>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/image/p-2.jpg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <!-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a> -->
                                <a class="btn btn-outline-dark btn-square" href="detail.php"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>₹123.00</h5>
                                <!-- <h6 class="text-muted ml-2"><del>₹123.00</del></h6> -->
                            </div>
                
                        </div>
                    </div>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/image/p-3.jpg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <!-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a> -->
                                <a class="btn btn-outline-dark btn-square" href="detail.php"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>₹123.00</h5>
                                <!-- <h6 class="text-muted ml-2"><del>₹123.00</del></h6> -->
                            </div>
                            
                        </div>
                    </div>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/image/p-5.jpg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <!-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a> -->
                                <a class="btn btn-outline-dark btn-square" href="detail.php"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>₹123.00</h5>
                                <!-- <h6 class="text-muted ml-2"><del>₹123.00</del></h6> -->
                            </div>
                           
                        </div>
                    </div>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/image/p-4.jpg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <!-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a> -->
                                <a class="btn btn-outline-dark btn-square" href="detail.php"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>₹123.00</h5>
                                <!-- <h6 class="text-muted ml-2"><del>₹123.00</del></h6> -->
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

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

</html>