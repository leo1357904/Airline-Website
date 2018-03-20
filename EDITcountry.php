<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>	EDIT  </title>
	</head>

	<body bgcolor="#FFFFFF">
		
		
		<font size=6><b>Edit</b></font></br></br></br>
		<form method="post" action="editct.php">      
        Fullname:<br><input type="text" name="fullname"/><br>
		Abbreviation:<br><input type="text" name="abbreviation" /> <br>
		
		
		<?php $_SESSION['country_id'] = $_POST['id']		?>
		
		<br><input type="submit" value="edit"/><br/>
		</form>

		<form method="post" action="country.php" ALIGN=center style="margin:0px 0%">
		<button type = "submit" style="width:50px;">Back</button>
		
	
	</body>
</html>