<?php
	include("index_logged.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
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
<h2> NOW EDITING </h2>
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

if (isset($_POST['subject_id'])&&!empty($_POST['subject_id']))
{
	$subject_id = $_POST['subject_id'];
	$_SESSION['subject_id'] = $subject_id;
}
$conn = mysqli_connect("localhost", "root", "", "server");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM subjects WHERE id = '".$_SESSION['subject_id']."'";
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
</body>
</html>

<!DOCTYPE html>
<html>
	<head>
	<h4> Now editing Subject ID: <?php echo $_SESSION['subject_id'] ?> </h4>
	</head>

	<body>
		<form name="register" action="save_edit_subjects.php" method="POST">
			<?php
			echo '<input type="hidden" name=subject_id value='.$_SESSION['subject_id'].'>';
			?>
			<br>Course: <input type="text" name="subj_course"/> <br> <br>
			<br>Subject Code: <input type="text" name="subj_code"/> <br> <br>
			<br>Description: <input type="text" name="subj_desc"/> <br> <br>
			<br>Units: <input type="text" name="subj_units"/> <br> <br>
			<br>Sections: <input type="text" name="subj_sections"/> <br> <br>
			<br>*Schedule: 
				<select name="days">
					<option value="M">M</option>
					<option value="T">T</option>
					<option value="W">W</option>
					<option value="TH">TH</option>
					<option value="F">F</option>
					<option value="S">S</option>
				</select>
				
				<select name="hours_min">
					<option value="1:00">1:00</option>
					<option value="1:30">1:30</option>
					<option value="2:00">2:00</option>
					<option value="2:30">2:30</option>
					<option value="3:00">3:00</option>
					<option value="3:30">3:30</option>
					<option value="4:00">4:00</option>
					<option value="4:30">4:30</option>
					<option value="5:00">5:00</option>
					<option value="5:30">5:30</option>
					<option value="6:00">6:00</option>
					<option value="6:30">6:30</option>
					<option value="7:00">7:00</option>
					<option value="7:30">7:30</option>
					<option value="8:00">8:00</option>
					<option value="8:30">8:30</option>
					<option value="9:00">9:00</option>
					<option value="9:30">9:30</option>
					<option value="10:00">10:00</option>
					<option value="10:30">10:30</option>
					<option value="11:00">11:00</option>
					<option value="11:30">11:30</option>
					<option value="12:00">12:00</option>
					<option value="12:30">12:30</option>
				</select>
				<select name="daynight">
					<option value="AM">AM</option>
					<option value="PM">PM</option>
				</select>
				to
				<select name="hours_max">
					<option value="1:00">1:00</option>
					<option value="1:30">1:30</option>
					<option value="2:00">2:00</option>
					<option value="2:30">2:30</option>
					<option value="3:00">3:00</option>
					<option value="3:30">3:30</option>
					<option value="4:00">4:00</option>
					<option value="4:30">4:30</option>
					<option value="5:00">5:00</option>
					<option value="5:30">5:30</option>
					<option value="6:00">6:00</option>
					<option value="6:30">6:30</option>
					<option value="7:00">7:00</option>
					<option value="7:30">7:30</option>
					<option value="8:00">8:00</option>
					<option value="8:30">8:30</option>
					<option value="9:00">9:00</option>
					<option value="9:30">9:30</option>
					<option value="10:00">10:00</option>
					<option value="10:30">10:30</option>
					<option value="11:00">11:00</option>
					<option value="11:30">11:30</option>
					<option value="12:00">12:00</option>
					<option value="12:30">12:30</option>
				</select>
				<select name="daynight2">
					<option value="AM">AM</option>
					<option value="PM">PM</option>
				</select>				
				<br><br>
			<p> *set schedule to 'M 1:00 AM to 1:00 AM' to not make any changes on schedule. </p>
			<p> ** leave form blank to not make changes </p>
			<input id="butt" type="submit" value="Edit">
		</form>
		<form name="back" action="display_subjects.php">
			<input id = "butt" type="submit" value="Back">
		</form>
	</body>

</html>