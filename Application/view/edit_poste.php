<?php

require_once('../model/post.php');
require_once('../model/auther.php');
require_once('../model/category.php');
require('../includes/session.php'); 

// session_start();
if (isset($_SESSION['username'])){


$catg = new Category();
$resultC = $catg -> show_category( );


if (isset($_GET["id"]) && !empty($_GET["id"])) {
	$poste_id = $_GET["id"];

    $post = new Post();
    $result2 = $post->view_single_post($poste_id);
    $row3 = $result2->fetch_assoc();


}
else{
	$poste_id = null;
	header('location: index.php');

}



?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blogUeSelf | edit Post</title>



    <link rel="shortcut icon" href="../public/images/fiveicon.png" type="image/x-icon">
    <link href="../public/css/add_post.css" rel="stylesheet">
  <link href="../public/css/blogger-add-post.css" rel="stylesheet">

</head>

<body>

<?php

				echo messageErrorType();
	?>


    <div class="container">
        <form action="../controller/add-poste-back.php" method="POST" enctype="multipart/form-data">
            <h1>Edit post</h1>
            <div class="form-group">
                <select name="category">
                    <option selected="selected">
                    <?= $row3['category']; ?>
                    </option>
                    <?php
		

		while ($rowC = $resultC->fetch_assoc()) { ?>
                    <option ><?= $rowC['name']; ?> </option>



			<?php
		}

		?>
      </select>
      <label for=" select" class="control-label">Category</label><i class="bar"></i>
            </div>
            <div class="form-group">
            
                <input name="poste_id" class="input" type="hidden" value="<?= $poste_id ?> "
                    required="required" />
                    <input name="posteTitle" class="input" type="text" value="<?= $row3['postTitle']; ?> "
                    required="required" />
                <label for="input" class="control-label">Title</label><i class="bar"></i>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Poste image</label>
                <input class="input" type="file" name="poste_img" class="form-control-file golobalstyle"
                    id="exampleInputFile" aria-describedby="fileHelp" value="<?= $row3['postImg']; ?>">

            </div>
            <div class="form-group">
                <!--- call editor -->
                <div id="editor_panel"></div>
                <textarea name="posteForm" id="editor_area"><?= $row3['postCont']; ?></textarea>
            </div>
            <div class="button-container">
                <button type="button" class="button"><a href="blogger_profile.php" style="
    text-decoration: none;
"><span>Back</span></a></button>
                <button type="submit" name="edit-post" class="button"><span>Submit</span></button>

            </div>

        </form>

    </div>


    <script src="../public/js/text_editor.js"></script>





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