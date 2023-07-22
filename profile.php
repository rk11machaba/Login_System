<?php
	# code...
	session_start();

	if(!isset($_SESSION['logged_in'])){
		# code...
		header('Location: index.php');
		exit();
	}

	# hupn... Host User Pass Name
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'posts';

	$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

	if(mysqli_connect_errno()){
		# if there is an error with connecting...
		exit('Failed to connect to the database: '.mysql_connect_error());
	}

	$stmt = $conn->prepare("SELECT firstname,lastname, email, username FROM users WHERE id = ?");

	$stmt->bind_param('i',$_SESSION['id']);
	$stmt->execute();
	$stmt->bind_result($firstname,$lastname,$email,$username);
	$stmt->fetch();
	$stmt->close();
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
			<h1 class="title">Profile Page</h1>
			<a href="profile.php"><i class="fas fa-user-circle"></i>My Profile</a>
			<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
		</div>
	</nav>
	<div class="container">
		<h2>Hello World</h2>
		<p>Welcome back, <?=$_SESSION['name']?>!</p>
		<p><?=$email?></p>
		<p><?=$username?></p>
		<p><?=$lastname?></p>
		<p><?=$firstname?></p>
	</div>
</body>
</html>