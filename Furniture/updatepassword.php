<?php
session_start();
require ('./includes/connect.php');
include('./header.php');
if(!isset($_SESSION['email'])){
    echo "
    <script>
      window.location.href = 'login.php';
    </script>";
}


if(isset($_POST['reset'])){

    $fpassword=$_POST['fpassword'];
    $fconfirm_password=$_POST['fconfirm_password'];
       
// Validate password strength
$uppercase = preg_match('@[A-Z]@', $fpassword);
$lowercase = preg_match('@[a-z]@', $fpassword);
$number    = preg_match('@[0-9]@', $fpassword);
$specialChars = preg_match('@[^\w]@', $fpassword);


    if(empty($fpassword)){
        $error="Please enter a password";
    }elseif(empty($fconfirm_password)){
        $error="Please enter a confirm password";
    }elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($fpassword) < 5){
        $error="Password should be at least 5 characters, one upper case, one number, special character";
    }else{
 
        if($fpassword ==  $fconfirm_password ){
    
            // $oldpassword=$_POST["oldpassword"];
            // $check=mysqli_query($con,"");

            $email=$_SESSION['email'];
            $upassword=$_POST['fpassword'];
            // $fpassword = md5($_POST['fpassword']);
            $fpassword=password_hash($upassword,PASSWORD_DEFAULT);
            $query_updatepassword=mysqli_query($con,"UPDATE `registration` SET `password`='$fpassword' WHERE `email`='".$email."'");
                if($query_updatepassword){

                echo "
                <script>
                  window.location.href = 'user_profile.php';
                </script>";
                }else{
                    $error="password Not Update";
                }
            }else{
                $error="password and Confirm password are not Match";
            }
            
        }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/auth.css">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body style="overflow-x:hidden ;">

    <section class="container forms">
        <div class="form login " style="margin: -200px 0px 0px 0px;">
            <div class="form-content">
                <header>Password reset</header>
                <form method="post">
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
                    <div class="field input-field">
                        <input type="password" placeholder="Enter Your New Password" name="fpassword">
                    </div>
                    <div class="field input-field">
                        <input type="password" placeholder="Confirm Password" name="fconfirm_password" id="password">
                        <i class='bx bx-hide eye-icon' id="togglePassword"></i>

                    </div>
                    <div class="field button-field">
                        <button type="submit" name="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function() {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("bi-eye");
    });

    // prevent form submit
    const form = document.querySelector("form");
    form.addEventListener('submit', function(e) {
        e.preventDefault();
    });
    </script>

</html>
<!-- Reset Password Page -->
<!-- Passwor and confirm password if are equal Then UPADTE PASSWORDS -->