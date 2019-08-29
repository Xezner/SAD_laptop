<?php
	include_once('index_logged.php');
?>

<?php
	$id_dtr = $_POST['id_dtr'];
	
	$conn = mysqli_connect("localhost", "root", "", "server");
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT date_in, time_in, time_out FROM dtr WHERE id = '".$id_dtr."'";
	$result = $conn->query($sql);
	$row = $result-> fetch_assoc();
	
	if (isset($_POST['time_in'])&&!empty($_POST['time_in']))
	{
		$time_in = $_POST['time_in'];
	}
	else
	{
		$time_in = $row['time_in'];
	}
	
	if (isset($_POST['time_out'])&&!empty($_POST['time_out']))
	{
		$time_out = $_POST['time_out'];
	}
	else
	{
		$time_out = $row['time_out'];
	}
	
	if( ($_POST['month'] == "") || ($_POST['day'] == "") || ($_POST['year'] == "") )
	{
		$date_dtr = $row['date_in'];
	}
	else
	{
		$date_dtr = $_POST['month']." ".$_POST['day'].", ".$_POST['year'];
	}
	
	$sql = "UPDATE dtr SET date_in = '".$date_dtr."', time_in = '".$time_in
		."', time_out = '".$time_out."', work_hrs = '' WHERE id = '".$id_dtr."'";
	if(mysqli_query($conn, $sql)){
		echo "Records updated successfully. Automatically redirect in 3 seconds";
		header('Refresh: 3; URL = edit_dtr.php');
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}	
	mysqli_close($conn);
?>