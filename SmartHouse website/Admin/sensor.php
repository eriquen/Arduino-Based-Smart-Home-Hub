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
<html lang="en"><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../Admin/admin_theme/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../Admin/admin_theme/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../Admin/admin_theme/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <a class="navbar-brand" href="index.php">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li><a href="../Index.php">Home</a></li>
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
                                <th>Sensor Name</th>
                                <th>Value</th>
                                <th>Unit</th>
                                <th>Threshold</th>
                                <th>Date</th>
                                <th>Time</th>
                               
                            </tr>
                        </thead>
                           <tbody>

                                <?php 
                                $query = "SELECT * FROM sensors" ;
                                $select_sensor = mysqli_query($connection,$query);  
                                
                                while($row = mysqli_fetch_assoc($select_sensor)){
                                $sensor_id = $row['sensor_id'];    
                                $sensor_name = $row['sensor_name'];
                                $sensor_value = $row['sensor_value'];
                                $sensor_unit = $row['sensor_unit'];
                                $sensor_threshold = $row['sensor_threshold'];
                                $sensor_date = $row['sensor_date'];
                                $time = $row['time'];

                       
                                    
                                    echo "<tr>";
                                    echo "<td>{$sensor_id}</td>";
                                    echo "<td>{$sensor_name}</td>";
                                    echo "<td>{$sensor_value}</td>";
                                    echo "<td>{$sensor_unit}</td>";
                                    echo "<td>{$sensor_threshold}</td>";
                                    echo "<td>{$sensor_date}</td>";
                                    echo "<td>{$time}</td>";
                                    echo "<td><a href='edit_sensor.php?edit_sensor=$sensor_id'>Edit</a></td>";
                                    echo "<td><a href='delete_sensor.php?delete=$sensor_id'>Delete</a></td>";
                                    
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
    <script src="../Admin/admin_theme/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../Admin/admin_theme/js/bootstrap.min.js"></script>
 


</body></html>