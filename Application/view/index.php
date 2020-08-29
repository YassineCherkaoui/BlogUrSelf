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

  <title>blogUeSelf | home </title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="shortcut icon" href="../public/images/fiveicon.png" type="image/x-icon">
  <link href="../public/css/clean-blog.css" rel="stylesheet">


</head>

<?php include_once("header.php") ?>


  

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
     

        $post = new Post();
				$result = $post -> view_all_post();
				
       

        while ( $row = $result->fetch_assoc()) {

          $author_id = $row['author_id'];

          $auther_select_id = new Auther();
          $result2 = $auther_select_id -> auther_select_id( $author_id);
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
              </div>
            </div>
          </div>



          <?php } ?>

        </div>

      </div>
    </div>

  </div>




  <!-- Site footer -->

  <?php include_once("footer.php") ?>


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