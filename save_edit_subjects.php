<?php
	session_start();
?>
<?php
	function getSchedID()
	{
		$conn = mysqli_connect("localhost", "root", "", "server");

		// Check connection
		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}
 		$select1 = "SELECT * FROM subjects WHERE id = '".$_SESSION['subject_id']."'";
		$result1=$conn->query($select1);
		$row1=$result1->fetch_assoc();
		$selectsql = "SELECT id FROM schedules WHERE sched = '".$row1["schedule"]
					."' AND subjname= '".$row1["subjcode"]
					."' AND sect= '".$row1["sections"]."'";
		$resultsql=$conn->query($selectsql);
		$rowsql=$resultsql->fetch_assoc();
		if( $resultsql->num_rows > 0)
		{
			$_SESSION["sched_id"] = $rowsql["id"];
		}
		else {}
	}
?>

<?php
	function updateElement($col_name,$col_value)
	{	
		$conn = mysqli_connect("localhost", "root", "", "server");

		// Check connection
		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}
		
		$updatesql = "UPDATE schedules SET ".$col_name." = '".$col_value.
					"' WHERE id = '".$_SESSION["sched_id"]."'";
		if(mysqli_query($conn, $updatesql))
		{
			echo "Schedules updated successfully.<br>";
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}

	}
?>

<?php
//START////START////START////START////START////START////START////START////START////START////START////START////START////START//
getSchedID(); //VALIDATED
$conn = mysqli_connect("localhost", "root", "", "server");

// Check connection
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}
$select1 = "SELECT * FROM subjects WHERE id = '".$_SESSION['subject_id']."'";
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
	updateElement('subjname',$subj_code);
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
	updateElement('subjdesc',$subj_desc);
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
	updateElement('sect',$subj_sections);
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
	echo "No changes made to schedule. <br>";
}
else //update other schedules that are changed in table:schedules
{
	updateElement('sched',$subj_schedule);
}
//////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////
$sql = "UPDATE subjects 
		SET course = '".$subj_course."', subjcode = '".$subj_code."', description = '".$subj_desc
		."', units = '".$subj_units."', sections = '".$subj_sections."', schedule = '".$subj_schedule
		."' WHERE id = '".$_SESSION['subject_id']."'";

if(mysqli_query($conn, $sql)){
    echo "Subjects updated successfully. Automatically redirect in 3 seconds";
	header('Refresh: 3; URL = edit_subjects.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

$_SESSION["sched_id"]='';
// Close connection
mysqli_close($conn);
 
		
?>