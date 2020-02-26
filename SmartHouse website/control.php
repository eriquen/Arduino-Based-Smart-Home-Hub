<!DOCTYPE html>
<html lang="en">

<head>
    <title>Control</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                        <img src="user_option_theme/images/house.jpg" alt="AVATAR">
                    </div>

                    <span class="login100-form-title p-t-20 p-b-45">
                        Smart House's
                    </span>

                    <form action="">
                        <input type="button">
                    </form>

                    <form action="includes/on.php" method="GET">
                        <div class="container-login100-form-btn p-t-10">
                            <button class="login100-form-btn" name="on" type="submit">
                               FAN ON
                            </button>
                        </div>
                    </form>

                    <form action="includes/off.php" method="GET">
                        <div class="container-login100-form-btn p-t-10">
                            <button class="login100-form-btn" name="off" type="submit">
                              FAN  OFF
                            </button>
                        </div>
                    </form>
                    
                                       <form action="includes/l_on.php" method="GET">
                        <div class="container-login100-form-btn p-t-10">
                            <button class="login100-form-btn" name="on" type="submit">
                            LIGHT ON
                            </button>
                        </div>
                    </form>

                    <form action="includes/l_off.php" method="GET">
                        <div class="container-login100-form-btn p-t-10">
                            <button class="login100-form-btn" name="off" type="submit">
                              LIGHT  OFF
                            </button>
                        </div>
                    </form>


                    <div class="container-login100-form-btn p-t-10">

                        <a href="welcome.php" class="login100-form-btn">

                            Back

                        </a>
                    </div>

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
