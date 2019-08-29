<?php
	session_start();
?>

<?php
	function updateElement($element)
	{
		//row1 schedule is the schedule before update
		$selectsql = "SELECT id FROM schedules WHERE sched = '".$row1["schedule"]
					."' AND subjname= '".$row1["subjcode"]
					."' AND sect= '".$row1["sections"]."'";
		// SELECT sched FROM schedules WHERE sched = 'W 1:00 AM to 1:00 AM' AND subjname = 'BSCOE-ELEC2' AND sect = '5'
		// SELECT * FROM subjects WHERE schedule = 'W 1:00 AM to 1:00 AM' AND subjcode = 'BSCOE-ELEC2' AND sections = '3'
		$resultsql=$conn->query($selectsql);
		$rowsql=$resultsql->fetch_assoc();
		if( $resultsql->num_rows > 0)
		{
			$updatesql = "UPDATE schedules SET sched = '".$subj_schedule.
						"' WHERE id = '".$rowsql["id"]."'";
			if(mysqli_query($conn, $updatesql))
			{
				echo "Records updated successfully.<br>";
			} 
			else
			{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}		
	}
?>

<?php
if (isset($_POST['subject_id'])&&!empty($_POST['subject_id']))
{
	$subject_id = $_POST['subject_id'];
}

$conn = mysqli_connect("localhost", "root", "", "server");

// Check connection
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}
$select1 = "SELECT * FROM subjects WHERE id = '".$subject_id."'";
$result1=$conn->query($select1);
$row1=$result1->fetch_assoc();

//SUBJECT COURSE ///////////////////////////////////////////////////////////////////////
if (isset($_POST['subj_course'])&&!empty($_POST['subj_course']))
{
	$subj_course = $_POST['subj_course'];
}
else
{
	$subj_course = $row1["course"];
}
//////////////////////////////////////////////////////////////////////////////////////////

//SUBJECT CODE ///////////////////////////////////////////////////////////////////////
if (isset($_POST['subj_code'])&&!empty($_POST['subj_code']))
{
	$subj_code = $_POST['subj_code'];
}
else
{
	$subj_code = $row1["subjcode"];
}
//////////////////////////////////////////////////////////////////////////////////////////

//SUBJECT DESC/////////////////////////////////////////////////////////////////////
if (isset($_POST['subj_desc'])&&!empty($_POST['subj_desc']))
{
	$subj_desc = $_POST['subj_desc'];
}
else
{
	$subj_desc = $row1["description"];
}
//////////////////////////////////////////////////////////////////////////////////////////

//SUBJECT UNITS////////////////////////////////////////////////////////////////////
if (isset($_POST['subj_units'])&&!empty($_POST['subj_units']))
{
	$subj_units = $_POST['subj_units'];
}
else
{
	$subj_units = $row1["units"];
}
//////////////////////////////////////////////////////////////////////////////////////////

//SUBJECT SECTIONS/////////////////////////////////////////////////////////////////
if (isset($_POST['subj_sections'])&&!empty($_POST['subj_sections']))
{
	$subj_sections = $_POST['subj_sections'];
}
else
{
	$subj_sections = $row1["sections"];
}
//////////////////////////////////////////////////////////////////////////////////////////

//SUBJECT SCHEDULE/////////////////////////////////////////////////////////////////

$subj_schedule = "$_POST[days] $_POST[hours_min] $_POST[daynight] to $_POST[hours_max] $_POST[daynight2]";
if($subj_schedule == "M 1:00 AM to 1:00 AM")
{
	$subj_schedule = $row1["schedule"];
}
else //update other schedules that are changed in table:schedules
{
	//row1 schedule is the schedule before update
	$selectsql = "SELECT id FROM schedules WHERE sched = '".$row1["schedule"]
				."' AND subjname= '".$row1["subjcode"]
				."' AND sect= '".$row1["sections"]."'";
	// SELECT sched FROM schedules WHERE sched = 'W 1:00 AM to 1:00 AM' AND subjname = 'BSCOE-ELEC2' AND sect = '5'
	// SELECT * FROM subjects WHERE schedule = 'W 1:00 AM to 1:00 AM' AND subjcode = 'BSCOE-ELEC2' AND sections = '3'
	$resultsql=$conn->query($selectsql);
	$rowsql=$resultsql->fetch_assoc();
	if( $resultsql->num_rows > 0)
	{
		$updatesql = "UPDATE schedules SET sched = '".$subj_schedule.
					"' WHERE id = '".$rowsql["id"]."'";
		if(mysqli_query($conn, $updatesql))
		{
			echo "Records updated successfully.<br>";
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}
	}
}

//////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////
$sql = "UPDATE subjects 
		SET course = '".$subj_course."', subjcode = '".$subj_code."', description = '".$subj_desc
		."', units = '".$subj_units."', sections = '".$subj_sections."', schedule = '".$subj_schedule
		."' WHERE id = '".$subject_id."'";

$_SESSION["subj_id"]= $subject_id;		
if(mysqli_query($conn, $sql)){
    echo "Records updated successfully. Automatically redirect in 3 seconds";
	header('Refresh: 3; URL = edit_subjects.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
 
		
?>