<?php
	include_once('index_logged.php');	
	include_once('payroll_rates.php');
	if($_SESSION["admin"])
	{
		header('Refresh: 0 ; URL = payroll_admin.php');
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
		@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
	
	#butt {
		font-family: 'Montserrat', sans-serif;
		border-radius: 20px;
		border: 1px solid #000000;
		background: linear-gradient(to right, #0089C0, #002867);
		background-color: #FF4B2B;
		color: #FFFFFF;
		font-size: 12px;
		font-weight: bold;
		padding: 12px 45px;
		letter-spacing: 1px;
		text-transform: uppercase;
		transition: transform 80ms ease-in;
		margin: 1px;
	}
	div
	{
		text-align:center;
        position:relative;
	}
	*
	{
		font-family: 'Montserrat', sans-serif;
	}
	</style>
	<body>
<hr>
<div>
<form name="copy" action="payroll_get.php" method="POST">
	<input id="butt" type="submit" value="Get a copy of your payroll">
</form>
</div>
</body>
</html>