<?php
ob_start();
require('dbconn.php');
 
$id =$_GET['pin'];
$status =$_GET['Status'];

$q ="update LMS.user set Status=$status pin=$id";

mysqli_query($conn,$q);
header('location:student.php');

?>