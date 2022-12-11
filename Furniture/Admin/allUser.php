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
                    <span class="breadcrumb-item active"> All Users</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
  <div class="container"> 
    <div class="romit">
    <h1 class="text-center mb-2">All Users</h1>
    <div class="table-responsive">
      <table class="table table-hover" id="myTable">
        <thead class="table-dark">
          <tr>
            <th scope="col">User Id</th>
            <th scope="col">Join Date</th>
            <th scope="col">P_Image</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">PinCode</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
              $sql="SELECT * FROM `registration`";
              $result=mysqli_query($con,$sql);
              
              while($row=mysqli_fetch_assoc($result)):
                  $id=$row['id'];
              
            ?>
            <th scope="row"><?php echo $row['id']; ?></th>
            <td><?php echo $row['datetime']; ?></td>
            <td><img src="../upload/<?php echo $row['profileimg']; ?>" alt=""   style="width: 45px; height: 45px"></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['pincode']; ?></td>
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
    </script>
    <!-- Serch End-->
</body>

</html>