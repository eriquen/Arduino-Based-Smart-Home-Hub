<?php include "includes/db.php"; ?>
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
                        <table class="table table-bordered  table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $query = "SELECT * FROM users" ;
                                $select_users = mysqli_query($connection,$query);  
                                
                                while($row = mysqli_fetch_assoc($select_users)){
                                $user_id = $row['user_id'];    
                                $username = $row['username'];
                                $user_password = $row['user_password'];
                                $user_firstname = $row['user_firstname'];
                                $user_lastname = $row['user_lastname'];
                                $user_email = $row['user_email'];
                                $user_role = $row['user_role'];
                       
                                    
                                    echo "<tr>";
                                    echo "<td>{$user_id}</td>";
                                    echo "<td>{$username}</td>";
                                    echo "<td>{$user_firstname}</td>";

                                    echo "<td>{$user_lastname}</td>";
                                    echo "<td>{$user_email}</td>";
                                     echo "<td>{$user_role}</td>";
                                    echo "<td><a href='edit_user.php?edit_user=$user_id'>Edit</a></td>";
                                    echo "<td><a href='delete_user.php?delete=$user_id'>Delete</a></td>";
                                    
                                echo "</tr>";
                                }
                            ?>




                            </tbody>
                        </table>
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
