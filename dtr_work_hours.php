<?php
	$conn = mysqli_connect("localhost", "root", "", "server");
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT id, time_in, time_out FROM dtr WHERE name = '".$_SESSION["username"]."'"; // WHERE work_hrs = ''";
	$result= $conn->query($sql);
	if($result->num_rows > 0)
	{
		while($rows = $result->fetch_assoc())
		{
		if($rows['time_in']=='')
		{
			$time_in = 0;
		}
		else
		{
			$time_in = explode(":",$rows['time_in']);
			$time_in = $time_in[0] + $time_in[1]/60;
		}
		if($rows['time_out']=='')
		{
			$time_out = 0;
		}
		else
		{  
			$time_out = explode(":",$rows['time_out']);
			$time_out = $time_out[0] + $time_out[1]/60;			
		}
		$work_hrs = sprintf("%1\$.2f",$time_out - $time_in);	
		if( (!$rows['time_in']) && ($rows['time_out']!=''))
		{
			echo "<script type='text/javascript'>alert('Invalid request')</script>";
			$work_hrs = '';
		}
		if($work_hrs < 0)
		{
			$work_hrs = '';
		}
		$sql = "UPDATE dtr SET work_hrs = '".$work_hrs."' WHERE id = '".$rows['id']."'";
		mysqli_query($conn, $sql);
	}
		}
	$conn->close();	
?>