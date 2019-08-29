<?php
	include_once('index_logged.php');
?>

<?php
if (isset($_POST['fullname_dtr'])&&!empty($_POST['fullname_dtr']))
{
	echo "Now editing: ";
	echo $fullname_dtr = $_POST['fullname_dtr'];
	echo "'s DTR <br>";
	$_SESSION["fullname"] = $fullname_dtr;
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #621430;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #621430;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<br>
<table>
<tr>
<th>ID </th>
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

$sql = "SELECT username FROM users WHERE fullname= '".$_SESSION["fullname"]."'";
$result= $conn->query($sql);
$row = $result->fetch_assoc();
$username = $row['username'];

$sql = "SELECT id, date_in, time_in, time_out, work_hrs FROM dtr WHERE name = '".$username
	    ."' ORDER BY date_in, time_in DESC";
$result= $conn->query($sql);
$result1= $conn->query($sql);
if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
	echo "<tr><td>" . $row["id"]. "</td><td>" . $row["date_in"]. "</td><td>" . $row["time_in"] . "</td><td>"
	. $row["time_out"] . "</td><td>" . $row["work_hrs"] . "</td></tr>";

	}
	echo "</table>";
} 
else { echo "0 results"; }


?>
</table>
</body>
</html>



<html>
	<form name="dtr" action="edit_save_dtr.php" method="POST">
		<br><br>
		Edit Schedule: 
			<select name= "fullname_dtr">
			<?php
				while($row = $result1->fetch_assoc())
				{
					$fullname_dtr = $row['id'];
					echo "<option value='$fullname_dtr'>$fullname_dtr </option> ";	
				}
			?>
			</select>
		<input type="submit" value="Go">
	</form>
</html>


<?php
	$conn->close();
?>












