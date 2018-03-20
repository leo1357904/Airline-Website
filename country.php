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

				$sql = "SELECT * FROM `country`";
				$sth = $db->prepare($sql);
				$sth->execute();
				echo '<table border="1">';
				echo '<tr>';
				echo '<td>Fullname</td>';
				echo '<td>Abbreviation</td>';
				
							
				while ($result = $sth->fetchObject()) 
				{
					echo '<tr><td>'.$result->fullname.'</td><td>'.$result->abbreviation.'</td>';
					if($_SESSION['is_admin'] == 1){
					echo '<td WIDTH = 60 ;">';
					echo '<form method="post" action="deletecountry.php" ALIGN=center style="margin:0px 0%">';
					echo '	<input type="hidden" name="id" value="'.$result -> id.'" >';
					echo '	<button type = "submit" style="width:50px;"> Delete</button>';
					echo '</form>';
					echo '</td>';
					
					echo '<td WIDTH = 60 style="border-left:0px solid;border-right:0px solid;">';
					echo '<form method="post" action="EDITcountry.php" ALIGN=center style="margin:0px 0%">';
					
					echo '	<input type="hidden" name="id" value="'.$result -> id.'" >';
					echo '	<button type = "submit" style="width:50px;"> Edit</button>';
					echo '</form>';
					echo '</td>';
					}
					
				}
			echo '</table>';
			if($_SESSION['is_admin'] == 1){
			echo '<form method="post" action="ADDcountry.php" ALIGN=center style="margin:0px 0%">';
			echo '	<button type = "submit" style="width:60px;"> Add Country</button>';
			echo '</form>';
			
			}
			
			echo '<form method="post" action="flight.php" ALIGN=center style="margin:0px 0%">';
			echo '	<button type = "submit" style="width:50px;"> Back</button>';
			echo '</form>';
			
			
			
			
			
		?>
	    </p>
		<p><img src="travel.jpg" width="220" height="184"  alt=""/><br/>
				
		
		

	</body>
</html>