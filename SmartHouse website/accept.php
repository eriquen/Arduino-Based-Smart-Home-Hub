<?php include "includes/db.php";?>
<?php 
 //   if(isset($_GET['light'],$_GET['flame'],$_GET['ir1'],$_GET['ir2'],$_GET['ir3'],$_GET['ir4'],$_GET['smoke'],$_GET['temp'],$_GET['fan'],$_GET['buzz'],$_GET['light'])){
            if(isset($_GET['light'],$_GET['flame'],$_GET['ir1'],$_GET['ir2'],$_GET['ir3'],$_GET['ir4'],$_GET['smoke'],$_GET['temp'],$_GET['fan'],$_GET['buzz'])){
        
        $light_status = $_GET['light'];
        $flame_value = $_GET['flame'];
        $ir_value1 = $_GET['ir1'];
        $ir_value2 = $_GET['ir2'];
        $ir_value3 = $_GET['ir3'];
        $ir_value4 = $_GET['ir4'];
        $smoke_value = $_GET['smoke'];
        $temp_value = $_GET['temp'];
        $fan_status = $_GET['fan'];
        $buzz_status = $_GET['buzz'];
//        $light_status = $_GET['light'];

        // update light sensor value
        $query = "UPDATE sensors SET sensor_value = {$light_status} WHERE sensor_id = 7 ";
        $update_value = mysqli_query($connection,$query);
        
        // update flame sensor value
        $query = "UPDATE sensors SET sensor_value = {$flame_value} WHERE sensor_id = 13 ";
        $update_value = mysqli_query($connection,$query);

        // update front door sensor value
        $query = "UPDATE sensors SET sensor_value = {$ir_value1} WHERE sensor_id = 9 ";
        $update_value = mysqli_query($connection,$query);

        // update window sensor value
        $query = "UPDATE sensors SET sensor_value = {$ir_value2} WHERE sensor_id = 10 ";
        $update_value = mysqli_query($connection,$query);

        // update back door sensor value
        $query = "UPDATE sensors SET sensor_value = {$ir_value3} WHERE sensor_id = 11 ";
        $update_value = mysqli_query($connection,$query);
        
        // update living room sensor value
        $query = "UPDATE sensors SET sensor_value = {$ir_value4} WHERE sensor_id = 12 ";
        $update_value = mysqli_query($connection,$query);
        
        // update smoke sensor value
        $query = "UPDATE sensors SET sensor_value = {$smoke_value} WHERE sensor_id = 8 ";
        $update_value = mysqli_query($connection,$query);
        
        // update temperature  value
        $query = "UPDATE sensors SET sensor_value = {$temp_value} WHERE sensor_id = 6 ";
        $update_value = mysqli_query($connection,$query);
        
        //update fan status
        $query = "UPDATE sensors SET sensor_value = {$fan_status} WHERE sensor_id = 5 ";
        $update_value = mysqli_query($connection,$query);
        
        //update alarm status
        $query = "UPDATE sensors SET sensor_value = {$buzz_status} WHERE sensor_id = 14 ";
        $update_value = mysqli_query($connection,$query);
        
        //update light status
//        $query = "UPDATE sensors SET sensor_value = {$light_status} WHERE sensor_id = 15 ";
//        $update_value = mysqli_query($connection,$query);
    }
?>