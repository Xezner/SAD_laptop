<?php
	$conn = mysqli_connect("localhost", "root", "", "server");
	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT active FROM users WHERE username = '".$_SESSION["username"]."'";
	$result= $conn->query($sql);
	$row = $result->fetch_assoc();
	$_SESSION["timed_in"] = $row['active'];
	$conn->close();
	
?>