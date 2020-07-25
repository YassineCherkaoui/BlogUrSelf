<?php require('../includes/config.php');
session_start();


$queryC= "SELECT * FROM category";
$stmtC =$db->prepare($queryC);
$stmtC->execute();
$resultC= $stmtC->get_result();



if (isset($_GET["category"]) && !empty($_GET["category"])) {
	$category_name = $_GET["category"];

	
}
else{
	$category_name = null;
	header('location: index.php');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>blogUeSelf</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


  <link rel="shortcut icon" href="../style/images/fiveicon.png" type="image/x-icon">
  <link href="../css/clean-blog.css" rel="stylesheet">


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="../style/images/logo.png" width="23%"></a>
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
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Category
        </a>
       
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
        <?php
		

    while ($rowC = $resultC->fetch_assoc()) { ?>
    <a class="dropdown-item" href="category.php?id=<?= $rowC['id']; ?>"><?= $rowC['name']; ?></a>



			<?php
		}

		?>
        </div>
      </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
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
  <!-- <header class="masthead" style="background-image: url('../style/home/img/home-bg.jpg')">
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
  </header> -->



  <div>

  </div>

  <!-- Main Content -->
  <div class="container">
    <div class="site-section">
      <div class="container" style="
    margin-top: 18%;
">
        <div class="row mb-5">
          <div class="col-12">
            <h2>Recent Posts From <?= $category_name ?></h2>
          </div>
        </div>
        <div class="row">

          <?php
        
        

            $query = "SELECT * from posts WHERE category=?";
            $stmt =$db->prepare($query);
            $stmt->bind_param("s",$category_name);
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



  <div class="site-section bg-lightx">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-md-5">
          <div class="subscribe-1 ">
            <h2>Subscribe to our newsletter</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a
              explicabo, ipsam nostrum.</p>
            <span id="email_message"></span>
            <form method="POST" id="email-subscription" class="d-flex">
              <input name="email" id="email" type="email" class="form-control" placeholder="Enter your email address">
              <input type="submit" id="submit" class="btn btn-primary" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>


  <!-- Site footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>About</h6>
          <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative to help the upcoming
            programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code
            wants to be simple. We will help programmers build up concepts in different programming languages that
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


  <!-- Bootstrap core JavaScript -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>


<script>
  $(document).ready(function () {

    $('#email-subscription').on('submit', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "../controller/email-subscription.php",
        method: "POST",
        data: form_data,
        dataType: "JSON",
        success: function (data) {
          if (data.error != '') {

            $('#email_message').html(data.error);



          }
        }
      })
    });







  });
</script>



</html>