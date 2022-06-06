<?php
require('dbconn.php');
?>


<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>LMS </title>

	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="Library Member Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->

	<!-- Style --> <link rel="stylesheet" href="css/ex.css" type="text/css" media="all">
		<!-- Style --> <link rel="stylesheet" href="css/navigation.css" type="text/css" media="all">
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>


	<!-- Fonts -->
		<link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>
	 <header>  
  <div class="container">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
      <div class="logo"><a href="#">BooKish</a></div>
        <ul class="links">
          <li><a href="home.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="question.html">FAQ</a></li>                          
          <li><a href="index.php">login</a></li>

          
        </ul>
      </div>    
    </nav>
  </div>
</header>

	<h1><center>LIBRARY MANAGEMENT SYSTEM</center></h1>

	<div class="Container">

		<div class="login">
			<h2>Sign In</h2>
			<form action="index.php" method="post">
				<input type="text" Name="Pin" placeholder="Pin" required="">
				<input type="password" Name="Password" placeholder="Password" required="">
			
			
			<div class="send-button">
				<!--<form>-->
					<input type="submit" name="signin"; value="Sign In">
				</form>
			</div>
			
			<div class="clear"></div>
		</div>

		<div class="register">
			<h2>Sign Up</h2>
			<form action="index.php" method="post">
				<input type="text" Name="Name" placeholder="Name" required pattern="[a-zA-Z]+" title="Username should only contain alphabet.">
				<input type="text" Name="Email" placeholder="Email" required >
				<input type="password" Name="Password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="At least one number, one uppercase, one lowercase, and at least 6 characters.">
				<input type="text" Name="PhoneNumber" placeholder="Phone Number" required pattern="[0-9]{10}" title="Please enter atleast 10 number.">
				<input type="text" Name="Pin" placeholder="Pin" required="">			
				<br>
			
			
			<br>
			<div class="send-button">
			    <input type="submit" name="signup" value="Sign Up">
			    </form>
			</div>
			<p style="color: #fff;">By creating an account, you agree to our <a class="underline" href="#" style="color: #fff;">Terms</a></p>
			<div class="clear"></div>
		</div>

		<div class="clear"></div>

	</div>
	
	<div class="footer">
            <div class="footer-section" style="background-color:#171c24;margin-top: 25px; height:100px;">
              <center>  <b class="copyright" style="color:#ffff;">&copy; 2022 Library Management System. All rights reserved.</b></center>
            </div>
        </div>

	

<?php
if(isset($_POST['signin']))
{$u=$_POST['Pin'];
 $p=$_POST['Password'];
 

 $sql="select * from LMS.user where Pin='$u'";

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Type'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))

if ($row['Status']==1)
{
$_SESSION['Pin']=$u;

  
   

  if($y=='Admin')
   header('location:admin/index.php');
  else
  	header('location:student/index.php');
        
  }
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect Pin or Password')</script>";
}
   

}

if(isset($_POST['signup']))
{
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$mobno=$_POST['PhoneNumber'];
	$pin=$_POST['Pin'];
	$type='Student';

	$sql="insert into LMS.user (Name,Type,Pin,EmailId,MobNo,Password) values ('$name','$type','$pin','$email','$mobno','$password')";

	if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Registration Successful')</script>";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}

?>



</body>
<!-- //Body -->

</html>
