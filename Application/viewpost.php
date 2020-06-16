<?php require('includes/config.php');

$stmt = $db->prepare('SELECT postID, postTitle, postCont, postDate FROM blog_posts WHERE postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();
//if post does not exists redirect user.
if ($row['postID'] == '') {
	header('Location: ./');
	exit;
}

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<!-- Bootstrap core CSS -->
	<link href="style/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="style/home/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="style/images/fiveicon.png" type="image/x-icon">
	<!-- Custom styles for this template -->
	<link href="style/home/css/clean-blog.min.css" rel="stylesheet">
	<link href="style/home/css/post.css" rel="stylesheet">


	<title>blogUeSelf<?php echo $row['postTitle']; ?></title>
</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand" href="index.php"><img src="style/images/logo.png" width="23%"></a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
						<a class="btn" href="#" style="color: #FFC273;">JointUS</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Page Header -->
	<header class="masthead" style="background-image: url('style/home/img/home-bg.jpg')">
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
	<!-- Main Content -->
	<main id="content">
		<article id="post">
			<progress id="reading-progress" max="100" value="0"></progress>
			<header>
				<?php echo '<h1  class="headline">' . $row['postTitle'] . '</h1>';  ?>
				<img class="author-img" src="https://dev-to-uploads.s3.amazonaws.com/uploads/user/profile_image/361098/3dbb565c-6cd7-42db-9376-bfad8f9e6647.jpeg" alt="profile pic">
				<div class="author-detail">
					<?php echo '<span class="author">Posted on ' . date('jS M Y', strtotime($row['postDate'])) . '</span>';   ?>
					<button class="follow-btn">Follow</button>
				</div>
				<div>
					<span class="social"><a href="https://codepen.io/robjoeol/"><i class="fa fa-codepen"></i></a><span>
							<span class="social"><a href="https://github.com/robole/"><i class="fa fa-github"></i></span>
							<span class="social"><a href="#"><i class="fa fa-bookmark-o"></i></a></span>
				</div>
				<span class="publish-date">Apr. 16, 2020</span>
				<span class="reading-time">3 min read</span>
				</div>
			</header>
			<img src="https://dev-to-uploads.s3.amazonaws.com/i/3hj2gsz3ipnwo2sgeftg.jpg" alt="subzero cool peeps" />
			<?php
			echo '<p>' . $row['postCont'] . '</p>';
			?>
		</article>
		<h2>Dont go! Read more articles from this author!</h2>
		<section class="recommended-articles">
			<ul>
				<?php
				try {

					$stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC LIMIT 6');
					while ($row = $stmt->fetch()) {
						echo '<li>';
						echo '<a href="" class="article-img">
						<img src="https://www.fillmurray.com/200/200" alt="story with bill murray">
					</a>';
						echo '<a href="" class="article-title">';
						echo '<a href="viewpost.php?id=' . $row['postID'] . '">';
						echo '<h2 class="post-title">
            ' . $row['postTitle'] . '
            </h2>';
						echo '</a>';
						echo '<span class="publish-date">Posted on ' . date('jS M Y H:i:s', strtotime($row['postDate'])) . '</span>';
						echo '<span class="reading-time">5min</span>';
						echo '</li>';
					}
				} catch (PDOException $e) {
					echo $e->getMessage();
				}
				?>
			</ul>
		</section>
	</main>
	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					<ul class="list-inline text-center">
						<li class="list-inline-item">
							<a href="#">
								<span class="fa-stack fa-lg">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="#">
								<span class="fa-stack fa-lg">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="#">
								<span class="fa-stack fa-lg">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fab fa-github fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
					</ul>
					<p class="copyright text-muted">Copyright &copy; For BlogUrSelf2020</p>
				</div>
			</div>
		</div>
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="style/style/style/vendor/jquery/jquery.min.js"></script>
	<script src="style/style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Custom scripts for this template -->
	<script src="style/js/clean-blog.min.js"></script>

</body>

</html>