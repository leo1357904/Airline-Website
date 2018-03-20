<?php session_start(); include("session.php");?>
<!DOCTYPE html>
<html>
	<head>
		<title>	editflight	</title>
	</head>
	<body><h1>
		<?php
			if($_SESSION['is_admin'] == 1)
			{
				include("dbconnect.php");
				if($_POST['code']!=null && $_POST['from']!=null && $_POST['to']!=null)
				{
					$dy=$_POST['departy'];
					$dm=$_POST['departm'];
					$dd=$_POST['departd'];
					$dh=$_POST['departd'];
					$dmi=$_POST['departmi'];
					$ay=$_POST['arrivey'];
					$am=$_POST['arrivem'];
					$ad=$_POST['arrived'];
					$ah=$_POST['arriveh'];
					$ami=$_POST['arrivemi'];
					$number=$_POST['code'];
					$departure=$_POST['from'];
					$dest=$_POST['to'];
					$price = $_POST['price'];
					
					
					$dedate = date("$dy-$dm-$dd $dh:$dmi:0");
					$ardate = date("$ay-$am-$ad $ah:$ami:0");
					$sql="UPDATE flight SET flight_number='$number',departure='$departure', destination='$dest',departure_date='$dedate',arrival_date='$ardate', take_price = '$price' WHERE id=?";
			        $sth = $db->prepare($sql);
			        $sth->execute(array($_SESSION['flight_id']));		
					echo '<font size="5" >Edit success</font>';
					echo '<meta http-equiv=REFRESH CONTENT=2;url=flight.php>';
				}
				else
				{
					echo 'u are not allowed';
					echo '<meta http-equiv=REFRESH CONTENT=0;url=index.html>';
					//echo '<meta http-equiv=REFRESH CONTENT=2;url=index2.php>';
				}
			}	
		?><br/>
	</body>
</html>
