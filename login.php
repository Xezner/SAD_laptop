<?php
	session_start();
?>


<?php
if (isset($_POST['user_name'])&&!empty($_POST['user_name']))
{
	$username_login = strtolower($_POST['user_name']);
}
else
{
	header('Refresh: 0; URL = index.php');
	die('<script type="text/javascript">alert("Please fill out all forms");</script>');
	
}

if (isset($_POST['pass_word'])&&!empty($_POST['pass_word']))
{
	$password_login = $_POST['pass_word'];
}
else
{
	header('Refresh: 0; URL = index.php');
	die('<script type="text/javascript">alert("Please fill out all forms");</script>');
	
}

$password_real = '';

$conn = mysqli_connect("localhost", "root", "", "server");

// Check connection
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}


$select1 = "SELECT username, password FROM users WHERE username = '".$username_login."' AND password = '".$password_login."'";
$result1=$conn->query($select1);
$row1=$result1->fetch_assoc();
if( $result1->num_rows > 0)
{
	$_SESSION["username"] = $username_login;
	$password_real = $row1['password'];

}

$select2 = "SELECT admin FROM USERS WHERE username = '".$username_login."'";
$result2=$conn->query($select2);
$row2=$result2->fetch_assoc();
if($row2["admin"]==1)
{
	$_SESSION["admin"] = 1;
}
else
{
	$_SESSION["admin"] = 0;
}
		
		
if(!$_SESSION["username"])
{
	echo "<script type='text/javascript'>alert('Wrong username or password.')</script>";
	header('Refresh: 0; URL = index.php');
	die();
}		
else
{
	if($password_real==$password_login)
	{
		header('Refresh: 0; URL = home.php');
	}
	else
	{
		echo "<script type='text/javascript'>alert('Wrong username or password.')</script>";
		header('Refresh: 0; URL = index.php');
		die();
	}
}
if($_SESSION["admin"]==1)
{
	die('<script type="text/javascript"> alert("Successful login : ADMIN USER")</script>');	
}
else
{
	die('<script type="text/javascript"> alert("Successful login")</script>');	
}
		
		
		
		
?>