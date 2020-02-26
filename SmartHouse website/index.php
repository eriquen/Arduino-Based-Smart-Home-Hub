<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['user_role'] === 'user') {
    header("Location: welcome.php");
}else if(isset($_SESSION['username']) && $_SESSION['user_role'] === 'admin'){
//    header("Location: Admin/index.php");
     header("Location: welcome.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="welcome_theme/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="welcome_theme/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="welcome_theme/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="welcome_theme/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="welcome_theme/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="welcome_theme/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="welcome_theme/css/util.css">
	<link rel="stylesheet" type="text/css" href="welcome_theme/css/main.css">
	<link rel="stylesheet" type="text/css" href="welcome_theme/css/style.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('login_theme/images/sm.jpg');">
			<div class="wrap-login100  p-b-30">
				<form class="login100-form validate-form">
					<div class="login100-form-avatar">
                                            <img src="welcome_theme/images/house.jpg" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20">
						Welcome to Smart House's Application
					</span>
 
                                      <span class="login100-form-content p-t-20 p-b-45">
							This Application used to remotely control and manage connected non-computing devices in the home
					</span>

			

					<div class="container-login100-form-btn p-t-10">
						
                                            <a href="login.php" class="login100-form-btn">
                                           
							Login
						
                                            </a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="welcome_theme/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="welcome_theme/vendor/bootstrap/js/popper.js"></script>
	<script src="welcome_theme/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="welcome_theme/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="welcome_theme/js/main.js"></script>

</body>
</html>