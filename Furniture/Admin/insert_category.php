<?php
include('index.php');
// include('./includes/connect.php');

if(isset($_POST['insertcategory'])){

    $category_title=$_POST['category_title'];
if(empty($category_title)){
    $error = "Category title is required";
}elseif(strlen($category_title) <3 || strlen($category_title) >30){
    $error="category_title Must be More than 2 charactersand must be less than 30 ";
}else{
    // category_title 2 var nathi avtu ne a check karva
    $cheak=mysqli_query($con, "SELECT * FROM `categories` WHERE `cat_title`='$category_title'");
    $num=mysqli_fetch_assoc($cheak);

    if($num==0){
        $filename = $_FILES["category_image"]["name"];
        $tempname = $_FILES["category_image"]["tmp_name"];
        // get the image extension
        $extension = substr($filename,strlen($filename)-4,strlen($filename));
        // allowed extensions
        $allowed_extensions = array(".jpg","jpeg",".png",".gif");
    
        if(!in_array($extension,$allowed_extensions)){
            $error='Choose image file to upload.';
        }else{
            date_default_timezone_set("Asia/Calcutta");
            $date = date('Y-m-d H:i:s');
            $folder = "./upload/" . $filename;
            $que="INSERT INTO `categories`(`cat_title`, `cat_img`,`category_add_date`) VALUES ('$category_title','$filename','$date')";
            $res=mysqli_query($con,$que);
            if($res){
                $suc="<p style='color:green;'>Category Inserted Successfully</p>";
            }
            // Now let's move the uploaded image into the folder: image
            if (!move_uploaded_file($tempname, $folder)) {
                $error="Failed to upload image";
            }
        }
    }else{
        $error="category allready exists";
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
    <!-- vadharani /-------------------- -->
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
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
            <div class="col-12 breadcrumb_set mt-3">
                <nav class="breadcrumb bg-light ">
                    <a class="breadcrumb-item text-dark" href="dashbord.php">Dashbord</a>
                    <span class="breadcrumb-item active">Add_Category</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <div class="container mt-3">
        <h1 class="text-center">Add Category</h1>
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
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Category Name</label>
                <input type="text" name="category_title" id="product_title" class="form-control"
                    placeholder="Enter product title">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Category image </label>
                <input type="file" name="category_image" id="product_image1" class="form-control">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insertcategory" class="btn btn-info mb-3 px-3" value="Products Inserted">
            </div>
        </form>
    </div>
</body>

</html>