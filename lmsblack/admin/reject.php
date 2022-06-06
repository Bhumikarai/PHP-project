<?php
require('dbconn.php');

$bookid=$_GET['id1'];

$pin=$_GET['id2'];

$sql="delete from LMS.record where Pin='$pin' and BookId='$bookid'";

if($conn->query($sql) === TRUE)
{
	$sql1="insert into LMS.message (Pin,Msg,Date,Time) values ('$pin','Your request for issue of BookId: $bookid  has been rejected',curdate(),curtime())";
 $result=$conn->query($sql1);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=issue_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:0.01; url=issue_requests.php", true, 303);

}




?>