<?php
	# code...
	session_start();

	# connection info...
	$db_host = 'localhost';
	$db_name = 'posts';
	$db_user = 'root';
	$db_pass = '';

	# connect to the database
	$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	
	# check if the connection was successful
	if(mysqli_connect_errno()){
		# if there is an error with connecting...
		exit('Failed to connect to the database: '.mysql_connect_error());
	}

	# check if the data from login was submitted
	# isset() checks if the data exists
	if(!isset($_POST['email'], $_POST['password'])){
		# code...
		exit("Please fill in both email and password fields");
	}

	# prepare sql statement
	if($stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?")){
		# bind parameters...
		# (s for string, i for int, b for blob)
		$stmt->bind_param('s',$_POST['email']);
		$stmt->execute();

		# store results
		$stmt->store_result();

		

		if($stmt->num_rows > 0){
			# code...
			$stmt->bind_result($id, $password);
			$stmt->fetch();
			# verify password
			if (password_verify($_POST['password'], $password)) {
				# code...
				session_regenerate_id();
				$_SESSION['logged_in'] = TRUE;
				$_SESSION['name'] = $_POST['email'];
				$_SESSION['id'] = $id;

				header('Location: ../home.php');
			}else{
				# incorrect email
				echo "Incorrect password/email";
			}
		}else{
			# incorrect username
			echo "Incorrect password/email";
		}
		$stmt->close();
	}
?>