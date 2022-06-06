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
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">BooKish</a>
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

                    <div class="span9">
                        <form class="form-horizontal row-fluid" action="student.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Search"><b>Search:</b></label>
                                            <div class="controls">
                                                <input type="text" id="title" name="title" placeholder="Enter Name/Pin no of users." class="span8" required>
                                                <button type="submit" name="submit"class="btn">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <?php
                                    if(isset($_POST['submit']))
                                        {$s=$_POST['title'];
                                            $sql="select * from LMS.user where (Pin='$s' or Name like '%$s%') and Pin<>'ADMIN'";
                                        }
                                    else
                                        $sql="select * from LMS.user where Pin<>'ADMIN'";

                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                                    else
                                    {

                                    
                                    ?>

                        <table class="table" id = "tables" style="margin-top: -5rem;">
                                  <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>Pin</th>
                                      <th>Email id</th>
                                      <th>Status</th>   
                                       <th></th>                         
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                    <?php
                            
                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {

                                $email=$row['EmailId'];
                                $name=$row['Name'];
                                $pin=$row['Pin'];
                                $status=$row['Status'];                   
                            ?>

                                    <tr>
                                      <td><?php echo $name ?></td>
                                      <td><?php echo $pin ?></td>
                                      <td><?php echo $email ?></td>

                                      
                                 <?php
                                 $status=$row['Status'];
                                if($status==0)$strStatus="<a href=useractive.php?Pin=".$row['Pin']."> Activate User</a>";
                                if($status==1)$strStatus="<a href=userdeactive.php?Pin=".$row['Pin'].">Deactivate User</a>";
                                echo"<br><td>".$strStatus."</td>";

                                          ?>
                                      
                                      
                                                                                                           
                                        <td>
                                        <center>
                                            <a href="studentdetails.php?id=<?php echo $pin; ?>" class="btn btn-success">Details</a>
                                            <a href="remove.php?id=<?php echo $pin; ?>" class="btn btn-primary">Delete</a>
                                      </center>
                                        </td>
                                    </tr>
                            <?php }} ?>
                                  </tbody>
                                </table>
                            </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
<div class="footer">
            <div class="container">
              <center>  <b class="copyright">&copy; 2022 Library Management System </b>All rights reserved.</center>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script type="text/javascript">
    function active_disactive_user(val,Pin){
        $.ajax({
            type:'post',
            url:'useractive.php',
            success:function(result){
                if(result==1){
                    $('#str'+ Pin).html('Active');
                }else{
                    $('#str'+Pin).html('Diactive');
                }
                }
             });    
   </script>
 

  </html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>