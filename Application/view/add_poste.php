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
	<title>Document</title>
</head>

<body>


	<div class="main">





		<form action="../controller/add-poste-back.php" method="POST" enctype="multipart/form-data">

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
					<label for="exampleFormControlTextarea1">description</label>
					<textarea name="descreption" class="form-control golobalstyle" id="exampleFormControlTextarea1"
						rows="3"></textarea>
				</div>

				<div class="form-group">
					<label for="exampleInputFile">poste image</label>
					<input type="file" name="poste_img" class="form-control-file golobalstyle" id="exampleInputFile"
						aria-describedby="fileHelp">

				</div>
				<!--- call editor -->
				<div id="editor_panel"></div>
				<textarea name="posteForm" id="editor_area">

	 </textarea>

				<button type="submit" name="go">go</button>

		</form>





	</div>
	</div>

	<script src="texteditor.js"></script>


	<style>
		/* Demo css after plugin css */

		/* = ICONS
------------------- */
		@import url('https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css');


		/* = PLUGIN
------------------- */
		pre {
			margin: 0;
			padding: 0;
			border: 0;
			outline: 0;
			font-weight: inherit;
			font-style: inherit;
			font-size: 100%;
			font-family: inherit;
			vertical-align: baseline;
			white-space: pre-wrap;
			white-space: -moz-pre-wrap;
			white-space: -pre-wrap;
			white-space: -o-pre-wrap;
			word-wrap: break-word;
		}

		#toolBar2 {
			background: #2c3e50;
			padding-left: 5px;
		}

		#thisForm {
			margin: 5px 5px 5px 5px;
			display: block;
			-webkit-border-radius: 4px;
			-moz-border-radius: 4px;
			border-radius: 4px;
			border: 0;
		}

		.intLink {
			cursor: pointer;
			color: #ecf0f1;
			text-decoration: none;
			margin: 6px 2px;
			padding: 2px 5px;
			display: inline-block;
			outline: none;
		}

		#toolBar2 select {
			font-size: 13px;
			font-weight: bold;
			border: 0;
			width: 22px;
			height: 30px;
			color: #000000;
			background: #FFF;
			margin-top: 2px;
		}

		#textBox {
			min-height: 200px;
			border: 0;
			padding: 3px;
			overflow: auto;
			background: #FFF;
			border: 2px solid #BDC3C7;
			/* border-left:0;
  border-right:0; */
		}

		#textBox:focus {
			border: 2px solid #BDC3C7;
			/* border-left: 0;
  border-right: 0; */
			outline: none;
		}

		#textBox #sourceText {
			margin: 0;
			padding: 5px;
			background: #FFF;
			color: #4B4B4B;
		}

		#editMode {
			background: #E74C3C;
			padding: 5px 10px;
			display: inline-block;
			color: #ECF0F1;
		}

		#editMode label {
			cursor: pointer;
		}

		input[type=checkbox] {
			display: none;
			outline: none;
		}

		input[type=checkbox]:checked+label {
			background: #575757;
			color: #FCFDFF;
			text-shadow: 0 1px 1px #303030;
		}

		input[type=checkbox]:checked+label .handle {
			margin-left: 45px;
		}

		label.custom-select {
			position: relative;
			display: inline-block;
		}

		.custom-select select {
			display: inline-block;
			padding: 4px 3px 3px 5px;
			margin: 0;
			font: inherit;
			outline: none;
			line-height: 1.2;
			-webkit-appearance: none;
			-webkit-border-radius: 4px;
			-moz-border-radius: 4px;
			border-radius: 4px;
		}

		@media screen and (-webkit-min-device-pixel-ratio:0) {
			.custom-select select {
				padding-right: 10px;
			}
		}


		.custom-select:after {
			font-family: FontAwesome;
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			font-size: 14px;
			line-height: 30px;
			padding: 0 7px;
			background: #2c3e50;
			height: 30px;
			margin-right: 0;
			margin-top: 2px;
			color: #ecf0f1;
			pointer-events: none;
		}


		.fonthd:after {
			content: "\f040";
		}

		.fontFam:after {
			content: "\f034";
		}

		.fontSi:after {
			content: "\f035";
		}

		.fontCol:after {
			content: "\f031";
		}

		.fontBck:after {
			content: "\f043";
		}


		.fonthd:hover:after,
		.fontFam:hover:after,
		.fontSi:hover:after,
		.fontCol:hover:after,
		.fontBck:hover:after,
		.send-btn:hover,
		.intLink:hover {
			color: #1AC0F5;
			cursor: pointer;
			-webkit-transition: background 1s ease;
			-moz-transition: background 1s ease;
			-o-transition: background 1s ease;
			transition: background 1s ease;
		}

		.no-pointer-events .custom-select:after {
			content: none;
		}




		/* = DEMO MODE
------------------*/
		body {
			background: #fff;
		}

		#thisForm {
			box-shadow: 0 5px 25px 10px #fff;
		}

		#textBox {
			height: 500px;
		}

		#editor_area {
			width: 98.5%;
			min-height: 200px;
			margin: 2px
		}

		.main {
			width: 800px;
			margin: 0 auto;
		}

		.head-title {
			text-align: center;
			color: #FFFFFF;
			text-shadow: 0 4px 3px #6D6D6D;
		}

		.head-title a {
			padding: 5px 10px;
			background: #FFF;
			text-decoration: none;
			color: #333;
			transition: color 1s ease;
		}

		.head-title a:hover {
			color: #f55;
			transition: color 1s ease;
		}

		.code {
			background: #333;
			padding: 10px;
			border: 5px solid #1CD9E0;
			color: #13DCE4;
		}

		.body-text {
			color: white;
		}

		@media screen and (max-width: 480px; ) {
			.main {
				width: 100%;
				margin: 30px auto;
			}
		}















		/* ----------------- */


		.form-control {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-top: 6px;
			margin-bottom: 16px;
			resize: vertical;

		}
	</style>

</body>

</html>