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
			
					echo '<meta http-equiv=REFRESH CONTENT=0;url=comparison_list.php>';		
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
