<?php
	include_once('index_logged.php');
	if ($_SESSION["admin"]==1)
	{
		header('Refresh: 0; URL=profile_admin.php');
	}
?>

<!DOCTYPE html>
<br>
<html>
<head>
<title>My Profile</title>
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
$sql = "SELECT fullname, email, contact FROM users WHERE username = '".$_SESSION['username']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["fullname"]. "</td><td>" . $row["email"]. "</td><td>"  
. $row["contact"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
<br>
<h3><a href="edit.php"> Edit </a><h3>
</body>
</html>

