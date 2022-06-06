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
        <link type="text/css" href="css/student4.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
       
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">BooKish </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/0.jpg" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php">Your Profile</a></li>
                                    <!--li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li-->
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->

                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-left">
                            <li class="nav-user dropdown"><a href="index.php"><i class="menu-icon icon-home"></i>Home </a></li>
                             <li class="nav-user dropdown"><a href="book.php"><i class="menu-icon icon-book"></i> Books </a></li>
                              <li class="nav-user dropdown"><a href="pdf.php"><i class="menu-icon icon-copy"></i>Reports </a></li>                                  
                              
                                <li class="nav-user dropdown"><a href="recommendations.php"><i class="menu-icon icon-list"></i>Recommend </a></li>
                                <li class="nav-user dropdown"><a href="current.php"><i class="menu-icon icon-list"></i>Currently Issued </a></li>
                                <li class="nav-user dropdown"><a href="message.php"><i class="menu-icon icon-inbox" ></i>Message</a></li>
                                <li class="nav-user dropdown"><a href="readfiles.php"><i class="menu-icon icon-camera" ></i>Video</a></li>
                                <li class="nav-user dropdown"><a href="history.php"><i class="menu-icon icon-tasks"></i>History </a></li>
                            </ul>
                        </div>




                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
              <div class="span3" style="padding-left: 100px; margin-top: 40px;">
                        <div class="sidebar" style="background-color:#fff;height:235px; 
                        ">
                            <div class="leftbar" style="background-color:#D6AD60; height: 105px;">
                               <center> <p style=" font-size:20px;color: #ffff; font-family: sans-serif; padding-top:30px;line-height:30px;">Recommend your favourite book.</p> </center>
                            </div>

                             <div class="leftbar" style="background-color:#274728; height:112px; margin-top: 20px;">
                               <a href="book.php" style="color: #fff; font-size: 20px;"><i class="menu-icon icon-book" style="padding-top: 40px; padding-left:50px; font-size:50px; color: #fff; padding-right: 10px;"></i>All Books </a></li> 
                                  </div>                            
                        </div>
                        <!--/.sidebar-->
                    </div>
            <div class="container" style="height:450px; ">
                <div class="row">
                  
                    <!--/.span3-->
                    
                    <div class="span9" style="margin-left:40px; margin-top: 40px;">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Reccomend a Book</h3>
                            </div>
                            <div class="module-body">

                                    
                                    <br >

                                    <form class="form-horizontal row-fluid" action="recommendations.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Title"><b>Book Title</b></label>
                                            <div class="controls">
                                                <input type="text" id="title" name="title" placeholder="Title" class="span8" required>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="Description"><b>Description</b></label>
                                            <div class="controls">
                                                <input type="text" id="Description" name="Description" placeholder="Description" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="btn">Submit Recommendation</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>

                        
                        
                    </div><!--/.content-->
                </div>

                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
<div class="footer">
            <div class="container">
               <center> <b class="copyright">&copy; 2022 Library Management System </b>All rights reserved.</center>
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

<?php
if(isset($_POST['submit']))
{
    $title=$_POST['title'];
    $Description=$_POST['Description'];
    $pin=$_SESSION['Pin'];

$sql1="insert into LMS.recommendations (Book_Name,Description,Pin) values ('$title','$Description','$pin')"; 



if($conn->query($sql1) === TRUE){


echo "<script type='text/javascript'>alert('You have successfully recommended your book.')</script>";
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
    
}
?> 

    </body>

</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>