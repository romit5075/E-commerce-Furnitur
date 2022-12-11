<?php
include "./includes/connect.php";
$order_id = $_GET['order'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Invoice Template Design</title>
    <link rel="stylesheet" type="text/css" href="invoice.css">
</head>

<body>
    <?php
    
    $order="SELECT * FROM `orders` WHERE `order_id` = '".$order_id."' ";
    $runorder=mysqli_query($con,$order);
    while($row1=mysqli_fetch_assoc($runorder)):
        $oid=$row1['order_id'];
        $userd=$row1['user_id'];
        $totalprice=$row1['total_price'];
        $orderstatus=$row1['order_status'];
        $date=$row1['timestampe'];

        $orderitem="SELECT * FROM `orderitems` WHERE `order_id`='".$order_id."'";
        $runorderitem=mysqli_query($con,$orderitem);
        while($row2=mysqli_fetch_assoc($runorderitem)):
            $product_price=$row2['product_price'];
            $qnt=$row2['quantity'];
            $productid=$row2['product_id'];

            $product="SELECT * FROM `product` WHERE `product_id`='".$productid."'";
            $runproduct=mysqli_query($con,$product);
            while($row3=mysqli_fetch_assoc($runproduct)):
                $name=$row3['product_title'];
                $pdescription=$row3['product_description'];
                $img=$row3['product_img'];

                $register="SELECT * FROM `registration` WHERE `id`= '".$userd."'";
                $runregister=mysqli_query($con,$register);
                while($row4=mysqli_fetch_assoc($runregister)):
                    $username=$row4['username'];
                    $email=$row4['email'];
                    $phone=$row4['phone'];
                    $address=$row4['address'];
                    $pincode=$row4['pincode'];
                    $city=$row4['city'];
                    $state=$row4['state'];
      
    ?>
    <div class="wrapper">
        <div class="invoice_wrapper">
            <div class="header">
                <div class="logo_invoice_wrap">
                    <div class="logo_sec">
                        <img src=".upload/codingboss.png" alt="code logo">
                        <div class="title_wrap">
                            <p class="title bold">Smile Home</p>
                            <p class="sub_title">Furniture</p>

                        </div>
                    </div>
                    <div class="invoice_sec">
                        <p class="invoice bold">INVOICE</p>
                        <p class="invoice_no">
                            <span class="bold">Invoice</span>
                            <span>#3488</span>
                        </p>
                        <p class="date">
                            <span class="bold">Date</span>
                            <span>08/Jan/2022</span>
                        </p>
                    </div>
                </div>
                <div class="bill_total_wrap">
                    <div class="bill_sec">
                        <p>Bill To</p>
                        <p class="bold name"><?php echo $username;?></p>
                        <span>
                            <?php echo $address;?><br />
                            <?php echo $city;?><br/>
                            <?php echo $pincode;?><br/>
                            <?php echo "+".$phone;?><br/>
                        </span>
                    </div>
                    <!-- <div class="total_wrap">
                        <p>Total Due</p>
                        <p class="bold price">USD: $1200</p>
                    </div> -->
                </div>
            </div>
            <div class="body">
                <div class="main_table">
                    <div class="table_header">
                        <div class="row">
                            <div class="col col_no">NO.</div>
                            <div class="col col_des">ITEM DESCRIPTION</div>
                            <div class="col col_price">PRICE</div>
                            <div class="col col_qty">QTY</div>
                            <div class="col col_total">TOTAL</div>
                        </div>
                    </div>
                    <div class="table_body">
                        <div class="row">
                            <div class="col col_no">
                                <p>01</p>
                            </div>
                            <div class="col col_des">
                                <p class="bold"><?php echo $name;?></p>
                                <p>lhjh hjhkj hjkh</p>
                            </div>
                            <div class="col col_price">
                                <p>$350</p>
                            </div>
                            <div class="col col_qty">
                                <p>2</p>
                            </div>
                            <div class="col col_total">
                                <p>$700.00</p>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="paymethod_grandtotal_wrap">
                    <div class="paymethod_sec">
                        <p class="bold">Payment Method</p>
                        <p>Visa, master Card and We accept Cheque</p>
                    </div>
                    <div class="grandtotal_sec">
                        <p class="bold">
                            <span>SUB TOTAL</span>
                            <span>$7500</span>
                        </p>
                        <p>
                            <span>Tax Vat 18%</span>
                            <span>$200</span>
                        </p>
                        <p>
                            <span>Discount 10%</span>
                            <span>-$700</span>
                        </p>
                        <p class="bold">
                            <span>Grand Total</span>
                            <span>$7000.0</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="footer">
                <p>Thank you and Best Wishes</p>
                <div class="terms">
                    <p class="tc bold">Terms & Coditions</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit non praesentium doloribus. Quaerat
                        vero iure itaque odio numquam, debitis illo quasi consequuntur velit, explicabo esse nesciunt
                        error aliquid quis eius!</p>
                </div>
            </div>
        </div>
    </div>

    <?php endwhile?>
    <?php endwhile?>
    <?php endwhile?>
    <?php endwhile?>
</body>

</html>