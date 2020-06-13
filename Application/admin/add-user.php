<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if (!$user->is_logged_in()) {
	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<title>Admin - Add User</title>
	<link rel="stylesheet" href="../style/js/js.js">
	<link rel="stylesheet" href="../style/css/admin.css">
	<link rel="stylesheet" href="../style/css/user.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="header">
		<a href="#" id="menu-action">
			<i class="fa fa-bars"></i>
			<span>Close</span>
		</a>
		<div class="logo"><img src="../style/images/fiveicon.png" width="2%">
			Admin Panel
		</div>
	</div>
	<div class="sidebar">
		<ul>
			<li><a href="index.php"><i class="fa fa-desktop"></i><span>Desktop</span></a></li>
			<li><a href="users.php"><i class="fa fa-users"></i><span>Users</span></a></li>
			<li><a href="#"><i class="fa fa-blog"></i><span>View Blog</span></a></li>
			<li><a href="#"><i class="fas fa-envelope-square"></i><span>Messages</span></a></li>
			<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>LogOut</span></a></li>
		</ul>
	</div>
	<p><a href="users.php">User Admin Index</a></p>
	<div class="signup-form">
		<?php

		//if form has been submitted process it
		if (isset($_POST['submit'])) {

			//collect form data
			extract($_POST);

			//very basic validation
			if ($username == '') {
				$error[] = 'Please enter the username.';
			}

			if ($password == '') {
				$error[] = 'Please enter the password.';
			}

			if ($passwordConfirm == '') {
				$error[] = 'Please confirm the password.';
			}

			if ($password != $passwordConfirm) {
				$error[] = 'Passwords do not match.';
			}

			if ($email == '') {
				$error[] = 'Please enter the email address.';
			}

			if (!isset($error)) {

				$hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);

				try {

					//insert into database
					$stmt = $db->prepare('INSERT INTO blog_members (username,password,email) VALUES (:username, :password, :email)');
					$stmt->execute(array(
						':username' => $username,
						':password' => $hashedpassword,
						':email' => $email
					));

					//redirect to index page
					header('Location: users.php?action=added');
					exit;
				} catch (PDOException $e) {
					echo $e->getMessage();
				}
			}
		}

		//check for any errors
		if (isset($error)) {
			foreach ($error as $error) {
				echo '<p class="error">' . $error . '</p>';
			}
		}
		?>
		<form action="" method="post" class="form-horizontal">
			<div class="col-xs-8 col-xs-offset-4">
				<h2>Sign Up</h2>
			</div>
			<div class="form-group">
				<label class="control-label col-xs-4">Username</label>
				<div class="col-xs-8">
					<input type="text" class="form-control" name="username" value="<?php if (isset($error)) {
																						echo $_POST['username'];
																					} ?>" required="required">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-xs-4">Email Address</label>
				<div class="col-xs-8">
					<input type="email" class="form-control" name="email" value="<?php if (isset($error)) {
																						echo $_POST['email'];
																					} ?>" required="required">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-xs-4">Password</label>
				<div class="col-xs-8">
					<input type="password" class="form-control" name="password" value="<?php if (isset($error)) {
																							echo $_POST['password'];
																						} ?>" required="required">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-xs-4">Confirm Password</label>
				<div class="col-xs-8">
					<input type="password" class="form-control" name="passwordConfirm" value="<?php if (isset($error)) {
																									echo $_POST['passwordConfirm'];
																								} ?>" required="required">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-xs-4">Add photo</label>
				<div class="col-xs-8">
					<input type="file" class="form-control" name="photo" accept="image/*" value="<?php if (isset($error)) {
																										echo $_POST['photo'];
																									} ?>" required="required">
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-8 col-xs-offset-4">
					<button type="submit" class="btn btn-primary btn-lg">Add User</button>
				</div>
			</div>
		</form>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>