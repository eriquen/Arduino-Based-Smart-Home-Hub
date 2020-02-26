<?php ob_start(); ?>
<?php session_start(); ?>
<?php 
    
    // redirect if not logged in
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="user_option_theme/CSS/style.css">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="user_option_theme/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="user_option_theme/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="user_option_theme/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="user_option_theme/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="user_option_theme/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="user_option_theme/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="user_option_theme/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="user_option_theme/css/util.css">
    <link rel="stylesheet" type="text/css" href="user_option_theme/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('user_option_theme/images/img-01.jpg');">
            <div class="wrap-login100  p-b-30">
                <form class="login100-form validate-form">
                    <div class="login100-form-avatar">
                       <a  href="welcome.php"><img src="user_option_theme/images/house.jpg" alt="AVATAR"></a>   
                    </div>
                    <span class="login100-form-title p-t-20 p-b-45">
                        <?= $_SESSION['firstname'] ?> Profile
                    </span>
                    <div class="profile-wrap">
                        <div class="sec">
                            <label for="firstname" class="centre">First Name</label>
                            <span  class="centre"><?= $_SESSION['firstname'] ?></span>
                        </div>
                        <div class="sec">
                            <label for="lastname">Last Name :</label>
                            <span><?= $_SESSION['lastname'] ?></span>
                        </div>
                        <div class="sec">
                            <label for="username">Username :</label>
                            <span><?= $_SESSION['username'] ?></span>
                        </div>
                        <div class="sec">
                            <label for="useremail">Gmail :</label>
                            <span><?= $_SESSION['user_email'] ?></span>
                        </div>
                    </div>
                    <form class="login100-form validate-form">
                        <div class="container-login100-form-btn p-t-10">

                            <a href="welcome.php" class="login100-form-btn">

                                Back

                            </a>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="user_option_theme/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="user_option_theme/vendor/bootstrap/js/popper.js"></script>
    <script src="user_option_theme/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="user_option_theme/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="user_option_theme/js/main.js"></script>

</body>

</html>
