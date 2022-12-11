<?php
include('index.php');
?>


<html>

<head>
  <!-- Bootstrap CSS Link -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Font Awersome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Font Awersome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Serch Start -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <!-- Serch End -->

  <!-- Link CSS FILE -->
  <link rel="stylesheet" href="rahul.css">
  <style>
    .romit{
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
                    <span class="breadcrumb-item active">View_Product</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
  <div class="container"> 
    <div class="romit">
    <h1 class="text-center mb-2">All Product</h1>
    <div class="table-responsive">
      <table class="table table-hover" id="myTable">
        <thead class="table-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Product Name</th>
            <th scope="col">product Description</th>
            <!-- <th scope="col">Categorys</th> -->
            <th scope="col">Image</th>
            <!-- <th scope="col">Image 2</th> -->
            <th scope="col">Quantity</th>            
            <th scope="col">Price</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            <!-- <th scope="col">Handle</th> -->
          </tr>
        </thead>
        <tbody>
          <tr>
          <?php
            $show=mysqli_query($con, "SELECT * FROM `product`");
            while ($row=mysqli_fetch_array($show)):
              $id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              $product_img=$row['product_img'];
              $category=$row['category'];
              $product_quantity=$row['product_quantity'];
              $product_price=$row['product_price'];
              $cat=$row['category'];

          ?>
            <th scope="row"><?php echo $id; ?></th>
            <td><?php echo $product_title; ?></td>
            <td><?php echo $product_description; ?></td>
            <!-- <td><?php
            //  echo $cat;
              ?></td> -->
            <td><img src="./upload/<?php echo $product_img; ?>" alt=""   style="width: 45px; height: 45px"></td>
            <!-- <td><img src="./upload/<?php echo $product_img2; ?>" alt=""   style="width: 45px; height: 45px"></td> -->
            <td><?php echo $product_quantity; ?></td>
            <td><?php echo $product_price; ?></td>
            <?php  
           echo " <td><a href='edit_product.php?pro_id=".$id."'><button type='button' class='btn btn-info'>Edit</button></a></td>";
           echo "<td><a href='delete_product.php?delete_P_id=".$id."'><button type='button' class='btn btn-danger'>Delete</button></a></td>";
           ?>
          </tr>
          <?php endwhile ?>
        </tbody>
      </table>
    </div>
  </div>
  </div>
     <!-- Serch Start-->
     <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js">
    </script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

//     $('#myTable').DataTable( {
//     responsive: true
// } );
    </script>
    <!-- Serch End-->
</body>

</html>