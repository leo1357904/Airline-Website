<?php session_start(); include("session.php");?>
<!DOCTYPE html>
<html>
	<head>
		<title>	register	</title>
	</head>
	<body><h1>
	<?php
		
		$pw=md5($_POST['password']);
		if(isset($_POST['account']) && isset($_POST['password']) && ($_POST['password']==$_POST['password2'] ))
		{
			
				$host ="dbhome.cs.nctu.edu.tw";
				$username = "pjtu_cs";
				$password = "1234";
				$database = "pjtu_cs";

				$com = "mysql:host={$host};dbname={$database}";  
				$db = new PDO($com,$username,$password); 
			$sql = "SELECT * FROM 'user' where account=?";
			$sth = $db->prepare($sql);
			$sth->execute(array($_POST['account']));
			$row = $sth->fetchObject();
			
			if(!$row)
			{
				$squl = "insert into user (id,account, password, is_admin ) values ('$id','".$_POST['account']."', '$pw', 0)";
				$sthi=$db->prepare($squl);
				$sthi->execute();
				
				echo 'successful';
			
					
			}
			else
			{
				echo 'This account is used.';
				echo'<br>';
				echo' Please change another one.';
			}
		}
		else
		{
			echo 'u are not allowed';
			//echo '<meta http-equiv=REFRESH CONTENT=2;url=index2.php>';
		}
		if($_SESSION['is_admin']) echo '<meta http-equiv=REFRESH CONTENT=2;url=userlist.php>';
		else                      echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
	?><br/>
		
		
	
	</body>
</html>

