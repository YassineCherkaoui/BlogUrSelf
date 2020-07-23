<?php

require('../includes/config.php');

$queryC= "SELECT * FROM category";
$stmtC =$db->prepare($queryC);
$stmtC->execute();
$resultC= $stmtC->get_result();

?>





<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>blogUeSelf  | Add Post</title>

  

  <link rel="shortcut icon" href="../style/images/fiveicon.png" type="image/x-icon">
  <link href="../css/add_post.css" rel="stylesheet">


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
      <input name="posteTitle" class="input" type="text" required="required"/>
      <label for="input" class="control-label">Title</label><i class="bar"></i>
    </div>
	<div class="form-group">
					<label for="exampleInputFile">Poste image</label>
					<input class="input" type="file" name="poste_img" class="form-control-file golobalstyle" id="exampleInputFile"
						aria-describedby="fileHelp">

				</div>
    <div class="form-group">
			<!--- call editor -->
			<div id="editor_panel"></div>
				<textarea name="posteForm" id="editor_area"></textarea>
    </div>
	<div class="button-container">
    <button type="button" class="button"><a href="blogger_profile.php"style="
    text-decoration: none;
"><span>Back</span></a></button>
	<button type="submit" name="go" class="button"><span>Submit</span></button>
	
  </div>
    
  </form>
 
</div>

	<!-- <div class="main">





		<form >

			<div>
				<div class="form-group">
					<label for="exampleFormControlInput1">title</label>
					<input type="text" name="posteTitle" class="form-control golobalstyle" id="exampleFormControlInput1"
						placeholder="">
				</div>


				<div class="form-group">
					<label for="exampleFormControlSelect1">catigory</label>
					<select name="category" class="form-control golobalstyle" id="exampleFormControlSelect1">


						<?php
		

					while ($rowC = $resultC->fetch_assoc()) { ?>
						<option><?= $rowC['name']; ?> </option>



						<?php
					}

					?>

					</select>

				</div>
				

				<div class="form-group">
					<label for="exampleInputFile">poste image</label>
					<input type="file" name="poste_img" class="form-control-file golobalstyle" id="exampleInputFile"
						aria-describedby="fileHelp">

				</div>
				<div id="editor_panel"></div>
				<textarea name="posteForm" id="editor_area">
			</textarea>

				<button type="submit" name="go">go</button>

		</form>





		</div>
	</div> -->
	

	<script src="../js/text_editor.js"></script>
	


	

</body>

<style>
@import url(https://fonts.googleapis.com/css?family=Roboto);
body,
input,
select,
textarea,
body * {
  font-family: 'Roboto', sans-serif;
  box-sizing: border-box;
}
body::after, body::before,
input::after,
input::before,
select::after,
select::before,
textarea::after,
textarea::before,
body *::after,
body *::before {
  box-sizing: border-box;
}

body {
  background-image: -webkit-linear-gradient(top, #f2f2f2, #e6e6e6);
  background-image: linear-gradient(top, #f2f2f2, #e6e6e6);
}

h1 {
  font-size: 2rem;
  text-align: center;
  margin: 0 0 2em;
}

.container {
  position: relative;
  max-width: 80rem;
  margin: 5rem auto;
  background: #fff;
  width: 100%;
  padding: 3rem 5rem 0;
  border-radius: 1px;
}
.container::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  box-shadow: 0 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.2);
  -webkit-transform: scale(0.98);
          transform: scale(0.98);
  -webkit-transition: -webkit-transform 0.28s ease-in-out;
  transition: -webkit-transform 0.28s ease-in-out;
  transition: transform 0.28s ease-in-out;
  transition: transform 0.28s ease-in-out, -webkit-transform 0.28s ease-in-out;
  z-index: -1;
}
.container:hover::before {
  -webkit-transform: scale(1);
          transform: scale(1);
}

.button-container {
  text-align: center;
}

fieldset {
  margin: 0 0 3rem;
  padding: 0;
  border: none;
}

.form-radio,
.form-group {
  position: relative;
  margin-top: 2.25rem;
  margin-bottom: 2.25rem;
}

.form-inline > .form-group,
.form-inline > .btn {
  display: inline-block;
  margin-bottom: 0;
}

.form-help {
  margin-top: 0.125rem;
  margin-left: 0.125rem;
  color: #b3b3b3;
  font-size: 0.8rem;
}
.checkbox .form-help, .form-radio .form-help, .form-group .form-help {
  position: absolute;
  width: 100%;
}
.checkbox .form-help {
  position: relative;
  margin-bottom: 1rem;
}
.form-radio .form-help {
  padding-top: 0.25rem;
  margin-top: -1rem;
}

.form-group input {
  height: 1.9rem;
}
.form-group textarea {
  resize: none;
}
.form-group select {
  width: 100%;
  font-size: 1rem;
  height: 1.6rem;
  padding: 0.125rem 0.125rem 0.0625rem;
  background: none;
  border: none;
  line-height: 1.6;
  box-shadow: none;
}
.form-group .control-label {
  position: absolute;
  top: 0.25rem;
  pointer-events: none;
  padding-left: 0.125rem;
  z-index: 1;
  color: #b3b3b3;
  font-size: 1rem;
  font-weight: normal;
  -webkit-transition: all 0.28s ease;
  transition: all 0.28s ease;
}
.form-group .bar {
  position: relative;
  border-bottom: 0.0625rem solid #999;
  display: block;
}
.form-group .bar::before {
  content: '';
  height: 0.125rem;
  width: 0;
  left: 50%;
  bottom: -0.0625rem;
  position: absolute;
  background: #337ab7;
  -webkit-transition: left 0.28s ease, width 0.28s ease;
  transition: left 0.28s ease, width 0.28s ease;
  z-index: 2;
}
.form-group .input,
.form-group textarea {
  display: block;
  background: none;
  padding: 0.125rem 0.125rem 0.0625rem;
  font-size: 1rem;
  border-width: 0;
  border-color: transparent;
  line-height: 1.9;
  width: 100%;
  color: transparent;
  -webkit-transition: all 0.28s ease;
  transition: all 0.28s ease;
  box-shadow: none;
}
.form-group input[type="file"] {
  line-height: 1;
}
.form-group input[type="file"] ~ .bar {
  display: none;
}
.form-group select,
.form-group input:focus,
.form-group input:valid,
.form-group input.form-file,
.form-group input.has-value,
.form-group textarea:focus,
.form-group textarea:valid,
.form-group textarea.form-file,
.form-group textarea.has-value {
  color: #333;
}
.form-group select ~ .control-label,
.form-group input:focus ~ .control-label,
.form-group input:valid ~ .control-label,
.form-group input.form-file ~ .control-label,
.form-group input.has-value ~ .control-label,
.form-group textarea:focus ~ .control-label,
.form-group textarea:valid ~ .control-label,
.form-group textarea.form-file ~ .control-label,
.form-group textarea.has-value ~ .control-label {
  font-size: 0.8rem;
  color: gray;
  top: -1rem;
  left: 0;
}
.form-group select:focus,
.form-group input:focus,
.form-group textarea:focus {
  outline: none;
}
.form-group select:focus ~ .control-label,
.form-group input:focus ~ .control-label,
.form-group textarea:focus ~ .control-label {
  color: #337ab7;
}
.form-group select:focus ~ .bar::before,
.form-group input:focus ~ .bar::before,
.form-group textarea:focus ~ .bar::before {
  width: 100%;
  left: 0;
}


.button {
  position: relative;
  background: currentColor;
  border: 1px solid currentColor;
  font-size: 1.1rem;
  color: #4f93ce;
  margin: 3rem 0;
  padding: 0.75rem 3rem;
  cursor: pointer;
  -webkit-transition: background-color 0.28s ease, color 0.28s ease, box-shadow 0.28s ease;
  transition: background-color 0.28s ease, color 0.28s ease, box-shadow 0.28s ease;
  overflow: hidden;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}
.button span {
  color: #fff;
  position: relative;
  z-index: 1;
}
.button::before {
  content: '';
  position: absolute;
  background: #071017;
  border: 50vh solid #1d4567;
  width: 30vh;
  height: 30vh;
  border-radius: 50%;
  display: block;
  top: 50%;
  left: 50%;
  z-index: 0;
  opacity: 1;
  -webkit-transform: translate(-50%, -50%) scale(0);
          transform: translate(-50%, -50%) scale(0);
}
.button:hover {
  color: #337ab7;
  box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14), 0 1px 18px 0 rgba(0, 0, 0, 0.12), 0 3px 5px -1px rgba(0, 0, 0, 0.2);
}
.button:active::before, .button:focus::before {
  -webkit-transition: opacity 0.28s ease 0.364s, -webkit-transform 1.12s ease;
  transition: opacity 0.28s ease 0.364s, -webkit-transform 1.12s ease;
  transition: transform 1.12s ease, opacity 0.28s ease 0.364s;
  transition: transform 1.12s ease, opacity 0.28s ease 0.364s, -webkit-transform 1.12s ease;
  -webkit-transform: translate(-50%, -50%) scale(1);
          transform: translate(-50%, -50%) scale(1);
  opacity: 0;
}
.button:focus {
  outline: none;
}

</style>

</html>