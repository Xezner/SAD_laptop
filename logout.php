<?php
	session_start();

	session_destroy();
	
	header('Refresh: 1; URL = index.php');
	die('<script type="text/javascript"> alert("Logging Out. Redirecting in 1 Second.")</script>');	
?>