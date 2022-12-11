<?php
include('index.php');
$id=$_GET['pro_id'];

if(isset($_POST['product_edit'])){
    
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    if(isset($_POST['edit_product_category'])){
        $edit_product_category=$_POST['edit_product_category'];
    }
    $edit_product_Quantity=$_POST['edit_product_Quantity'];
    $edit_product_price=$_POST['edit_product_price'];


        // $cheak=mysqli_query($con, "SELECT * FROM `product` WHERE `product_title`='$product_title'");
        // $num=mysqli_fetch_assoc($cheak);
        // if($num==0){
        //     date_default_timezone_set("Asia/Calcutta");
        //     $date = date('Y-m-d H:i:s');
        //     $que="UPDATE `product` SET `product_title`='$product_title',`product_description`='$description',`product_quantity`='$edit_product_Quantity',`product_price`='$edit_product_price',`product_modify_date`='$date' WHERE `product_id`='$id'";
        //     $res=mysqli_query($con,$que);
        //     if($res){
        //          $suc="Product Update Successfully";
        //     }
               
        // }else{
        //     $error="Product title allready exists";
        // }

        if(empty($product_title)){
            $error = "Category title is required";
        }elseif(strlen($product_title) <3 || strlen($product_title) >30){
            $error="cat_title Must be More than 2 charactersand must be less than 30 ";
        }else{
            // cat_title 2 var nathi avtu ne a check karva
            $cheak=mysqli_query($con, "SELECT * FROM `product` WHERE `product_title`='$product_title'");
            $num=mysqli_fetch_assoc($cheak);
        

            if($num==0){
                $filename = $_FILES["edit_product_image1"]["name"];
                $tempname = $_FILES["edit_product_image1"]["tmp_name"];
                // get the image extension
                $extension = substr($filename,strlen($filename)-4,strlen($filename));
                // allowed extensions
                $allowed_extensions = array(".jpg","jpeg",".png",".gif");
            
                if(!in_array($extension,$allowed_extensions)){
                    date_default_timezone_set("Asia/Calcutta");
                    $date = date('Y-m-d H:i:s');
                    $que="UPDATE `product` SET `product_title`='$product_title',`product_description`='$description',`product_quantity`='$edit_product_Quantity',`product_price`='$edit_product_price',`product_modify_date`='$date' WHERE `product_id`='$id'";
                    $res=mysqli_query($con,$que);
                    if($res){
                        $suc="Product Update Successfully";
                    }
                }else{
                    date_default_timezone_set("Asia/Calcutta");
                    $date = date('Y-m-d H:i:s');
                    $folder = "./upload/" . $filename;
                    $que="UPDATE `product` SET `product_title`='$product_title',`product_description`='$description',`product_img`='$filename',`category`='$edit_product_category',`product_quantity`='$edit_product_Quantity',`product_price`='$edit_product_price',`product_modify_date`='$date' WHERE `product_id`='$id'";
                    $res=mysqli_query($con,$que);
                    if($res){
                        $suc="Product Update Successfully";
                    }
                    // Now let's move the uploaded image into the folder: image
                    if (!move_uploaded_file($tempname, $folder)) {
                        $error="Failed to upload image";
                    }
            
                }
                    echo "
                    <script>
                      window.location.href = 'view_product.php';
                  </script>";
           
            }else{
                $error="Product title allready exists";
            }
           
        }
}
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Insert Product Admin-Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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


    <style>
    .error {
        color: red;
        width: 50%;
        margin: 10px 0px 10px 350px;
    }
    </style>
    <!-- Link CSS FILE -->
    <link rel="stylesheet" href="rahul.css">
</head>

<body class="product_form " style="overflow-x: hidden;">
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12 breadcrumb_set mt-3 mb-0">
                <nav class="breadcrumb bg-light ">
                    <a class="breadcrumb-item text-dark" href="dashbord.php">Dashbord</a>
                    <a class="breadcrumb-item text-dark" href="view_product.php">View Product</a>
                    <span class="breadcrumb-item active">Edit_Product</span>
                </nav>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <h1 class="text-center">Edit Products</h1>
        <div class="error">
            <?php
        if(isset($error)){
            echo $error;
        }elseif(isset($suc)){
            echo $suc;
        }else{
            echo "";
        }
        ?>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <?php
            $show="SELECT * FROM `product` WHERE `product_id`='$id'";
            $res=mysqli_query($con,$show);
            $row=mysqli_fetch_assoc($res);
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $category=$row['category'];
            $product_quantity=$row['product_quantity'];
            $product_price=$row['product_price'];
            ?>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                    value="<?php echo $product_title;?>">
            </div>

            <!-- description--->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label ">Product description</label>
                <input type="text" name="description" id="description" class="form-control"
                    value="<?php echo $product_description;?>">
            </div>


            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="edit_product_category" id="" class="form-select">
                    <!-- <option selected disabled hidden>Select Product</option> -->
                    <option selected disabled hidden><?php echo $category?></option>
                    <?php 
                    $sql = mysqli_query($con, "SELECT cat_title	 From categories");
                    $row = mysqli_num_rows($sql);
                    while ($row = mysqli_fetch_assoc($sql)){

                       echo " <option value='".$row['cat_title']."'> ".$row['cat_title']."</option>";
                      
                    }  
                    ?>
                </select>
            </div>

            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image 1</label>
                <input type="file" name="edit_product_image1" id="product_image1" class="form-control">
            </div>

            <!-- Image  2
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image 2</label>
                <input type="file" name="edit_product_image2" id="product_image2" class="form-control">
            </div> -->

            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label ">Product Quantity</label>
                <input type="text" name="edit_product_Quantity" id="product_keywords" class="form-control"
                    value="<?php echo $product_quantity;?>">
            </div>

            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label ">Product Price</label>
                <input type="text" name="edit_product_price" id="product_keywords" class="form-control"
                    value="<?php echo $product_price;?>">
            </div>

            <!-- Submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="product_edit" class="btn btn-info mb-3 px-3" value="Products Update">
            </div>
        </form>
    </div>
</body>

</html>