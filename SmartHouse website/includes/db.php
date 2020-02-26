<?php 
 
$connection = mysqli_connect('localhost','root','pass','database');


if($connection->connect_errno > 0){
 echo "We are connected";
}



?>