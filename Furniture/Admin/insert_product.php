<?php
include('index.php');
// include("../includes/connect.php");

if(isset($_POST['insert_product'])){

    $p_title = $_POST['product_title'];
    $p_description = $_POST['product_description'];
    if(isset($_POST['category'])) 
    {
        $p_category = $_POST['category'];
    }
    $p_quantity = $_POST['product_quantity'];
    $p_price = $_POST['product_price'];

    if(empty($p_title) && empty($p_description) && empty($p_category) && empty($p_quantity) && empty($p_price)){ 
        $error="Empty value Not Allowed";
    }elseif(strlen($p_title) <3 || strlen($p_title) >30){
        $error="category_title Must be More than 2 charactersand must be less than 30 ";
    }elseif(strlen($p_description) <5 || strlen($p_description) >300){
        $error="category_description Must be More than 5 charactersand must be less than 300 ";
    }elseif(!is_numeric($p_quantity) && !is_numeric($p_price)){
        $error="quantity and Price must be Numeric ";
    }else{

        // ----------------------------------
        // Count total files
       
        // ----------------------------------
        //    category_title biji var nathi avtu ne a check karva
            $cheak=mysqli_query($con, "SELECT * FROM `product` WHERE `product_title`='$p_title'");
            $num=mysqli_fetch_assoc($cheak);
            if($num==0){

                $filename = $_FILES["product_image1"]["name"];
                $tempname = $_FILES["product_image1"]["tmp_name"];
                $extension = substr($filename,strlen($filename)-4,strlen($filename));
                $allowed_extensions = array(".jpg","jpeg",".png",".gif");
                // second IMG
                // $filename2 = $_FILES["product_image2"]["name"];
                // $tempname2 = $_FILES["product_image2"]["tmp_name"];
                // $extension2 = substr($filename2,strlen($filename2)-4,strlen($filename2));
                // $allowed_extensions2 = array(".jpg","jpeg",".png",".gif");
                 
                if(!in_array($extension,$allowed_extensions)){
                    $error='Choose image1 file to upload.';
                }else{

                    $folder = "./upload/" . $filename;
                    // $folder2 = "./upload/" . $filename2;
                   
                    // Now let's move the uploaded image into the folder: image
                    if (!move_uploaded_file($tempname, $folder)) {
                        $error="Failed to upload image1";
                    }else{
                    date_default_timezone_set("Asia/Calcutta");
                    $date = date('Y-m-d H:i:s');    
                    $sql="INSERT INTO `product`(`product_title`, `product_description`,`category`,`product_quantity`,`product_price`,`product_img`,`product_add_date`) VALUES ('$p_title','$p_description','$p_category','$p_quantity','$p_price','$filename','$date')";
                    $result=mysqli_query($con,$sql);
                    if($result){
                        $suc="<p style='color:green;'>Product Inserted Successfully</p>";
                    }

                }
            }

            }else{
                $error="Product allready exists";
            }  
    }
}
?>

<!DOCTYPE html>
<html lang="en">

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

    <!-- Link CSS FILE -->
    <link rel="stylesheet" href="rahul.css">
    <style>
    .error {
        color: red;
        width: 50%;
        margin: 10px 0px 10px 350px;
    }
    </style>
</head>

<body class="product_form ">
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12 breadcrumb_set mt-3 mb-0">
                <nav class="breadcrumb bg-light ">
                    <a class="breadcrumb-item text-dark" href="dashbord.php">Dashbord</a>
                    <span class="breadcrumb-item active">Add_Product</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <div class="container mt-3">
        <h1 class="text-center">Add Products</h1>
        <!-- Form -->
        <!-- i can insert img in this form throw so use [enctype] -->
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
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                    placeholder="Enter product title">
            </div>

            <!-- description--->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label ">Product description</label>
                <textarea id="description" name="product_description" class="form-control" rows="3" cols="30"
                    placeholder="Enter product description"></textarea>
            </div>

            <!-- keywords -->
            <!-- <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label ">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" placeholder="Enter product keywords" autocomplete="off" required="required" class="form-control">
            </div> -->

            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="category" id="" class="form-select">
                    <option selected disabled hidden>Select Category</option>
                    <?php 
                    $sql = mysqli_query($con, "SELECT *	 From categories");
                    $row = mysqli_num_rows($sql);
                    while ($row = mysqli_fetch_assoc($sql)){

                        $cat_id=$row["category_id"];
                        $cat_title = $row["cat_title"];
                        echo " <option value='".$cat_id."'> ".$row['cat_title']."</option>";
                      
                    }  
                    ?>
                </select>
            </div>

            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" multiple>
            </div>
            <!-- Image 2
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" multiple>
            </div> -->
            <!-- Quantity -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label ">Product Quantity</label>
                <input type="text" name="product_quantity" id="product_keywords" placeholder="Enter product Quantity"
                    class="form-control">
            </div>

            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label ">Product Price</label>
                <input type="text" name="product_price" id="product_keywords" placeholder="Enter product Price"
                    class="form-control">
            </div>

            <!-- Submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Products Inserted">
            </div>
        </form>
    </div>
</body>

</html>