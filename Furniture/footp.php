<?php
include('./includes/connect.php');
session_start();
// if(!isset($_SESSION['email'])){
//     echo "
//     <script>
//       window.location.href = 'login.php';
//     </script>";
// }


    // $ausername = $_SESSION['ausername'];
    // $aemail = $_SESSION['aemail'];
    // $aphone = $_SESSION['aphone'];
    // $apassword = $_SESSION['apassword'];
    // $aconform_password = $_SESSION['aconform_password'];
    if(isset($aemail)){
      $femail=  $_SESSION['femail'];
    }

    

if (isset($_POST['done'])) {
 
  if(empty($_POST['otp'])) {
        $error="Please enter OTP";
    }elseif(!preg_match('/^[0-9]{5}+$/', $_POST['otp'])) {
        $error="OTP 5 digits and only numbers";
    }else{


      $result = mysqli_query($con, "SELECT * FROM otps WHERE otp='" . $_POST['otp'] . "' ");

  $result2 = mysqli_query($con, "SELECT * FROM otps WHERE exp!=1 AND NOW()<=DATE_ADD(date_dt,INTERVAL 1 MINUTE)");


  $stat = mysqli_num_rows($result);
  $stat2 = mysqli_num_rows($result2);
         
  if (!empty($stat)) {

    if (!empty($stat2)) {

      $news = mysqli_query($con, "UPDATE otps SET exp=1 WHERE otp='" . $_POST['otp'] . "'");

    //     $password=md5($apassword);
    //     $conform_password=md5($aconform_password);
    //   $sql1 = "INSERT INTO `registration` ( `username`,  `email`,`phone`, `password`,`conform_password`) VALUES ('$ausername', '$aemail','$aphone','$password','$conform_password')";
    //   $run = mysqli_query($con, $sql1);

      echo "
      <script>
        window.location.href = 'newpassword.php';
      </script>";
     
    } else {
      $news = mysqli_query($con, "UPDATE otps SET exp=1 WHERE otp='" . $_POST['otp'] . "'");

      echo "
      <script>
        alert('Time out please Resend OTP');
        window.location.href = 'footp.php';
      </script>";
    }
  } else {

    $news = mysqli_query($con, "UPDATE otps SET exp=1 WHERE otp='" . $_POST['otp'] . "'");
    $inmsg = 1;

    $error="Not valid Otp Try Again or resend";

  }
    }
  
}

// Resend OTP
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require('mail/PHPMailer.php');
require('mail/Exception.php');
require('mail/SMTP.php');


if (isset($_POST['resend'])) {
    echo "Hello Resend Clicked"; 
    header("location:footp.php");
  
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
      $mail->setFrom('romitdobariya01@gmail.com', '');
      $mail->addAddress($aemail);     //Add a recipient
  
      $mail->Subject = 'Resend OTP';
      $mail->Body    = "Hello " . $otp;
      $mail->MsgHTML = ($otp);
  
  
      $mail->send();
  
      $sql = "INSERT INTO otps(otp)VALUES ('$otp')";
      $run = mysqli_query($con, $sql);
      if($run){
        echo "DONE"; 
      }
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
    
?>

<!DOCTYPE html>
<html>

<head>
    <title>OTP Verification!!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700');

* {
    border-radius: 0px !important;
    font-family: "Poppins", sans-serif;
}

body {
    background-color: #c0cde9 !important;
    display: flex;
    align-items: center;
    height: 100vh;
}

.card {
    border: none !important;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
}

.card-header {
    color:  #000000 !important;
    background: #ecccee !important;
    text-align: center;
}

.card-header>img {
    width: 180px;
}

.input-container input {
    width: 40px;
    height: 40px;
}

.form-control:focus {
    box-shadow: none !important;
    border: 1px solid #3366FF !important;
}

.verify-btn {
    border-radius: 10px !important;
    border: 0px !important;
    width: 140px;
    background-color:#6787e9 !important;
}

.rbox {
    width: 100%;
}
    </style>

    <script>

    </script>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center">
        <div class="card text-center">
            <div class="card-header p-5">
                <!-- <img src="mobile.png"> -->
                <h5 class="mb-2">OTP VERIFICATION</h5>
                <?php
                if(isset($error)){
                    echo "<strong style='color:red'>$error</strong>";
                }elseif(isset($succsess)){

                    echo "<strong style='color:red'>$succsess</strong>";
                }else{
                    echo "";
                }
               
                ?>
                <div>
                    <small>Enter The OTP You Received at Your</small><br>
                    <small style="color:#000000"> <?php if(!empty($femail)) { echo $femail; } ?> </small>
                </div>
            </div>

            <form action="" method="post">
                <input type="text" class="mt-3 text-center form-control rounded rbox" placeholder="Enter OTP"  name="otp" >
                <div class="mt-3 mb-5">
                    <button class="btn btn-success px-4 verify-btn" name="done">verify</button>
                </div>
                <p> Valid OTP in <span id="countdowntimer"> 60 </span> Seconds</p>
            </form>
            <form action="" method="post">
                <div>
                    <small>
                        Didn't Get The OTP
                        <a href="#" class="text-decoration-none">
                            <button class="btn btn-success px-4 verify-btn " name="resend"
                                style="margin: 0px -50px 10px 0px;">Resend</button>
                        </a>
                    </small>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
var timeleft = 60;
var downloadTimer = setInterval(function() {
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if (timeleft <= 0)
        clearInterval(downloadTimer);
}, 1000);
</script>

</html>


