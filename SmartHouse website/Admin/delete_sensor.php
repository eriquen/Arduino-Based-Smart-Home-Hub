<?php
include "includes/db.php";
     if(isset($_GET['delete'])){
      
                                $the_user_id = $_GET['delete'];
                                $query = "DELETE FROM sensors WHERE sensor_id = {$the_user_id} ";
                                $delete_user_query = mysqli_query($connection, $query);
                                header("location: sensor.php");
   
                                }
?>
