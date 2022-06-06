<?php
require('dbconn.php');

$bookid=$_GET['id1'];
$pin=$_GET['id2'];

$sql="select Category from LMS.user where Pin='$pin'";
$result=$conn->query($sql);



if($bookid == 'id1' || $pin == 'id2' )
{$sql1="update LMS.record set Date_of_Issue=curdate(),Due_Date=date_add(curdate(),interval 20 day),Renewals_left=1 where BookId='$bookid' and Pin='$pin'";
 
if($conn->query($sql1) === TRUE)
{$sql3="update LMS.book set Availability=Availability-1 where BookId='$bookid'";
 $result=$conn->query($sql3);
 $sql5="insert into LMS.message (Pin,Msg,Date,Time) values ('$pin','Your request for issue of BookId: $bookid  has been accepted',curdate(),curtime())";
 $result=$conn->query($sql5);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=issue_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:1; url=issue_requests.php", true, 303);

}
}
else
{$sql2="update LMS.record set Date_of_Issue=curdate(),Due_Date=date_add(curdate(),interval 30 day),Renewals_left=1 where BookId='$bookid' and Pin='$pin'";

if($conn->query($sql2) === TRUE)
{$sql4="update LMS.book set Availability=Availability-1 where BookId='$bookid'";
 $result=$conn->query($sql4);
 $sql6="insert into LMS.message (Pin,Msg,Date,Time) values ('$pin','Your request for issue of BookId: $bookid has been accepted',curdate(),curtime())";
 $result=$conn->query($sql6);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:1; url=issue_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:1; url=issue_requests.php", true, 303);

}
}



?>