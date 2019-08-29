<?php
	include_once('index_logged.php');
?>
<hr>
<html>
<style>
</style>
<body>
<form name="login" action="payroll_change.php" method="POST">
			<br>Salary Rate: <input type="text" name="rate" class="form-control" required /> <br> <br>
			<input id="butt" type="submit" value="Change payroll properties">
</form>
<form name="back" action="payroll_admin.php">
	<input id="butt" type="submit" value="Back">
</form>
</body>
</html>