<?php
	include_once('index_logged.php');
	include_once('get_active_status.php');
	include_once('dtr_work_hours.php');
?>
<hr>

<!DOCTYPE html>
<html>
<head>
	<style>
	@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
	
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
	
	*
	{
		font-family: 'Montserrat', sans-serif;
	}
	#inactive
	{
		font-size: 20px;
		font-weight:bold;
		color: red;
	}
	#active
	{
		font-size: 20px;
		font-weight:bold;
		color: green;
	}
	</style>
<body>
<form name="time_status" action="dtr_getdate.php">
	<?php
		echo "<br>Time In Status: ";

		if(!$_SESSION["timed_in"])
		{
			echo "<div id='inactive'><p> INACTIVE</p></div>";
			echo '<input id="butt" type="submit" value="Time In">';
		}
		else if($_SESSION["timed_in"])
		{
			echo "<div id='active'> ACTIVE </div>";
			echo '<input id="butt" type="submit" value="Time Out">';
		}
	?>
</form>
</head>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #002678;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #002678;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<br>
<h2> My Daily Time Record </h2>
<br>
<table>
<tr>
<th>Date</th>
<th>Time In</th>
<th>Time Out</th>
<th>Work Hours</th>
</tr>


<?php
$conn = mysqli_connect("localhost", "root", "", "server");
// Check connection
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}

// GET FULL NAME
$sql = "SELECT fullname FROM users WHERE username = '".$_SESSION["username"]."'";
$result= $conn->query($sql);
$row = $result->fetch_assoc();
$_SESSION["fullname"] = $row['fullname'];
// 

$sql = "SELECT date_in, time_in, time_out, work_hrs FROM dtr WHERE name = '".$_SESSION["username"]
	    ."' ORDER BY date_in, time_in DESC";
$result= $conn->query($sql);
if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
	echo "<tr><td>" . $row["date_in"]. "</td><td>" . $row["time_in"] . "</td><td>"
	. $row["time_out"] . "</td><td>" . $row["work_hrs"] . "</td></tr>";

	}
	echo "</table>";
} 
else { echo "0 results"; }

$conn->close();

?>
</table>
</body>
</html>

<hr>

<?php
if($_SESSION["admin"])
{
	$conn = mysqli_connect("localhost", "root", "", "server");
	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}

	// GET FULL NAME
	$sql = "SELECT fullname FROM users";
	$result= $conn->query($sql);
}
?>

<html>
<style>
	@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
	
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
	*
	{
		font-family: 'Montserrat', sans-serif;
	}
</style>
	<form name="dtr" action="edit_dtr.php" method="POST">
		<br><br>
		Edit DTR: 
			<select name= "fullname_dtr">
			<?php
				while($row = $result->fetch_assoc())
				{
					$fullname_dtr = $row['fullname'];
					echo "<option value='$fullname_dtr'>$fullname_dtr </option> ";	
				}
			?>
			</select>
		<input id="butt" type="submit" value="Go">
	</form>
</html>



<?php
	$conn->close();
?>