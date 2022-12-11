<?php
include('includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Smile Home</title>
    <!-- <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description"> -->

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
        /* .romit_abc{
            z-index: -1;
        } */
    </style>
</head>

<body style="overflow-x: hidden">
    <!-- Navbar -->
    <?php
   include('./header.php');
    ?>
    <!-- This is a alert -->
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Welcome</strong>
                                  <?php
                                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
                                        {
                                            
                                            echo $_SESSION['username'];  
                                        }
                                        else
                                        {
                                            echo "Guest";
                                        }
                                  ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!-- navabar niche no slid show -->
    <div class="romit_abc">
        <div class="container-fluid mb-3 ">
            <div class="row px-xl-5">
                <div class="col-lg-12">
                    <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#header-carousel" data-slide-to="1"></li>
                            <li data-target="#header-carousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item position-relative active" style="height: 500px;">
                                <img class="position-absolute w-100 h-100" src="img/image/slideshow/slide 1.jpg"
                                    style="object-fit: cover;">
                                <div
                                    class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                            Interior design
                                        </h1>
                                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna
                                            amet
                                            lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam
                                        </p>
                                        <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                            href="detail.php">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item position-relative" style="height: 500px;">
                                <img class="position-absolute w-100 h-100" src="img/image/slideshow/slide 2.jpg"
                                    style="object-fit: cover;">
                                <div
                                    class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                            Smart sofa</h1>
                                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna
                                            amet
                                            lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam
                                        </p>
                                        <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                            href="detail.php">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item position-relative" style="height: 500px;">
                                <img class="position-absolute w-100 h-100" src="img/image/slideshow/slide 3.jpg"
                                    style="object-fit: cover;">
                                <div
                                    class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                            office sofa</h1>
                                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna
                                            amet
                                            lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam
                                        </p>
                                        <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                            href="detail.php">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                    <?php
                    if(isset($_COOKIE['emailc'])){
                        echo $_COOKIE['emailc'];
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
            <?php  
                  $show=mysqli_query($con, "SELECT * FROM `categories`");
                  while ($row=mysqli_fetch_array($show)):
                        $cat_id=$row['category_id'];
                       $title=$row['cat_title']; 
                       $img=$row['cat_img'];
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
              <?php echo '<a class="text-decoration-none" href="shop.php?catid='.$cat_id.'">';?>
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="./Admin/upload/<?php echo $img; ?>" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6></h6>
                         <?php echo "<p style='color:black'>$title</p>"; ?>   
                        </div>
                    </div>
                </a>
            </div>
            <?php endwhile ?>
        </div>
    </div>
    <!-- Categories End -->

    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/image/offer/offer-1.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="detail.php" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/image/offer/offer-2.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="detail.php" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured
                Products</span></h2>
        <div class="row px-xl-5">
         <?php  
                  $show=mysqli_query($con, "SELECT * FROM `product` order by rand() limit 0,12");
                  while ($row=mysqli_fetch_array($show)):
                        $img=$row['product_img'];
                       $title=$row['product_title'];
                       $price=$row['product_price']; 
                       $p_id=$row['product_id'];
            ?>  
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="./Admin/upload/<?php echo $img; ?>" alt="">
                        <div class="product-action">
                   <?php   
                    echo '<a class="btn btn-outline-dark btn-square" href="cart.php?product_cart_id='.$p_id.'"><i
                                    class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="wishlist.php?product_wishlist_id='.$p_id.'"><i
                                    class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="detail.php?productid='.$p_id.'"><i
                                    class="fa fa-search"></i></a>
                     ';?>
                        </div>
                    </div>
                    <div class="text-center py-4">
                       <?php echo"<a class='h6 text-decoration-none text-truncate' href=''>$title</a>"; ?> 
                        <div class="d-flex align-items-center justify-content-center mt-2">
                         <?php echo "<h5>$price</h5>";?>   
                            <h6 class="text-muted ml-2"></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">

                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile ?>
            <!-- <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/image/p-8.jpg" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="cart.php"><i
                                    class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="wishlist.php"><i
                                    class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="detail.php"><i
                                    class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>₹123.00</h5>
                            <h6 class="text-muted ml-2"></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">

                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- Products End -->

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