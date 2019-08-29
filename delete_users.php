<?php
	include("index_logged.php");
?>

<?php
if (isset($_POST['full_name'])&&!empty($_POST['full_name']))
{
	$edit_fullname = $_POST['full_name'];
}
$conn = mysqli_connect("localhost", "root", "", "server");

// Check connection
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username FROM users WHERE fullname = '".$edit_fullname."'";
$result=$conn->query($sql);
$row1=$result->fetch_assoc();
$delete_name = $edit_fullname;
$delete_user = $row1['username'];
// profname for schedules
// username for dtr
// username for users


$sql1 = "DELETE from schedules WHERE profname = '".$delete_name."'";
$sql2 = "DELETE from dtr WHERE username = '".$delete_user."'";
$sql3 = "DELETE from users WHERE username = '".$delete_user."'";
mysqli_query($conn, $sql1);
mysqli_query($conn, $sql2);
mysqli_query($conn, $sql3);
header('Refresh: 0; URL = display_users.php');
die("<script type='text/javascript'>alert('User deletion successfull.');</script>");
?>





