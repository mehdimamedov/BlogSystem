<?php
	session_start();
	if (!$_SESSION['logged']) {
		header('Location:login.php');
	}
	include "../classes/database.php";
	$news = $db->GetData();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../assets/css/template.css">
</head>
<body>
	<div class="container">
		<div class="text-center">
			<h1>ADMIN PANEL</h1>
		</div>
		<div>
			<a href="create.php" class="btn btn-success">Create</a>
			<a href="../index.php" class="btn btn-default">Home</a>
			<a href="quit.php" class="btn btn-danger pull-right">Quit</a>
		</div>
		<table class="table table-bordered">
			<thead>
				<th>Index</th>
				<th>Author</th>
				<th>Title</th>
				<th>Text</th>
				<th>Image</th>
				<th>Date</th>
				<th>View Count</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
					for ($i = 0; $i < count($news); $i++) {
					?>
						<tr>
							<td><?= $news[$i]->id ?></td>
							<td><?= $news[$i]->author ?></td>
							<td><?= $news[$i]->title ?></td> 
							<td><?= $news[$i]->content ?></td> 
							<td><?= $news[$i]->fileName ?></td>
							<td><?= $news[$i]->date ?></td> 
							<td><?= $news[$i]->count ?></td> 
							<td>
								<a href="update.php?id=<?= $news[$i]->id ?>" class="btn btn-success">Update</a>
								<a href="delete.php?id=<?= $news[$i]->id ?>" class="btn btn-danger">Delete</a>
							</td>
						</tr>


					<?php
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>