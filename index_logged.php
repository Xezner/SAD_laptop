<?php
	session_start();
	if(!$_SESSION["username"])
	{
		echo "<script type='text/javascript'>alert('Not logged in.')</script>";
		header('Refresh: 0; URL=index.php');
		die();
	}
	echo '<div id="abc1">User <strong>'.$_SESSION["username"].'</strong> logged in. </div>';
?>
<html>
  <head>
    <style>
	@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800'); 
      * {
        margin: 0;
        padding: 0;
      }
      img {
        width: 30px;
        margin: 0 5px -3.5px 0;
      }
      #navbar-container {
        display: grid;
        grid-template-columns: 2% 18% 23% 17% 23% 17%;
        background-color: #002867;
        padding: 20px 0 20px 0;
      }
      #navbar_id {
        text-decoration: none;
        font-family: 'Montserrat', sans-serif;
        font-size: 25px;
        color: white;
        text-transform: uppercase
      }
      #navbar_id:active {
        color: #0089C0;
      }
	  #abc2
	  {
        font-family: 'Montserrat', sans-serif;
		position: fixed;
		bottom: 0;
		right: 0;
		margin: 5px;
		z-index: 100;
	  }
	  #abc1
	  {
        font-family: 'Montserrat', sans-serif;
		position: fixed;
		bottom: 20px;
		right: 0;
		margin: 5px;
		z-index: 100;
	  }
		*
		{
		font-family: 'Montserrat', sans-serif;
		}
		#butt 
		{
		width: auto;
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
		#navbar_id {
		  text-decoration: none;
		  font-family: 'Montserrat', sans-serif;
		  font-size: 25px;
		  color: white;
		  text-transform: uppercase
		  border: 5px solid #ccc;
		float: left;
		margin: 15px;
		-webkit-transition: margin 0.5s ease-out;
		-moz-transition: margin 0.5s ease-out;
		-o-transition: margin 0.5s ease-out;
		}
		#navbar_id:active {
		  color: #0089C0;
		}
		#navbar_id:hover {
		margin-top: 2px;	
		}
		input
		{
			width: 20%;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
			background-color: #f6f6f6;
			background-position: 10px 10px; 
			background-repeat: no-repeat;
			padding: 10px 25px 10px 20px;
			-webkit-transition: width 0.4s ease-in-out;
			transition: width 0.4s ease-in-out;
			border-top: none;
			border-left: none;
			border-right: 1px solid #002867;
			border-bottom: 2px solid #002867;
		}
		input:focus 
		{
			width: 25%;
		}	
		select
		{
			font-size: 16px;
			border-top: none;
			border-left: none;
			padding: 5px 15px 5px 10px;
			border-right: 1px solid #002867;
			border-bottom: 2px solid #002867;
		}	
		a
		{
			text-decoration: none;
			color: #002867;	
		}
		a:visited
		{
			color: #002867;
		}		
    </style>
    <title>Pamantasan ng Lungsod ng Marikina | Faculty</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
  </head>
  <body>
    <div id="navbar-container">
      <div></div>
      <div>
        <a id = "navbar_id" href="home.php">
        <img src="images/home.png" alt="Home Icon">
        Home</a>
      </div>
      <div>
        <a id = "navbar_id" href="profile.php">
          <img src="images/Profile%20Icon.png" alt="Profile Icon">
          Profile</a>
      </div>
      <div>
        <a id = "navbar_id" href="dtr.php">
          <img src="images/DTR%20Icon.png" alt="DTR Icon">
          DTR</a>
      </div>
      <div>
        <a id = "navbar_id" href="schedule.php">
          <img src="images/Schedule%20Icon.png" alt="Schedule Icon">
          Schedule</a>
      </div>
      <div>
        <a id = "navbar_id" href="payroll.php">
          <img src="images/Payslip%20Icon.png" alt="Payroll Icon">
          Payroll</a>
      </div>
    </div>
	<div id="abc2"><a id="logout" href="logout.php"><strong> LOGOUT </strong></a></div>
  </body>

</html>
