<?php
ob_start();
require('dbconn.php');
 
$id =$_GET['Pin'];


$q ="update LMS.user set Status='0' where pin='$id'";

if (mysqli_query($conn,$q))
{
	echo"<br>User deactivated !";
}


?>