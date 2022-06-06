
  <?php include 'displayPdf.php';?>

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
                                <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home</a></li>
                                 <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Messages</a></li>
                                <li><a href="student.php"><i class="menu-icon icon-user"></i>Manage User </a></li>
                                <li><a href="book.php"><i class="menu-icon icon-book"></i> Books </a></li>
                                <li><a href="addbook.php"><i class="menu-icon icon-edit"></i>Add Books </a></li>
                                <li><a href="requests.php"><i class="menu-icon icon-tasks"></i>Issue/Return Requests </a></li>
                                <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>Book Recommendations </a></li>
                                <li><a href="current.php"><i class="menu-icon icon-list"></i>Currently Issued Books </a></li>
                                <li class="nav-user dropdown"><a href="pdf.php"><i class="menu-icon icon-copy"></i>Reports </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="readfiles.php"><i class="menu-icon icon-signout"></i>Video </a></li>
                                <li><a href="addVideo.php"><i class="menu-icon icon-signout"></i>Add video </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>

                     <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Add files</h3>
                            </div>
                            <div class="module-body">                                  
                               <br >

                                    <form class="form-horizontal row-fluid" action="" method="post" enctype="multipart/form-data">                
                                         <div class="control-group">
                                            <label class="control-label" for="Image"><b>Files</b></label>
                                            <div class="controls">
                                               <input type="file" name="myfile">
                                               	<input type="submit" name="submit" value="Upload">
                                            </div>
                                        </div>              

                                     
                                    </form>
                            </div>
                        </div>                       
                        
                    </div><!--/.content-->
                    <table class="table" id = "tables">
                    	 <thead>
                                    <tr>
                                        
                                      <th>ID</th>
                                      <th>FileName</th>
                                      <th>Size</th>
                                      <th>Downloads</th>
                                      <th>Action</th>     
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                  	<?php foreach($files as $file): ?>
                                  		<tr>
                                  		<td><?php echo $file['id'];?></td>
                                  		<td><?php echo $file['name'];?></td>
                                  		<td><?php echo $file['size']/100 . "KB";?></td>
                                  		<td><?php echo $file['downloads'];?></td>
                                  		<td>
                                  		<a href="pdf.php?file_id=<?php echo $file['id']?>">Download</a>
                                  	</td>
                                  		</tr>
                                  	<?php endforeach ; ?>
                                  </tbody>
                              </table>

                </div>

                </div>
            </div>
            <!--/.container-->

        </div>	
</form>
</body>

<div class="footer">
            <div class="containerSection">
                <center> <b class="copyright">&copy; 2022 Library Management System </b>All rights reserved.</center>
            </div>
        </div>
</html>
















                    
