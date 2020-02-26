<?php include "db.php";?>
<?php 
    if(isset($_GET['off'])){
        
        $light_status = 0;
       
        
        $query = "UPDATE dummy SET value = {$light_status} WHERE id = 2 ";
        
        $update_value = mysqli_query($connection,$query);
        header("Location: ../control.php");
    }
?>

