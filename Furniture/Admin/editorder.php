<?php
include('index.php');
$orderid = $_GET['orderid'];

if(isset($_POST['update'])){
    $status=$_POST['flexRadioDefault'];

    $updatestatus="UPDATE `orders` SET `order_status`='$status' WHERE `order_id`='".$orderid."'";
    $run=mysqli_query($con,$updatestatus);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <style>
        .romit {
            margin: 35px 70px 33px 249px;
        }
    </style>
</head>

<body>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12 breadcrumb_set mt-3 mb-0">
                <nav class="breadcrumb bg-light ">
                    <a class="breadcrumb-item text-dark" href="oredr.php">Order</a>
                    <span class="breadcrumb-item active">Order details</span>
                </nav>
            </div>
        </div>
    </div>
    <h1 class="text-center mb-2">All Orders</h1>
    <div class="romit">

        <div class="form-row">
            <?php
            $order = "SELECT * FROM `orders` WHERE `order_id`= '" . $orderid . "'";
            $runorder = mysqli_query($con, $order);
            while ($row1 = mysqli_fetch_assoc($runorder)) :
                $userid = $row1['user_id'];
                $date = $row1['timestampe'];
                $total=$row1['total_price'];

                $register = "SELECT * FROM `registration` WHERE `id`='" . $userid . "'";
                $runregister = mysqli_query($con, $register);
                while ($row2 = mysqli_fetch_assoc($runregister)) :
                    $name = $row2['username'];
                    $phone = $row2['phone'];
                    $address = $row2['address'];
                    $city = $row2['city'];
                    $state = $row2['state'];
                    $pin = $row2['pincode'];

                    $orderitem="SELECT * FROM `orderitems` WHERE `order_id`='".$orderid."'";
                    $runorderitem=mysqli_query($con,$orderitem);
                    while($row3=mysqli_fetch_assoc($runorderitem)):
                        $price=$row3['product_price'];
                        $item=$row3['quantity'];
                        $productid=$row3['product_id'];

                        $product="SELECT * FROM `product` WHERE `product_id`='".$productid."'";
                        $runproduct=mysqli_query($con,$product);
                        while($row4=mysqli_fetch_assoc($runproduct)):
                            $img=$row4['product_img'];
                            $pname=$row4['product_title'];

            ?>

                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Customer Name</label>
                        <input type="text" class="form-control" id="inputEmail4" value="<?php echo $name; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Phone</label>
                        <input type="text" class="form-control" id="inputPassword4" value="<?php echo $phone; ?>" readonly>
                    </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" value="<?php echo $address; ?>" readonly>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" value="<?php echo $city; ?>" readonly>
            </div>
            <div class="form-group col-md-3">
                <label for="inputState">State</label>
                <input type="text" class="form-control" id="inputState" value="<?php echo $state; ?>" readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Pin Code</label>
                <input type="text" class="form-control" id="inputZip" value="<?php echo $pin; ?>" readonly>
            </div>
            <div class="form-group col-md-3">
                <label for="inputdate">Date & Time</label>
                <input type="text" class="form-control" id="inputdate" value="<?php echo $date; ?>" readonly>
            </div>
            <div class="form-group col-md-2">
                <img src="../Admin/upload/<?php echo $img;?> ?>" alt="" style="width: 85px; height: 65px">
            </div>
            <div class="form-group col-md-3">
                <label for="inputname">Product Name</label>
                <input type="text" class="form-control" id="inputname" value="<?php echo $pname; ?>" readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="inputq">Quantity</label>
                <input type="text" class="form-control" value="<?php echo $item; ?>" readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="inputq">price</label>
                <input type="text" class="form-control" value="<?php echo $price; ?>" readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="inputq">Total</label>
                <input type="text" class="form-control" value="<?php echo $total; ?>" readonly>
            </div>
        <?php endwhile ?>
    <?php endwhile ?>
    <?php endwhile?>
    <?php endwhile?>
        </div>
        <br><br>
        <form method="POST">
            <?php
            $order = "SELECT * FROM `orders` WHERE `order_id`= '" . $orderid . "'";
            $runorder = mysqli_query($con, $order);
            while ($row5 = mysqli_fetch_assoc($runorder)) :
                $order_status=$row5['order_status'];
                            
            ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Pending"
                <?php 
                    if($order_status == "Pending"){
                        echo "checked";
                    }

                   
                ?>
                >
                <label class="form-check-label" for="flexRadioDefault1">
                    Pending
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4" value="Deliver" 
                <?php 
                    if($order_status == "Deliver"){
                        echo "checked";
                    }
                ?>

                >
                <label class="form-check-label" for="flexRadioDefault4">
                    Deliver
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Delivered" 
                <?php 
                    if($order_status == "Delivered"){
                        echo "checked";
                    }
                ?>
                >
                <label class="form-check-label" for="flexRadioDefault2">
                    Delivered
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="Conform" 
                
                <?php 
                    if($order_status == "Conform"){
                        echo "checked";
                    }
                ?>
                >
                <label class="form-check-label" for="flexRadioDefault3">
                    Conform
                </label>
            </div>
            <?php endwhile ?>
            <br>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <button type="submit" class="btn btn-primary">Download Report</button>
        </form>
    </div>
</body>

</html>