<?php
	include_once('index_logged.php');
	$_SESSION["sched_id"]='';
	$_SESSION["edit_id"]='';
?>
<br>
<?php
if (isset($_POST['edit_user'])&&!empty($_POST['edit_user']))
{
	echo "Now viewing: ";
	echo $edit_user = $_POST['edit_user'];
	echo "'s schedule <br>";
	$_SESSION["fullname"] = $edit_user;
}
?>
<br>
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
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
color: #001167;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #001167;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<h2> SCHEDULE </h2>
<br>
<table>
<tr>
<th>Id</th>
<th>Professor</th>
<th>Subject Code</th>
<th>Description</th>
<th>Sections</th>
<th>Schedule</th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "server");
// Check connection
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM schedules WHERE profname = '".$_SESSION["fullname"]."' ORDER BY sched, sect, subjname";
$result= $conn->query($sql);
if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
	echo "<tr><td>" . $row["id"]. "</td><td>" . $row["profname"] . "</td><td>"
	. $row["subjname"] . "</td><td>" . $row["subjdesc"]. "</td><td>" . $row["sect"]. "</td><td>"  
	. $row["sched"] . "</td></tr>";
	}
	echo "</table>";
} 
else 
{ 
	echo "No schedule yet";
	$n_a = "NA";
	echo "<tr><td>" . $n_a. "</td><td>" . $n_a . "</td><td>"
	. $n_a . "</td><td>" . $n_a. "</td><td>" . $n_a. "</td><td>"  
	. $n_a . "</td></tr>";
	echo "</table>";
}
$conn->close();
?>
</body>
</html>


<?php //ALL SCHEDULES AVAILABLE
	$conn = mysqli_connect("localhost", "root", "", "server");
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	$getsql = "SELECT id, subjcode, description, sections, schedule FROM subjects ORDER BY subjcode, sections, schedule";
	$getresult= $conn->query($getsql);
?>

<?php //USER'S SCHEDULES
	$usersql = "SELECT id FROM schedules WHERE profname = '".$_SESSION["fullname"]."'";
	$user_result = $conn->query($usersql);

?>



<!DOCTYPE html>
<html>
	<head>
	<br>
		<h2> EDIT SCHEDULE </h2>
		<br>
	</head>

	<body>
		<form name="register" action="edit_save_schedule.php" method="POST">
			Change Schedule ID:
				<select name="edit_schedule">
				<?php
					while($userrow = $user_result->fetch_assoc())
					{
		
						$id_sched = $userrow['id'];
						echo "<option value='$id_sched'>$id_sched </option> ";						
					}
				?>
				</select>
			<br>  <br>
			To Subject Schedule:
				<select name= "subjects">
					<option value='none'>-</option>
				<?php
					while($getrow = $getresult->fetch_assoc())
					{
						//$whole_name = "Subject: $getrow['subjcode'] $getrow['description'] Section: $getrow['section']";
						$whole_name = 'ID: '.$getrow['id'].' | Subject: '.$getrow['subjcode'].' - '.$getrow['description'].' | Section: '. $getrow['sections'].' | Schedule: '.$getrow['schedule'];
						echo "<option value='$whole_name'>$whole_name </option> ";						
					}
				?>
				</select>
			<br><br>
			<input id="butt" type="submit" value="Edit Schedule">
		</form>
		
		<form name="back" action="schedule.php">
			<input id="butt" type="submit" value="Back">
		</form>
	</body>

</html>