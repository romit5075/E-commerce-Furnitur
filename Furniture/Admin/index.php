<?php
include("../includes/connect.php");
include('./navbar.php');
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Deshbord</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="rahul.css">
</head>



<body style="overflow-x: hidden;">
    <div class="container">

        <nav class="main-menu" style="height:100vh;">
            <ul>
                <li>
                    <a href="dashbord.php">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Dashbord
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="insert_category.php">
                        <i class="fa fa-add fa-2x"></i>
                        <span class="nav-text">
                            Add Category
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="view_category.php">
                        <i class="fa fa-eye fa-2x"></i>
                        <span class="nav-text">
                            View Category
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="insert_product.php">
                        <i class="fa fa-add fa-2x"></i>
                        <span class="nav-text">
                            Add Product
                        </span>
                    </a>

                </li>
                <li>
                    <a href="view_product.php">
                        <i class="fa fa-eye fa-2x"></i>
                        <span class="nav-text">
                            View Product
                        </span>
                    </a>
                </li>

                <li>
                    <a href="oredr.php">
                        <i class="fa fa-shopping-cart fa-2x"></i>
                        <span class="nav-text">
                            Orders
                        </span>
                    </a>
                </li>

                <li>
                    <a href="allUser.php">
                        <i class="fa fa-users fa-2x"></i>
                        <span class="nav-text">
                            All Users
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
                <!-- <li>
                        <a href="#">
                            <i class="fa fa-user fa-2x"></i>
                            <span class="nav-text">
                               Manage Employee
                            </span>
                        </a>
                    </li> -->
                <li>
                    <?php
                    if(isset($_SESSION['logged_in_admin']) && $_SESSION['logged_in_admin']==true){
                        echo "<a href='./logoutAdmin.php'>
                        <i class='fa fa-power-off fa-2x'></i>
                            <span class='nav-text'>
                                Logout 
                            </span>
                        </a>";
                    }else{
                     
                        if(!$_SESSION['logged_in_admin']){
                            echo "
                            <script>
                              window.location.href = '../login.php';
                            </script>";
                        }
                    }
                    
                        ?>
                </li>
            </ul>
        </nav>
    </div>
 
</body>

</html>