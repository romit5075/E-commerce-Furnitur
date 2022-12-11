<?php
session_start();
include('./includes/connect.php');
include('./header.php');

?>

<!-- ********** PHP ********** -->
<?php
// $erro = false;

 #for Login
if(isset($_POST['login']))
{
     // Validation
    if(empty($_POST['email'])){
        $error="Email address required";
    }elseif(empty($_POST['password'])){
        $error="Password required";
    }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $error="Email is not valid";
    }
    else{
        $pass=$_POST['password'];
        
        $email=$_POST['email'];

        $query="SELECT * FROM `registration` WHERE `email` = '".$email."'";
        $result = mysqli_query($con,$query);
        $mysql_number_row=mysqli_num_rows($result);
        $admin=mysqli_fetch_array($result);
        
        if($result)
        {   
            //admin check
            if($email=="admin@admin.com" && $_POST['password']=="admin"){
                $_SESSION['logged_in_admin']=true;
                // $_SESSION['check']=true;
                echo "
                <script>
                  window.location.href = './admin/dashbord.php';
                </script>";
                
            }//user check
            elseif($mysql_number_row > 0){

              $come_username=mysqli_query($con,"SELECT * FROM `registration` WHERE `email` = '".$email."'");
              while($row=$come_username->fetch_assoc()){
                $_SESSION['userid']=$row['id'];
                $_SESSION['username'] = $row['username'];//Session username retrive
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone'] = $row['phone'];
                $confom = $row['password'];
               
              }
            //   if(isset($_POST['rememberme'])){
            //     setcookie('email',$email,time()+(60*2));
            //     }
                
                if(password_verify($pass,$confom)){
                    $_SESSION['logged_in']=true;
                    echo "
                    <script>
                      window.location.href = 'main.php';
                    </script>";
                }else{
                    $error = "Email or Passwor Not valid";
                }

            }else{
    
                $error="Email or Passwor Not valid";    
            }
        }
        else
        {
            $error="Email or Passwor Not valid";    
        }
    }

    // if(($_POST['remember']==1)){
    //     setcookie("emailc", $email, time() + (60*1), "/");
    //   // setcookie('passwordc',$password,time()+60*2);
    //   }
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

<body style="overflow-x:hidden;">
    <section class="container forms">
        <div class="form login ">
            <div class="form-content">
                <header>Login</header>
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
                        <input type="email" placeholder="Email" name="email"
                            value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email'];} ?>">
                    </div>
                    <div class="field input-field">
                        <input type="password" placeholder="Password" name="password" id="password">
                        <i class='bx bx-hide eye-icon' id="togglePassword"></i>
                    </div>
                    <!-- <div>
                        <input type="checkbox" name="rememberme" id="remember"
                            style="margin: 16px 20px 0px 23px;"><label style="margin-top: 20px;" for="remember">Remember
                            me</label>
                    </div> -->

                    <div class="form-link">
                        <a href="./forgote.php" class="forgot-pass">Forgot password?</a>
                    </div>

                    <div class="field button-field">
                        <button type="submit" name="login">Login</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Don't have an account? <a href="./auth.php" class="forgot-pass">Registration</a></span>
                </div>
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
    <script>
        
    </script>
</body>

</html>
<?php
 include('./footer.php');
?>