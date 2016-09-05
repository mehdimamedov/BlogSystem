<?php
	session_start();
	$_SESSION['error'] = '';
	if ($_SESSION['logged']) {
		header('Location:admin/admin.php');
	}
	if (isset($_POST['submit'])) {
		if (!empty($_POST['login']) && !empty($_POST['password'])) {
			if ($_POST['login'] == 'admin' && $_POST['password'] == 'admin') {
				$_SESSION['logged'] = true;
				header('Location:admin/admin.php');
			} else {
				$_SESSION['error'] = "Wrong login or password!";
			}
		}	
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="assets/css/template.css">
	<style>
		input, a {
			margin: 5px 0px;
		}
	</style>
</head>
<body>
<div class="header">
	<div class="header_top">
		<div class="wrap">
			<div class="logo">
			     <a href="index.html"><img src="images/logo.png" alt="" /></a>
			</div>
			<div class="login_button">
			    <ul>
			    <li><a href="login.php">Sign in</a><li> | 
			    <li><a href="#">Login</a></li>
			    </ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="header_bottom">
		<div class="wrap">
			<div class="menu">
			    <ul>
			    	<li><a href="index.php">HOME</a></li>
			    	<li><a href="single.html">ARTICLES</a></li>
			    	<li><a href="single.html">SERVICES</a></li>
			    	<li><a href="#">LOGOS</a></li>
			    	<li><a href="single.html">TOOLS</a></li>
			    	<li><a href="single.html">ICONS</a></li>
			    	<li><a href="single.html">WALLPAPERS</a></li>
			    	<li><a href="index.html">HELP</a></li>
			    	<li><a href="contact.html">CONTACT</a></li>
			    </ul>
			</div>
			<div class="search_box">
			    <form>
			    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
			    </form>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<div class="container">
	<div class="text-center">
		<h1>LOGIN PAGE</h1>
	</div>
	<form action="" method="post" class="form-group">
		<h4>LOGIN</h4>
		<input type="text" name="login" class="form-control" required>
		<h4>PASSWORD</h4>
		<input type="password" name="password" class="form-control" required>
		<input type="submit" name="submit" class="btn btn-success" value="Submit">
		<a href="index.php" class="btn btn-default">Back</a>
	</form>
	<?php 
		if (!empty($_SESSION['error'])) {
			$error = $_SESSION['error'];
			echo "<h1>$error</h1>";
		}
	?>
</div>

<div class="footer">
	<div class="wrap">
		<div class="footer_grid1">
			<h3>About Us</h3>
			<p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here desktop publishing making it look like readable English.<br><a href="#">Read more....</a></p>
		</div>
		<div class="footer_grid2">
			<h3>Navigate</h3>
				<div class="f_menu">
					<ul>
				       <li><a href="index.html">Home</a></li>
				       <li><a href="single.html">Articles</a></li>
				       <li><a href="contact.html">Contact</a></li>
				       <li><a href="#">Write for Us</a></li>
				       <li><a href="#">Submit Tips</a></li>
				       <li><a href="#">Privacy Policy</a></li>
				   </ul>
				</div>
		</div>
	<div class="footer_grid3">
		<h3>We're Social</h3>
		<div class="img_list">
		    <ul>
		     <li><img src="images/facebook.png" alt="" /><a href="#">Facebook</a></li>
		     <li><img src="images/flickr.png" alt="" /><a href="#">Flickr</a></li>
		     <li><img src="images/google.png" alt="" /><a href="#">Google</a></li>
		     <li><img src="images/yahoo.png" alt="" /><a href="#">Yahoo</a></li>
		     <li><img src="images/youtube.png" alt="" /><a href="#">Youtube</a></li>
		     <li><img src="images/twitter.png" alt="" /><a href="#">Twitter</a></li>
		     <li><img src="images/yelp.png" alt="" /><a href="#">Help</a></li>
		    </ul>
		</div>
	</div>
	</div>
	<div class="clear"></div>
</div>

<div class="f_bottom">
	<p>© 2012 rights Reseverd | Design by<a href="http://w3layouts.com/"> W3Layouts</a></p>
</div>
</body>
</html>