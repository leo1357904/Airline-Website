<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>	favorite	</title>
	</head>
	<body><h1>
		<?php
			if($_SESSION['account'] != null)
			{
				$idin=$_POST['id'];
				if($idin!= null)
				{	
					$accountin = $_SESSION['account'];
					include("dbconnect.php");
					$sql =  "insert into favorite (user_account,flight_id) values (?,?)";
					$sth = $db->prepare($sql);
					$sth->execute(array($accountin,$idin));
			
					echo '<font size="5" >Success</font>';
					if($_SESSION['is_admin']!=0) echo '<meta http-equiv=REFRESH CONTENT=0;url=flight.php>';
					else                         echo '<meta http-equiv=REFRESH CONTENT=0;url=flight_user.php>';
					
				}
				else
				{
					echo '<font size="5" >Faild</font>';
					if($_SESSION['is_admin']!=0) echo '<meta http-equiv=REFRESH CONTENT=0;url=flight.php>';
					else                         echo '<meta http-equiv=REFRESH CONTENT=0;url=flight_user.php>';
				}
				

			}
			else
			{
				echo '<meta http-equiv=REFRESH CONTENT=0;url=index.html>';
			}
		?><br/>
	</body>
</html>
