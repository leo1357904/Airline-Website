<?php session_start(); include("session.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>	Welcome  </title>
	</head>
	<body bgcolor="#FFFFFF">
		
		<p>
		  <?php
			
				include("dbconnect.php");

				$sql = "SELECT * FROM `airport`";
				$sth = $db->prepare($sql);
				$sth->execute();
				echo '<table border="1">';
				echo '<tr>';
				echo '<td>ID</td>';
				echo '<td>Location</td>';
				echo '<td>Longitude</td>';
				echo '<td>Latitude</td>';
				echo '<td>Fullname</td>';
				echo '<td>Country</td>';
				echo '<td>Timezone</td>';
				
							
				while ($result = $sth->fetchObject()) 
				{
					echo '<tr><td>'.$result->id.'</td><td>'.$result->location.'</td><td>'.$result->longitude.'</td><td>
					'.$result->latitude.'</td><td>'.$result->fullname.'</td><td>'.$result->country.'</td><td>'.$result->timezone.'</td>';
					if($_SESSION['is_admin'] == 1){
					echo '<td WIDTH = 60 ;">';
					echo '<form method="post" action="deleteairport.php" ALIGN=center style="margin:0px 0%">';
					echo '	<input type="hidden" name="id" value="'.$result -> id.'" >';
					echo '	<button type = "submit" style="width:50px;"> Delete</button>';
					echo '</form>';
					echo '</td>';
					
					echo '<td WIDTH = 60 style="border-left:0px solid;border-right:0px solid;">';
					echo '<form method="post" action="EDITairport.php" ALIGN=center style="margin:0px 0%">';
					
					echo '	<input type="hidden" name="id" value="'.$result -> id.'" >';
					echo '	<button type = "submit" style="width:50px;"> Edit</button>';
					echo '</form>';
					echo '</td>';
					}
					
				}
			echo '</table>';
			if($_SESSION['is_admin'] == 1){
			echo '<form method="post" action="ADDairport.php" ALIGN=center style="margin:0px 0%">';
			echo '	<button type = "submit" style="width:50px;"> Add Airport</button>';
			echo '</form>';
			
			}
			if($_SESSION['is_admin'] == 1){
			echo '<form method="post" action="flight.php" ALIGN=center style="margin:0px 0%">';
			echo '	<button type = "submit" style="width:50px;"> Back</button>';
			echo '</form>';
			}
			else
			{
				echo '<form method="post" action="flight_user.php" ALIGN=center style="margin:0px 0%">';
				echo '	<button type = "submit" style="width:50px;"> Back</button>';
				echo '</form>';
			}
			
			
			
		?>
	    </p>
		<p><img src="travel.jpg" width="220" height="184"  alt=""/><br/>
				
		
		

	</body>
</html>