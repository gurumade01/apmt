<?php //require_once "incl/dbconn.php" ;?>
<?php


	$ACT	= '0';
	$ACA	= '0';
	$ACE	= '0';
	$ACTM	= '0';
	
	
		
	$query1  = "SELECT count(*) AS ACT FROM complaints where CTO=".$userlogid." AND CSTATUS!=1 AND CPRIO=1 AND CDOR LIKE '%".date('Y-m-d')."%' ";
	$result1 = mysqli_query ($link,$query1);
	$row= mysqli_fetch_assoc($result1);
	$ACT	= $row["ACT"];
	

	
	if(isset($_GET['W'])) {
		$query2  = "SELECT count(*) AS ACA FROM complaints where CSTATUS!=1 AND CTO=".$userlogid." ";
	} else {
		$query2  = "SELECT count(*) AS ACA FROM complaints where CSTATUS!=1";
	}
	$result2 = mysqli_query ($link,$query2);
	$row= mysqli_fetch_assoc($result2);
	$ACA	= $row["ACA"];
	
	if(isset($_GET['W'])) {
		$query3  = "SELECT count(*) AS ACE FROM complaints where CTO=".$userlogid." AND CSTATUS=2";
	} else {
		$query3  = "SELECT count(*) AS ACE FROM complaints where CSTATUS=2";
	}
	$query3  = "SELECT count(*) AS ACE FROM complaints where CTO=".$userlogid." AND CSTATUS=2";
	$result3 = mysqli_query ($link,$query3);
	$row= mysqli_fetch_assoc($result3);
	$ACE	= $row["ACE"];
	
	$query4  = "SELECT count(*) AS ACTM FROM complaints where CTO=".$userlogid." AND CSTATUS!=1 ORDER BY CDOR DESC";
	$result4 = mysqli_query ($link,$query4);
	$row= mysqli_fetch_assoc($result4);
	$ACTM	= $row["ACTM"];

	//$result = mysqli_query ($link,$query);
		

	
	
?>