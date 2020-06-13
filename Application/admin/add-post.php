<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if (!$user->is_logged_in()) {
	header('Location: login.php');
}
?>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<title>Hello, world!</title>
	<link rel="stylesheet" href="../style/css/addpost.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="shortcut icon" href="../style/images/fiveicon.png" type="image/x-icon">
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
	<div class="row">
		<div class="col-md-12">
			<?php

			//if form has been submitted process it
			if (isset($_POST['submit'])) {

				$_POST = array_map('stripslashes', $_POST);

				//collect form data
				extract($_POST);

				//very basic validation
				if ($postTitle == '') {
					$error[] = 'Please enter the title.';
				}

				if ($postDesc == '') {
					$error[] = 'Please enter the description.';
				}

				if ($postCont == '') {
					$error[] = 'Please enter the content.';
				}

				if (!isset($error)) {

					try {

						//insert into database
						$stmt = $db->prepare('INSERT INTO blog_posts (postTitle,postDesc,postCont,postDate) VALUES (:postTitle, :postDesc, :postCont, :postDate)');
						$stmt->execute(array(
							':postTitle' => $postTitle,
							':postDesc' => $postDesc,
							':postCont' => $postCont,
							':postDate' => date('Y-m-d H:i:s')
						));

						//redirect to index page
						header('Location: index.php?action=added');
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

			<form action="" method="post">
				<h1> Add Post </h1>

				<fieldset>

					<legend><span class="number">1</span> Title</legend>

					<input type="text" id="name" name='postTitle' value='<?php if (isset($error)) {
																				echo $_POST['postTitle'];
																			} ?>'>

					<legend><span class="number">2</span> Description</legend>

					<textarea name='postDesc' cols='60' rows='10'><?php if (isset($error)) {
																		echo $_POST['postDesc'];
																	} ?></textarea>

					<legend><span class="number">3</span> Content</legend>

					<textarea name='postCont' cols='60' rows='10'><?php if (isset($error)) {
																		echo $_POST['postCont'];
																	} ?></textarea>

					<hr>															
					<button type="submit" name='submit'>Poster</button>

			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>