<?php 

function confirmQuery($result){
     global $connection;
      if(!$result){
            die("query failed" .mysqli_error($connection));
        }
}

?>