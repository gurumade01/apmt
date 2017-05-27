<?php //require_once "incl/dbconn.php" ;?>
<?php


	$ACT	= '0';
	$ACA	= '0';
	$ACE	= '0';
	$ACTM	= '0';
	
	
		
	$query  = "SELECT count(*) AS ACT FROM complaints where CTO=".$userlogid." AND CSTATUS!=1 AND CPRIO=1 AND CDOR LIKE '%".date('Y-m-d')."%'; ";
	$result = mysqli_query ($link,$query);
	$row= mysqli_fetch_assoc($result);
	$ACT	= $row["ACT"];
	

	$query  = "SELECT count(*) AS ACA FROM complaints where CSTATUS!=1; ";
	$result = mysqli_query ($link,$query);
	$row= mysqli_fetch_assoc($result);
	$ACA	= $row["ACA"];
	

	$query  = "SELECT count(*) AS ACE FROM complaints where CTO=".$userlogid." AND CSTATUS=2; ";
	$result = mysqli_query ($link,$query);
	$row= mysqli_fetch_assoc($result);
	$ACE	= $row["ACE"];
	
	$query  = "SELECT count(*) AS ACTM FROM complaints where CTO=".$userlogid." AND CSTATUS!=1 ORDER BY CDOR DESC; ";
	$result = mysqli_query ($link,$query);
	$row= mysqli_fetch_assoc($result);
	$ACTM	= $row["ACTM"];

	$result = mysqli_query ($link,$query);
		

	
	
?>