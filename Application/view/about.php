<?php

require_once('../model/post.php');
require_once('../model/auther.php');
require_once('../model/category.php');
session_start();


$category = new Category();
$resultC = $category -> show_category();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>About</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/home/css/about.css">
  <link href="../style/home/css/clean-blog.css" rel="stylesheet">
  <link href="../css/clean-blog.css" rel="stylesheet">



  <!-- Custom fonts for this template -->
  <link href="../style/home/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
    type='text/css'>
  <link
    href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
    rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->

</head>

<body>

  <?php include_once("header.php") ?>


  <div class="container team-section">
    <div class="row">
      <!--Team Slecetion -->
      <div class="col s6 l3 xl3 animated bounceIn">
        <div class="team-box">
          <div class="img-box">
            <img src="../style/images/yassine.jpg" width="100%">
            <div id="team_shape-1" class="team-shape" style="clip-path: url(&quot;#team-1&quot;);">
              <svg width="100%" height="100%">
                <clipPath id="team-1" clipPathUnits="objectBoundingBox">
                  <polygon points="0 0, 0 1, 1 0.93, 0 0"></polygon>
                </clipPath>
              </svg>
            </div>
            <div class="team-hover-box">
              <ul>
                <li><a href="#"><img src="../style/images/facebook.png" width="70%" style="margin-top: -4px;"></a></li>
                <li><a href="#"><img src="../style/images/instagram.png" width="70%" style="margin-top: -4px;"></a></li>
              </ul>
              <p>Developer at youcode Full stuck Developer</p>
            </div>
          </div>
          <h3>Yassine Cherkaoui</h3>
          <p>Designer,Developer</p>
        </div>
      </div>
      <div class="col s6 l3 xl3 animated bounceIn">
        <div class="team-box">
          <div class="img-box">
            <img src="https://pbs.twimg.com/profile_images/1203056019833851908/GjxlTa2o_400x400.jpg" alt="">
            <div id="team_shape-1" class="team-shape" style="clip-path: url(&quot;#team-1&quot;);">
              <svg width="100%" height="100%">
                <clipPath id="team-1" clipPathUnits="objectBoundingBox">
                  <polygon points="0 0, 0 1, 1 0.93, 0 0"></polygon>
                </clipPath>
              </svg>
            </div>
            <div class="team-hover-box">
              <ul>
                <li><a href="https://www.facebook.com/abde.rahimii"><img src="../style/images/facebook.png" width="70%"
                      style="margin-top: -4px;"></a></li>
                <li><a href="https://www.facebook.com/abde.rahimii"><img src="../style/images/instagram.png" width="70%"
                      style="margin-top: -4px;"></a></li>
              </ul>
              <p>Developer at youcode Full stuck Developer</p>
            </div>
          </div>
          <h3>Abderahim BELCAID</h3>
          <p>Developer BackEnd</p>
        </div>
      </div>
    </div>

  </div>





  <!-- Footer -->
  <?php include_once("footer.php") ?>


</html>