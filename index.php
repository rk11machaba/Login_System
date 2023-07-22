<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="login">
		<h1 class="heading">Login</h1>
		<form action="core/Auth.php" method="post" class="form">
			<label class="email">
				<i class="fas fa-user"></i>
			</label>
			<input type="text" name="email" placeholder="Email" required>
			<label class="lock">
				<i class="fas fa-lock"></i>
			</label>
			<input type="password" name="password" placeholder="Password" required>
			<input type="submit" value="Login" class="btn_submit">
		</form>
		<p class="log_sign">Don't have account? <a href="signup.php">Sign up</a></p>
	</div>
</body>
</html>