<?php session_start(); 

//$_POST['logout']
if(isset( $_SESSION['username'])) {
    $_SESSION['username']   = null;
    $_SESSION['firstname']  = null;
    $_SESSION['lastname']   = null;
    $_SESSION['user_role']  = null;

    header("Location: ../index.php");
    die();
}else{
   header("Location: ../index.php");
    die();
}
?>
