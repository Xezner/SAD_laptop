<?php
	include("index_logged.php");
?>
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
<br>
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
if (isset($_POST['select_user'])&&!empty($_POST['select_user']))
{
	echo "Now viewing: ";
	echo $sched_user = $_POST['select_user'];
	echo "'s schedule <br>";
}
?>
<br>
<?php
$conn = mysqli_connect("localhost", "root", "", "server");
// Check connection
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}
if($sched_user == "Everyone")
{
	$sqlall = "SELECT id, profname, subjname, subjdesc, sect, sched FROM schedules ORDER BY profname, sched, sect, subjname";
	$resultall = $conn->query($sqlall);
	if ($resultall->num_rows >0)
	{
		while($rowall = $resultall->fetch_assoc()) 
		{
		echo "<tr><td>" . $rowall["id"]. "</td><td>" . $rowall["profname"] . "</td><td>"
		. $rowall["subjname"] . "</td><td>" . $rowall["subjdesc"]. "</td><td>" . $rowall["sect"]. "</td><td>"  
		. $rowall["sched"] . "</td></tr>";
		}
		echo "</table>";
	} 
	else { echo "0 results"; }	
}
else
{
	$sql = "SELECT id, profname, subjname, subjdesc, sect, sched FROM schedules WHERE profname = '".$sched_user."' ORDER BY sched, sect, subjname";
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
	
	echo "</table>"; }


}
$conn->close();

?>

</table>
<br>
<form name="back" action="schedule.php" method="POST">
		<input id="butt" type="submit" value="Back">
</form>
</body>
</html>

