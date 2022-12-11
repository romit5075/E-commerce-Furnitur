<!DOCTYPE html>
<?php
include('index.php');
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <style>
    /* Googlefont Poppins CDN Link */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
        /* margin: 0;
  padding: 0; */
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .romti {
        margin: 30px 10px 10px 500px;
    }


    .home-content .overview-boxes {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        padding: 0 20px;
        margin-bottom: 26px;
    }

    .overview-boxes .box {
        display: flex;
        align-items: center;
        justify-content: center;
        width: calc(100% / 4 - 15px);
        background: #fff;
        padding: 15px 14px;
        border-radius: 12px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .overview-boxes .box-topic {
        font-size: 20px;
        font-weight: 500;
    }

    .home-content .box .number {
        display: inline-block;
        font-size: 35px;
        margin-top: -6px;
        font-weight: 500;
    }

    .home-content .box .indicator {
        display: flex;
        align-items: center;
    }

    .home-content .box .indicator i {
        height: 20px;
        width: 20px;
        background: #8FDACB;
        line-height: 20px;
        text-align: center;
        border-radius: 50%;
        color: #fff;
        font-size: 20px;
        margin-right: 5px;
    }

    .box .indicator i.down {
        background: #e87d88;
    }

    .home-content .box .indicator .text {
        font-size: 12px;
    }

    .home-content .box .cart {
        display: inline-block;
        font-size: 32px;
        height: 50px;
        width: 50px;
        background: #cce5ff;
        line-height: 50px;
        text-align: center;
        color: #66b0ff;
        border-radius: 12px;
        margin: -15px 0 0 6px;
    }

    .home-content .box .cart.two {
        color: #2BD47D;
        background: #C0F2D8;
    }

    .home-content .box .cart.three {
        color: #ffc233;
        background: #ffe8b3;
    }

    .home-content .box .cart.four {
        color: #e05260;
        background: #f7d4d7;
    }

    .home-content .total-order {
        font-size: 20px;
        font-weight: 500;
    }

    .home-content .sales-boxes {
        display: flex;
        justify-content: space-between;
        /* padding: 0 20px; */
    }
    
    .romit {
        margin: 60px 10px 10px 220px;
    }
    </style>
</head>

<body style="overflow-x: hidden;">
    <!-- Breadcrumb End -->
    
    <div class="romit">
        <div class="home-content">
        <?php
            $sql="SELECT * FROM `orders`";
            $res=mysqli_query($con,$sql);
            $totaleorders=mysqli_num_rows($res);
           

        ?>
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Order</div>
                        <div class="number"><?php echo $totaleorders;?></div>
                        <!-- <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Up from yesterday</span>
                        </div> -->
                    </div>
                    <i class='bx bx-cart-alt cart'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Sales</div>
                        <div class="number">38,876</div>
                        <!-- <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Up from yesterday</span>
                        </div> -->
                    </div>
                    <i class='bx bxs-cart-add cart two'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Profit</div>
                        <div class="number">12,876</div>
                        <!-- <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Up from yesterday</span>
                        </div> -->
                    </div>
                    <i class='bx bx-cart cart three'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Return</div>
                        <div class="number">11,086</div>
                        <!-- <div class="indicator">
                            <i class='bx bx-down-arrow-alt down'></i>
                            <span class="text">Down From Today</span>
                        </div> -->
                    </div>
                    <i class='bx bxs-cart-download cart four'></i>
                </div>
            </div>
        </div>

</html>