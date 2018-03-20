<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>	delete country	</title>
	</head>
	<body><h1>
		<?php
			if($_SESSION['account'] != null)
			{
				$idin=$_POST['id'];
				if($idin!= null)
				{		
					include("dbconnect.php");
					$sql = "DELETE FROM `country` WHERE id=? ";
					$sth = $db->prepare($sql);
					$sth->execute(array($idin));
			
					echo '<font size="5" >Success</font>';
					echo '<meta http-equiv=REFRESH CONTENT=2;url=country.php>';		
				}
				else
				{
					echo '<font size="5" >Faild</font>';
					echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
				}

			}
			else
			{
				echo '<meta http-equiv=REFRESH CONTENT=0;url=index.html>';
			}
		?><br/>
	</body>
</html>
