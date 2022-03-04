<?php include '../classes/AdminLogin.php'; ?>

<?php 
$al = new AdminLogin();

if(isset($_POST['adminLogin'])){ 
   $adminUser = ($_POST['adminUser']);
   $adminPass = md5($_POST['adminPass']);
   
   //Checking adminLogin with adminLogin function
   $loginCheck = $al->adminLogin($adminUser, $adminPass);
}
?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>

<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
<section id="content">
	<form action="" method="post">
		<h1>Admin Login</h1>
	<span style='color:red; font-size:17px; font-weight:bold'>
	<?php
	if(isset($loginCheck)){
		echo $loginCheck;
	}
	?>
</span>
		<div>
			<input type="text" placeholder="Username"  name="adminUser"/>
		</div>
		<div>
			<input type="password" placeholder="Password"  name="adminPass"/>
		</div>
		<div>
			<input type="submit" value="Log in" name="adminLogin"/>
		</div>
	</form><!-- form -->
	<div class="button">
		<a href="#">Training with live project</a>
	</div><!-- button -->
</section><!-- content -->
</div><!-- container -->
</body>
</html>