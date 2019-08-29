<?php
	session_start();
?>

<?php
$conn = mysqli_connect("localhost", "root", "", "server");

// Check connection
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}
//convert all to small caps except pass_words
//user_name ////////////////////////////////////////////////////////////////////

if (isset($_POST['user_name'])&&!empty($_POST['user_name']))
{
	$user_name = strtolower($_POST['user_name']);
	$select = "SELECT username FROM USERS WHERE username = '".$user_name."'";
	$result=$conn->query($select);
	$row=$result->fetch_assoc();
	if( $result->num_rows > 0)
	{
		header('Refresh: 0; URL = index.php');
		die('<script type="text/javascript"> alert("Username already taken")</script>');
	}
}
else
{
	header('Refresh: 0; URL = index.php');
	die('<script type="text/javascript"> alert("Please fill out all the forms")</script>');
}

//pass_word////////////////////////////////////////////////////////////////////

if (isset($_POST['pass_word'])&&!empty($_POST['pass_word']))
{
	$pass_word = $_POST['pass_word'];
}
else
{
	header('Refresh: 0; URL = index.php');
	die('<script type="text/javascript"> alert("Please fill out all the forms")</script>');
}

//full_name////////////////////////////////////////////////////////////////////

if (isset($_POST['full_name'])&&!empty($_POST['full_name']))
{
	$full_name = $_POST['full_name'];
}
else
{
	header('Refresh: 0; URL = index.php');
	die('<script type="text/javascript"> alert("Please fill out all the forms")</script>');
}

//e_mail////////////////////////////////////////////////////////////////////

if (isset($_POST['e_mail'])&&!empty($_POST['e_mail']))
{
	$foo = $_POST['e_mail'];
	$e_mail = (string)$foo;
}
else
{
	header('Refresh: 0; URL = index.php');
	die('<script type="text/javascript"> alert("Please fill out all the forms")</script>');
}

//contact_num////////////////////////////////////////////////////////////////////

if (isset($_POST['contact_num'])&&!empty($_POST['contact_num']))
{
	$contact_num = $_POST['contact_num'];
}
else
{
	header('Refresh: 0; URL = index.php');
	die('<script type="text/javascript"> alert("Please fill out all the forms")</script>');
}

$select1 = "SELECT fullname FROM users WHERE fullname = '".$full_name."'";
$result1=$conn->query($select1);
$row1=$result1->fetch_assoc();
if($result1->num_rows > 0)
{
	echo "<script type='text/javascript'>alert('Name Already Exists.');</script>";
	header('Refresh: 0; URL = index.php');
	die();
}


$sql = "INSERT INTO users (id, username, password, fullname, email, contact) 
		VALUES ('', '$user_name', '$pass_word', '$full_name', '$e_mail', '$contact_num')"; 
		
if(mysqli_query($conn, $sql)){
    echo "<script type='text/javascript'>alert('Records inserted successfully. Automatically redirect in 3 seconds');</script>";
	header('Refresh: 0; URL = index.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
		
?>