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
	<script>
		tinymce.init({
			selector: "textarea",
			plugins: [
				"advlist autolink lists link image charmap print preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
		});
	</script>
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
				if ($postID == '') {
					$error[] = 'This post is missing a valid id!.';
				}

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
						$stmt = $db->prepare('UPDATE blog_posts SET postTitle = :postTitle, postDesc = :postDesc, postCont = :postCont WHERE postID = :postID');
						$stmt->execute(array(
							':postTitle' => $postTitle,
							':postDesc' => $postDesc,
							':postCont' => $postCont,
							':postID' => $postID
						));

						//redirect to index page
						header('Location: index.php?action=updated');
						exit;
					} catch (PDOException $e) {
						echo $e->getMessage();
					}
				}
			}

			?>


			<?php
			//check for any errors
			if (isset($error)) {
				foreach ($error as $error) {
					echo $error . '<br />';
				}
			}

			try {

				$stmt = $db->prepare('SELECT postID, postTitle, postDesc, postCont FROM blog_posts WHERE postID = :postID');
				$stmt->execute(array(':postID' => $_GET['id']));
				$row = $stmt->fetch();
			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			?>

			<form action="" method="post">
				<input type='hidden' name='postID' value='<?php echo $row['postID']; ?>'>
				<h1> Edit Post </h1>

				<fieldset>

					<legend><span class="number">1</span> Title</legend>

					<input type="text" id="name" name='postTitle' value='<?php echo $row['postTitle']; ?>'>

					<legend><span class="number">2</span> Description</legend>

					<textarea name='postDesc' cols='60' rows='10'> <?php echo $row['postDesc']; ?></textarea>

					<legend><span class="number">3</span> Content</legend>

					<textarea name='postCont' cols='60' rows='10'><?php echo $row['postCont']; ?></textarea>

					<hr>
					<button type="submit" name='submit'>Update</button>

			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>