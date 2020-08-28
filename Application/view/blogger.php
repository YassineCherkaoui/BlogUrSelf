<?php
require_once('../model/post.php');
require_once('../model/auther.php');
require_once('../model/category.php');
require('../includes/session.php'); 


 $category = new Category();
$resultC = $category -> show_category();


if (isset($_GET["id"])){


    $author_id = $_GET["id"];

    $auther_select_id = new Auther();
    $result2 = $auther_select_id -> auther_select_id($author_id);
    $row3 = $result2->fetch_assoc();

} 


?>
<!DOCTYPE html>
<html lang="en">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet"
        href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
        integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesgeet"
        href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">

    <link rel="shortcut icon" href="../style/images/fiveicon.png" type="image/x-icon">
    <link href="../css/clean-blog.css" rel="stylesheet">
    <link href="../css/blogger_profile.css" rel="stylesheet">


</head>

<body class="profile-page">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="../style/images/logo.png"
                    style="width: 17%; margin-top: -2%;"></a>
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CATEGORIES
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <?php
		

                    while ($rowC = $resultC->fetch_assoc()) { ?>
                            <a class="dropdown-item"
                                href="category.php?category=<?= $rowC['name']; ?>"><?= $rowC['name']; ?></a>



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


    <div class="page-header header-filter" data-parallax="true"
        style="background-image:url('../style/images/background_pic.png');"> </div>


    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">





                        <div class="profile">



                            <div class="avatar">
                                <?php
                            echo messageError();
				            echo messageErrorType();?>
                                <img src="<?= $row3["author_img"]; ?>" alt="Circle Image"
                                    class="img-raised rounded-circle img-fluid">
                            </div>
                            <div class="name">
                                <h3 class="title"><?= $row3["username"]; ?></h3>

                                <h6>Follow me on </h6>
                                <a href="<?= $row3["fb_account"]; ?>" class="btn btn-just-icon btn-link btn-facebook"><i
                                        class="fa fa-facebook"></i></a>
                                <a href="<?= $row3["twit_account"]; ?>"
                                    class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="<?= $row3["insta_account"]; ?>"
                                    class="btn btn-just-icon btn-link btn-instagram"><i class="fa fa-instagram"></i></a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p><?= $row3["author_bio"]; ?> </p>
                </div>
            </div>
        </div>

       

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
        
        

   
        $post = new Post();
        $result = $post ->view_all_post_of_user($author_id);
       

        while ( $row = $result->fetch_assoc()) {

          $author_id = $row['author_id'];

          $auther = new Auther();
          $result2result2 =$auther -> show_info($author_id);
          $row3 = $result2->fetch_assoc();
          ?>

                        <div class="col-lg-4 mb-4">
                            <div class="entry2">
                                <a name="posteID" href="viewpost.php?id=<?= $row['posteID']; ?>"><img
                                        style="width: 364px;vertical-align: middle;border-style: none;height: 240px;"
                                        src="<?= $row['postImg']; ?>"></a>
                                <div class="excerpt">
                                    <span
                                        class="post-category text-white bg-secondary mb-3"><?= $row['category']; ?></span>

                                    <h2><a name="posteID"
                                            href="viewpost.php?id=<?= $row['posteID']; ?>"><?= $row['postTitle']; ?></a>
                                    </h2>
                                    <div class="post-meta align-items-center text-left clearfix">




                                </div>
                            </div>
                        </div>


                        <?php } ?>

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











    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous">
    </script>

</body>




</html>
