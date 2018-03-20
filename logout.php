<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>	Log Out Interface </title>
	</head>
	
	<body>
		<?php
		if($_SESSION['account'] != null)
{
			session_destroy();
			echo "<br>Goodbye!<br>";
			echo ("<a href=\"index.html\"><b>Back</b></a>");}
			else{
				echo '<meta http-equiv=REFRESH CONTENT=0;url=index.html>';
				}
		?> 
	
	</body>
</html>