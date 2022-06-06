<?php
ob_start();
require('dbconn.php');
 
$id =$_GET['Pin'];


$q ="update LMS.user set Status='1' where Pin='$id'";

if (mysqli_query($conn,$q))
{
	echo"<br>User Activated !";
}


?>