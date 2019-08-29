<?php
	include_once('index_logged.php');
?>


<?php
	$rate = $_POST['rate'];
	$conn = mysqli_connect("localhost", "root", "", "server");
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = 'UPDATE salary SET rate = '.$rate;
	if(mysqli_query($conn, $sql)){
		echo "Salary updated successfully. Automatically redirect in 3 seconds";
		header('Refresh: 3; URL = payroll_properties.php');
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}	
	mysqli_close($conn);

?>