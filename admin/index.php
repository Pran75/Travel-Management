<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
	
	echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>QC | Admin Sign in</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>

</head> 
<body>
	<!--<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
		<h2>Sign In</h2>
	
		<form  method="post">
			<div class="username">
				<span class="username">Username:</span>
				<input type="text" name="username" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="password" class="password" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			
			<div class="login-w3">
					<input type="submit" class="login" name="login" value="Sign In">
			</div>
			<div class="clearfix"></div>
		</form>
				<div class="back">
					<a href="../index.php">Back to home</a>
				</div>
				
	</div>
	</div>
	</div>-->
	<div class="adlogin">
	<div class="center">
		<h1>Admin Login</h1>
		<form method="post">
			<div class="tf">
			  <input type="text" name="username" class="name" placeholder="" required="">
			  <label>Username</label>
            </div>
			<div class="tf">
			<input type="password" name="password" class="password" placeholder="" required="">
			  <label>Password</label>
            </div>
			<input type="submit" class="login" name="login" value="Sign In">
			<div class="homelink"> 
			<a href="../index.php">Back to home</a>
            </div>
        </form>
    </div>
</div>


</body>
</html>