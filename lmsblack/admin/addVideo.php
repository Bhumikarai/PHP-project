<?php
require('dbconn.php');
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
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home
                                </a></li>
                                 <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Messages</a>
                                </li>
                                <li><a href="student.php"><i class="menu-icon icon-user"></i>Manage User </a></li>
                                <li><a href="book.php"><i class="menu-icon icon-book"></i> Books </a></li>
                                <li><a href="addbook.php"><i class="menu-icon icon-edit"></i>Add Books </a></li>
                                <li><a href="requests.php"><i class="menu-icon icon-tasks"></i>Issue/Return Requests </a></li>
                                <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>Book Recommendations </a></li>
                                <li><a href="current.php"><i class="menu-icon icon-list"></i>Currently Issued Books </a></li>
                                 <li><a href="pdf.php"><i class="menu-icon icon-copy"></i>Reports </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="readfiles.php"><i class="menu-icon icon-signout"></i>Videos </a></li>                            
                                <li><a href="addvideo.php"><i class="menu-icon icon-signout"></i>Add video</a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>

 <?php


if(isset($_POST['submit'])){
	$maxsize = 52428800; //50MB in bytes

	if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
	$name =$_FILES['file']['name'];
	$target_dir ='.././upload/';
	$target_file = $target_dir.$name;


	// file extension

	$extension= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// VALID FILE EXTENSIONS
	$extension_arr = array("mp4","avi","3gp","mov","mpeg");

	// CHECK EXTENSION
	if (in_array($extension,$extension_arr)){

		// CHECK FILE SIZE
		if ($_FILES['file']['size']>=$maxsize)
		{
			$_SESSION['message']="File too large. File must be less than 5MB.";

	}else{
          
          //UPLOAD
		if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){

			// INSERT RECORD

			$sql = "INSERT INTO LMS.videos (name,location) VALUES ('".$name."','".$target_file."')";
			
			mysqli_query($conn,	$sql);

			$_SESSION['message'] ="Upload successfully.";
		}
	  }
      } else{

		$_SESSION['message']="Invalid file extension.";
	}

} else{
	$_SESSION['message']="Please select a file";
     }
   }
?>

<!DOCTYPE html>
<html>
<head>
	<title>LMS</title>
</head>
<body>

<?php

	if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

          <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Add Video</h3>
                            </div>
                            <div class="module-body">
                                    
                                    <br >

                                    <form class="form-horizontal row-fluid" action="" method="post" enctype="multipart/form-data">                                  
                                         <div class="control-group">
                                            <label class="control-label" for="Image"><b>Video</b></label>
                                            <div class="controls">
                                               <input type="file" name="file">
                                               	<input type="submit" name="submit" value="Upload">
                                            </div>
                                        </div>                                    
                                    </form>
                            </div>
                        </div>                        
                        
                    </div><!--/.content-->
                </div>

                </div>
            </div>
            <!--/.container-->

        </div>	
</form>
</body>
</html>