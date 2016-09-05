<?php
	include "../classes/database.php";
	session_start();
	if (!$_SESSION['logged']) {
		header('Location:login.php');
	}
	if (empty($_GET['id'])) {
		header('Location:login.php');
	}
	//Get initial data
	$id = $_GET['id'];
	$initial = $db->GetData($id);
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
		<h1>UPDATE ARTICLE</h1>

		<form action="" method="post" enctype="multipart/form-data" class="form-group">
			<h3>Author</h3>
			<input type="text" name="author" class="form-control" placeholder="<?= $initial[0]->author ?>">
			<h3>Title</h3>
			<input type="text" name="title" class="form-control" placeholder="<?= $initial[0]->title ?>">
			<h3>Content</h3>
			<input type="text" name="content" class="form-control" placeholder="<?= $initial[0]->content ?>">
			<h3>Image</h3>
			<input type="file" name="image" class="form-control">
			<input type="submit" name="submit" class="btn btn-success">
			<a href="admin.php" class="btn btn-default">Back</a>
		</form>
		
	</div>
</body>
</html>

<?php
	if (isset($_POST['submit'])) {
		// echo "qweqweqwe";
		$author = empty($_POST['author']) ? $initial[0]->author : $_POST['author'];
		$title = empty($_POST['title']) ? $initial[0]->title : $_POST['title'];
		$content = empty($_POST['content']) ? $initial[0]->content : $_POST['content'];

		if (isset($_FILES['image'])) {
			//FIRST DELETE PREV FILE
			$prevFile = '../images/' . $initial[0]->fileName;
			// unlink($prevFile);

			//UPLOAD NEW ONE
			$target_dir = '../images/';
			$file_name = date('ymdhs') . $_FILES['image']['name'];
			$target_file = $target_dir . $file_name;

			$tmp_location = $_FILES['image']['tmp_name'];

			move_uploaded_file($tmp_location, $target_file);
		}

		$db->UpdateData($author, $title, $content, $file_name, $initial[0]->viewCount, $id);

	}
?>