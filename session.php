<?php session_start(); ?>
<meta charset=utf-8" />
<?php
if($_SESSION['account'] == null)
{
	echo '<meta http-equiv=REFRESH CONTENT=0;url=index.html>';
}
else
{
	$host ="dbhome.cs.nctu.edu.tw";
	$username = "pjtu_cs";
	$password = "1234";
	$database = "pjtu_cs";
	$com = "mysql:host={$host};dbname={$database}";  
	$db = new PDO($com,$username,$password); 
	$sql = "SELECT * FROM user WHERE account=?";
	$sth = $db->prepare($sql);
	$sth->execute(array($_SESSION['account']));
	$row = $sth->fetchObject();
	if($row==null)
		echo '<meta http-equiv=REFRESH CONTENT=0;url=index.html>';
		
}
?> 
