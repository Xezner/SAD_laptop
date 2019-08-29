<?php
	$conn = mysqli_connect("localhost", "root", "", "server");
	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "UPDATE users SET active = '".$_SESSION["timed_in"]."'";
	if(mysqli_query($conn, $sql)){
		echo "Schedules' name updated successfully. Automatically redirect in 3 seconds <br>";
	} 
	else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}
	$conn->close();
	
?>