<?php
	include_once('index_logged.php');
	$_SESSION["fullname"];
?>

<?php
	if (isset($_POST['subjects'])&&!empty($_POST['subjects']))
	{
		$subjects= explode("|",$_POST['subjects']);
		$subjects= explode(": ", $subjects[0]);
		$_SESSION["add_id"] = $subjects[1];
		
	}
	//add id is the id of the subject
	
	//now insert fullname and schedule to schedules table
	$conn = mysqli_connect("localhost", "root", "", "server");
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT subjcode, description, sections, schedule FROM subjects WHERE id = '".$_SESSION["add_id"]."'";
	$result = $conn->query($sql);
	$row = $result-> fetch_assoc();
	$subj_fullname = $_SESSION["fullname"];
	$subj_code = $row['subjcode'];
	$subj_desc = $row['description'];
	$subj_sect = $row['sections'];
	$subj_sched = $row['schedule'];
	
	$sql = "SELECT subjname, subjdesc, sect, sched  FROM schedules WHERE subjname = '"
			.$subj_code."' AND subjdesc = '".$subj_desc."' AND sect = '"
			.$subj_sect."' AND sched = '".$subj_sched."'AND profname = '".$subj_fullname."'";
	$result = $conn->query($sql);
	if( $result->num_rows > 0)
	{
		header('Refresh: 0; URL = add_schedule.php');
		die("<script type='text/javascript'>alert('Schedule already exists.')</script>");
	}
	
	
	$sql = "INSERT INTO schedules (id, profname ,subjname, subjdesc, sect, sched) 
			VALUES ('', '$subj_fullname', '$subj_code', '$subj_desc', '$subj_sect', '$subj_sched')"; 	
	if(mysqli_query($conn, $sql)){
		echo "<script type='text/javascript'>alert('Records inserted successfully. Automatically redirect in 3 seconds')</script>";
		header('Refresh: 3; URL = add_schedule.php');
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}	
	mysqli_close($conn);
?>