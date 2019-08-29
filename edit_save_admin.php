<?php
	session_start();
?>

<?php
if (isset($_POST['user_name'])&&!empty($_POST['user_name']))
{
	$user_name = $_POST['user_name'];
}


$conn = mysqli_connect("localhost", "root", "", "server");

// Check connection
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}
$select1 = "SELECT * FROM users WHERE fullname = '".$user_name."'";
$result1=$conn->query($select1);
$row1=$result1->fetch_assoc();
//pass_word////////////////////////////////////////////////////////////////////

if (isset($_POST['pass_word'])&&!empty($_POST['pass_word']))
{
	$pass_word = $_POST['pass_word'];
}
else
{
	$pass_word = $row1["password"];
}

//full_name////////////////////////////////////////////////////////////////////

if (isset($_POST['full_name'])&&!empty($_POST['full_name']))
{
	$full_name = $_POST['full_name'];
}
else
{
	$full_name = $row1["fullname"];
}

//e_mail////////////////////////////////////////////////////////////////////

if (isset($_POST['e_mail'])&&!empty($_POST['e_mail']))
{
	$foo = $_POST['e_mail'];
	$e_mail = (string)$foo;
}
else
{
	$e_mail = $row1["email"];
}

//contact_num////////////////////////////////////////////////////////////////////

if (isset($_POST['contact_num'])&&!empty($_POST['contact_num']))
{
	$contact_num = $_POST['contact_num'];
}
else
{
	$contact_num = $row1["contact"];
}

if (isset($_POST['admin_user'])&&!empty($_POST['admin_user']))
{
	$admin_user = $_POST['admin_user'];
}
else
{
	$admin_user = '';
}

if($full_name!=$_SESSION["fullname"])
{
	$schedsql = "UPDATE schedules SET profname = '".$full_name."' WHERE profname = '".$_SESSION["fullname"]."'";
	if(mysqli_query($conn, $schedsql)){
		echo "Schedules' name updated successfully. Automatically redirect in 3 seconds <br>";
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}
}

$sql = "UPDATE users SET password = '".$pass_word."', fullname = '".$full_name
		."', email = '".$e_mail."', contact = '".$contact_num."', admin = '".$admin_user
		."' WHERE fullname = '".$user_name."'";
		
if(mysqli_query($conn, $sql)){
    echo "Records updated successfully. Automatically redirect in 3 seconds";
	header('Refresh: 3; URL = profile_admin.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
$_SESSION["fullname"] = '';
// Close connection
mysqli_close($conn);
		
?>