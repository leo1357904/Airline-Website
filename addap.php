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
				if($_POST['location']!=null && $_POST['longitude']!=null && $_POST['latitude']!=null&&$_POST['fullname']!=null&&$_POST['country']!=null&&$_POST['timezone']!=null)
				{
					$loc=$_POST['location'];
					$lon=$_POST['longitude'];
					$lat=$_POST['latitude'];
					$ful=$_POST['fullname'];
					$cou=$_POST['country'];
					$tim=$_POST['timezone'];
					if($tim[0]=="+")
					{
						$tim=substr("$tim", 1, 5);
					}
					
					
					
					$sql = "insert into airport (location,longitude,latitude,fullname,country,timezone) values (?,?,?,?,?,?)";
					$sth = $db->prepare($sql);
					$sth->execute(array($loc,$lon,$lat,$ful,$cou,$tim));
					echo 'successful';
					
				}
				else
				{
					echo 'u are not allowed';
					//echo '<meta http-equiv=REFRESH CONTENT=2;url=index2.php>';
				}
			echo '<meta http-equiv=REFRESH CONTENT=1;url=airport.php>';
			}
			else
			{
				echo '<meta http-equiv=REFRESH CONTENT=0;url=index.html>';
			}
				
		?><br/>
		
	</body>
</html>
