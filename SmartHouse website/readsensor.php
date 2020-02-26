<?php include "includes/db.php";?>

<?php 
    if(isset($_GET['fan'],$_GET['temp'])){
        
        $fan_status = $_GET['fan'];
        $temp_value = $_GET['temp'];
        
        $query = "SELECT * FROM sensors WHERE sensor_id = 5";
        
        if($res = mysqli_query($connection,$query))
        {
        $outs = $res->fetch_assoc();
        echo $outs['sensor_value'];
        }
        
        
    }else {
        echo "Missing params";
    }
?>


<!--  
    example 
    syed.com/syed/SmartHouse/accept.php?fan={someVaue}&temp={someValue}

-->