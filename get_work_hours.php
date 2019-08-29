<?php
	date_default_timezone_set('Asia/Singapore'); // CDT
	$info = getdate();
	$day = $info['weekday'];
	$date = $info['mday'];
	$month = $info['month'];
	$year = $info['year'];
	$current_date = "$month $date, $year";

	$conn = mysqli_connect("localhost", "root", "", "server");
	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "SELECT id FROM dtr WHERE name = '".$_SESSION["username"]
			."' AND date_in = '".$current_date."'";
	$result= $conn->query($sql);
	if ($result->num_rows >0)
	{
		$row = $result->fetch_assoc();
		$_SESSION["time_id"] = $row['id'];
		"SESSION ID = ".$_SESSION["time_id"];
	}
	else
	{
		$sql = "INSERT INTO dtr (id, name, date_in) VALUES
			('', '".$_SESSION["username"]."', '".$current_date."')";
		if(mysqli_query($conn, $sql))
		{
			echo "Records inserted successfully. Automatically redirect in 3 seconds";
			$sql = "SELECT id FROM dtr WHERE name = '".$_SESSION["username"]
					."' AND date_in = '".$current_date."'";
			$result= $conn->query($sql);
			if ($result->num_rows >0)
			{
				$row = $result->fetch_assoc();
				$_SESSION["time_id"] = $row['id'];
			}		
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}	
	}	
	//$_SESSION["timed_in"] = $row['active']; IDK WHAT THIS IS FOR
	$conn->close();
	
?>