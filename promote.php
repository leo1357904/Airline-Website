<?php session_start(); include("session.php")?>
<!DOCTYPE html>
<html>
	<head>
		<title>	editflight	</title>
	</head>
	<body><h1>
		<?php
			if($_POST['is_admin'] == 0)
			{
				
				include("dbconnect.php");
				$sql="UPDATE user SET is_admin=1  WHERE id=?";
			    $sth = $db->prepare($sql);
			    $sth->execute(array($_POST['id']));		
				echo '<font size="5" >Edit success</font>';
				echo '<meta http-equiv=REFRESH CONTENT=2;url=userlist.php>';
			}
			else
			{
				echo '<meta http-equiv=REFRESH CONTENT=0;url=index.html>';
			}	
		?><br/>
	</body>
</html>
