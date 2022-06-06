<?php
  require('dbconn.php');


$sql ="SELECT * FROM LMS.files";
$result =mysqli_query($conn,$sql);
$files = mysqli_fetch_all($result,MYSQLI_ASSOC);



   if(isset($_POST['submit']))
   {
   	$filename = $_FILES['myfile']['name'];
   	$destination ='.././upload/'.$filename;

   	$extension = pathinfo($filename, PATHINFO_EXTENSION);
   	$file =$_FILES['myfile']['tmp_name'];
   	$size =$_FILES['myfile']['size'];
   	if(!in_array($extension,['zip','pdf','docx']))
   	{
   		echo "Your file extension must be .zip, .pdf .docx ";
   	}
   	elseif ($_FILES['myfile']['size']>52428800)
   	 {
   		echo "file is too large";
   	}
   	else{
   		if (move_uploaded_file($file, $destination)) {
   			$sql ="INSERT INTO LMS.files(name,size,downloads)VALUES('$filename','$size',0)";
   			if (mysqli_query($conn,$sql))
   			 {
   				echo "file uploaded successfully";
   			}
   			else{
   				echo "Failed to upload the file";
   			}
   		}
   	}
   	exit();
   }



  

  
  if(isset($_GET['file_id']))
  {
  	$id =$_GET['file_id'];

  	$sql ="SELECT * FROM LMS.files WHERE id=$id";
  	$result =mysqli_query($conn,$sql);
  	$file = mysqli_fetch_assoc($result);
  	$filepath ='.././upload/'.$file['name'];

  	if(file_exists($filepath))
  	{
  		header('Content-Type: application/octet-stream');
  		header('Content-Description: File Transfer');

  		header('Content-Disposition: attachment; filename=' . basename($filepath));

  		header('Expires: 0');

  		header('Cache-Control:must-revalidate');
  		header('Pragma: public');

  		header('Content-Length:' . filesize('.././upload/'. $file['name']));

  		readfile('.././upload/'.$file['name']);

  		$newCount=$file['downloads'] + 1;

  		$updteQuery="UPDATE LMS.files SET downloads=$newCount WHERE id=$id";

  		mysqli_query($conn,$updteQuery);
  		
  		exit();
  	}

  }


  ?>