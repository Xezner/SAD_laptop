<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once __DIR__ . '/vendor/autoload.php';

$html = '<!DOCTYPE html>
<html>
<head>

<style>
table {
border-collapse: collapse;
width: 100%;
color: #4d0000;
font-family: monospace;
font-size: 15px;
text-align: left;
}
th {
background-color: #4d0000;
color: white;
text-align: left;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<h2>Monthly Statement</h2>
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


//COMPUTATION


$html .= '<!DOCTYPE html>
<html>
<head>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #4d0000;
font-family: monospace;
font-size: 15px;
text-align: left;
}
th {
background-color: #4d0000;
color: white;
text-align: left;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
</hr>
<br>
<table>
<tr>
<th>Total Number of Hours</th>
<th>Salary Rate</th>
<th>Month\'s Salary</th>
</tr>
';
$total_hrs = 0;
$rates = $_SESSION["rates"];
$salary = 0;
//ADD SOMETHING FOR CURRENT'S MONTH ONLY

$sql = "SELECT work_hrs FROM dtr WHERE name = '".$_SESSION["username"]
	    ."' ORDER BY date_in, time_in DESC";
$result= $conn->query($sql);
$result1= $conn->query($sql);
if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{ $total_hrs += $row['work_hrs']; }
} 
else { echo "0 results"; }
$salary = $total_hrs * $rates;

$html.= "<tr><td>"  . $total_hrs. " hrs </td><td>" . $rates . " pesos/hr</td><td>"
	. $salary . "</td></tr>";
	
$html.= "</table>
		 </body>
		 </html>";
		 
$conn->close();
		 
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
 
 
//save the file put which location you need folder/filname
$pdf = $mpdf->Output('', 'S');


$enquirydata = [
	'Name' => 'Renz',
	'Email' => 'prencylabueg@gmail.com'
];

sendEmail($pdf, $enquirydata);

function sendEmail($pdf, $enquirydata)
{

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'prencyl101@gmail.com';                     // SMTP username
    $mail->Password   = 'pikachu010697';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom( 'prencyl101@gmail.com', 'Administrator');
    $mail->addAddress('prencylabueg@gmail.com', 'Tan Fenomeno');     // Add a recipient

	$mail->addStringAttachment($pdf, 'payroll.pdf');

    // Content important
	$mail->msgHTML($pdf);
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This month\'s statement';
    $mail->AltBody = 'This month\'s statement';

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}	
}


?>