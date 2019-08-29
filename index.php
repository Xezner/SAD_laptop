<?php
	session_start();
	$_SESSION["username"]='';
	if($_SESSION["username"])
	{
		header('Refresh: 0;URL = index_logged.php');	
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      * {
        margin: 0;
        padding: 0;
      }
	  img 
	  {
		width: 150px;
	  }
    </style>
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Pamantasan ng Lungsod ng Marikina | Faculty EIS</title>
  </head>
  <body>
    <div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="register.php" method="POST">
			<h1>Create Account</h1>
			<input type="text" name="user_name" placeholder="Username" class="form-control" required />
			<input type="password" name="pass_word" placeholder="Password" class="form-control" required />
			<input type="text" name="full_name" placeholder="Full Name" class="form-control" required />
			<input type="email" name="e_mail" placeholder="Email" class="form-control" required />
			<input type="tel" name="contact_num" placeholder="Contact Number" class="form-control" required />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="login.php" method="POST">
			<h1>Sign in</h1>
			<input type="text" name="user_name" placeholder="Username" class="form-control" required />
			<input type="password" name="pass_word" placeholder="Password" class="form-control" required />
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Faculty Registration</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1><img src="logo-plmar.png" /></h1>
				<p id="PLMAR-text">Pamantasan ng Lungsod ng Marikina</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
  <script>
  const signUpButton = document.getElementById('signUp');
  const signInButton = document.getElementById('signIn');
  const container = document.getElementById('container');

  signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
  });

  signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
  });
  </script>
  </body>
</html>