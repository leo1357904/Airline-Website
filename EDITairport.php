<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>	EDIT  </title>
	</head>

	<body bgcolor="#FFFFFF">
		
		
		<font size=6><b>Edit</b></font></br></br></br>
		<form method="post" action="editap.php">      
        Location:<br><input type="text" name="location"/><br>
		Longitude:<br><input type="text" name="longitude" /> <br>
		Latitude:<br><input type="text" name="latitude" /> <br>
		Fullname:<br><input type="text" name="fullname" /> <br>
		Country:<br><input type="text" name="country" /> <br>
		Timezone:<br><input type="text" name="timezone" /> <br>
		
		<?php $_SESSION['airport_id'] = $_POST['id']		?>
		
		<br><input type="submit" value="edit"/><br/>
		</form>

		<form method="post" action="airport.php" ALIGN=center style="margin:0px 0%">
		<button type = "submit" style="width:50px;">Back</button>
		
	
	</body>
</html>