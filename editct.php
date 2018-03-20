<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>	edit country	</title>
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
					
					
					$sql="UPDATE country SET fullname='$ful',abbreviation='$abb' WHERE id=?";
			        $sth = $db->prepare($sql);
			        $sth->execute(array($_SESSION['country_id']));		
					echo '<font size="5" >Edit success</font>';
					echo '<meta http-equiv=REFRESH CONTENT=2;url=country.php>';
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
