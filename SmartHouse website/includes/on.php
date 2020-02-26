<?php include "db.php";?>
<?php 
    if(isset($_GET['on'])){
        
        $fan_status = 1;
       
        
        $query = "UPDATE dummy SET value = {$fan_status} WHERE id = 1 ";
        
        $update_value = mysqli_query($connection,$query);
        header("Location: ../control.php");
    }
?>

