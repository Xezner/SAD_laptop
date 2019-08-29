<?php
	include_once('index_logged.php');
?>


<?php
	$conn = mysqli_connect("localhost", "root", "", "server");
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT rate FROM salary";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$_SESSION["rates"] = $row['rate'];

?>