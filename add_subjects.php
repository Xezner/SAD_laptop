<?php
	include("index_logged.php");
?>

<!DOCTYPE html>
<html>
<style>



</style>
	<head>
		<h2> ADD SUBJECTS </h2>
	</head>

	<body>
		<form name="register" action="save_subjects.php" method="POST">
			<br>Course: <input type="text" name="subj_course"/> <br> <br>
			<br>Subject Code: <input type="text" name="subj_code"/> <br> <br>
			<br>Description: <input type="text" name="subj_desc"/> <br> <br>
			<br>Units: <input type="text" name="subj_units"/> <br> <br>
			<br>Sections: <input type="text" name="subj_sections"/> <br> <br>
			<br>Schedule: 
				<select name="days">
					<option value="M">M</option>
					<option value="T">T</option>
					<option value="W">W</option>
					<option value="TH">TH</option>
					<option value="F">F</option>
					<option value="S">S</option>
				</select>
				
				<select name="hours_min">
					<option value="1:00">1:00</option>
					<option value="1:30">1:30</option>
					<option value="2:00">2:00</option>
					<option value="2:30">2:30</option>
					<option value="3:00">3:00</option>
					<option value="3:30">3:30</option>
					<option value="4:00">4:00</option>
					<option value="4:30">4:30</option>
					<option value="5:00">5:00</option>
					<option value="5:30">5:30</option>
					<option value="6:00">6:00</option>
					<option value="6:30">6:30</option>
					<option value="7:00">7:00</option>
					<option value="7:30">7:30</option>
					<option value="8:00">8:00</option>
					<option value="8:30">8:30</option>
					<option value="9:00">9:00</option>
					<option value="9:30">9:30</option>
					<option value="10:00">10:00</option>
					<option value="10:30">10:30</option>
					<option value="11:00">11:00</option>
					<option value="11:30">11:30</option>
					<option value="12:00">12:00</option>
					<option value="12:30">12:30</option>
				</select>
				<select name="daynight">
					<option value="AM">AM</option>
					<option value="PM">PM</option>
				</select>
				to
				<select name="hours_max">
					<option value="1:00">1:00</option>
					<option value="1:30">1:30</option>
					<option value="2:00">2:00</option>
					<option value="2:30">2:30</option>
					<option value="3:00">3:00</option>
					<option value="3:30">3:30</option>
					<option value="4:00">4:00</option>
					<option value="4:30">4:30</option>
					<option value="5:00">5:00</option>
					<option value="5:30">5:30</option>
					<option value="6:00">6:00</option>
					<option value="6:30">6:30</option>
					<option value="7:00">7:00</option>
					<option value="7:30">7:30</option>
					<option value="8:00">8:00</option>
					<option value="8:30">8:30</option>
					<option value="9:00">9:00</option>
					<option value="9:30">9:30</option>
					<option value="10:00">10:00</option>
					<option value="10:30">10:30</option>
					<option value="11:00">11:00</option>
					<option value="11:30">11:30</option>
					<option value="12:00">12:00</option>
					<option value="12:30">12:30</option>
				</select>
				<select name="daynight2">
					<option value="AM">AM</option>
					<option value="PM">PM</option>
				</select>				
				<br><br>
				
			<input id ="butt" type="submit" value="Add Subject">
		</form>
		<form name="back" action="display_subjects.php">
			<input id="butt" type="submit" value="Back">
		</form>
	</body>

</html>