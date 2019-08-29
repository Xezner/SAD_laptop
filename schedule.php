<?php
	include_once('index_logged.php');
	if ($_SESSION["admin"]==1)
	{
		header('Refresh: 0; URL = schedule_admin.php');
		die();
	}
	$_SESSION["sched_id"]='';
?>


<br>
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
else { 
	echo "<tr><td>" . "NA" . "</td><td>" .  "NA"  . "</td><td>"
	.  "NA"  . "</td><td>" .  "NA" . "</td><td>" .  "NA" . "</td><td>"  
	.  "NA"  . "</td></tr>";
	
	echo "</table>";
 }
$conn->close();
?>
</table>
</body>
</html>


<!DOCTYPE html>
<html>
<head></head>

<body>
<br>
	<h3><a href='display_subjects.php'> View all subjects </a></h3>
	<br>
	<form name="back" action="home.php" method="POST">
		<input id="butt" type="submit" value="Back">
	</form>
	
</body>
</html>


