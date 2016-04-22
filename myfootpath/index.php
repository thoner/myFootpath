<?php

	include 'connection.php';
	
	$table1 = "SELECT id, status_label FROM `leads`";
	$table2 = "SELECT * FROM `lead_custom`";
	
	/*$q1 = "INSERT INTO `leads` 
		(`id`, `display_name`, `status_label`, `contact_name`, `contact_email`, `contact_phone`, `created_by`, `date_created`, `updated_by`, `date_updated`) 
		VALUES ('2', 'tim', 'free', 'timur', '@ma', '+7', 'myself', '2016-04-17 00:00:00', 'myself', '2016-04-17 00:00:00'); ";
	*/
	
	if(mysqli_query($connection, $table1) && (mysqli_query($connection, $table2)))
	{	
		$result1 = mysqli_query($connection, $table1);
		$result2 = mysqli_query($connection, $table2);
		
		$result = mysqli_query($connection, $table2);
		
		
		
		$count=0;
		$int = 0;
		echo "\n<table>\n";
			echo "\t<tr>\n";
			echo "\t\t<td>Asignee\t|\tStatus\t|\tCount</td>\n";
			echo "</tr>";
			echo "<br />";
		while($row1 = mysqli_fetch_array($result1)) 
		{	
		 	
			
		 while($row2 = mysqli_fetch_array($result2))
		{   
			//echo "Begin<br />" . $row2['field_value'] . "<br />";
		
			
			if ($row1['id'] == $row2['lead_id'] )
			{	
								
				//$count = funct($row2, $result);
				 //"SELECT id, field_value COUNT(id) FROM 'lead_custom'" ;  //WHERE data = '".$data."' group by data,url
				         //'SELECT COUNT(*) from `leads` where id = «lead_id» and status_label = «status» '
				$quer1 = "SELECT id, status_label , count(id) FROM `leads` group by id, status_label";
				$count = mysqli_query($connection, $quer1);
				$count2 = mysqli_fetch_array($count);
				
				
				
				
				echo $count2[1];
				
				echo "\t<tr>\n";
				echo "\t<td>" . $row2['field_value'] . "\t|\t" . $row1['status_label'] . "\t|\t" . $count . "</td>\n";
				echo "</tr>";
				
			}
			echo "</tr>";
			
		}
		mysqli_data_seek($result2, 0);
		$count=0;
		}
		echo "</table>\n";
	}
	else
	{
		echo 'Not';
		
	}
	
	function funct($row2, $table)
	{	
		$count_fun=0;
		
		
		
		//mysqli_data_seek($table, 0);
		while($row_current = mysqli_fetch_array($table))
		{
			//echo $row_current['field_value'] . " и " . $row2['field_value'] . "<br/>";
			
			
			if($row_current['lead_id'] == $row2['lead_id'])
				
				//echo $row_current['field_value'];
			
				if ($row_current['field_value'] == $row2['field_value'])
				{
					//echo $row_current['field_value'] . "==" .$row2['field_value'] . "<br />";
					$count_fun++;
					
				}
				/*else
				{
					//echo $row_current['field_value'] . "==" .$row2['field_value'] . "<br />";
					//$count_fun++;
				}*/
			
			
		}
		$row_current = 0;
		mysqli_data_seek($table, 0);
		if ($count_fun == 0)
			return $count_fun;
		else
			return $count_fun;
	}
	

  //$mysqli->query('INSERT INTO mytable (name, email) VALUES ("MyName", "myname@mail.ru")');
  //$mysqli->close();


?>