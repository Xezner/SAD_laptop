<?php
	include("index_logged.php");
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
<table>
<tr>
<th>Id</th>
<th>Username</th>
<th>Password</th>
<th>Fullname</th>
<th>Email</th>
<th>Contact</th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "server");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, username, password, fullname, email, contact FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"] . "</td><td>"
. $row["password"] . "</td><td>" . $row["fullname"]. "</td><td>" . $row["email"]. "</td><td>"  
. $row["contact"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'server');
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}
$sqlSet = "SELECT fullname FROM users";
$resultSet = $conn->query($sqlSet);
$resultSet2 = $conn->query($sqlSet);
?>
<h3>Select user to edit:
<form name="full names" action="edit_admin.php" method="POST">
<select name="full_name_2" >
<?php
while($rows = $resultSet->fetch_assoc())
{
	$edit_name = $rows['fullname'];
	echo "<option value='$edit_name'>$edit_name</option>";
}
?>
<input id="butt" type="submit" value="Edit">
</select>
</form>
</h3>
<br>
<h3>Select user to delete:
<form name="full names" action="delete_users.php" method="POST">
<select name="full_name" >
<?php
while($rows2 = $resultSet2->fetch_assoc())
{
	$edit_name = $rows2['fullname'];
	echo "<option value='$edit_name'>$edit_name</option>";
}
?>
<input id="butt" type="submit" value="Delete">
</select>
</form>
</h3>








</body>
</html>



















