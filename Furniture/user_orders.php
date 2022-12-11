<?php
   include('./header.php');
//    error_reporting(E_ERROR | E_PARSE);
   if(!isset($_SESSION['email'])){
    echo "
    <script>
      window.location.href = 'login.php';
    </script>";
}

if(isset($_SESSION['email'])){
    $user_id=$_SESSION['userid'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Smile Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


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
                    <a class="breadcrumb-item text-dark" href="#">My Orders</a>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <?php
        $sql="";
    
    ?>
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Order Status</th>
                            <th>date</th>
                            <th>Order Item</th>
                            <th>Price</th>
                            
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                            $order="SELECT * FROM `orders` WHERE `user_id`= '".$user_id."'";
                            $runorder=mysqli_query($con,$order);
                            while($row1=mysqli_fetch_assoc($runorder)):
                                $orderstatus=$row1['order_status'];
                                $date=$row1['timestampe'];
                                $orderid=$row1['order_id'];

                                $orderitem="SELECT * FROM `orderitems` WHERE `order_id`='".$orderid."'";
                                $runorderitem=mysqli_query($con,$orderitem);
                                while($row2=mysqli_fetch_assoc($runorderitem)):
                                    $price=$row2['product_price'];
                                    $item=$row2['quantity'];
                                    $productid=$row2['product_id'];

                                    $product="SELECT * FROM `product` WHERE `product_id`='".$productid."'";
                                    $runproduct=mysqli_query($con,$product);
                                    while($row3=mysqli_fetch_assoc($runproduct)):
                                        $img=$row3['product_img'];
                                        $name=$row3['product_title'];
                        ?>
                        <tr>
                            <td class="align-middle"><img src="./Admin/upload/<?php echo $img;?>" alt="" style="width: 50px;"> <?php echo $name;?></td>
                            <td class="align-middle"><?php echo $orderstatus; ?></td>
                            <td class="align-middle"><?php echo $date; ?></td>
                            <td class="align-middle"><?php echo $item;?></td>
                            <td class="align-middle"><?php echo $price;?></td>
                          
                        </tr>

                        <?php endwhile ?>
                        <?php endwhile ?>
                        <?php endwhile ?>
                    </tbody>
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