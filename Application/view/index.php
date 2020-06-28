<?php require('../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

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
  <link href="../style/home/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
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

  <!-- Page Header -->
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
  
  </div>

  <!-- Main Content -->
  <div class="container">
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <h2>Recent Posts</h2>
          </div>
        </div>
        <!-- <div class="row">



          <?php

          // $vol = new Vol();
          // $res = $vol -> vol_show_id($id);
          // $row = $res->fetch_assoc();




			    try {

				  $stmt = $db->query('SELECT * FROM blog_posts ORDER BY postDate DESC ');
				  while($row = $stmt->fetch()){
             $id_author = $row['id_author'];

            $stmt2 = $db->query("SELECT * FROM blog_members where memberID= $id_author ");
            $row2 = $stmt2->fetch()
                 ?>

          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="viewpost.php?id=<?= $row['postID']; ?>"><img
                  src="https://i.ytimg.com/vi/lZw5kqcyEgo/maxresdefault.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
                <span class="post-category text-white bg-secondary mb-3"><?= $row['id_category']; ?></span>

                <h2><a href="viewpost.php?id=<?= $row['postID']; ?>"><?= $row['postTitle']; ?></a></h2>
                <div class="post-meta align-items-center text-left clearfix">

                


                  <figure class="author-figure mb-0 mr-3 float-left"><img src=""
                      alt="Image"  id="author-img" class="img-fluid"></figure>
                  <span class="d-inline-block mt-1">By <a href="#"><?= $row2['username']; ?></a></span>
                  <span>&nbsp;-&nbsp; <?= $row['postDate']; ?></span>
                </div>

                <p><?= $row['postDesc']; ?></p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>



          <?php }
      
            } catch(PDOException $e) {
                echo $e->getMessage();
              
              }
          ?>





        </div> -->

      </div>
    </div>

  </div>



  <div class="site-section bg-lightx">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-md-5">
          <div class="subscribe-1 ">
            <h2>Subscribe to our newsletter</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a
              explicabo, ipsam nostrum.</p>
            <form action="#" class="d-flex">
              <input type="text" class="form-control" placeholder="Enter your email address">
              <input type="submit" class="btn btn-primary" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>




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
  <script src="../style/style/style/vendor/jquery/jquery.min.js"></script>
  <script src="style/style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../style/js/clean-blog.min.js"></script>

</body>

</html>