<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "includes/db.php"; ?>
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
    <link rel="stylesheet" type="text/css" href="user_option_theme/css/style.css">
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
                        <a href="welcome.php"><img src="user_option_theme/images/house.jpg" alt="AVATAR"></a>
                    </div>
                    <span class="login100-form-title p-t-20 p-b-45">
                        <?= $_SESSION['firstname'] ?>
                    </span>
                    <div class="profile-wrap">
                        <?php 
    
                                
    
                                if(isset($_GET['s_id'])){
                    
                                $the_sensor_id = $_GET['s_id'];
                                }
    
                                $query = "SELECT * FROM sensors WHERE sensor_id = $the_sensor_id " ;
                                $select_sensors_query = mysqli_query($connection,$query);  
                                
                                while($row = mysqli_fetch_assoc($select_sensors_query)){
                                $sensor_id = $row['sensor_id'];    
                                $sensor_name = $row['sensor_name'];
                                $sensor_value = $row['sensor_value'];
                                $sensor_unit = $row['sensor_unit'];
                                $sensor_threshold = $row['sensor_threshold'];
                                $date = $row['sensor_date'];
                                $time = $row['time'];
                               

    ?>
                        <div class="sec">
                            <label for="firstname" class="centre">Sensor Name</label>
                            <span class="centre"> --> <?php echo $sensor_name ?></span>
                        </div>
                        <div class="sec" id="streamTitle">
                            <label for="firstname" class="centre">Sensor Value</label>
                            <span class="centre"> --> <?php
                                
                                if($sensor_value === "1")
                                {
                                    echo "ON";
                                }elseif($sensor_value === "0")
                                {
                                     echo "OFF";
                                }else
                                {
                                   echo $sensor_value;  
                                }
                                ?></span>
                        </div>
                        <div class="sec">
                            <label for="firstname" class="centre">Sensor Unit</label>
                            <span class="centre"> --> <?php echo $sensor_unit ?></span>
                        </div>
                        <div class="sec">
                            <label for="firstname" class="centre">Sensor Threshold</label>
                            <span class="centre"> --> <?php echo $sensor_threshold ?></span>
                        </div>
                        <div class="sec">
                            <label for="firstname" class="centre">Date</label>
                            <span class="centre"> --> <?php echo $date ?></span>
                        </div>
                        <div class="sec">
                            <label for="firstname" class="centre">Time</label>
                            <span class="centre"> --> <?php echo $time ?></span>
                        </div>
                        <?php   } ?>
                    </div>
                    <form class="login100-form validate-form">
                        <div class="container-login100-form-btn p-t-10">

                            <a href="sensor.php" class="login100-form-btn">

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
