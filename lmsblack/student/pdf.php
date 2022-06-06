
  <?php include 'displayPdf.php';?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LMS</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/student4.css" rel="stylesheet">
         <link type="text/css" href="css/userPage.css" rel="stylesheet">


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


                       <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-left">
                            <li class="nav-user dropdown"><a href="index.php"><i class="menu-icon icon-home"></i>Home </a></li>
                             <li class="nav-user dropdown"><a href="book.php"><i class="menu-icon icon-book"></i> Books </a></li>
                             <li class="nav-user dropdown"><a href="pdf.php"><i class="menu-icon icon-copy"></i>Reports </a></li>
                             
                              <li class="nav-user dropdown"><a href="recommendations.php"><i class="menu-icon icon-list"></i>Recommend Book</a></li>
                              <li class="nav-user dropdown"><a href="current.php"><i class="menu-icon icon-list"></i>Currently Issued </a></li>
                              <li class="nav-user dropdown"><a href="message.php"><i class="menu-icon icon-inbox" ></i>Message</a></li>
                              <li class="nav-user dropdown"><a href="readfiles.php"><i class="menu-icon icon-camera" ></i>Video</a></li>
                               <li class="nav-user dropdown"><a href="history.php"><i class="menu-icon icon-tasks"></i>History</a></li>
                        </ul>
                        </div>

                    
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper" style="height:30rem;">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            
                        </div>
                        <!--/.sidebar-->
                    </div>

                     <div class="span9">
                    
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
</html>
















                    
