<?php
ob_start();
require('dbconn.php');

$pin = $_GET['id'];
$sql=" Delete from LMS.user WHERE Pin='$pin'";

mysqli_query($conn,$sql);
header('location:student.php');

