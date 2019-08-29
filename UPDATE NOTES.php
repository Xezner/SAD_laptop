<?php 

else //update other schedules that are changed in table:schedules
{
	//row1 schedule is the schedule before update
	$selectsql = "SELECT id FROM schedules WHERE sched = '".$row1["schedule"]
				."' AND subjname= '".$row1["subjcode"]
				."' AND sect= '".$row1["sections"]."'";
	// SELECT sched FROM schedules WHERE sched = 'W 1:00 AM to 1:00 AM' AND subjname = 'BSCOE-ELEC2' AND sect = '5'
	// SELECT * FROM subjects WHERE schedule = 'W 1:00 AM to 1:00 AM' AND subjcode = 'BSCOE-ELEC2' AND sections = '3'
	$resultsql=$conn->query($selectsql);
	$rowsql=$resultsql->fetch_assoc();
	if( $resultsql->num_rows > 0)
	{
		$updatesql = "UPDATE schedules SET sched = '".$subj_schedule.
					"' WHERE id = '".$rowsql["id"]."'";
		if(mysqli_query($conn, $updatesql))
		{
			echo "Records updated successfully.<br>";
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}
	}
}

?>