<?php 
// include('./data.php');
include('./includes/connect.php');
session_start();
include('./header.php');
if(!isset($_SESSION['email'])){
    echo "
    <script>
      window.location.href = 'login.php';
    </script>";
}



// Profile Data Update
if(isset($_POST['edit'])){

    $email=$_SESSION['email'];
    $editusername=$_POST['editusername'];
    $editphone=$_POST['editphone'];
    $editaddress=$_POST['editaddress'];
  
    $pin=$_POST['pincode'];
    
    
// $acity=$_POST['city'];
// $astate=$_POST['state'];
  
    if(empty($editusername)){
        $error="Username Field is required";
    }elseif(empty($editphone)){
        $error="Phone Field is required";
    }elseif(strlen($editusername) <3 || strlen($editusername) >30){
        $error="Username Must be More than 3 charactersand must be less than 30 ";
    }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$editusername)){
        $error="Only letters and white space allowed";
    }elseif(!preg_match('/^[0-9]{10}+$/', $editphone)){
        $error="Invalid phone number";
    }elseif(empty($editaddress)){
        $error="Please Enter Address";
    }else{
        // $update_profile="UPDATE `registration` SET `username`='$editusername', `phone`='$editphone', `address`='$editaddress',`pincode`='$pin', `city`='$acity', `state`='$astate' WHERE `email`='$email'";

        $update_profile="UPDATE `registration` SET `username`='$editusername', `phone`='$editphone', `address`='$editaddress',`pincode`='$pin' WHERE `email`='$email'";
        $result=mysqli_query($con,$update_profile); 
    }
  
}

// profile data display
if(isset($_SESSION['userid'])){

    $email=$_SESSION['email'];

    $result=mysqli_query($con,"SELECT * FROM `registration`WHERE `email` = '".$email."' ");

while($row=$result->fetch_assoc()){

 $username = $row['username'];
 $email = $row['email'];    
 $phone=$row['phone'];
 $address=$row['address'];
 $pin=$row['pincode'];
 $citya=$row['city'];
 $statea=$row['state'];
    }
}
// profile Picture Update
if(isset($_POST['updateimg'])){

    $filename = $_FILES["fileupload"]["name"];
    $tempname = $_FILES["fileupload"]["tmp_name"];
    // get the image extension
    $extension = substr($filename,strlen($filename)-4,strlen($filename));
    // allowed extensions
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");

    if(!in_array($extension,$allowed_extensions)){
        $error='Choose image file to upload.';
    }else{

        $folder = "./upload/" . $filename;
     
        // Get all the submitted data from the form
        $uploaded=mysqli_query($con, "UPDATE `registration` set `profileimg` = '$filename' WHERE email= '$email'");
    
        // Now let's move the uploaded image into the folder: image
        if (!move_uploaded_file($tempname, $folder)) {
            $error="Failed to upload image";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
    .set_page {
        margin: 4px 0px 0px 103px;
    }
    </style>
</head>
<?php 

?>

<body style="overflow-x:hidden;">
    <div class="set_page">
        <div class="container mt-4 set_page">
            <input class="form-control mb-4 fs-5 fw-bold" type="text" value="profile"
                aria-label="readonly input example" readonly>
            <?php
                    
                    if(isset($error)){
                        echo "
                        <div class='alert alert-warning alert-dismissible fade show' role='alert' style='color: red;'>
                            $error
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                    }
                    ?>
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card ">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="card-body  ">
                                    <div class="d-flex flex-column align-items-center text-center pt-3 ">
                                        <!-- Display IMG -->
                                        <?php
                                        $email=$_SESSION['email'];
                                        $qu="SELECT * FROM `registration` WHERE `email`='".$email."'";
                                        $res=mysqli_query($con,$qu);

                                        while($row=mysqli_fetch_assoc($res)):
                                            $p_img=$row['profileimg'];
                                        ?>
                                        <img id="imgFileUpload" alt="Select File" title="Select File"
                                            src="./upload/<?php if(isset($p_img)){echo $p_img;}?>"
                                            style="cursor: pointer" class="rounded-circle " width="120" />
                                        <?php endwhile ?>


                                        <div class="mt-3">
                                            <h4 class="mb-3">
                                                <?php if(isset($username)) {echo $username;}?>
                                            </h4>
                                            <span id="spnFilePath" style="color:green">Click on the photo to update the
                                                photo</span>
                                            <input type="file" id="FileUpload1" style="display: none" name="fileupload"
                                                ; />
                                            <button class="btn btn-outline-info mt-1 w-35" style="color:black;"
                                                name="updateimg">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
                        {
                            echo "<a href='./logout.php' style=' color:black;' class='btn btn-outline-info mb-3 w-100'><button style='color:black;' class='btn px-0 ml-0'>Logout</button></a>";
                        }
                        ?>

                    </div>

                    <!-- edit section -->

                    <div class="col-lg-8 ">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <h6 class="mb-0">Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="editusername"
                                                value="<?php  if(isset($username)){echo $username;} else {echo "";} ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" readonly
                                                value="<?php  if(isset($email)){echo $email;} else {echo "";}?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="editphone"
                                                value="<?php  if(isset($phone)){echo $phone;} else {echo "";} ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control"
                                                value="<?php  if(isset($address)){echo $address;} else {echo "";} ?>"
                                                name="editaddress">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <h6 class="mb-0">Pin Code</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary" style="display:flex;">
                                            <input type="text" class="form-control" id="pincode"  name="pincode"
                                                style="display: 1;" value="<?php  if(isset($pin)){echo $pin;} else {echo "";} ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-0 text-secondary" style="display:flex; margin-left:135px;">
                                            <input type="text" disabled class="form-control" id="city"  name="city"
                                                style="display: 1;"  value="<?php  if(isset($citya)){echo $citya;} else {echo "";} ?>">
                                            <input type="text" disabled class="form-control" id="state" name="state"
                                                style="display: 1;"  value="<?php  if(isset($statea)){echo $statea;} else {echo "";} ?>">
                                                <div class="col-sm-5 text-info" style="border-radius:20px;" id="">
                                                <input type="button" name="details" class="btn btn-info px-4" value="Get Details"
                                                    onclick="get_details()">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-9 text-info">
                                    <button class="btn btn-info px-4" name="edit">Update</button>
                                    <a href="updatepassword.php"><input type="button" class="btn btn-primary px-4"
                                            value="Change Password"></a>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div>
                    </div>
                    <!-- Modal -->
                    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are You Sure !</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <button type="button" class="btn btn-danger">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>
<script>
// pincode
function get_details(){
	var pincode=jQuery('#pincode').val();
	if(pincode==''){
		jQuery('#city').val('');
		jQuery('#state').val('');
	}else{
		jQuery.ajax({
			url:'get.php',
			type:'post',
			data:'pincode='+pincode,
			success:function(data){
				if(data=='no'){
					alert('Wrong Pincode');
					jQuery('#city').val('');
					jQuery('#state').val('');
				}else{
					var getData=$.parseJSON(data);
					jQuery('#city').val(getData.city);
					jQuery('#state').val(getData.state);
				}
			}
		});
	}
}
</script>

<script type="text/javascript">
window.onload = function() {
    var fileupload = document.getElementById("FileUpload1");
    var filePath = document.getElementById("spnFilePath");
    var image = document.getElementById("imgFileUpload");
    image.onclick = function() {
        fileupload.click();
    };
    fileupload.onchange = function() {
        var fileName = fileupload.value.split('\\')[fileupload.value.split('\\').length - 1];
        filePath.innerHTML = "<b>Selected File: </b>" + fileName;
    };
};
</script>

</html>
<?php
  include('./footer.php');
?>