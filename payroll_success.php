<?php
	include_once('index_logged.php');	
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
	h1
	{
		text-align:center;
	}
	</style>
	<body>
	<br><br>
	<h1> Emails successfully sent! </h1>
	<br><br>
<div>
<form name="copy" action="payroll.php" method="POST">
	<input id="butt" type="submit" value="Ok">
</form>
</div>
</body>
</html>