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

				$sql = "SELECT * FROM `user`";
				$sth = $db->prepare($sql);
				$sth->execute();
				echo '<table border="1">';
				echo '<tr>';
				echo '<td>ID</td>';
				echo '<td>Account</td>';
				echo '<td>Identity</td>';
							
				while ($result = $sth->fetchObject()) 
				{
					echo '<tr><td>'.$result->id.'<td>'.$result->account.'</td>';
					if($result->is_admin)
						echo'<td>'.Administer.'</td>';
					else
						echo'<td>'.User.'</td>';
						
					if(!$result->is_admin)
					{
					echo '<td WIDTH = 120 ;">';
					echo '<form method="post" action="promote.php" ALIGN=center style="margin:0px 0%">';
					echo '	<input type="hidden" name="id" value="'.$result -> id.'" >';
					echo '	<button type = "submit" style="width:110px;"> Promote</button>';
					echo '</form>';
					echo '</td>';
					}
					else
					{
						echo '<td></td>';	
					}
					echo '<td WIDTH = 60 ;">';
					echo '<form method="post" action="deleteuser.php" ALIGN=center style="margin:0px 0%">';
					echo '	<input type="hidden" name="id" value="'.$result -> id.'" >';
					echo '	<button type = "submit" style="width:50px;"> Delete</button>';
					echo '</form>';
					echo '</td>';
					
					echo '</tr>';
				}
			echo '</table>';
			echo '<form method="post" action="signup.php" ALIGN=center style="margin:0px 0%">';
			echo '	<button type = "submit" style="width:50px;"> Add User</button>';
			echo '</form>';
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
