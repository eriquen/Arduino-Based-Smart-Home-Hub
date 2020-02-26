<?php
include "includes/db.php";
     if(isset($_GET['delete'])){
      
                                $the_user_id = $_GET['delete'];
                                $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
                                $delete_user_query = mysqli_query($connection, $query);
                                header("location: user.php");
   
                                }
?>
