<?php
include('index.php');
$id=$_GET['cat_id'];

if(isset($_POST['cat_update'])){

    $cat_title=$_POST['cat_title'];

    if(empty($cat_title)){
        $error = "Category title is required";
    }elseif(strlen($cat_title) <3 || strlen($cat_title) >30){
        $error="cat_title Must be More than 2 charactersand must be less than 30 ";
    }else{
        // cat_title 2 var nathi avtu ne a check karva
        $cheak=mysqli_query($con, "SELECT * FROM `categories` WHERE `cat_title`='$cat_title'");
        $num=mysqli_fetch_assoc($cheak);
    
        if($num==0){
            $filename = $_FILES["cat_img"]["name"];
            $tempname = $_FILES["cat_img"]["tmp_name"];
            // get the image extension
            $extension = substr($filename,strlen($filename)-4,strlen($filename));
            // allowed extensions
            $allowed_extensions = array(".jpg","jpeg",".png",".gif");
        
            if(!in_array($extension,$allowed_extensions)){
                date_default_timezone_set("Asia/Calcutta");
                $date = date('Y-m-d H:i:s');
                $que="UPDATE `categories` SET `cat_title`='$cat_title',`category_modify_date`='$date' WHERE `category_id`='$id'";
                $res=mysqli_query($con,$que);
                if($res){
                    $suc="Category Update Successfully";
                }
            }else{
                date_default_timezone_set("Asia/Calcutta");
                $date = date('Y-m-d H:i:s');
                $folder = "./upload/" . $filename;
                $que="UPDATE `categories` SET `cat_title`='$cat_title',`cat_img`='$filename',`category_modify_date`='$date' WHERE `category_id`='$id'";
                $res=mysqli_query($con,$que);
                if($res){
                    $suc="Category Update Successfully";
                }
                // Now let's move the uploaded image into the folder: image
                if (!move_uploaded_file($tempname, $folder)) {
                    $error="Failed to upload image";
                }
        
            }
                echo "
                <script>
                  window.location.href = 'view_category.php';
              </script>";
       
        }else{
            $error="category title allready exists";
        }
       
    }
}
?>

<!DOCTYPE html>

<html>

<head>

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

<body class="product_form " style="overflow-x: hidden;">
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12 breadcrumb_set mt-3 mb-0">
                <nav class="breadcrumb bg-light ">
                    <a class="breadcrumb-item text-dark" href="dashbord.php">Dashbord</a>
                    <a class="breadcrumb-item text-dark" href="view_category.php">View category</a>
                    <span class="breadcrumb-item active">View_Category</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <div class="container mt-3">
        <h1 class="text-center ">Edit Category</h1>
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
        <!-- i can insert img in this form throw so use [enctype] -->
        <form action="" method="post" enctype="multipart/form-data">
            <?php
            $show="SELECT * FROM `categories` WHERE `category_id`='$id'";
            $res=mysqli_query($con,$show);
            $row=mysqli_fetch_assoc($res);
            $cat_name=$row['cat_title'];
            $cat_img=$row['cat_img'];
            ?>
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Category Name</label>
                <input type="text" name="cat_title" id="product_title" class="form-control"
                    placeholder="Enter product title" value="<?php echo $cat_name;?>">
            </div>

            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Category image </label>
                <input type="file" name="cat_img" value="<?php echo $cat_img; ?>" id="product_image1"
                    class="form-control">
            </div>

            <!-- Submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="cat_update" class="btn btn-info mb-3 px-3" value="Category Update">
            </div>
        </form>
    </div>
</body>

</html>