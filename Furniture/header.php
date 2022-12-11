<?php
@session_start();
include('includes/connect.php');
?>
<!DOCTYPE html>
<html>
<!-- This page is login pop-pop -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smile Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link rel="stylesheet" href="../css/style.css">

    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;

            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 2;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .romit_mr {
            margin: 10px 20px;
        }
    </style>
</head>

<body>
    <div class="d-inline-flex align-items-center d-block d-lg-none">
        <a href="" class="btn px-0 ml-2">
            <i class="fas fa-heart text-dark"></i>
            <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
        </a>
        <a href="" class="btn px-0 ml-2">
            <i class="fas fa-shopping-cart text-dark"></i>
            <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
        </a>
    </div>
    </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">Smile</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Home</span>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">Customer Service</p>
            <h5 class="m-0">+91 9104272600</h5>
        </div>
    </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <!-- Navbar -->
                    <div class="navbar-nav w-100">
                        <!-- <div class="nav-item dropdown dropright">
                            <a href="shop.php" class="nav-link dropdown-toggle" data-toggle="dropdown">Sofas <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="shop.php" class="dropdown-item">Indian Seating Sofa</a>
                                <a href="shop.php" class="dropdown-item">The loveseat/sofa</a>
                                <a href="shop.php" class="dropdown-item">Modular sofa</a>
                            </div>
                        </div> -->
                    </div>
                    <!-- Navbar -->
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Smile</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Furniture</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0" id="nav">
                            <a href="main.php" class="nav-item nav-link">Home</a>
                            <!-- <a href="shop.php" class="nav-item nav-link">Shop</a> -->
                            <a href="Checkout.php" class="nav-item nav-link">Checkout</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                            <!-- <a href="user_profile.php" class="nav-item nav-link">Profile</a> -->
                        </div>


                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <!-- dropdown -->
                            <div class="dropdown">
                                <i class="fas fa-user text-primary romit_mr"></i>
                                <div class="dropdown-content">
                                    <a href="user_profile.php" class="btn px-0 ml-0">My Account</a>
                                    <a href="user_orders.php" class="btn px-0 ml-0">My Orders</a><br>
                                    <!-- <a href="./auth.php" class="btn px-0 ml-0">Login</a> -->
                                    <?php
                                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                                        echo "<button type='button'><a href='./logout.php' class='btn px-0 ml-0'>Logout</a></button>";
                                    } else {
                                        echo "<a href='./login.php' class='btn px-0 ml-0'>Login</a>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <a href="wishlist.php" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <!-- <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"> -->
                            </span>
                               
                            </a>
                            <?php
                            $count = 0;
                            if (isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                            }
                            ?>
                            <a href="cart.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?php echo $count; ?></span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    </script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>