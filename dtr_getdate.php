<?php
	include_once('index_logged.php');
	include_once('new_dtr.php');
function getTime()
{
	date_default_timezone_set('Asia/Singapore'); // CDT
	$info = getdate();
	$hour = $info['hours'];
	$min = $info['minutes'];
	
	$min_single = sprintf("%02d", $min);
	
	$current_time = "$hour:$min_single";
	return $current_time;
}
function get_Date()
{
	date_default_timezone_set('Asia/Singapore'); // CDT
	$info = getdate();
	$day = $info['weekday'];
	$date = $info['mday'];
	$month = $info['month'];
	$year = $info['year'];
	$current_date = "$month $date, $year";
	return $current_date;
}

$conn = mysqli_connect("localhost", "root", "", "server");
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}

?>

<?php
	//time in
	if(!$_SESSION["timed_in"]) //inactive
	{
		$timed_in = getTime();
		$current_date = get_Date();
		
		$sql = "SELECT time_in FROM dtr WHERE date_in = '".$current_date."' AND id = '".$_SESSION["time_id"]
				."' AND time_in != ''";
		$result= $conn->query($sql);
		if ($result->num_rows >0)
		{
			echo "<script type='text/javascript'>alert('Already timed in for today')</script>";
		}
		else
		{
			$sql = "UPDATE dtr SET time_in = '".$timed_in."' WHERE id = '".$_SESSION["time_id"]
					."'" ;
			if(mysqli_query($conn, $sql)){
				echo "Time in updated successfully.";
			} else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}	
		}
		//update active
		$_SESSION["timed_in"]='1';
		$sql = "UPDATE users SET active = '".$_SESSION["timed_in"]."' WHERE username = '".$_SESSION["username"]
				."'" ;
		if(mysqli_query($conn, $sql)){
			echo "Active status updated successfully. Automatically redirect.";
			header('Refresh: 0; URL = dtr.php');
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}	
		//update to active

	}
	//time out
	else if($_SESSION["timed_in"]) //active
	{
		$timed_out = getTime();
		$current_date = get_Date();
		
		$sql = "SELECT time_in FROM dtr WHERE date_in = '".$current_date."' AND id = '".$_SESSION["time_id"]
				."' AND time_out != ''";
		$result= $conn->query($sql);
		if ($result->num_rows >0)
		{
			echo "<script type='text/javascript'>alert('Already timed in for today')</script>";
		}
		else
		{
			$sql = "UPDATE dtr SET time_out = '".$timed_out."' WHERE id = '".$_SESSION["time_id"]
						."'" ;
			if(mysqli_query($conn, $sql)){
				echo "Time out updated successfully.";			
			} 
			else
			{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);				
			}
		}
		//update inactive
		$_SESSION["timed_in"]=0;
		$sql2 = "UPDATE users SET active = ".$_SESSION["timed_in"]." WHERE username = '".$_SESSION["username"]."'";
		if(mysqli_query($conn, $sql2)){
			echo "Active status updated successfully. Automatically redirect.";
			header('Refresh: 0; URL = dtr.php');
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}	

		//update to inactive
	}
$_SESSION["fullname"] = '';
$conn->close();
?>
