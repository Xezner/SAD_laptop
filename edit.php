<?php
	include_once('index_logged.php');
?>

<?php
	$conn = mysqli_connect("localhost", "root", "", "server");
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT fullname FROM users WHERE username = '".$_SESSION["username"]."'";
	$result = $conn->query($sql);
	$row = $result-> fetch_assoc();
	$_SESSION["fullname"] = $row['fullname'];
?>

<!DOCTYPE html>
<html>
	<head>
	<br>
	<h1> Edit </h1>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
	*
	{
		font-family: 'Montserrat', sans-serif;
	}
	#butt 
	{
		font-family: 'Montserrat', sans-serif;
		border-radius: 20px;
		border: 1px solid #000000;
		background: linear-gradient(to right, #0089C0, #002867);
		background-color: #FF4B2B;
		color: #FFFFFF;
		font-size: 12px;
		font-weight: bold;
		padding: 10px 15px;
		letter-spacing: 1px;
		text-transform: uppercase;
		transition: transform 80ms ease-in;
		margin: 5px;
	}
</style>	
	</head>

	<body>		
		<!-- edit_save.php -->
		<form name="register" action="edit_save.php" method="POST">
			<br>New Password: <input type="password" name="pass_word"/> <br> <br>
			<br>Full Name: <input type="text" name="full_name"/> <br> <br>
			<br>Email: <input type="email" name="e_mail"/> <br> <br>
			<br>Contact: <input type="text" name="contact_num"/> <br> <br>
			<p> ** leave form blank to not make changes </p>
			<br>
			<input id="butt" type="submit" value="Save profile">
		</form>
	</body>

</html>
