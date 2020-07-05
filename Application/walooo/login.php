<?php
//include config
require_once('../includes/config.php');


//check if already logged in
if ($user->is_logged_in()) {
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../style/images/fiveicon.png" />
	<link rel="stylesheet" type="text/css" href="style/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../style/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../style/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../style/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../style/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../style/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../style/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../style/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../style/css/util.css">
	<link rel="stylesheet" type="text/css" href="../style/css/main.css">
</head>

<body>
	<?php

	//process login form if submitted
	if (isset($_POST['submit'])) {

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		if ($user->login($username, $password)) {

			//logged in return to index page
			header('Location: index.php');
			exit;
		} else {
			$message = '<p class="error">Wrong username or password</p>';
		}
	} //end if submit

	if (isset($message)) {
		echo $message;
	}
	?>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../style/images/banner5.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-logo">
						<i><img src="../style/images/fiveicon.png" style="width: 56%; margin-left: 24px;"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>



	<!--===============================================================================================-->
	<script src="../style/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../style/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="../style/vendor/bootstrap/js/popper.js"></script>
	<script src="../style/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../style/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../style/vendor/daterangepicker/moment.min.js"></script>
	<script src="../style/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="style/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="../style/js/main.js"></script>

</body>

</html>