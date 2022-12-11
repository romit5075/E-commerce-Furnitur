<?php
session_start();
require ('./includes/connect.php');
include('./header.php');
// if(!isset($_SESSION['email'])){
//   echo "
//   <script>
//     window.location.href = 'login.php';
//   </script>";
// }
?>


<!-- PHP START FORGOTE -->
<?php

// Forgot purposes OTP
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require('mail/PHPMailer.php');
require('mail/Exception.php');
require('mail/SMTP.php');


if(isset($_POST['otpfo'])){

  $email = $_POST['email']; 

  if(empty($email)){
    $error="Email address is required";
  }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error="Invalid email format";
  }else{

    $query = "SELECT email FROM registration WHERE email = '$email'";
    $run = mysqli_query($con,$query);
    $mysql_number_row=mysqli_num_rows($run);
  
    if($mysql_number_row > 0){
     
      $otp = rand(10000, 99999);
      $mail = new PHPMailer(true);
    
      try {
        //Server settings
        
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'romitdobariya01@gmail.com';
        $mail->Password   = 'pqatcucdyfbcqoby';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
    
        //Recipients
        $mail->setFrom('romitdobariya01@gmail.com','');
        $mail->addAddress($email);     //Add a recipient
    
        $mail->Subject = 'OTP';
        $mail->Body    = "Forgot Password Purpose" . $otp;
        $mail->MsgHTML = ($otp);
    
    
        $mail->send();
    
        $sql = "INSERT INTO otps(otp)VALUES ('$otp')";
        $run = mysqli_query($con, $sql);
  
        if($run){
  
          $_SESSION['femail']=$email;
  
          echo "
          <script>
            window.location.href = 'footp.php';
          </script>";
        }
       
      } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
  }else{
    // echo "
    // <script>
    //   alert('Sorry, no user exists on our system with that email');
    //   window.location.href = 'forgote.php';
    // </script>";
    $error="Sorry, no user exists on our system with that email";
    
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
        <div class="form login " style="margin: 0px 0px 0px 0px;">
            <div class="form-content">
                <header>Forgot Password </header>
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
                <form method="post">
                    <div class="field input-field">
                        <input type="email" placeholder="Enter Your Registration Email" name="email" value="<?php if(isset($error)){ echo $email;}else{ echo "";}?>">
                    </div>
                    <div class="field button-field">
                        <button type="submit" name="otpfo">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>