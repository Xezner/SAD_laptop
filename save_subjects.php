<?php
	session_start();
?>

<?php
//SUBJECT COURSE ///////////////////////////////////////////////////////////////////////
if (isset($_POST['subj_course'])&&!empty($_POST['subj_course']))
{
	$subj_course = $_POST['subj_course'];
}
else
{
	header('Refresh: 0; URL = add_subjects.php');
	die('<script type="text/javascript">alert("Please fill out all forms");</script>');
}
//////////////////////////////////////////////////////////////////////////////////////////

//SUBJECT CODE ///////////////////////////////////////////////////////////////////////
if (isset($_POST['subj_code'])&&!empty($_POST['subj_code']))
{
	$subj_code = $_POST['subj_code'];
}
else
{
	header('Refresh: 0; URL = add_subjects.php');
	die('<script type="text/javascript">alert("Please fill out all forms");</script>');
}
//////////////////////////////////////////////////////////////////////////////////////////

//SUBJECT DESC/////////////////////////////////////////////////////////////////////
if (isset($_POST['subj_desc'])&&!empty($_POST['subj_desc']))
{
	$subj_desc = $_POST['subj_desc'];
}
else
{
	header('Refresh: 0; URL = add_subjects.php');
	die('<script type="text/javascript">alert("Please fill out all forms");</script>');
}
//////////////////////////////////////////////////////////////////////////////////////////

//SUBJECT UNITS////////////////////////////////////////////////////////////////////
if (isset($_POST['subj_units'])&&!empty($_POST['subj_units']))
{
	$subj_units = $_POST['subj_units'];
}
else
{
	header('Refresh: 0; URL = add_subjects.php');
	die('<script type="text/javascript">alert("Please fill out all forms");</script>');
}
//////////////////////////////////////////////////////////////////////////////////////////

//SUBJECT SECTIONS/////////////////////////////////////////////////////////////////
if (isset($_POST['subj_sections'])&&!empty($_POST['subj_sections']))
{
	$subj_sections = $_POST['subj_sections'];
}
else
{
	header('Refresh: 0; URL = add_subjects.php');
	die('<script type="text/javascript">alert("Please fill out all forms");</script>');
}
//////////////////////////////////////////////////////////////////////////////////////////

//SUBJECT SCHEDULE/////////////////////////////////////////////////////////////////

$subj_schedule = "$_POST[days] $_POST[hours_min] $_POST[daynight] to $_POST[hours_max] $_POST[daynight2]";

//////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////

$conn = mysqli_connect("localhost", "root", "", "server");

// Check connection
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO subjects (id, course, subjcode, description, units, sections, schedule)
		VALUES ('', '$subj_course', '$subj_code', '$subj_desc', '$subj_units', '$subj_sections', '$subj_schedule')"; 
		
if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully. Automatically redirect in 3 seconds";
	header('Refresh: 3; URL = add_subjects.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
 
		
?>