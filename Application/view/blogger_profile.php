<?php
//  require('../includes/config.php'); 
 require('../includes/session.php'); 
 require_once('../model/post.php');
require_once('../model/auther.php');
require_once('../model/category.php');


 $category = new Category();
$resultC = $category -> show_category();



  if (isset($_SESSION['username'])){
    
 


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
        <link href="../public/css/clean-blog.css" rel="stylesheet">
        <link href="../public/css/blogger_profile.css" rel="stylesheet">
        

</head>


<body class="profile-page">
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="../public/images/logo.png"
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

                    

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <?php if (isset($_SESSION['username'])){
                                echo $_SESSION["username"];
                            } 
                            ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="add_poste.php">Add poste</a>
                            <a class="dropdown-item" id="modalToggle" href="#">Edit prolile</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                            <!-- <div class="dropdown-divider"></div>
                            <button  class="btn btn-primary dropdown-item" >Launch the modal</button> -->
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="page-header header-filter" data-parallax="true"
        style="background-image:url('../public/images/background_pic.png');">
    </div>


    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">

                        <?php if (isset($_SESSION['author_id'])){
                                $id =  $_SESSION["author_id"];
                                

                                $auther = new Auther();
                                $result = $auther ->show_info($id);
                                $row3 = $result->fetch_assoc();
                            } 
                            ?>



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
                    $result =  $post ->view_all_post_of_user($id);
                

                    while ( $row = $result->fetch_assoc()) {

         



         

          
          
          
          ?>

                        <div class="col-lg-4 mb-4">
                            <div class="entry2">
                                <a name="posteID" href="viewpost.php?id=<?= $row['posteID']; ?>"><img
                                        style="width: 364px;vertical-align: middle;border-style: none;height: 240px;"
                                        src="<?= $row['postImg']; ?>"></a>
                                <div class="excerpt">


                                    <h2><a class="h6" name="posteID"
                                            href="viewpost.php?id=<?= $row['posteID']; ?>"><?= $row['postTitle']; ?></a>
                                    </h2>
                                    <div class="post-meta align-items-center text-left clearfix">
                                    <a href="edit_poste.php?id=<?= $row['posteID']; ?>">Edit Post</a>
                                    </div>




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
        <p class="text-justify">BlogUrSelf is not like any other platform on the internet
          BlogUrSelf is built for technologists to read, write, and publish. We are an open and international community
          of 20 contributing writers publishing stories and expertise for 4000 curious and insightful monthly readers
          BlogUrSelf is the best platform with millions of users worldwide.
          We make it easy for everyone to create a beautiful, professional Blog
          and find compelling ideas, knowledge, and perspectives</p>
      </div>

      <div class="col-xs-6 col-md-3">
        <h6> Top Categories</h6>
        <ul class="footer-links">
          <li>Web development</li>
          <li>Blockchain</li>
          <li>Security</li>
          <li>ML/AI</li>
          <li>Cryptocurrency</li>
          <li>Marketing</li>
        </ul>
      </div>

      <div class="col-xs-6 col-md-3">
        <h6>Contact Us </h6>
        <ul class="footer-links">
          <li>Email : contact@blogurself.com</li>
          <li>Tele : +212 732197232</li>
        </ul>
      </div>

    </div>
    <hr>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6 col-xs-12">
        <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by
          <a href="#">BlogUrSelf</a>.
        </p>
      </div>


    </div>
  </div>
</footer>





    <!-- -------------------------------edit profile -------------------------- -->
    <!-- Large modal -->


    <div id="modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="wizard-title">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controller/blogger_profile_back.php" method="POST" enctype="multipart/form-data">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#infoPanel" role="tab">Personal Info
                                </a>
                            <li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#ads" role="tab">Cover and Profile image
                                </a>
                            <li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#placementPanel" role="tab">Add Bio</a>
                            <li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#schedulePanel" role="tab">Social Media
                                    Account</a>
                            <li>

                        </ul>

                        <div class="tab-content mt-2">
                            <div class="tab-pane fade show active" id="infoPanel" role="tabpanel">


                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Username</label>
                                    <input type="hidden" name="userid" value="<?= $row3["author_id"]; ?>">
                                    <input type="text" name="username" class="form-control"
                                        id="exampleFormControlInput1" placeholder="" value="<?= $row3["username"]; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="" value="<?= $row3["email"]; ?>">
                                </div>
                                <button class="btn btn-secondary" id="infoContinue">Continue</button>
                            </div>
                            <div class="tab-pane fade" id="ads" role="tabpanel">


                                <div class="form-group">
                                    <label for="exampleInputFile">Profil image</label>
                                    <input type="file" name="profile_img" class="form-control-file"
                                        id="exampleInputFile" aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">Select a file to use as the banner
                                        ad image. Please ensure the size is exactly 1080x450 for proper
                                        rendering.</small>
                                </div>
                                <button name="uploadImage" class="btn btn-secondary" id="adsContinue">Continue</button>
                            </div>
                            <div class="tab-pane fade" id="placementPanel" role="tabpanel">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">How Are You ?</label>
                                    <textarea name="bio" class="form-control" id="exampleFormControlTextarea1"
                                        rows="3"><?= $row3["author_bio"]; ?></textarea>
                                </div>

                                <button class="btn btn-secondary" id="placementContinue">Continue</button>
                            </div>
                            <div class="tab-pane fade" id="schedulePanel" role="tabpanel">
                                <h4>Social Media account</h4>

                                <div class="form-group">
                                    <label for="Facebbook">Facebbook</label>
                                    <input type="text" name="fb" class="form-control" id="Facebbook"
                                        placeholder="https://www.facebook.com/" value="<?= $row3["fb_account"]; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Instagram">Instagram</label>
                                    <input type="text" name="insta" class="form-control" id="Instagram"
                                        placeholder="https://www.instagram.com/" value="<?= $row3["insta_account"]; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Twitter">Twitter</label>
                                    <input type="text" name="twit" class="form-control" id="Twitter"
                                        placeholder="https://twitter.com/explore" value="<?= $row3["twit_account"]; ?>">
                                </div>



                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="editUserProfile" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- ********************************************************* -->



    <script>
        $(function () {
            $('#modalToggle').click(function () {
                $('#modal').modal({
                    backdrop: 'static'
                });
            });

            $('#infoContinue').click(function (e) {
                e.preventDefault();

                $('#myTab a[href="#ads"]').tab('show');
            });

            $('#adsContinue').click(function (e) {
                e.preventDefault();

                $('#myTab a[href="#placementPanel"]').tab('show');
            });

            $('#placementContinue').click(function (e) {
                e.preventDefault();

                $('#myTab a[href="#schedulePanel"]').tab('show');
            });




        })
    </script>





    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous">
    </script>

</body>




</html>


<?php

}
else
{
	header("Location: login.php");
	exit();
}

?>