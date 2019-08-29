<?php
	session_start();
	
	echo 'User '.$_SESSION["username"].' logged in. ';
	echo '<br>';
	echo '<a href="logout.php"> Logout </a>';
	
	if ($_SESSION["admin"]==1)
	{
		header('Refresh: 0; URL = index_admin.php');
	}
?>


<html>
	<head>
		<h1> WELCOME TO PLMAREIS </h1>
	</head>

	<body>
		<h2> <a href="index_logged.php"> Home </a></h2>
		<h2> <a href="profile.php"> Profile </a></h2>
		<h2> <a href="dtr.php"> DTR </h2>
		<h2> <a href="schedule.php"> Schedule </h2>
		<h2> <a href="payroll.php"> Payroll </a></h2>
	</body>

</html>