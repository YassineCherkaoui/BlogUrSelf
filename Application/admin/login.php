<?php require('../includes/session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | login </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../public/css/admin-login.css">

</head>
<body>

	<div class="login">
	
	<?php
	echo messageAdminLogin();
	?>
	
	<div class="login-screen">
			<div class="app-title">
			<span class="login100-form-logo">
						<i><img src="../public/images/fiveicon.png" style="width: 15%;"></i>
					</span>
				<h1>Login</h1>
			</div>

			<div class="login-form">
				<form action="login_back.php" method="post">
			
				<div class="control-group">
				<input type="email" name="email" class="login-field" value="" placeholder="Email" id="login-name" >
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" name="password" class="login-field" value="" placeholder="password" id="login-pass" >
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>

				<button type="submit" name="admin_login" class="btn btn-primary btn-large btn-block">login</button>
				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>





<?php
//include config
require_once('../includes/config.php');

?>