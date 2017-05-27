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
	
	
	/* 
		### event status ###
		0 - created
		1 - Proposed for choice
		2 - Confirmed
		3 - Cancelled
		
		---------------------------
		### event type ###
		
	*/
	
	// ##############  THIS GETS COUNT OF TODAY EVENTS #################
	
	$estat = 2;
	
	//$query = "SELECT * FROM eventdetails WHERE ESTATUS=".$estat." ORDER BY EDATE ASC" ;
	
	$query = "SELECT count(*) AS ETODAY FROM eventdetails WHERE ESTATUS=".$estat." AND EDATE LIKE '%".date('Y-m-d')."%'" ;

		
	$result = mysqli_query($link,$query);
	
	if(mysqli_num_rows($result)) {
		while ($row=mysqli_fetch_array($result)) {
			$todayCount = $row["ETODAY"];
		}
		
		//echo $todayCount;
	}
	
?>
