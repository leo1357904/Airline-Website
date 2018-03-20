<?php session_start() ;
	include("session.php");
	if($_SESSION['is_admin']==0) echo '<meta http-equiv=REFRESH CONTENT=0;url=index.html>';	 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>	ADD  </title>
	</head>
	<body bgcolor="#FFFFFF">
    

	<font size=6><b>Sign up</b></font></br></br></br>
	<img src="add.jpg" width="103" height="104"  alt=""/>
		<form method="post" action="addct.php">
		Fullname:<br><input type="text" name="fullname"/><br>
		Abbreviation:<br><input type="text" name="abbreviation" /> <br>
		<br><input type="submit" value="add"/><br/>
		</form>
		
		<form method="post" action="country.php" ALIGN=center style="margin:0px 0%">
		<button type = "submit" style="width:50px;">Back</button>
	</body>
</html>