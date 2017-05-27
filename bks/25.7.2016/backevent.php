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
	
	if(isset($_GET['evepg'])) {
	
	$estat = 2;
	
	$query = "SELECT * FROM  eventusers WHERE USERID=".$userlogid." ";
	
	$result = mysqli_query($link,$query);
	
	while ($row=mysqli_fetch_array($result)) {
		$euser_status[]= $row["EVEID"];
	}
	
	
	
	//another from below
	
	$evePage = $_GET['evepg'];
	
	if($evePage=="T") {
		jumboHead('TODAY EVENTS','jevents');
		$query = "SELECT EID,ETITLE,EBYNAME,EBY,EDATE FROM eventdetails WHERE ESTATUS=".$estat." AND EDATE LIKE '%".date('Y-m-d')."%' ORDER BY EDATE ASC" ;
	} else if($evePage=="U") {
		jumboHead('UPCOMING EVENTS','jevents');
		$query = "SELECT EID,ETITLE,EBYNAME,EBY,EDATE FROM eventdetails WHERE ESTATUS=".$estat." AND EDATE>".date('Y-m-d')." ORDER BY EDATE ASC" ;
	} else if($evePage=="M") {
		jumboHead('MY EVENTS','jevents');
		$query = "SELECT EID,ETITLE,EBYNAME,EBY,EDATE FROM eventdetails WHERE EBY=".$userlogid." ORDER BY EDATE ASC" ;
	}

		
	$result = mysqli_query($link,$query);
	
	if(mysqli_num_rows($result)) {
		while ($row=mysqli_fetch_array($result)) {
			$eid[]    	 = $row['EID'];
			$etitle[]    = $row['ETITLE'];
			$eby[]		 = $row['EBY'];
			$ebyname[]	 = $row['EBYNAME'];
			$edate[]	 = $row['EDATE'];
		}
		
		$arrcount = count($eid);
		
		$eoutput = "";

		for($i=0;$i<$arrcount;$i++){
		
			if(in_array($eid[$i],$euser_status)) {
				$userevereg = 1;
			} else {
				$userevereg = 0;
			}
			
			$eoutput .='<div class="panel panel-default insidePanel">';
			$eoutput .='<div class="panel-body">';
			
			
			$eoutput .= "<a href=feveindi.php?eid=".$eid[$i]."&etitle=".$etitle[$i]."&eby=".$eby[$i]."&ebyname=".$ebyname[$i]."&userevereg=".$userevereg."&edate=".$edate[$i].">";
			$eoutput .=	"<span class='eveTitle'>".$etitle[$i]."</span>";
			$eoutput .=	"</a>";

			
			$eoutput .='<div class="eveSchedule">';
			$eoutput .='<i class="fa fa-user" aria-hidden="true"></i> <span id="eveBy">'.$ebyname[$i].'</span>';
			
			$eoutput .=	'<i class="fa fa-home spa" aria-hidden="true"></i> <span  id="eveByHome">'.$eby[$i].'</span>';

			$eoutput .=	'<br/>';
					
			$eoutput .=	'<i class="fa fa-calendar" aria-hidden="true"></i> <span id="eveDate" >'.$edate[$i].'</span>';
					
			$eoutput .=	'<i class="fa fa-clock-o spa" aria-hidden="true"></i> <span  id="eveTime">'.'12:30PM'.'</span>';

			$eoutput .=	'</div>';
				
			$eoutput .=	'<div class="eveBut">';
			
			if ($userevereg)
			{
				$eoutput .=	'<div class="ieveRegStat pull-right"><i class="fa fa-info-circle" aria-hidden="true"></i> You Registered</div>';
				$eoutput .=	'<button type="button" onclick=eusermgmt("D","'.$eid[$i].'")  class="btn btn-warning btn-xs"><i class="fa fa-times" aria-hidden="true"></i>&nbsp; Can\'t Attend</button>';

			} else {
				$eoutput .=	'<button type="button" onclick=eusermgmt("I","'.$eid[$i].'")  class="btn btn-success btn-xs"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Register</button>';
			}
			
			
			$eoutput .=	"</div>";
			
			$eoutput .=	"</div>";	
			$eoutput .=	"</div>";
			
		}
		
	} else {
		
		$eoutput = "No events available.";
	}
	
	}
?>





<?php
	// ############## 	FOR event DB user reg or calcel	################

	if(isset($_POST['eveDBType'])) {
		$usereve = $_POST['eveDBType'];
		$eveid = $_POST['eveID'];
		if($usereve == "D") {
			$query = "DELETE FROM  eventusers WHERE USERID=".$userlogid." AND EVEID=".$eveid." ";
		} else if($usereve == "I"){
			$query = "INSERT INTO eventusers (EVEID,USERID) VALUES(".$eveid.",".$userlogid.")";
		}
		
		$result = mysqli_query($link,$query);
		
		if($result) {
			echo "success";
		}else {
			echo "Error UPDATING record: " . mysqli_error($link);
		}
	}
	
	
	// ############## 	End event DB user reg or calcel	################
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
