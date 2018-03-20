<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>	Welcome	</title>
	</head>
	<body>
		<?php
			if(isset($_POST['account']) && isset($_POST['password']))
			{
				$_SESSION['account'] = $_POST['account'];
				include("dbconnect.php");
				
				$sql = "SELECT * FROM user where account = ?";
				$sth = $db->prepare($sql);
				$sth->execute(array($_POST['account']));
				$row = $sth->fetchObject();
					
				if(md5($_POST['password'])==$row->password){
					echo "<br>Welcome ".$_POST['account'], "!<br>";
					$_SESSION['is_admin']=$row->is_admin;
					if($row->is_admin==1)
					{
						echo '<meta http-equiv=REFRESH CONTENT=0;url=flight.php>';
					}
					else
					{
						echo '<meta http-equiv=REFRESH CONTENT=0;url=flight_user.php>';
					}
					die();
				}
				else
				{
					unset($_SESSION['account']);
					
					
				}
											
				
			}
		?>
	<font size=6><b>Wrong !!</b>
	<font size=5>
		<?php
			echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
		?>
	</body>
</html>