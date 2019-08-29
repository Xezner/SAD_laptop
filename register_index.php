<?php
	session_start();
	
	if($_SESSION["username"])
	{
		echo('<script type="text/javascript">alert("You are already logged in")</script');
		header('Refresh: 0; URL = index.php');	
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<h1> REGISTER </h1>
	</head>

	<body>		
		<form name="register" action="register.php" method="POST">
			<br>Username: <input type="text" name="user_name" class="form-control" required /> <br> <br>
			<br>Password: <input type="password" name="pass_word" class="form-control" required /> <br> <br>
			<br>Full Name: <input type="text" name="full_name" class="form-control" required /> <br> <br>
			<br>Email: <input type="text" name="e_mail" class="form-control" required /> <br> <br>
			<br>Contact: <input type="text" name="contact_num" class="form-control" required /> <br> <br>
			<input type="submit" value="Register">
		</form>
		
		<form name="back" action="index.php">
			<br><input type="submit" value="Back">
		</form>
	</body>

</html>

