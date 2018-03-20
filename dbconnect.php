
<meta charset=utf-8" />
<?php
if($_SESSION['account'] != null)
{

$host ="dbhome.cs.nctu.edu.tw";
				$username = "pjtu_cs";
				$password = "1234";
				$database = "pjtu_cs";

$com = "mysql:host={$host};dbname={$database}";  
$db = new PDO($com,$username,$password); 

}
else
{
	echo '<font size="5" >You do not have permission</font>';
	echo '<meta http-equiv=REFRESH CONTENT=0;url=index.html>';
}
?> 
