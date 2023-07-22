<?php
	# code...
	session_start();

	if(!isset($_SESSION['logged_in'])){
		# code...
		header('Location: index.php');
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<nav class="navbar">
		<div>
			<h1 class="title">Home Page</h1>
			<a href="profile.php"><i class="fas fa-user-circle"></i>My Profile</a>
			<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
		</div>
	</nav>
	<div class="container">
		<h2>Hello World</h2>
		<p>Welcome back, <?=$_SESSION['name']?>!</p>
	</div>
</body>
</html>