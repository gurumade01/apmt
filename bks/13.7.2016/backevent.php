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
	
	$estat = 2;
	
	$query = "SELECT * FROM eventdetails WHERE ESTATUS=".$estat." ORDER BY EDATE ASC" ;
		
	$result = mysqli_query($link,$query);
	
	if(mysqli_num_rows($result)) {
		while ($row=mysqli_fetch_array($result)) {
			$eid[]		 = $row['EID'];
			$etitle[]    = $row['ETITLE'];
			$edesc[]	 = $row['EDESC'];
			$eby[]		 = $row['EBY'];
			$ebyname[]	 = $row['EBYNAME'];
			$etype[]	 = $row['ETYPE'];
			$estatus[] 	 = $row['ESTATUS'];
			$edate[]	 = $row['EDATE'];
			$eremind[] 	 = $row['EREMIND'];
		}
		
		$arrcount = count($eid);
		
		$eoutput = "";
		
		for($i=0;$i<$arrcount;$i++){
			$eoutput .= "Event Title : ".$etitle[$i]."<br/>";
			$eoutput .= "Organised By : ".$ebyname[$i]."<br/>";
			$eoutput .= "Date & Time : ".$edate[$i]."<br/>";
			$eoutput .= "<a href='#' class='emore'>more>></a><br/> <br/>";
			$eoutput .= "<input type='button' value='Join this event' id=join".$eid[$i]." onClick='event_function(".$eid[$i].")' />";
			$eoutput .= "<br/>========================<br/>";
		}
		
	} else {
		
		$eoutput = "No events available.";
	}
	
	
?>



<?php
	// ############## 	FOR EVENT CREATION	################
	if(isset($_POST['esubmit'])) {
		
		$logvalues = array('netitle','neDesc','nedate','netime');
		$emptyCheck = formEmpty($logvalues);
		if($emptyCheck) {
			echo $emptyCheck;
		} else {
			$netitle		= dbescape('netitle');
			$neDesc			= dbescape('neDesc');
			$nedate			= dbescape('nedate');
			$netime			= dbescape('netime');
			$neTotaldate    = $nedate+$netime;
			$neby 			= $userlogid;
			if($neby == 9999) {
				$nebyname = "guest";
			} else {
				
				$nebyname = "";
			}
			
			$query = "INSERT INTO eventdetails (ETITLE,EDESC,EBY,EBYNAME,EDATE) 
					  VALUES ('".$netitle."','".$neDesc."','".$neby."','".$nebyname."','".$neTotaldate."' )";
			
			$result = mysqli_query($link,$query);
			
			if($result) {
				echo "Congratulations ! Event Created Successfully";
			} else {
				echo "failed to create event";
			}
		
		}	
	}
?>
