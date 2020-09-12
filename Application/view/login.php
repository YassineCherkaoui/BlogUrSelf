<?php require('../includes/session.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>blogUeSelf | login </title> 
	<link rel="shortcut icon" href="../public/images/fiveicon.png" type="image/x-icon">
  <link href="../public/css/login.css" rel="stylesheet">
</head>

<body>


	<div id="formContainer">
		<div class="formLeft">
		
			<img src="../public/images/logo.png">
			<br>
			<div>
<?php

				echo message();
				echo message2();
	?>
</div>
		</div>
		<div class="formRight">

			<!-- Login form -->
			<form id="login" action="../controller/login_back.php" method="POST">
				<header>
					<h1>Welcome back</h1>
					<p>Login to continue</p>
				</header>
				<section>
					<label>
						<p>Email</p>
						<input type="email" name="email" placeholder=" ">
						<div class="border"></div>
					</label>
					<label>
						<p>Password</p>
						<input type="password" name="password" placeholder=" ">
						<div class="border"></div>
					</label>
					<button name="submit_Login" type="submit">Login</button>
				</section>
				<footer>
					<!-- <button type="button" class="forgotBtn">Forgot password?</button> -->
					<button type="button" class="registerBtn">Need an account?</button>
				</footer>
			</form>

			<!-- Register form -->
			<form id="register" action="../controller/login_back.php" method="POST" class="otherForm">
				<header>
				
					<h1>Become a Member</h1>
					<p>Register to gain full access</p>
				</header>
				<section>
					<label>
						<p>Username</p>
						<input type="text" name="username" placeholder=" ">
						<div class="border"></div>
					</label>
					<label>
						<p>Email</p>
						<input type="email" name="email" placeholder=" ">
						<div class="border"></div>
					</label>
					<label>
						<p>Password</p>
						<input type="password" name="password" placeholder=" ">
						<div class="border"></div>
					</label>
					<label>
						<p>Repeat Password</p>
						<input type="password" name="repeat_password" placeholder=" ">
						<div class="border"></div>
					</label>
					<button name="Register_submit" type="submit">Register</button>
				</section>
				<footer>
					<button type="button" class="registerBtn">Back</button>
				</footer>
			</form>
		</div>

	</div>

</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
	// jQuery
	$(function () {

		// Switch to Forgot Password
		$('.forgotBtn').click(function () {
			$('#forgot').toggleClass('toggle');
		});

		// Switch to Register
		$('.registerBtn').click(function () {
			$('#register, #formContainer').toggleClass('toggle');
		});

	});
</script>

</html>