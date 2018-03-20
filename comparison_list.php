<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>	Welcome  </title>
	</head>
	<body bgcolor="#FFFFFF">
    <?php if($_SESSION['account'] != null)
		{ ?>
    	<strong>Order by:</strong><br>
		<form action="comparison_list.php" method="post" >
    	<select  name="order_select">
        <option value ="id">initial</option>
  		<option value ="departure_date"<? if ($_POST[order_select]=="departure_date") echo "selected" ?>>departure date</option>
  		<option value ="arrival_date"<? if ($_POST[order_select]=="arrival_date") echo "selected" ?>>arrival date</option>
  		<option value="take_price"<? if ($_POST[order_select]=="take_price") echo "selected" ?>>Price</option>
        
		</select>
        <!--choose order-->
        <select  name="ascdesc">
        <!--<option value ="ASC">initial</option>-->
  		<option value ="ASC"<? if ($_POST[ascdesc]=="ASC") echo "selected" ?>>ascending</option>
  		<option value ="DESC"<? if ($_POST[ascdesc]=="DESC") echo "selected" ?>>descending</option>
		</select>
        
        <input type="submit" class = "css_btn_class" value = "OK"> 
        </form>
        
  	  <a href="logout.php" class="css_btn2_class">Log out</a>
        <!--<a href="ADD.php" class="css_btn3_class"> New Plane</a>-->
    <!--choose ascend or descend-->
       
        <?php 
				$ascdesc = "";
				$order = isset($_POST['order_select'])?$_POST['order_select']:'id';
				$ascdesc = isset($_POST['ascdesc'])?$_POST['ascdesc']:'ASC';
				//echo $order;
				//echo $ascdesc;
		
			  //$option = $_POST['order_select'];
		 	  //$option2 = $_POST['order_way']; ?>
        <!--<a href="comparison_list.php" class="css_btn_class">OK</a>
        		<p>-->
		<?php
		
					include("dbconnect.php");
					
					echo "<table>";
					//echo '<table border="1">';
					echo '<tr>';
					echo '<td>ID</td>';
					echo '<td>Code</td>';
					echo '<td>From</td>';
					echo '<td>To</td>';
					echo '<td>Depart</td>';
					echo '<td>Arrive</td>';
					echo '<td>Price</td>';

					$sql ="SELECT * FROM `flight` ORDER BY $order  $ascdesc, flight_number $ascdesc ";
					$sth = $db->prepare($sql);
					$sth->execute();

					//$productCount = mysqli_num_rows($sql); // count the output amount
					
						while($result = $sth->fetchObject()){
    						$squl = "SELECT * FROM `favorite` WHERE user_account=? AND flight_id=?";
							$st = $db->prepare($squl);
							$st->execute(array($_SESSION['account'],$result->id));
							$result2 = $st->fetchObject();
							
							if($result2)
							{
								echo '<tr><td>'.$result->id.'<td>'.$result->flight_number.
								'</td><td>'.$result->departure.'</td><td>'.$result->destination.
								'</td><td>'.$result->departure_date.'</td><td>'.$result->arrival_date.
								'</td><td>'.$result->take_price.'</td>' ;
								echo '<td WIDTH = 60 ;">';
								echo '<form method="post" action="cancel2.php" ALIGN=center style="margin:0px 0%">';
								echo '	<input type="hidden" name="id" value="'.$result -> id.'" >';
								echo '	<button type = "submit" style="width:50px;"> Delete</button>';
								echo '</form>';
								echo '</td>';	
							} 
						}
					
				echo '</table>';
			
				if($_SESSION['is_admin']!=0) echo '<a href="flight.php" class="css_btn2_class">Back</a>';
				else     						echo '<a href="flight_user.php" class="css_btn2_class">Back</a>';
			
				
			?>	
		
	    </p>
		<p><img src="travel.jpg" width="220" height="184"  alt=""/><br/>
        <?php }
		else{
			echo '<meta http-equiv=REFRESH CONTENT=0;url=index.html>';
			}	
		?>
	</body>
</html>
<!--bottom-->
<style type="text/css">
	.css_btn_class {
		font-size:19px;
		font-family:Arial;
		font-weight:bold;
		-moz-border-radius:8px;
		-webkit-border-radius:8px;
		border-radius:8px;
		border:1px solid #83c41a;
		padding:9px 18px;
		text-decoration:none;
		background:-moz-linear-gradient( center top, #b8e356 5%, #a5cc52 100% );
		background:-ms-linear-gradient( top, #b8e356 5%, #a5cc52 100% );
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#b8e356', endColorstr='#a5cc52');
		background:-webkit-gradient( linear, left top, left bottom, color-stop(5%, #b8e356), color-stop(100%, #a5cc52) );
		background-color:#b8e356;
		color:#ffffff;
		display:inline-block;
		text-shadow:1px 1px 0px #86ae47;
 		-webkit-box-shadow: 1px 1px 0px 0px #d9fbbe;
 		-moz-box-shadow: 1px 1px 0px 0px #d9fbbe;
 		box-shadow: 1px 1px 0px 0px #d9fbbe;
		}.css_btn_class:hover {
			background:-moz-linear-gradient( center top, #a5cc52 5%, #b8e356 100% );
			background:-ms-linear-gradient( top, #a5cc52 5%, #b8e356 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#a5cc52', endColorstr='#b8e356');
			background:-webkit-gradient( linear, left top, left bottom, color-stop(5%, #a5cc52), color-stop(100%, #b8e356) );
			background-color:#a5cc52;
		}.css_btn_class:active {
			position:relative;
			top:1px;
		}
</style>

<style type="text/css">
.css_btn2_class {
	font-size:16px;
	font-family:Comic Sans MS;
	font-weight:normal;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	border-radius:8px;
	border:1px solid #eeb44f;
	padding:9px 18px;
	text-decoration:none;
	background:-moz-linear-gradient( center top, #ffce79 5%, #eeaf41 100% );
	background:-ms-linear-gradient( top, #ffce79 5%, #eeaf41 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffce79', endColorstr='#eeaf41');
	background:-webkit-gradient( linear, left top, left bottom, color-stop(5%, #ffce79), color-stop(100%, #eeaf41) );
	background-color:#ffce79;
	color:#ffffff;
	display:inline-block;
	text-shadow:1px 1px 0px #ce8e28;
 	-webkit-box-shadow:inset 1px 1px 0px 0px #fceaca;
 	-moz-box-shadow:inset 1px 1px 0px 0px #fceaca;
 	box-shadow:inset 1px 1px 0px 0px #fceaca;
}.css_btn2_class:hover {
	background:-moz-linear-gradient( center top, #eeaf41 5%, #ffce79 100% );
	background:-ms-linear-gradient( top, #eeaf41 5%, #ffce79 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#eeaf41', endColorstr='#ffce79');
	background:-webkit-gradient( linear, left top, left bottom, color-stop(5%, #eeaf41), color-stop(100%, #ffce79) );
	background-color:#eeaf41;
}.css_btn2_class:active {
	position:relative;
	top:1px;
}

</style>

<style type="text/css">
.css_btn3_class {
	font-size:16px;
	font-family:Comic Sans MS;
	font-weight:normal;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	border-radius:8px;
	border:1px solid #eda933;
	padding:9px 18px;
	text-decoration:none;
	background:-moz-linear-gradient( center top, #f6b33d 5%, #d29105 100% );
	background:-ms-linear-gradient( top, #f6b33d 5%, #d29105 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f6b33d', endColorstr='#d29105');
	background:-webkit-gradient( linear, left top, left bottom, color-stop(5%, #f6b33d), color-stop(100%, #d29105) );
	background-color:#f6b33d;
	color:#ffffff;
	display:inline-block;
	text-shadow:1px 1px 0px #cd8a15;
 	-webkit-box-shadow:inset 1px 1px 0px 0px #fed897;
 	-moz-box-shadow:inset 1px 1px 0px 0px #fed897;
 	box-shadow:inset 1px 1px 0px 0px #fed897;
}.css_btn3_class:hover {
	background:-moz-linear-gradient( center top, #d29105 5%, #f6b33d 100% );
	background:-ms-linear-gradient( top, #d29105 5%, #f6b33d 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#d29105', endColorstr='#f6b33d');
	background:-webkit-gradient( linear, left top, left bottom, color-stop(5%, #d29105), color-stop(100%, #f6b33d) );
	background-color:#d29105;
}.css_btn3_class:active {
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