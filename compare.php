<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>	Welcome  </title>
	</head>
	<body bgcolor="#FFFFFF">
		
		<p>
		  <?php
			if($_SESSION['account'] != null)
			{
				include("dbconnect.php");

				$sql = "SELECT * FROM `flight`";
				$sth = $db->prepare($sql);
				$sth->execute();
				echo '<table border="1">';
				echo '<tr>';
				echo '<td>ID</td>';
				echo '<td>Code</td>';
				echo '<td>From</td>';
				echo '<td>To</td>';
				echo '<td>Depart</td>';
				echo '<td>Arrive</td>';
							
				while ($result = $sth->fetchObject()) 
				{
					$squl = "SELECT * FROM `favorite` WHERE user_account=? AND flight_id=?";
					$st = $db->prepare($squl);
					$st->execute(array($_SESSION['account'],$result->id));
					$result2 = $st->fetchObject();
					
					if($result2)
					{
						echo '<tr><td>'.$result->id.'<td>'.$result->flight_number.'</td><td>'.$result->departure.'</td><td>
						'.$result->destination.'</td><td>'.$result->departure_date.'</td><td>'.$result->arrival_date.
						'</td>' ;
						echo '<td WIDTH = 60 ;">';
						echo '<form method="post" action="cancel_compare.php" ALIGN=center style="margin:0px 0%">';
						echo '	<input type="hidden" name="id" value="'.$result -> id.'" >';
						echo '	<button type = "submit" style="width:50px;"> Delete</button>';
						echo '</form>';
						echo '</td>';	
					}
				}
			echo '</table>';
			echo '<form method="post" action="flight.php" ALIGN=center style="margin:0px 0%">';
			echo '	<button type = "submit" style="width:50px;"> Back</button>';
			echo '</form>';
			}
			else{
				echo '<meta http-equiv=REFRESH CONTENT=0;url=index.html>';
				}
				
		?>
	    </p>
		<p><img src="travel.jpg" width="220" height="184"  alt=""/><br/>
				
		
		

	</body>
</html>