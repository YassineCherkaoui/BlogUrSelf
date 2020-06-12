<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if (!$user->is_logged_in()) {
	header('Location: login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Admin - Add Post</title>
	<link rel="stylesheet" href="../style/normalize.css">
	<link rel="stylesheet" href="../style/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
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

	<div id="wrapper">

		<?php include('menu.php'); ?>

		<h2>Add Post</h2>

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



		<header class="header">
			<h1 id="title" class="header__title">iLike<span>Food</span> <span aria-hidden="true" class="header__heart"></span></h1>
			<h2 class="header__subtitle">Survey Form</h2>
		</header>

		<main class="main">
			<p id="description" class="description">
				Thank you for taking the time to help us improve the platform
			</p>
			<form id="survey-form" class="survey-form">
				<div class="survey-form__group survey-form__group--name">
					<label id="name-label" for="name" class="survey-form__statement">Name</label>
					<input type="text" name="name" id="name" class="survey-form__control" placeholder="Enter your name" required />
				</div>

				<div class="survey-form__group survey-form__group--email">
					<label id="email-label" for="email" class="survey-form__statement">Email</label>
					<input type="email" name="email" id="email" class="survey-form__control" placeholder="Enter your Email" required />
				</div>

				<div class="survey-form__group survey-form__group--age">
					<label id="number-label" for="number" class="survey-form__statement">Age <span class="survey-form__clue">(optional)</span></label>
					<input type="number" name="age" id="number" min="10" max="99" class="survey-form__control" placeholder="Age" />
				</div>

				<div class="survey-form__group">
					<p class="survey-form__statement">What is your favorite feature of iLikeFood?</p>
					<select id="dropdown" name="favorite" class="survey-form__control" required>
						<option disabled selected value="none">Select an option</option>
						<option value="foodFlavor">Food flavor</option>
						<option value="homeDelivery">Home delivery</option>
						<option value="priceQuality">Price-Quality</option>
					</select>
				</div>

				<div class="survey-form__group">
					<p class="survey-form__statement">Would you recommend iLikeFood to a friend?</p>
					<div class="survey-form__radio-container">
						<input name="user-recommend" id="definitely" value="definitely" type="radio" class="survey-form__input-radio" checked /><label for="definitely">Definitely</label>
					</div>
					<div class="survey-form__radio-container">
						<input name="user-recommend" id="maybe" value="maybe" type="radio" class="survey-form__input-radio" /><label for="maybe">Maybe</label>
					</div>
					<div class="survey-form__radio-container">
						<input name="user-recommend" id="not-sure" value="not-sure" type="radio" class="survey-form__input-radio" /><label for="not-sure">Not sure</label>
					</div>
				</div>

				<div class="survey-form__group">
					<p class="survey-form__statement">
						What would you like to see improved?
						<span class="survey-form__clue">(Check all that apply)</span>
					</p>

					<div class="survey-form__checkbox-container">
						<input name="prefer" id="burgers" value="burgers" type="checkbox" class="survey-form__input-checkbox" /><label for="burgers"><span>Burgers</span></label>
					</div>
					<div class="survey-form__checkbox-container">
						<input name="prefer" id="tacos" value="tacos" type="checkbox" class="survey-form__input-checkbox" /><label for="tacos"><span>Tacos</span></label>
					</div>
					<div class="survey-form__checkbox-container">
						<input name="prefer" id="hot-dogs" value="hot-dogs" type="checkbox" class="survey-form__input-checkbox" /><label for="hot-dogs"><span>Hot dogs</span></label>
					</div>
					<div class="survey-form__checkbox-container">
						<input name="prefer" id="chips" value="chips" type="checkbox" class="survey-form__input-checkbox" /><label for="chips"><span>Chips<span></label>
					</div>
					<div class="survey-form__checkbox-container">
						<input name="prefer" id="donuts" value="donuts" type="checkbox" class="survey-form__input-checkbox" /><label for="donuts"><span>Donuts</span></label>
					</div>
					<div class="survey-form__checkbox-container">
						<input name="prefer" id="ice-creams" value="ice-creams" type="checkbox" class="survey-form__input-checkbox" /><label for="ice-creams"><span>Ice creams</span></label>
					</div>
					<div class="survey-form__checkbox-container">
						<input name="prefer" id="smoothies" value="smoothies" type="checkbox" class="survey-form__input-checkbox" /><label for="smoothies"><span>Smoothies</span></label>
					</div>
				</div>

				<div class="survey-form__group">
					<p class="survey-form__statement">Any comments or suggestions?</p>
					<textarea id="comments" class="survey-form__input-textarea" name="comment" placeholder="Enter your comment here..."></textarea>
				</div>

				<div class="survey-form__group">
					<button type="submit" id="submit" class="survey-form__submit-button">
						Submit
					</button>
				</div>
			</form>
		</main>
















		<!-- <form action='' method='post'>

			<p><label>Title</label><br />
				<input type='text' name='postTitle' value='<?php if (isset($error)) {
																echo $_POST['postTitle'];
															} ?>'></p>

			<p><label>Description</label><br />
				<textarea name='postDesc' cols='60' rows='10'><?php if (isset($error)) {
																	echo $_POST['postDesc'];
																} ?></textarea></p>

			<p><label>Content</label><br />
				<textarea name='postCont' cols='60' rows='10'><?php if (isset($error)) {
																	echo $_POST['postCont'];
																} ?></textarea></p>

			<p><input type='submit' name='submit' value='Submit'></p>

		</form>

	</div> -->