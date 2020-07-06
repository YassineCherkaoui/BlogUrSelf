<?php require('../includes/config.php');
session_start();

?>
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
  <link href="../style/home/css/clean-blog.css" rel="stylesheet">

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
            <a class="nav-link" href="contact.php">dd</a>
          </li>

          <?php

          if (isset($_SESSION['username'])){ ?>





          <li class="nav-item">
            <a class="btn" href="blogger_profile.php" style="color: #FFC273;">
              <?= $_SESSION["username"]; ?></a>
          </li>

          <?php
          }else { ?>

          <li class="nav-item">
            <a class="btn" href="login.php" style="color: #FFC273;">Start Writing</a>
          </li>

          <?php   }

          
          
          
          ?>

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
        <div class="row">

          <?php
        
        

        $query = "SELECT * from posts ";
			  $stmt = $db->prepare($query);
			  $stmt->execute();
        $result = $stmt->get_result();
       

        while ( $row = $result->fetch_assoc()) {

          $author_id = $row['author_id'];


          $query2= "SELECT * FROM author WHERE author_id=?";
          $stmt =$db->prepare($query2);
          $stmt->bind_param("i",$author_id);
          $stmt->execute();
          $result2= $stmt->get_result();
          $row3 = $result2->fetch_assoc();



         

          
          
          
          ?>

          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a name="posteID" href="viewpost.php?id=<?= $row['posteID']; ?>"><img
                  style="width: 364px;vertical-align: middle;border-style: none;height: 240px;"
                  src="<?= $row['postImg']; ?>"></a>
              <div class="excerpt">
                <span class="post-category text-white bg-secondary mb-3"><?= $row['category']; ?></span>

                <h2><a name="posteID" href="viewpost.php?id=<?= $row['posteID']; ?>"><?= $row['postTitle']; ?></a></h2>
                <div class="post-meta align-items-center text-left clearfix">




                  <figure class="author-figure mb-0 mr-3 float-left"><img
                      style="max-width: 100%;height: 50px;width: 50px;border-radius: 57%;"
                      src="<?= $row3["author_img"]; ?>" alt="Image" id="author-img" class="img-fluid"></figure>
                  <span class="d-inline-block mt-1">By <a
                      href="blogger.php?id=<?= $row3['author_id']; ?>"><?= $row3["username"]; ?></a></span>
                  <span>&nbsp;-&nbsp; <?= date('jS M Y', strtotime($row['postDate'])); ?></span>
                </div>



                <!-- <p><?= $row['postDesc']; ?></p> -->
                <!-- <p><a href="#">Read More</a></p> -->
              </div>
            </div>
          </div>



          <?php } ?>























        </div>

      </div>
    </div>

  </div>



  <!-- <div class="site-section bg-lightx">
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
  </div> -->
  <br>




  <!-- Footer -->
  <!-- <footer>
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
  </footer> -->

  <!-- Bootstrap core JavaScript -->
  <script src="../style/style/style/vendor/jquery/jquery.min.js"></script>
  <script src="../style/style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <!-- <script src="../style/js/clean-blog.min.js"></script> -->

</body>


<style>

</style>

</html>