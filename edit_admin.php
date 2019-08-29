<?php
	include("index_logged.php");
?>

<?php
if (isset($_POST['full_name_2'])&&!empty($_POST['full_name_2']))
{
	$edit_fullname = $_POST['full_name_2'];
	$_SESSION["fullname"] = $edit_fullname;
}
?>

<!DOCTYPE html>
<html>
	<head><br>
		<h1> EDIT </h1>
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
</style>	
	</head>
	<br>
	<body>
		<?php
		echo 'Now editing user: '.$edit_fullname;
		?>
		<form name="register" action="edit_save_admin.php" method="POST">
			<br>New Password: <input type="password" name="pass_word"/> <br> <br>
			<br>Full Name: <input type="text" name="full_name"/> <br> <br>
			<br>Email: <input type="text" name="e_mail"/> <br> <br>
			<br>Contact: <input type="text" name="contact_num"/> <br> <br>
			<br>*Admin: <input type="text" name="admin_user" /> <br> <br>
			<?php
			echo '<input type="hidden" name="user_name" value="'.$edit_fullname.'">';
			?>
			<p> *Add 0 for non-admin, 1 for admin </p>
			<p> ** leave form blank to not make changes </p>
			<br>
			<input id="butt" type="submit" value="Save profile">
		</form>
	</body>

</html>




