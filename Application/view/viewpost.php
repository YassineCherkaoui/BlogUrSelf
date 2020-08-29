<?php 

require_once('../model/post.php');
require_once('../model/auther.php');
require_once('../model/category.php');

session_start();



$category = new Category();
$resultC = $category -> show_category();


if (isset($_GET["id"]) && !empty($_GET["id"])) {
	$poste_id = $_GET["id"];

	$post = new Post();
	$result2 = $post->view_single_post($poste_id);
	$row3 = $result2->fetch_assoc();

	$views = $row3["views"] + 1;
	$views_post = $post -> update_views($views,$poste_id);
}
else{
	$poste_id = null;
	header('location: index.php');

}



?>


<!DOCTYPE html>
<html lang="en">

<head>

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>blogUeSelf </title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
			integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


		<link rel="shortcut icon" href="../public/images/fiveicon.png" type="image/x-icon">
		<link href="../public/css/clean-blog.css" rel="stylesheet">




	</head>

	<?php include_once("header.php") ?>


	<div>
		<div class="container">

			<div class="row">

				<!-- Post Content Column -->
				<div class="postCont col-lg-8">

					<!-- Title -->
					<h1 class="mt-4"><?= $row3['postTitle']; ?></h1>

					<!-- Author -->

					<?php
					$auther = new Auther();
					$resultA =$auther -> show_info($row3['author_id']);
					$rowA = $resultA->fetch_assoc();
					
					?>

					<p class="lead">
						by
						<a href="blogger.php?id=<?= $rowA['author_id']; ?>"><?= $rowA['username']; ?></a>
					</p>

					<hr>

					<!-- Date/Time -->


					<p>Posted on <?= date('jS M Y', strtotime($row3['postDate'])) ?></p>
					<p><?=  $views ?> Views</p>

					<hr>

					<!-- Preview Image -->
					<img class="img-fluid rounded" src="<?= $row3['postImg']; ?>" alt="">

					<hr>

					<!-- Post Content -->
					<p class="lead"><?= $row3['postCont']; ?></p>


					<hr>

					<!-- Comments Form -->
					<div class="card my-4">
						<h5 class="card-header">Leave a Comment:</h5>
						<div class="card-body">
							<form method="POST" id="comment_form">
								<input type="hidden" name="postID" id="postID" value="<?= $poste_id ?>">
								<div class="form-group">
									<textarea name="comment_content" class="form-control" rows="3"
										id="comment_content"></textarea>
								</div>
								<input type="hidden" name="comment_id" id="comment_id" value="0" />
								<button name="submit" type="submit" id="submit" class="btn btn-primary">Submit</button>

							</form>

						</div>
						<span id="comment_message"></span>
					</div>

					<!-- Single Comment -->
					<div id="display_comment"></div>

				</div>

				<!-- Sidebar Widgets Column -->
				<div class="col-md-4">

					<!-- Categories Widget -->
					<div class="card my-4">
						<h5  id="card-header" class="card-header">Popular This Week</h5>
						<div class="widget PopularPosts" data-version="1" id="PopularPosts1">
							<div class="widget-content popular-posts">

								<?php

							$result3 = $post -> view_last_post();
							while ($row4 = $result3->fetch_assoc()) { ?>

								<div class="row">
									<div class="col col-lg-3">
										<img style="margin: 7% 0 7% 0;height: 78px;width: 84px;"
											src="<?= $row4['postImg']; ?>" alt="" srcset="">
									</div>
									<div class="col -md-auto">
										<p><a id="alink"
												href="viewpost.php?id=<?= $row4['posteID']; ?>"><?= $row4['postTitle']; ?></a>
										</p>
									</div>
								</div>

								<?php	
							}
							?>
							</div>
						</div>

					</div>



				</div>

			</div>

		</div>
	</div>


	<!-- Site footer -->
	<?php include_once("footer.php") ?>

	<script>
		$(document).ready(function () {

			$('#comment_form').on('submit', function (event) {
				event.preventDefault();
				var form_data = $(this).serialize();
				$.ajax({
					url: "../controller/comment-back.php",
					method: "POST",
					data: form_data,
					dataType: "JSON",
					success: function (data) {
						if (data.error != '') {
							$('#comment_form')[0].reset();
							$('#comment_message').html(data.error);
							$('#comment_id').val('0');
							load_comment();

						}
					}
				})
			});

			load_comment();

			function load_comment() {

				var postID = $("#postID").val();
				$.ajax({
					url: "../controller/fetch_comment.php",
					method: "POST",
					data: {
						postID: postID
					},
					success: function (data) {
						$('#display_comment').html(data);
					}
				})
			}




		});
	</script>





	<style>
		.postCont img {
			max-width: 100%;
			height: auto;
			/* width:720px; */
		}
	</style>




</body>

</html>