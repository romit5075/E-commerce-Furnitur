<?php
include('includes/connect.php');
error_reporting(E_ERROR | E_PARSE);
session_start();
if (!isset($_SESSION['email'])) {
    echo "
    <script>
      window.location.href = 'login.php';
    </script>";
}


$p_id = $_GET['product_wishlist_id']; //product id
$user_id = $_SESSION['userid'];


//bijivar nathi ne a check karva
$check = "SELECT * FROM `wishlist` WHERE `pid` = '$p_id' AND `uid` = '$user_id'";
$res_check = mysqli_query($con, $check);

if (mysqli_num_rows($res_check) == 1) {
    // echo "product already exists in wishlist";
} else {

    //insert wishlist
    $insertwishlist = "INSERT INTO `wishlist`(`pid`, `uid`) VALUES ('$p_id','$user_id')";
    $res = mysqli_query($con, $insertwishlist);
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Smile Home</title>
    <!-- <meta content="width=device-width, initial-scale=1.0" name="viewport"> -->
    <!-- <meta content="Free HTML Templates" name="keywords">
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
</head>

<body style="overflow-x: hidden">
    <!-- Navbar -->
    <?php
    include('./header.php');

    $chek = "SELECT * FROM `wishlist` WHERE `uid`='$user_id'";
    $check_user = mysqli_query($con, $chek);

    if (mysqli_num_rows($check_user) == 1) {
        echo '
       <div class="alert alert-warning alert-dismissible fade show" role="alert">
       <strong style="color:black";>Your Wishlist is empty <a href="main.php" style="color:green;">Continue Shopping</a></strong>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
       </button>
   </div>
       ';
    }

    ?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">My wishlist</a>
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
                            <th>Products</th>
                            <th>Price</th>
                            <th>Remove</th>
                            <th>Add to Cart</th>
                        </tr>
                    </thead>
                    <?php
                    $query = "SELECT * FROM wishlist JOIN product ON product.product_id=wishlist.pid";
                    $res = mysqli_query($con, $query);

                    if (mysqli_num_rows($res) > 0) {

                        while ($row = mysqli_fetch_array($res)) {
                            $p_name = $row['product_title'];
                            $p_price = $row['product_price'];
                            $p_img = $row['product_img'];
                            $p_id = $row['product_id'];
                    ?>
                            <tbody class="align-middle">
                                <?php
                                echo '
                            <tr>
                                <td class="align-middle"> <a href="detail.php?productid=' . $p_id . '"><img src="./Admin/upload/' . $p_img . '" alt="" style="width: 50px; margin-right:10px;"></a>' . $p_name . '</td>
                                <td class="align-middle">' . $p_price . '</td>
                                <td class="align-middle"> <a href="delete_wishlist.php?p_id=' . $p_id . '&cid=' . $user_id . '" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                                <td class="align-middle"> <a href="" class="btn btn-sm btn-danger"><i class="fas fa-shopping-cart"></i></a></td>
                            </tr>
                            ';
                                ?>
                            </tbody>
                    <?php }
                    } ?>
                </table>


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