<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>


<?php
	$query = "SELECT CDOR FROM complaints LIMIT 1";
	$result = mysqli_query($link,$query);
	
	
	$row=mysqli_fetch_array($result);
	$CDOR[]= $row["CDOR"];

	$newtime = explode(" ",$CDOR[0]);
	$getdate = $newtime[0];
	$gettime = $newtime[1];
	
	echo $CDOR[0];
	
	echo "<br/>";
	echo "<br/>";
	
	echo $getdate;
	
	echo "<br/>";
	
	echo $gettime;
		
?>
