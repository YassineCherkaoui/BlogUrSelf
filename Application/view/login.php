<?php require('../includes/session.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>


	<div id="formContainer">
		<div class="formLeft">
		
			<img src="../style/images/logo.png">
			<br>
			<div>
<?php

				echo message();
				echo message2();
	?>
</div>
		</div>
		<div class="formRight">
			<!-- Forgot password form -->
			<!-- <form id="forgot" class="otherForm">
				<header>
					<h1>Forgot Password</h1>
					<p>Seems like your password is missing</p>
				</header>
				<section>
					<label>
						<p>Email</p>
						<input type="email" placeholder=" ">
						<div class="border"></div>
					</label>
					<button type="submit">Send email</button>
				</section>
				<footer>
					<button type="button" class="forgotBtn">Back</button>
				</footer>
			</form> -->

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
				
					<h1>Become a Bro</h1>
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
<style>
	@import url('https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800');

	* {
		outline-width: 0;
		font-family: 'Nunito' !important;
	}

	.message{
		color: red;
		}
		.message2{
		color: green;
		}

	body {
		overflow: hidden;
		height: 100vh;
		width: 100vw;
		background: url('https://cdn.pixabay.com/photo/2015/06/08/15/11/typewriter-801921_960_720.jpg') center/cover fixed;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	#formContainer {
		display: flex;
		transition: 0.2s ease;
		height: 342.5px;
		transition-delay: 0.3s;
	}

	#formContainer.toggle {
		height: 480px;
		transition-delay: 0s;
	}

	.formLeft {
		background: #fff;
		border-radius: 5px 0 0 5px;
		padding: 0 35px;
		box-sizing: border-box;
		display: flex;
		align-items: center;
	}

	.formLeft img {
		display: block;
		width: 100px;

	}

	.formRight {
		position: relative;
		overflow: hidden;
		border-radius: 0 5px 5px 0;
		display: flex;
		flex-direction: column;
		justify-content: center;
	}

	.formRight:before {
		content: "";
		position: absolute;
		top: -10px;
		left: -10px;
		width: calc(100% + 20px);
		height: calc(100% + 20px);
		/* background: url('https://source.unsplash.com/2560x1440/daily') center/cover fixed; */
		box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.5);
		filter: blur(5px);
	}

	.formRight form {
		position: relative;
		width: 350px;
		padding: 25px;
		box-sizing: border-box;
		white-space: nowrap;
		overflow: hidden;
	}

	.formRight form header {
		color: #fff;
		text-align: center;
		margin-bottom: 15px;
	}

	.formRight form header h1 {
		margin: 0;
		font-weight: 400;
		user-select: none;
	}

	.formRight form header p {
		margin: 5px 0 0;
		opacity: 0.5;
		font-size: 14px;
		user-select: none;
	}

	.formRight form section label {
		display: block;
		margin-bottom: 15px;
		position: relative;
	}

	.formRight form section label p {
		color: #fff;
		margin: 0 0 10px 0;
		font-weight: 600;
		font-size: 12px;
		opacity: 0.5;
		user-select: none;
	}

	.formRight form section label input {
		width: 100%;
		display: block;
		border: none;
		background: transparent;
		color: #fff;
		border-bottom: 1px solid rgba(255, 255, 255, 0.1);
		padding: 0 0 10px;
		box-sizing: border-box;
		font-weight: 600;
	}

	.formRight form section label input:focus~.border {
		transform: scale(1, 1);
	}

	.formRight form section label input:not(:placeholder-shown)~.border {
		transform: scale(1, 1);
	}

	.formRight form section label .border {
		position: absolute;
		bottom: 0;
		left: 0;
		width: 100%;
		height: 2px;
		background: #fff;
		transform: scale(0, 1);
		transition: 0.2s ease;
	}

	.formRight form section label:last-child {
		margin-bottom: 0;
	}

	.formRight form section button {
		background: #00897b;
		border: none;
		width: 100%;
		padding: 10px 0;
		font-weight: 600;
		color: #fff;
		cursor: pointer;
	}

	.formRight form section button:hover {
		background: #007f72;
	}

	.formRight form footer {
		margin-top: 15px;
		display: flex;
	}

	.formRight form footer button {
		background: transparent;
		padding: 0;
		border: none;
		color: #fff;
		cursor: pointer;
		font-size: 12px;
		font-weight: bold;
		flex: 1;
		opacity: 0.5;
	}

	.formRight form footer button:hover {
		opacity: 1;
	}

	.formRight form.otherForm {
		top: 0;
		left: 0;
		position: absolute;
		background: #fff;
		height: 100%;
		z-index: 1;
		display: flex;
		flex-direction: column;
		justify-content: center;
		width: 0;
		padding: 25px 0;
		transition: 0.2s ease;
		transition-delay: 0.2s;
		border-left: 1px solid rgba(0, 0, 0, 0.1);
	}

	.formRight form.otherForm header {
		color: #000;
		opacity: 0;
		transition: 0.2s ease;
		transition-delay: 0s;
	}

	.formRight form.otherForm p {
		color: #000;
	}

	.formRight form.otherForm section {
		opacity: 0;
		transition: 0.2s ease;
		transition-delay: 0s;
	}

	.formRight form.otherForm footer {
		border-top-color: rgba(0, 0, 0, 0.1);
		opacity: 0;
	}

	.formRight form.otherForm footer button {
		color: #000;
	}

	.formRight form.otherForm input {
		border-color: rgba(0, 0, 0, 0.1);
		color: #000;
	}

	.formRight form.otherForm .border {
		background: #000;
	}

	.formRight form.otherForm.toggle {
		width: 100%;
		padding: 25px;
		transition-delay: 0s;
	}

	.formRight form.otherForm.toggle header,
	.formRight form.otherForm.toggle section,
	.formRight form.otherForm.toggle footer {
		opacity: 1;
		transition-delay: 0.3s;
	}
</style>
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