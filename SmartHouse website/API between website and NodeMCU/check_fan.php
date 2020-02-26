<?php
 
$connection = mysqli_connect('localhost','root','pass','database name');

        $query = "SELECT * FROM dummy WHERE id = 1 " ;
        $select_sensor = mysqli_query($connection,$query);  

        while($row = mysqli_fetch_assoc($select_sensor)){   
        $fan_status = $row['value']; 
}
        $query = "SELECT * FROM dummy WHERE id = 2 " ;
        $select_sensor = mysqli_query($connection,$query);  

        while($row = mysqli_fetch_assoc($select_sensor)){   
        $light_status = $row['value']; 
}

        $query = "SELECT * FROM dummy WHERE id = 3 " ;
        $select_sensor = mysqli_query($connection,$query);  

        while($row = mysqli_fetch_assoc($select_sensor)){   
        $start_status = $row['value']; 
}

        



if($fan_status == 0 && $light_status == 0)
  {
    $status = 1;
}
elseif($fan_status == 0 && $light_status == 1){
    $status = 2;
}
elseif($fan_status == 1 && $light_status == 0){
    $status = 3;
}
else{
    $status = 4;
}


//if($fan_status == 0 && $light_status == 0 && $start_status == 0)
//  {
//    $status = 1;
//}
//elseif($fan_status == 0 && $light_status == 0  && $start_status == 1){
//    $status = 2;
//}
//elseif($fan_status == 0 && $light_status == 1  && $start_status == 0){
//    $status = 3;
//}
//elseif($fan_status == 0 && $light_status == 1  && $start_status == 1){
//    $status = 4;
//}
//elseif($fan_status == 1 && $light_status == 0  && $start_status == 0){
//    $status = 5;
//}
//elseif($fan_status == 1 && $light_status == 0  && $start_status == 1){
//    $status = 6;
//}
//elseif($fan_status == 1 && $light_status == 1  && $start_status == 0){
//    $status = 7;
//}
//
//else{
//    $status = 8;
//}

//echo vaue will sent to nodemcu and sent to arduino

echo $status;
 

?>