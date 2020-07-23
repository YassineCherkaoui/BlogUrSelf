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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
			integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


		<link rel="shortcut icon" href="../style/images/fiveicon.png" type="image/x-icon">
		<link href="../css/clean-blog.css" rel="stylesheet">




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
				<div class="postCont col-lg-8">

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
									<textarea name="comment_content" class="form-control" rows="3"
										id="comment_content"></textarea>
								</div>
								<input type="hidden" name="comment_id" id="comment_id" value="0" />
								<button name="submit" type="submit" id="submit" class="btn btn-primary">Submit</button>

							</form>
							<span>you must login to continue</span>

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




							</div>
						</div>

					</div>



				</div>

			</div>

		</div>













	</div>

	<!-- Site footer -->
	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<h6>About</h6>
					<p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative to help the
						upcoming
						programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as
						the code
						wants to be simple. We will help programmers build up concepts in different programming
						languages that
						include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
				</div>

				<div class="col-xs-6 col-md-3">
					<h6>Categories</h6>
					<ul class="footer-links">
						<li><a href="http://scanfcode.com/category/c-language/">C</a></li>
						<li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
						<li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
						<li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
						<li><a href="http://scanfcode.com/category/android/">Android</a></li>
						<li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
					</ul>
				</div>

				<div class="col-xs-6 col-md-3">
					<h6>Quick Links</h6>
					<ul class="footer-links">
						<li><a href="http://scanfcode.com/about/">About Us</a></li>
						<li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
						<li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
						<li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
						<li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
					</ul>
				</div>
			</div>
			<hr>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">
					<p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by
						<a href="#">Scanfcode</a>.
					</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-12">
					<ul class="social-icons">
						<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>








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





<style>

.postCont img{
	max-width: 100%;
    height: auto;
  /* width:720px; */
}


</style>




</body>

</html>