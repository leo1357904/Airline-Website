<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>	edit airport	</title>
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
					
					$sql="UPDATE airport SET location='$loc',longitude='$lon', latitude='$lat',fullname='$ful',country='$cou',timezone='$tim'  WHERE id=?";
			        $sth = $db->prepare($sql);
			        $sth->execute(array($_SESSION['airport_id']));		
					echo '<font size="5" >Edit success</font>';
					echo '<meta http-equiv=REFRESH CONTENT=2;url=airport.php>';
				}
				else
				{
					echo 'u are not allowed';
					echo '<meta http-equiv=REFRESH CONTENT=0;url=flight.php>';
					//echo '<meta http-equiv=REFRESH CONTENT=2;url=index2.php>';
				}
			}	
		?><br/>
	</body>
</html>
