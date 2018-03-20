<!DOCTYPE html>
<html>
	<head>
		<title>	Welcome  </title>
	</head>
	<body bgcolor="#FFFFFF">
    

	<font size=6><b>ADD</b></font></br></br></br>
	<img src="add.jpg" width="103" height="104"  alt=""/>
		<form method="post" action="addap.php">
		Location:<br><input type="text" name="location"/><br>
		Longitude:<br><input type="text" name="longitude" /> <br>
		Latitude:<br><input type="text" name="latitude" /> <br>
		Fullname:<br><input type="text" name="fullname" /> <br>
		Country:<br><input type="text" name="country" /> <br>
		Timezone:<br><input type="text" name="timezone" /> <br>
		<input type="submit" value="add"/><br/>
		</form>
		
		<form method="post" action="airport.php" ALIGN=center style="margin:0px 0%">
		<button type = "submit" style="width:50px;">Back</button>
	</body>
</html>