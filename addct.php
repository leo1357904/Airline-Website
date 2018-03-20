<?php session_start() ;
	include("session.php");
	if($_SESSION['is_admin']==0) echo '<meta http-equiv=REFRESH CONTENT=0;url=index.html>';	 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>	add airport	</title>
	</head>
	<body><h1>
		<?php
			if($_SESSION['account'] != null)
			{
				include("dbconnect.php");
				if($_POST['fullname']!=null && $_POST['abbreviation']!=null )
				{
					$ful=$_POST['fullname'];
					$abb=$_POST['abbreviation'];
					
					echo $ful;
					echo $abb;
					
					$sql = "insert into `country` (fullname,abbreviation) values (?,?)";
					$sth = $db->prepare($sql);
					$sth->execute(array($ful,$abb));
					echo 'successful';
					
				}
				else
				{
					echo 'u are not allowed';
					//echo '<meta http-equiv=REFRESH CONTENT=2;url=index2.php>';
				}
			echo '<meta http-equiv=REFRESH CONTENT=1;url=country.php>';
			}
			else
			{
				echo '<meta http-equiv=REFRESH CONTENT=0;url=index.html>';
			}
				
		?><br/>
		
	</body>
</html>
