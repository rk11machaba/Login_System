<?php
	error_reporting(0);

	if(isset($_POST['submit'])){
		# code...
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$username = $_POST['lastname'].$_POST['firstname'];

		$database = mysqli_connect("localhost","root","","posts");

		if($_POST['password_confirm'] === $_POST['password']){
			# code...
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

			$sql = "INSERT INTO users(firstname,lastname,email,username,password) VALUES('$firstname','$lastname','$email','$username','$password')";
		}
		mysqli_query($database,$sql);
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Signup</title>
	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="login">
		<h1 class="heading">Signup</h1>
		<form action="" method="post" class="form">
			<label class="firstname">
				<i class="fas fa-user"></i>
			</label>
			<input type="text" name="firstname" placeholder="Firstname" required>
			<label class="lastname">
				<i class="fas fa-user"></i>
			</label>
			<input type="text" name="lastname" placeholder="Lastname" required>
			<label class="email">
				<i class="fas fa-mail"></i>
			</label>
			<input type="text" name="email" placeholder="Email" required>
			<label class="lock">
				<i class="fas fa-lock"></i>
			</label>
			<input type="password" name="password" placeholder="Password" required>
			<label class="lock">
				<i class="fas fa-lock"></i>
			</label>
			<input type="password" name="password_confirm" placeholder="Confirm Password" required>
			<input type="submit" name="submit" value="Signup" class="btn_submit">
		</form>
		<p class="log_sign">Already Registered? <a href="index.php">Login</a></p>
	</div>
</body>
</html>