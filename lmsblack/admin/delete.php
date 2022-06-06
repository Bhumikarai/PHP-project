<?php
ob_start();
require('dbconn.php');

$bookid = $_GET['id'];
$sql=" Delete from LMS.book WHERE BookId='$bookid'";

mysqli_query($conn,$sql);
header('location:book.php');

?>

<?php{

if($conn->query($sql) === TRUE){
    echo "<script type='text/javascript'>alert('Success')</script>";
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}

?>