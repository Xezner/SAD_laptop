<?php
	include("index_logged.php");
	$_SESSION["subject_id"]='';
?>


<!DOCTYPE html>
<html>
<head>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
	*
	{
		font-family: 'Montserrat', sans-serif;
	}
	#butt 
	{
		font-family: 'Montserrat', sans-serif;
		border-radius: 20px;
		border: 1px solid #000000;
		background: linear-gradient(to right, #0089C0, #002867);
		background-color: #FF4B2B;
		color: #FFFFFF;
		font-size: 12px;
		font-weight: bold;
		padding: 10px 15px;
		letter-spacing: 1px;
		text-transform: uppercase;
		transition: transform 80ms ease-in;
		margin: 5px;
	}
table {
border-collapse: collapse;
width: 100%;
color: #002867;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #002867;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<br>
<h2> SECTION OFFERING </h2><br>
<table>
<tr>
<th>Id</th>
<th>Course</th>
<th>Subject Code</th>
<th>Description</th>
<th>Units</th>
<th>Sections</th>
<th>Schedule</th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "server");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, course, subjcode, description, units, sections, schedule FROM subjects ORDER BY course, sections, description, schedule";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["course"] . "</td><td>"
. $row["subjcode"] . "</td><td>" . $row["description"]. "</td><td>" . $row["units"]. "</td><td>"  
. $row["sections"] . "</td><td>" . $row["schedule"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();

if($_SESSION['admin']==0)
{
	die();
}

?>
</table>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'server');
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}
$sqlSet = "SELECT id FROM subjects";
$resultSet = $conn->query($sqlSet);
?>
<br>
<form name="subject ids" action="edit_subjects.php" method="POST">
ID number: <select name="subject_id" >
<?php
while($rows = $resultSet->fetch_assoc())
{
	$edit_name = $rows['id'];
	echo "<option value='$edit_name'>$edit_name </option> ";
}
?>
<input id="butt" type="submit" value="Edit">
</select>
</form>
</h3>

<form name="subject_add" action="add_subjects.php" method="POST">
	<input id="butt" type="submit" value="Add Subject">
</form>


</body>
</html>



















