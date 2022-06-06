<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['Pin']) {
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LMS</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/student2.css" rel="stylesheet">
        <link type="text/css" href="css/pro.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top"><!---bookish---->
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">BooKish </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse" >
                        <ul class="nav pull-right" >
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/0.jpg" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php"> Your Profile</a></li>
                                    <!--li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li-->
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container"><!---home, admin and space--->
                <div class="row"><!---home and admin--->
                    <div class="span3"><!--behind the sidebar--->
                        <div class="sidebar"><!---home,messege vako batta-->
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home
                                </a></li>
                                 <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Messages</a>
                                </li>
                                <li><a href="student.php"><i class="menu-icon icon-user"></i>Manage User </a>
                                </li>
                                <li><a href="book.php"><i class="menu-icon icon-book"></i> Books </a></li>
                                <li><a href="addbook.php"><i class="menu-icon icon-edit"></i>Add Books </a></li>
                                <li><a href="requests.php"><i class="menu-icon icon-tasks"></i>Issue/Return Requests </a></li>
                                <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>Book Recommendations </a></li>
                                <li><a href="current.php"><i class="menu-icon icon-list"></i>Currently Issued Books </a></li>
                                <li><a href="pdf.php"><i class="menu-icon icon-copy"></i>Reports </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                
                                <li><a href="readfiles.php"><i class="menu-icon icon-signout"></i>Video </a></li>
                                <li><a href="addVideo.php"><i class="menu-icon icon-signout"></i>Add video </a></li>
                            </ul>
                            
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    
                    <div class="span9"><!---admin page ko paxadi ko box-->
                        <center><!---admin box---->
                            <div class="card" style="width: 50%;"> <!--admin and admin infor box-->
                                <img class="card-img-top" src="images/profile2.png" alt="Card image cap">
                                <div class="card-body">

                                <?php
                                $pin = $_SESSION['Pin'];
                                $sql="select * from LMS.user where Pin='$pin'";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();

                                $name=$row['Name'];
                               
                                $email=$row['EmailId'];
                                $mobno=$row['MobNo'];
                                ?>    
                                    <i>
                                    <h1 class="card-title"><center><?php echo $name ?></center></h1>
                                    <br>
                                    <p><b>Email ID: </b><?php echo $email ?></p>
                                    <br>
                                    <p><b>Mobile number: </b><?php echo $mobno ?></p>
                                    </b>
                                </i>

                                </div>
                            </div>
                        <br>
                        <a href="edit_admin_details.php" class="btn btn-primary">Edit Details</a>
                        </center>               
                    </div>
                    
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
<div class="footer">
            <div class="container">
               <center> <b class="copyright">&copy; 2018 Library Management System </b>All rights reserved.</center>
            </div>
        </div>
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>