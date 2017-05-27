<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>

<?php
	if(isset($_SESSION['userlogid'])) {
		
		$userlogid = $_SESSION['userlogid'];
		
	} else {
		
		$userlogid = "9999";
	}
?>


<?php
	//$d = basename(__FILE__, '.php'); 
	
	
	/* 
		### event status ###
		0 - created
		1 - Proposed for choice
		2 - Confirmed
		3 - Cancelled
		
		---------------------------
		### event type ###
		
	*/
	
	
	$d	= $_SERVER['PHP_SELF'];

	if($d=='/apmt/fcomp.php') {
		
		$query = "SELECT count(CID) AS ETODAY FROM complaints where CBY=".$userlogid." AND CSTATUS!=1 " ;
	} else {
		$estat = 2;

		$query = "SELECT count(EID) AS ETODAY FROM eventdetails WHERE ESTATUS=".$estat." AND EDATE LIKE '%".date('Y-m-d')."%'" ;

	}
	// ##############  THIS GETS COUNT OF TODAY EVENTS #################
	
	
	$result = mysqli_query($link,$query);
	$todayCount =0;
	if(mysqli_num_rows($result)) {
		while ($row=mysqli_fetch_array($result)) {
			$todayCount = $row["ETODAY"];
		}
		
		//echo $todayCount;
	}
	
?>
