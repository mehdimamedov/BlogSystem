<?php
	include "../classes/database.php";
	session_start();
	if (!$_SESSION['logged']) {
		header('Location:login.php');
	}
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		$db->DeleteData($_GET['id']);
		header('Location:admin.php');
	} else {
		header('Location:admin.php');
	}

?>