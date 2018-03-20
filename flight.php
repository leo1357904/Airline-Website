<?php session_start(); include("session.php");?>
<!DOCTYPE html>
<html>
	<head>
		<title>	Welcome  </title>
	</head>
	<body bgcolor="#FFFFFF">
    <strong>Order by:</strong><br>
    <form action="flight.php" method="post" >
    	<select  name="order_select">
        <option value ="id">initial</option>
  		<option value ="departure_date"<? if ($_POST[order_select]=="departure_date") echo "selected" ?>>departure date</option>
  		<option value ="arrival_date"<? if ($_POST[order_select]=="arrival_date") echo "selected" ?>>arrival date</option>
  		<option value="take_price"<? if ($_POST[order_select]=="take_price") echo "selected" ?>>Price</option>
        <option value ="flight_number"<? if ($_POST[order_select]=="flight_number") echo "selected" ?>>flight number</option>
  		<option value ="departure"<? if ($_POST[order_select]=="departure") echo "selected" ?>>departure</option>
  		<option value="destination"<? if ($_POST[order_select]=="destination") echo "selected" ?>>destination</option>
        
		</select>
        <!--choose order-->
        <select  name="ascdesc">
        <!--<option value ="ASC">initial</option>-->
  		<option value ="ASC"<? if ($_POST[ascdesc]=="ASC") echo "selected" ?>>ascending</option>
  		<option value ="DESC"<? if ($_POST[ascdesc]=="DESC") echo "selected" ?>>descending</option>
		</select>
        
        <input type="submit" class = "css_btn_class" value = "OK"> 
        </form>
        
        <strong>Search:</strong><br>
        <form action="search.php" method="post">
        <select  name="search_select">
        <option value ="id">id</option>
  		<option value="take_price"<? if ($_POST[search_select]=="take_price") echo "selected" ?>>Price</option>
        <option value ="flight_number"<? if ($_POST[search_select]=="flight_number") echo "selected" ?>>flight number</option>
  		<option value ="departure"<? if ($_POST[search_select]=="departure") echo "selected" ?>>departure</option>
  		<option value="destination"<? if ($_POST[search_select]=="destination") echo "selected" ?>>destination</option>
        
		</select>
        
 		<input type="text" name="key">
 		<input type="submit" class = "css_btn2_class" value = "OK"> 
 		</form>


        
        
        
   		 <a href="comparison_list.php" class="css_btn_class">comparison</a>
         <a href="ADD.php" class="css_btn_class">New Plane</a>
         <a href="userlist.php" class="css_btn_class">User list</a>
         <a href="airport.php" class="css_btn_class">Airport</a>
		 <a href="country.php" class="css_btn_class">country</a>
         <a href="logout.php" class="css_btn2_class">Log out</a>
         
         
		
		<p>
        
            <?php 
				$ascdesc = "";
				$order = isset($_POST['order_select'])?$_POST['order_select']:'id';
				$ascdesc = isset($_POST['ascdesc'])?$_POST['ascdesc']:'ASC';
				//$search = isset($_POST['search_select'])?$_POST['search_select']:'id';
				//$key = $_POST['key'];
				//echo $order;
				//echo $ascdesc;
		
			  //$option = $_POST['order_select'];
		 	  //$option2 = $_POST['order_way']; ?>
        <!--<a href="comparison_list.php" class="css_btn_class">OK</a>
        		<p>-->
		  <?php
		  	
			if($_SESSION['is_admin'] == 1)
			{
				include("dbconnect.php");
					
				
				//echo '<table border="1">';
				echo "<table>";
				echo '<tr>';
				echo '<td>ID</td>';
				echo '<td>Code</td>';
				echo '<td>From</td>';
				echo '<td>To</td>';
				echo '<td>Depart</td>';
				echo '<td>Arrive</td>';
				echo '<td>Price</td>';
				echo '<td>favorite</td>';
				
				$sql = "SELECT * FROM `flight` ORDER BY  $order  $ascdesc, flight_number $ascdesc ";
				$sth = $db->prepare($sql);
				$sth->execute();
							
				while ($result = $sth->fetchObject()) 
				{
					$squl = "SELECT * FROM `favorite`WHERE flight_id=? AND user_account=?";
					$sthi = $db->prepare($squl);
					$sthi->execute(array($result->id,$_SESSION['account']));
					$result2 = $sthi->fetchObject();
					
					
					echo '<tr><td>'.$result->id.'<td>'.$result->flight_number.
								'</td><td>'.$result->departure.'</td><td>'.$result->destination.
								'</td><td>'.$result->departure_date.'</td><td>'.$result->arrival_date.
								'</td><td>'.$result->take_price.'</td>' ; 
					if($result2)
					{
						echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;***</td>' ;
					}
					else
					{
						echo '<td></td>';	
					}
					echo '<td WIDTH = 60 ;">';
					echo '<form method="post" action="delete.php" ALIGN=center style="margin:0px 0%">';
					echo '	<input type="hidden" name="id" value="'.$result -> id.'" >';
					echo '	<button type = "submit" style="width:50px;"> Delete</button>';
					echo '</form>';
					echo '</td>';
					echo '<td WIDTH = 60 style="border-left:0px solid;border-right:0px solid;">';
					echo '<form method="post" action="EDIT.php" ALIGN=center style="margin:0px 0%">';
					echo '	<input type="hidden" name="id" value="'.$result -> id.'" >';
					echo '	<input type="hidden" name="flight_number" value="'.$result->flight_number.'" >';
					echo '	<input type="hidden" name="departure" value="'.$result->departure.'" >';
					echo '	<input type="hidden" name="destination" value="'.$result->destination.'" >';
					echo '	<input type="hidden" name="departure_date" value="'.$result->departure_date.'" >';
					echo '	<input type="hidden" name="arrival_date" value="'.$result->arrival_date.'" >';
					echo '	<input type="hidden" name="take_price" value="'.$result->take_price.'" >';
					echo '	<button type = "submit" style="width:50px;"> Edit</button>';
					echo '</form>';
					echo '</td>';
					
					
					if(!$result2)
					{
						echo '<td WIDTH = 80 ;">';
						echo '<form method="post" action="favorite.php" ALIGN=center style="margin:0px 0%">';
						echo '	<input type="hidden" name="id" value="'.$result -> id.'" >';
						echo '	<button type = "submit" style="width:70px;"> Favorite</button>';
						echo '</form>';
						echo '</td>';
					}
					else
					{
						echo '<td WIDTH = 80 ;">';
						echo '<form method="post" action="cancel.php" ALIGN=center style="margin:0px 0%">';
						echo '	<input type="hidden" name="id" value="'.$result -> id.'" >';
						echo '	<button type = "submit" style="width:70px;"> Cancel</button>';
						echo '</form>';
						echo '</td>';
					}
					echo '</tr>';
				}
			echo '</table>';
			}
			
			else{
				echo '<meta http-equiv=REFRESH CONTENT=3;url=index.html>';
				}
				
		?>
	    </p>
		<p><img src="travel.jpg" width="220" height="184"  alt=""/><br/>
		

	</body>
</html>


<style type="text/css">
.css_btn_class {
	font-size:16px;
	font-family:Trebuchet MS;
	font-weight:bold;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	border-radius:8px;
	border:1px solid #84bbf3;
	padding:9px 18px;
	text-decoration:none;
	background:-moz-linear-gradient( center top, #bddbfa 5%, #80b5ea 100% );
	background:-ms-linear-gradient( top, #bddbfa 5%, #80b5ea 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#bddbfa', endColorstr='#80b5ea');
	background:-webkit-gradient( linear, left top, left bottom, color-stop(5%, #bddbfa), color-stop(100%, #80b5ea) );
	background-color:#bddbfa;
	color:#ffffff;
	display:inline-block;
	text-shadow:1px 1px 0px #528ecc;
 	-webkit-box-shadow:inset 1px 1px 0px 0px #dcecfb;
 	-moz-box-shadow:inset 1px 1px 0px 0px #dcecfb;
 	box-shadow:inset 1px 1px 0px 0px #dcecfb;
}.css_btn_class:hover {
	background:-moz-linear-gradient( center top, #80b5ea 5%, #bddbfa 100% );
	background:-ms-linear-gradient( top, #80b5ea 5%, #bddbfa 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#80b5ea', endColorstr='#bddbfa');
	background:-webkit-gradient( linear, left top, left bottom, color-stop(5%, #80b5ea), color-stop(100%, #bddbfa) );
	background-color:#80b5ea;
}.css_btn_class:active {
	position:relative;
	top:1px;
}
</style>

<style type="text/css">
.css_btn2_class {
	font-size:16px;
	font-family:Trebuchet MS;
	font-weight:bold;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	border-radius:8px;
	border:1px solid #337fed;
	padding:9px 18px;
	text-decoration:none;
	background:-moz-linear-gradient( center top, #3d94f6 5%, #1e62d0 100% );
	background:-ms-linear-gradient( top, #3d94f6 5%, #1e62d0 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3d94f6', endColorstr='#1e62d0');
	background:-webkit-gradient( linear, left top, left bottom, color-stop(5%, #3d94f6), color-stop(100%, #1e62d0) );
	background-color:#3d94f6;
	color:#ffffff;
	display:inline-block;
	text-shadow:1px 1px 0px #1570cd;
 	-webkit-box-shadow:inset 1px 1px 0px 0px #97c4fe;
 	-moz-box-shadow:inset 1px 1px 0px 0px #97c4fe;
 	box-shadow:inset 1px 1px 0px 0px #97c4fe;
}.css_btn2_class:hover {
	background:-moz-linear-gradient( center top, #1e62d0 5%, #3d94f6 100% );
	background:-ms-linear-gradient( top, #1e62d0 5%, #3d94f6 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#1e62d0', endColorstr='#3d94f6');
	background:-webkit-gradient( linear, left top, left bottom, color-stop(5%, #1e62d0), color-stop(100%, #3d94f6) );
	background-color:#1e62d0;
}.css_btn2_class:active {
	position:relative;
	top:1px;
}

</style>


<style type="text/css">
table {
	font:normal 76%/150% "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	border-collapse:separate;
	border-spacing:0;
	margin:0 0 1em;
	color:#000;
	}
table a {
	color:#523A0B;
	text-decoration:none;
	border-bottom:1px dotted;
	}
table a:visited {
	color:#444;
	font-weight:normal;
	}
table a:visited:after {
	content:"\00A0\221A";
	}
table a:hover {
	border-bottom-style:solid;
	}
thead th,
thead td,
tfoot th,
tfoot td {
	border:1px solid #523A0B;
	border-width:1px 0;
	background:#EBE5D9;
	}
th {
	font-weight:bold;
	line-height:normal;
	padding:0.25em 0.5em;
	text-align:left;
	}
tbody th,
td {
	padding:0.25em 0.5em;
	text-align:left;
	vertical-align:top;
	}
tbody th {
	font-weight:normal;
	white-space:nowrap;
	}
tbody th a:link,
tbody th a:visited {
	font-weight:bold;
	}
tbody td,
tbody th {
	border:1px solid #fff;
	border-width:1px 0;
	}
tbody tr.odd th,
tbody tr.odd td {
	border-color:#EBE5D9;
	background:#F7F4EE;
	}
tbody tr:hover td,
tbody tr:hover th {
	background:#ffffee;
	border-color:#523A0B;
	}
caption {
	font-family:Georgia,Times,serif;
	font-weight:normal;
	font-size:1.4em;
	text-align:left;
	margin:0;
	padding:0.5em 0.25em;
	}
	</style>