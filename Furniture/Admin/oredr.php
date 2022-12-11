<?php
include('index.php');
?>


<html>

<head>
  <!-- Bootstrap CSS Link -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Font Awersome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Font Awersome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- Serch Start -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <!-- Serch End -->
 
  <!-- Link CSS FILE -->
  <link rel="stylesheet" href="rahul.css">
  <style>
    .romit {
      margin: 30px 0px 10px 120px;
    }
  </style>
</head>

<body>
  <!-- Breadcrumb Start -->
  <div class="container-fluid">
    <div class="row px-xl-5">
      <div class="col-12 breadcrumb_set mt-3 mb-0">
        <nav class="breadcrumb bg-light ">
          <a class="breadcrumb-item text-dark" href="dashbord.php">Dashbord</a>
          <span class="breadcrumb-item active"> Orders</span>
        </nav>
      </div>
    </div>
  </div>
  <!-- Breadcrumb End -->
  <div class="container">
    <div class="romit">
      <h1 class="text-center mb-2">All Orders</h1>
      <form method="POST">
        <div class="table-responsive">
          <table class="table table-hover" id="myTable">
            <thead class="table-dark">
              <tr>
                <th scope="col">Orders_Id</th>
                <th scope="col">Date</th>
                <th scope="col">Product_Name</th>
                <th scope="col">Qnt</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
                <!-- <th scope="col">Handle</th> -->
              </tr>
            </thead>
            <tbody>
              <?php

              $order = "SELECT * FROM `orders`";
              $runorder = mysqli_query($con, $order);
              while ($row = mysqli_fetch_assoc($runorder)) :
                $order_id = $row['order_id'];
                $user_id = $row['user_id'];
                $total_price = $row['total_price'];
                $order_status = $row['order_status'];
                $timestampe = $row['timestampe'];

                $orderitem = "SELECT * FROM `orderitems` WHERE `order_id` ='" . $order_id . "'";
                $runorderitem = mysqli_query($con, $orderitem);
                while ($row2 = mysqli_fetch_assoc($runorderitem)) :
                  $qnt = $row2['quantity'];
                  $amount = $row2['product_price'];
                  $product_id = $row2['product_id'];

                  $product = "SELECT * FROM `product` WHERE `product_id`='" . $product_id . "'";
                  $runproduct = mysqli_query($con, $product);
                  while ($row3 = mysqli_fetch_assoc($runproduct)) :
                    $name = $row3['product_title'];
                    //  address registration table mathi lavvu pade

              ?>
                    <tr>
                      <th scope="row"><?php echo $order_id; ?></th>
                      <td><?php echo $timestampe; ?></td>
                      <td><?php echo $name;  ?></td>
                      <td><?php echo $qnt; ?></td>
                      <td><?php echo $amount;  ?></td>
                      <td><?php echo $order_status; ?></td>
                       <?php echo " <td><a href='editorder.php?orderid=".$order_id."'><button type='button' class='btn btn-info'>View</button></a></td>";?>   
                    </tr>
                  <?php endwhile ?>
                <?php endwhile ?>
              <?php endwhile ?>
            </tbody>
          </table>
        </div>
      </form>
    </div>
  </div>

 <!-- Serch Start-->
 <!-- Serch Start-->
 <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js">
    </script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
  </script>
    </body>
</html>