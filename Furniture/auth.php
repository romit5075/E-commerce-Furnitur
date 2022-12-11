<?php
session_start();
include('./includes/connect.php');
include('./header.php');
?>


<!-- ********** PHP ********** -->
<?php
 #for Registration
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
 
 require('mail/PHPMailer.php');
 require('mail/Exception.php');
 require('mail/SMTP.php');


 if(isset($_POST['register'])) {
       
    $username=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $conform_password=$_POST['conform_password'];


     // Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

 
    if(empty($username)){
        $error="Username Field is required";
    }elseif(empty($email)){
        $error="Email Field is required";
    }elseif(empty($phone)){
        $error="Phone Field is required";
    }elseif(empty($password)){
        $error="Password Field is required";
    }elseif($password != $conform_password){
        $error="Password and Conform Password Does not match";
    }elseif(strlen($username) <3 || strlen($username) >30){
        $error="Username Must be More than 3 charactersand must be less than 30 ";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error="Invalid email format";
    }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$username)){
        $error="Only letters and white space allowed";
    }elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 5){
        $error="Password should be at least 5 characters, one upper case, one number, special character.";
    }elseif(!preg_match('/^[0-9]{10}+$/', $phone)){
        $error="Invalid phone number";
    }else{
       
         $sql = "Select * from registration where email='$email'";
         $result = mysqli_query($con, $sql);
         $num = mysqli_num_rows($result); 
        
            if($num == 0) {

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
         $mail->addAddress($email);     //Add a recipient

         $mail->Subject = 'OTP';
         $mail->Body    = "Hello " . $otp;
         $mail->MsgHTML = (file_get_contents('otp.php'));        

         $mail->send();

         $sql = "INSERT INTO otps(otp) VALUES ('$otp')";
         $run = mysqli_query($con, $sql);

         echo "
         <script>
           window.location.href = 'otp.php';
       </script>";

         if($run)
         {
          $_SESSION['ausername'] = $_POST['name'];
          $_SESSION['aemail'] = $_POST['email'];
          $_SESSION['aphone'] = $_POST['phone'];
          $_SESSION['apassword'] = $_POST['password'];
          $_SESSION['aconform_password'] = $_POST['conform_password'];
         }
        //  header('location:otp.php');

     } catch (Exception $e) {
         echo "Message could not be sent. Maile  Error: {$mail->ErrorInfo}";
     }
     
                 }// end if 
  
            if($num>0){
  
                 $error="Already registered";
             } 

    }

}else{

}
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSS -->(
    <link rel="stylesheet" href="./css/auth.css">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body style="overflow-x:hidden ;">
    <section class="container forms">
        <div class="form login ">
            <div class="form-content">
                <header>Signup</header>
                <form action="" method="post">
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
                        <input type="text" placeholder="Name" name="name"
                            value="<?php if(isset($error)){echo $username;} ?>">
                    </div>

                    <div class="field input-field hy">
                        <input type="email" placeholder="Email" name="email"
                            value="<?php if(isset($error)){echo $email;} ?>">
                    </div>
                    <div class="field input-field">
                        <input type="text" placeholder="Phone Number" name="phone"
                            value="<?php if(isset($error)){echo $phone;} ?>">
                    </div>
                    <div class="field input-field">
                        <input type="password" placeholder="Password" name="password"
                            value="<?php if(isset($error)){echo $password;} ?>">
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Conform-Password"
                            value="<?php if(isset($error)){echo $conform_password;} ?>" id="password"
                            name="conform_password">
                        <i class='bx bx-hide eye-icon' id="togglePassword"></i>
                    </div>

                    <div class="field button-field">
                        <a href="./otp.php"> <button type="submit" name="register">Signup</button></a>
                    </div>
                    <div class="form-link">
                        <span>Don't have an account? <a href="./login.php" class="forgot-pass">Login</a></span>
                    </div>
                </form>

            </div>
        </div>

    </section>

    <!-- JavaScript -->
    <script>
    const forms = document.querySelector(".forms"),
        pwShowHide = document.querySelectorAll(".eye-icon"),
        links = document.querySelectorAll(".link");

    pwShowHide.forEach(eyeIcon => {
        eyeIcon.addEventListener("click", () => {
            let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");

            pwFields.forEach(password => {
                if (password.type === "password") {
                    password.type = "text";
                    eyeIcon.classList.replace("bx-hide", "bx-show");
                    return;
                }
                password.type = "password";
                eyeIcon.classList.replace("bx-show", "bx-hide");
            })

        })
    })

    links.forEach(link => {
        link.addEventListener("click", e => {
            e.preventDefault(); //preventing form submit
            forms.classList.toggle("show-signup");
        })
    })

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
</body>

</html>

<?php
 include('./footer.php');
?>