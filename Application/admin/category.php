<?php
//include config
require_once('../includes/config.php');


?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<title>Hello, world!</title>
	<link rel="stylesheet" href="../style/js/js.js">
	<link rel="stylesheet" href="../style/css/admin.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="shortcut icon" href="../style/images/fiveicon.png" type="image/x-icon">
	
</head>

<body>
	<div class="header">
		<a href="#" id="menu-action">
			<i class="fa fa-bars"></i>
			<span>Close</span>
		</a>
		<div class="logo"><img src="../style/images/fiveicon.png" width="2%">
			Admin Panel
		</div>
	</div>
	<div class="sidebar">
		<ul>
			<li><a href="index.php"><i class="fa fa-desktop"></i><span>Posts</span></a></li>
			<li><a href="users.php"><i class="fa fa-users"></i><span>Users</span></a></li>
			<li><a href="../view"><i class="fa fa-blog"></i><span>View Blog</span></a></li>
			<li><a href="category.php"><i class="fas fa-envelope-square"></i><span>category</span></a></li>
			<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>LogOut</span></a></li>
		</ul>
	</div>

	<!-- Content -->
	<div class="main">
		<div class="">
		
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Id Category</th>
						<th>Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php


				$query = "SELECT * from category ";
			  	$stmt = $db->prepare($query);
			  	$stmt->execute();
        		$result = $stmt->get_result();



					try {

						while ($row = $result->fetch_assoc()) {

							echo '<tr>';
							echo '<th>' . $row['id'] . '</th>';
							echo '<td>' . $row['name'] . '</td>';
					?>

							<td>
								<a class="btn btn-primary" href="admin-back.php?categoryId=<?= $row['id']; ?>">Delete</a>
							</td>

					<?php
							echo '</tr>';
						}
					} catch (PDOException $e) {
						echo $e->getMessage();
					}
					?>

				</tbody>
			</table>
		</div>
        <a href="add-ctg.php" class="btn btn-info btn-lg">
			<span class="glyphicon glyphicon-plus-sign"></span> Add Category
		</a>
		
	</div>

    







	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>