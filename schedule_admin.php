<?php
	include_once('index_logged.php');
	$_SESSION["sched_id"]='';
	$_SESSION["fullname"] = '';
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

$select = "SELECT fullname FROM users WHERE username = '".$_SESSION["username"]."'";
$select_result = $conn->query($select);
$select_row = $select_result->fetch_assoc();
$sched_user = $select_row["fullname"];


$sql = "SELECT * FROM schedules WHERE profname = '".$sched_user."' ORDER BY sched, sect, subjname";
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
else { echo "<tr><td>" . "NA" . "</td><td>" .  "NA"  . "</td><td>"
	.  "NA"  . "</td><td>" .  "NA" . "</td><td>" .  "NA" . "</td><td>"  
	.  "NA"  . "</td></tr>";
	
	echo "</table>";
	}
$conn->close();
?>

</table>
</body>
</html>


<?php
$conn = mysqli_connect('localhost', 'root', '', 'server');
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}
$sqlSet = "SELECT fullname FROM users";
$resultSet1 = $conn->query($sqlSet);
$resultSet2 = $conn->query($sqlSet);
$resultSet3 = $conn->query($sqlSet);
?>




<!DOCTYPE html>
<html>
<head></head>

<body>
<br>
	<h3><a href='display_subjects.php'> View all subjects </a></h3>	 <br>
	<h3>View user schedule: 
		<form name="user_schedules" action="display_schedule.php" method="POST">
			<select name="select_user">
			
				<option value="Everyone" >ALL</option>
				<?php
				while($rows1 = $resultSet1->fetch_assoc())
				{
					$view_name = $rows1['fullname'];
					echo "<option value='$view_name'>$view_name</option>";
				}
				?>
			</select>
			<input id="butt" type="submit" value="Go!">
		</form>
	</h3>
	
	<h3>Add user schedule: 
		<form name="user_schedules2" action="add_schedule.php" method="POST">
			<select name="add_user">
				<?php
				while($rows2 = $resultSet2->fetch_assoc())
				{
					$add_name = $rows2['fullname'];
					echo "<option value='$add_name'>$add_name</option>";
				}
				?>
			</select>
			<input id="butt"type="submit" value="Go!">
		</form>
	</h3>
	<h3>Edit user schedule: 
		<form name="user_schedules3" action="edit_schedule.php" method="POST">
			<select name="edit_user">
				<?php
				while($rows3 = $resultSet3->fetch_assoc())
				{
					$edit_name = $rows3['fullname'];
					echo "<option value='$edit_name'>$edit_name</option>";
				}
				?>
			</select>
			<input id="butt" type="submit" value="Go!">
		</form>
		<form name="back" action="home.php" method="POST">
			<input id="butt" type="submit" value="Back">
		</form>
	</h3>
</body>
</html>


