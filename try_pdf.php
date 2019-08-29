<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

$html = '<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #621430;
font-family: monospace;
font-size: 15px;
text-align: left;
}
th {
background-color: #621430;
color: white;
text-align: left;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<br>
<table>
<tr>
<th>Date</th>
<th>Time In</th>
<th>Time Out</th>
<th>Work Hours</th>
</tr>
';

$conn = mysqli_connect("localhost", "root", "", "server");
// Check connection
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT date_in, time_in, time_out, work_hrs FROM dtr WHERE name = '".$_SESSION["username"]
	    ."' ORDER BY date_in, time_in DESC";
$result= $conn->query($sql);
$result1= $conn->query($sql);
if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
	$html.= "<tr><td>"  . $row["date_in"]. "</td><td>" . $row["time_in"] . "</td><td>"
	. $row["time_out"] . "</td><td>" . $row["work_hrs"] . "</td></tr>";

	}
	$html.= "</table>";
} 
else { echo "0 results"; }




$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
 
 
//save the file put which location you need folder/filname
$mpdf->Output($_SESSION["username"].".pdf", 'D');
 
 
//out put in browser below output function
$mpdf->Output();

?>