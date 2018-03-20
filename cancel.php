<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>	cancel	</title>
	</head>
	<body><h1>
		<?php
			if($_SESSION['account'] != null)
			{
				$idin=$_POST['id'];
				if($idin!= null)
				{	
					include("dbconnect.php");
					$sql =  "DELETE FROM favorite WHERE user_account=? AND flight_id=? ";
					$sth = $db->prepare($sql);
					$sth->execute(array($_SESSION['account'],$idin));
			
					if($_SESSION['is_admin']!=0) echo '<meta http-equiv=REFRESH CONTENT=0;url=flight.php>';
					else                         echo '<meta http-equiv=REFRESH CONTENT=0;url=flight_user.php>';
				
				}
				else
				{
					echo '<font size="5" >Faild</font>';
					if($_SESSION['is_admin']!=0) echo '<meta http-equiv=REFRESH CONTENT=2;url=flight.php>';
					else                         echo '<meta http-equiv=REFRESH CONTENT=2;url=flight_user.php>';
				}

			}
			else
			{
				echo '<meta http-equiv=REFRESH CONTENT=0;url=index.html>';
			}
		?><br/>
	</body>
</html>
