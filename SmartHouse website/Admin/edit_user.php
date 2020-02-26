<?php include "includes/db.php"; ?>
<?php include "function.php"; ?>
<?php session_start();
    if(!isset($_SESSION['username'])){
            header("Location: ../index.php");
   }
    if( $_SESSION['user_role'] === 'user') {
         header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="admin_theme/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_theme/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_theme/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i> <?= $_SESSION['firstname'] ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#sensor"><i class="fa fa-fw fa-wrench"></i> Sensor <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="sensor" class="collapse">
                            <li>
                                <a href="sensor.php">View All Sensor</a>
                            </li>
                            <li>
                                <a href="add_sensor.php">Add Sensor</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="fa fa-fw fa-arrows-v"></i> User <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="user" class="collapse">
                            <li>
                                <a href="user.php">View All User</a>
                            </li>
                            <li>
                                <a href="add_user.php">Add User</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small><?= $_SESSION['firstname'] ?></small>
                        </h1>

                       
                        <?php 
    
                                if(isset($_GET['edit_user'])){
        
                                $the_user_id = $_GET['edit_user'];
    
                                $query = "SELECT * FROM users WHERE user_id = $the_user_id " ;
                                $select_users_query = mysqli_query($connection,$query);  
                                
                                while($row = mysqli_fetch_assoc($select_users_query)){
                                $user_id = $row['user_id'];    
                                $username = $row['username'];
                                $user_password = $row['user_password'];
                                $user_firstname = $row['user_firstname'];
                                $user_lastname = $row['user_lastname'];
                                $user_email = $row['user_email'];
                                $user_role = $row['user_role']; 
                                }
    }




    if(isset($_POST['edit_user'])){
        
        
        $user_firstname = $_POST['user_first_name'];
        $user_lastname = $_POST['user_last_name'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $query = "UPDATE users SET ";
        $query .="user_firstname = '{$user_firstname}', ";
        $query .="user_lastname = '{$user_lastname}', ";
        $query .="user_role = '{$user_role}', ";
        $query .="username = '{$username}', ";
        $query .="user_email = '{$user_email}', ";
        $query .="user_password = '{$user_password}' ";
        $query .="WHERE user_id = '{$user_id}' ";
        
        $edit_user_query = mysqli_query($connection,$query);
        
        confirmQuery($edit_user_query);
    }
?>

                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="title">First Name</label>
                                <input type="text" class="form-control" name="user_first_name" value="<?php echo $user_firstname ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_status">Last Name</label>
                                <input type="text" class="form-control" name="user_last_name" value="<?php echo $user_lastname ?>">
                            </div>

                            <div class="form-group">
                                <select name="user_role" id="user_role">
                                    <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
                                    <?php 
    
                                if($user_role == 'admin'){
                                    echo "<option value='user'>User</option>";
                                    }else{
                                    echo "<option value='admin'>Admin</option>";
                                        }
?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="post_tags">Username</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_tags">Email</label>
                                <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_tags">Password</label>
                                <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
                            </div>

                        </form>

                    </div>
                </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin_theme/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_theme/js/bootstrap.min.js"></script>




</body>

</html>
