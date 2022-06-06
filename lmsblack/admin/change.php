<?php
ob_start();
require('dbconn.php');
 
$query=mysqli_query($conn,"Update LMS.user set status='".$_POST['val']."' where Pin='".$_POST['Pin']."' ");

	if ($query)
	{
		$q=mysqli_query($conn,"Select *from LMS.user where Pin='".$_POST['Pin']."' ");
		$data = mysqli_fetch_assoc($query);
		echo $data['Status'];
	}
	?>