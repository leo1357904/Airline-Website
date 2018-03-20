<?php session_start(); include("session.php")?>
<!DOCTYPE html>
<html>
	<head>
		<title>	register	</title>
	</head>
	<body><h1>
		<?php
			
				include("dbconnect.php");
				/*if(mysqli_connect_errno($con)){
				echo "Fail to connect to MySQL: ".mysqli_connect_error();
				}
				else{*/
				if($_POST['code']!=null && $_POST['from']!=null && $_POST['to']!=null)
				{
					$code=$_POST['code'];
					$from=$_POST['from'];
					$to=$_POST['to'];
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
					$price = $_POST['price'];
					
			
					$dedate = date("$dy-$dm-$dd $dh:$dmi:0");
					$ardate = date("$ay-$am-$ad $ah:$ami:0");
					$sql = "insert into flight (flight_number,departure, destination,departure_date,arrival_date,take_price) values (?,?,?,?,?,?)";
					$sth = $db->prepare($sql);
					$sth->execute(array($code,$from, $to,$dedate,$ardate,$price));
					echo 'successful';
					//echo '<meta http-equiv=REFRESH CONTENT=2;url=index2.php>';
					
				}
				else
				{
					echo 'u are not allowed';
					//echo '<meta http-equiv=REFRESH CONTENT=2;url=index2.php>';
				}
			echo '<meta http-equiv=REFRESH CONTENT=1;url=flight.php>';
			
			
		?><br/>
		
	</body>
</html>
