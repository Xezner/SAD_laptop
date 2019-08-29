<?php
	include_once('index_logged.php');
?>

<?php
if (isset($_POST['fullname_dtr'])&&!empty($_POST['fullname_dtr']))
{
	$id_dtr = $_POST['fullname_dtr'];
}
if($id_dtr == '')
{
	header('Refresh: 0; URL = edit_dtr.php');
	die('<script type="text/javascript"> alert("Data not available")</script>');	
}

?>

<hr>
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
*
	{
		font-family: 'Montserrat', sans-serif;
	}
table {
border-collapse: collapse;
width: 100%;
color: #002867;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #002867;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<br>
<table>
<tr>
<th>ID </th>
<th>Date</th>
<th>Time In</th>
<th>Time Out</th>
<th>Work Hours</th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "server");
// Check connection
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, date_in, time_in, time_out, work_hrs FROM dtr WHERE id = '".$id_dtr
	    ."' ORDER BY date_in, time_in DESC";
$result= $conn->query($sql);
$result1= $conn->query($sql);
if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
	echo "<tr><td>" . $row["id"]. "</td><td>" . $row["date_in"]. "</td><td>" . $row["time_in"] . "</td><td>"
	. $row["time_out"] . "</td><td>" . $row["work_hrs"] . "</td></tr>";

	}
	echo "</table>";
} 
else { echo "0 results"; }


?>
</table>
</body>
</html>
<br>
<hr>


<!DOCTYPE html>
<html>
	<head>
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

	<body>
		<form name="edit_dtr" action="edit_save_dtr_admin.php" method="POST">
			<?php
			echo '<input type="hidden" name=id_dtr value='.$id_dtr.'>';
			?>
			<br>Date: 
				<select name="month">
					<option value="">-</option>
					<option value="January">January</option>
					<option value="February">February</option>
					<option value="March">March</option>
					<option value="April">April</option>
					<option value="May">May</option>
					<option value="June">June</option>
					<option value="July">July</option>
					<option value="August">August</option>
					<option value="September">September</option>
					<option value="October">October</option>
					<option value="November">November</option>
					<option value="December">December</option>
				</select>
				
				<select name="day">
					<option value="">-</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
				
				<select name="year">
					<option value="">-</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
				</select>
			<br>
			<br>Time in: <input type="text" name="time_in"/> <br>
			<br>Time out: <input type="text" name="time_out"/> <br>
			<p><br> *time is in military format HH:MM.</p>
			<p><br> ** leave form blank to not make changes </p>
			<br><input id="butt" type="submit" value="Edit">
		</form>
		<form name="back" action="edit_dtr.php">
			<input id="butt" type="submit" value="Back">
		</form>
	</body>

</html>











