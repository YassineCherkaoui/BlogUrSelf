<?php require('../includes/config.php');


if (isset($_GET["id"]) && !empty($_GET["id"])) {
	$poste_id = $_GET["id"];

	$query2= "SELECT * FROM posts WHERE posteID=?";
	$stmt =$db->prepare($query2);
	$stmt->bind_param("i",$poste_id);
	$stmt->execute();
	$result2= $stmt->get_result();
	$row3 = $result2->fetch_assoc();

	$views = $row3["views"] + 1;

	$count = "UPDATE posts SET views=? WHERE posteID=?";
	$stmt =$db->prepare($count);
	$stmt->bind_param("ii",$views,$poste_id);
	$stmt->execute();
	



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

		<title>blogUeSelf</title>

		<!-- Bootstrap core CSS -->
		<link href="../style/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom fonts for this template -->
		<link href="../style/home/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
			type='text/css'>
		<link
			href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
			rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="../style/images/fiveicon.png" type="image/x-icon">
		<!-- Custom styles for this template -->
		<link href="../style/home/css/clean-blog.css" rel="stylesheet">

	</head>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand" href="index.html"><img src="../style/images/logo.png" width="23%"></a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
				data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
				aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.php">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.php">Contact</a>
					</li>
					<li class="nav-item">
						<a class="btn" href="#" style="color: #FFC273;">Start Writing</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<header class="masthead" style="background-image: url('../style/home/img/home-bg.jpg')">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					<div class="site-heading">
						<h1>BlogUrSelf</h1>
						<span class="subheading">Create a unique and beautiful blog. It’s easy and free.</span>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div>
		<div class="container">

			<div class="row">

				<!-- Post Content Column -->
				<div class="col-lg-8">

					<!-- Title -->
					<h1 class="mt-4"><?= $row3['postTitle']; ?></h1>

					<!-- Author -->

					<?php

					$queryA= "SELECT * FROM author WHERE author_id=?";
					$stmtA =$db->prepare($queryA);
					$stmtA->bind_param("i",$row3['author_id']);
					$stmtA->execute();
					$resultA= $stmtA->get_result();
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
									<textarea name="comment_content" class="form-control" rows="3" id="comment_content"></textarea>
								</div>
								<input type="hidden" name="comment_id" id="comment_id" value="0" />
								<button name="submit" type="submit" id="submit"
									class="btn btn-primary">Submit</button>
								
							</form>
							<span>you must login to continue</span>

						</div>
						<span id="comment_message"></span>
					</div>

					<!-- Single Comment -->
					<div id="display_comment"></div>

					



					<!-- Comment with nested comments -->
					<!-- <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div> -->

				</div>

				<!-- Sidebar Widgets Column -->
				<div class="col-md-4">

					<!-- Categories Widget -->
					<div class="card my-4">
						<h5 class="card-header">Popular This Week</h5>
						<div class="widget PopularPosts" data-version="1" id="PopularPosts1">
							<div class="widget-content popular-posts">

								<?php
							$query3= "SELECT * FROM posts ORDER BY postDate ASC LIMIT 10";
							$stmt1 =$db->prepare($query3);
							$stmt1->execute();
							$result3= $stmt1->get_result();
							

							while ($row4 = $result3->fetch_assoc()) { ?>

								<div class="row">
									<div class="col col-lg-3">
										<img style="margin: 7% 0 7% 0;height: 78px;width: 84px;"
											src="<?= $row4['postImg']; ?>" alt="" srcset="">
									</div>
									<div class="col -md-auto">
										<p><a
												href="viewpost.php?id=<?= $row4['posteID']; ?>"><?= $row4['postTitle']; ?></a>
										</p>
									</div>
								</div>

								<?php	
							}
							?>



								<!-- <div class="row">
									<div class="col col-lg-3">
										<img src="https://thehackernews.com/images/-UARwrwuFISs/XvyAe8AO39I/AAAAAAAA2-c/lyk_PeWG9XUv2fOECQMBHOXhtqX4g5MwgCLcBGAsYHQ/s72-c-e100/Windows-Update.png"
											alt="" srcset="">
									</div>
									<div class="col -md-auto">
										<p><a href="">Microsoft Releases Urgent Windows Update to Patch Two
												Critical Flaws</a></p>
									</div>
								</div> -->
							</div>
						</div>

					</div>



				</div>

			</div>

		</div>













	</div>

	






	<!-- <script src="../style/style/style/vendor/jquery/jquery.min.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="../style/style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../style/js/clean-blog.min.js"></script>

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










</body>
</html>