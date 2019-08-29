<?php
	include_once('index_logged.php');
	//echo $_SESSION["fullname"];
?>

<?php
	//getting schedule id to edit
	if (isset($_POST['edit_schedule'])&&!empty($_POST['edit_schedule']))
	{
		$edit_schedule= $_POST['edit_schedule'];
		$_SESSION["sched_id"] = $edit_schedule;
	}
	else
	{
		echo "NO CHANGES MADE. Redirecting in 3 seconds.";
		header('Refresh: 3; URL = edit_schedule.php');
		die();
	}

	//getting subject id to update to schedule id
	if (isset($_POST['subjects'])&&!empty($_POST['subjects']))
	{
		if($_POST['subjects'] == 'none')
		{
			echo "NO CHANGES MADE. Redirecting in 3 seconds.";
			header('Refresh: 3; URL = edit_schedule.php');
			die();
		}
		$subjects= explode("|",$_POST['subjects']);
		$subjects= explode(": ", $subjects[0]);
		$_SESSION["edit_id"] = $subjects[1];
		echo $_SESSION["edit_id"];
	}
	

	//add id is the id of the subject
	
	//now insert fullname and schedule to schedules table
	$conn = mysqli_connect("localhost", "root", "", "server");
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT subjcode, description, sections, schedule FROM subjects WHERE id = '".$_SESSION["edit_id"]."'";
	$result = $conn->query($sql);
	$row = $result-> fetch_assoc();
	$subj_fullname = $_SESSION["fullname"];
	$subj_code = $row['subjcode'];
	$subj_desc = $row['description'];
	$subj_sect = $row['sections'];
	$subj_sched = $row['schedule'];
	
	$sql = "SELECT subjname, subjdesc, sect, sched  FROM schedules WHERE subjname = '"
			.$subj_code."' AND subjdesc = '".$subj_desc."' AND sect = '"
			.$subj_sect."' AND sched = '".$subj_sched."'AND profname = '".$_SESSION["fullname"]."'";
	$result = $conn->query($sql);
	if( $result->num_rows > 0)
	{
		header('Refresh: 0; URL = edit_schedule.php');
		die("<script type='text/javascript'>alert('Schedule already exists.')</script>");
	}
	
	
	$sql = "UPDATE schedules SET subjname = '".$subj_code."', subjdesc = '".$subj_desc
		."', sect = '".$subj_sect."', sched = '".$subj_sched
		."' WHERE id = '".$_SESSION["sched_id"]."'";
	if(mysqli_query($conn, $sql)){
		echo "Records updated successfully. Automatically redirect in 3 seconds";
		header('Refresh: 3; URL = edit_schedule.php');
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}	
	mysqli_close($conn);
?>