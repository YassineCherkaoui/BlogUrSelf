<?php

require_once('../model/category.php');

session_start();
$category = new Category();
$resultC = $category -> show_category();



if (isset($_SESSION['username'])){


?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>blogUeSelf | Add Post</title>



  <link rel="shortcut icon" href="../style/images/fiveicon.png" type="image/x-icon">
  <link href="../css/add_post.css" rel="stylesheet">
  <link href="../css/blogger-add-post.css" rel="stylesheet">



</head>

<body>


  <div class="container">
    <form action="../controller/add-poste-back.php" method="POST" enctype="multipart/form-data">
      <h1>Add post</h1>
      <div class="form-group">
        <select name="category">
          <?php
		

		while ($rowC = $resultC->fetch_assoc()) { ?>
          <option><?= $rowC['name']; ?> </option>



          <?php
		}

		?>
        </select>
        <label for="select" class="control-label">Category</label><i class="bar"></i>
      </div>
      <div class="form-group">
        <input name="posteTitle" class="input" type="text" required="required" />
        <label for="input" class="control-label">Title</label><i class="bar"></i>
      </div>
      <div class="form-group">
        <label for="exampleInputFile">Poste image</label>
        <input class="input" type="file" name="poste_img" class="form-control-file golobalstyle" id="exampleInputFile"
          aria-describedby="fileHelp" required="required">

      </div>
      <div class="form-group">
        <!--- call editor -->
        <div id="editor_panel"></div>
        <textarea name="posteForm" id="editor_area" required="required"></textarea>
      </div>
      <div class="button-container">
        <button type="button" class="button"><a href="blogger_profile.php" style="
    text-decoration: none;
"><span>Back</span></a></button>
        <button type="submit" name="go" class="button"><span>Submit</span></button>

      </div>

    </form>

  </div>

  <script src="../js/text_editor.js"></script>





</body>

<style>
  
</style>

</html>


<?php

}
else
{
	header("Location: login.php");
	exit();
}

?>