<?php

	include 'connection.php';
	
	$table1 = "SELECT id, status_label , count(status_label) FROM `leads` group by  status_label";
	$table2 = "SELECT * FROM `lead_custom`";
	
	
	
	if(mysqli_query($connection, $table1) && (mysqli_query($connection, $table2)))
	{	
		$result1 = mysqli_query($connection, $table1);
		$result2 = mysqli_query($connection, $table2);
		
		
		$count=0;
		$flag = false;
		$array[0]=0;
		$array_NO[0][0]=0;
		$array_NO[1][0]=0;
		
			
		while($row1 = mysqli_fetch_array($result1)) 
		{	

		  while($row2 = mysqli_fetch_array($result2))
		  {   
							
			if ($row1['id'] == $row2['lead_id'] )
			{	
								
				$flag = true;
				$count = $row1[2];
				array_push($array, $row2['field_value'] ,  $row1['status_label'], $count);
				
			}
			
			
		  }

		mysqli_data_seek($result2, 0);
		$count=0;
		}
		

		if($flag == true)
		{
			echo "\n<table>\n";
			echo "\t<tr>\n";
			echo "\t\t<td>Asignee\t|\tStatus\t|\tCount</td>\n";
			echo "</tr>";
			echo "<br />";
			echo "\t<tr>\n";
			for ($i=1; $i < count($array); $i++)
			{
				
				if($i%3 != 0)
				{
					echo "\t<td>\t" . $array[$i] . "\t|<td>";
				}
				else
				{
					echo "\t<td>" . $array[$i] . "<td></tr>";
				}
					
				
			}
			
		}
		else
		{
			$query1 = "SELECT  status_label  FROM `leads`"; 
			if($query1 = mysqli_query($connection, $query1))
			{
				echo "<br />All Asignee";
				echo "<br />";

				while($row11[0] = mysqli_fetch_array($query1)) {
				echo $row11[0][0] . "<br />";
				}
			
				echo "<br />";
				
			}
			
			
						
			$query2 = "SELECT  field_value  FROM `lead_custom`";
			if($query2 = mysqli_query($connection, $query2))
			{
				echo "<br />All Statuses";
				echo "<br />";

				while($row11[0] = mysqli_fetch_array($query2)) {
				echo $row11[0][0] . "<br />";
				}
			
				echo "<br />";
				
			}
			
		}
				
	}
	else
	{
		$query1 = "SELECT  status_label  FROM `leads`"; 
			if($query1 = mysqli_query($connection, $query1))
			{
				echo "<br />All Asignee";
				echo "<br />";

				while($row11[0] = mysqli_fetch_array($query1)) {
				echo $row11[0][0] . "<br />";
				}
			
				echo "<br />";
				
			}
			
		
			$query2 = "SELECT  field_value  FROM `lead_custom`";
			if($query2 = mysqli_query($connection, $query2))
			{
				echo "<br />All Statuses";
				echo "<br />";

				while($row11[0] = mysqli_fetch_array($query2)) {
				echo $row11[0][0] . "<br />";
				}
			
				echo "<br />";
				
			}
		
	}
	

?>