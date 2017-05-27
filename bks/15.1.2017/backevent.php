<?php require_once 'incl/sess_start.php'; ?>
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
	
	if(isset($_GET['evepg'])) {
	
	
	
	$query = "SELECT * FROM  eventusers WHERE USERID=".$userlogid." ";
	
	$result = mysqli_query($link,$query);
	 $euser_status[]=0;
	while ($row=mysqli_fetch_array($result)) {
		 $euser_status[]= $row["EVEID"];
	}
	
	
	
	//another from below
	
	$evePage = $_GET['evepg'];
	$hidebut = "";
	if($evePage=="T") {
		jumboHead('TODAY EVENTS','jevents');
		$query = "SELECT EID,ETITLE,EBYNAME,EBY,EDATE FROM eventdetails WHERE ESTATUS=".$estat." AND EDATE LIKE '%".date('Y-m-d')."%' ORDER BY EDATE ASC" ;
	} else if($evePage=="U") {
		jumboHead('UPCOMING EVENTS','jevents');
		$query = "SELECT EID,ETITLE,EBYNAME,EBY,EDATE FROM eventdetails WHERE ESTATUS=".$estat." AND EDATE>".date('Y-m-d')." ORDER BY EDATE DESC" ;
	} else if($evePage=="M") {
		jumboHead('MY EVENTS','jevents');
		$query = "SELECT EID,ETITLE,EBYNAME,EBY,EDATE FROM eventdetails WHERE EBY=".$userlogid." ORDER BY EDATE ASC" ;
		$hidebut = "1";
	}

		
	$result = mysqli_query($link,$query);
	
	if(mysqli_num_rows($result)!='') {
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
				$evecolor = "userregcolor";
			} else {
				$userevereg = 0;
				$evecolor = "";
			}
			
			$eoutput .='<div class="panel-group">';
			$eoutput .='<div class="container panel panel-default insidePanel '.$evecolor.' ">';
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
			
			if($hidebut!=1) {
					if ($userevereg)
					{
						$eoutput .=	'<div class="ieveRegStat pull-right"><i class="fa fa-bookmark" aria-hidden="true"></i> You Registered</div>';
						$eoutput .=	'<button type="button" onclick=eusermgmt("D","'.$eid[$i].'")  class="btn btn-warning btn-xs"><i class="fa fa-times" aria-hidden="true"></i>&nbsp; N O</button>';

					} else {
						$eoutput .=	'<button type="button" onclick=eusermgmt("I","'.$eid[$i].'")  class="btn btn-success btn-xs"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Y E S</button>';
					}
			}
			
			
			$eoutput .=	"</div>";
			
			$eoutput .=	"</div>";	
			$eoutput .=	"</div>";
			$eoutput .=	"</div>";
			
		}
		
	} else {
		
		//$eoutput = "No events available.";
		$eoutput =  bsalert('E',"No events available.","Sorry,","p");
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
		}else if($usereve == "C"){
			
			$query2 = "DELETE FROM  eventusers WHERE EVEID=".$eveid." ";
			$result = mysqli_query($link,$query2);
			
			$query3 = "DELETE FROM  eventdetails WHERE EID=".$eveid." ";
			$result3 = mysqli_query($link,$query3);
			
			if($result3) {
				redirect('fmain.php');
			}
		}
		
		$result = mysqli_query($link,$query);
		
		if($result) {
			//echo "success";
			echo  bsalert('S',"Updated successfully","","p");
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
			$neTotaldate    = $nedate. ' ' .$netime;
			$neby 			= $userlogid;
			
			$query1 = "SELECT NAME FROM userdet WHERE USERID=".$neby." ";
			$result1 = mysqli_query($link,$query1);
			$row1=mysqli_fetch_array($result1);
			$nebyname = $row1['NAME'];
			
			$query = "INSERT INTO eventdetails (ETITLE,EDESC,EBY,EBYNAME,EDATE) 
					  VALUES ('".$netitle."','".$neDesc."','".$neby."','".$nebyname."','".$neTotaldate."' )";
			
			$result = mysqli_query($link,$query);
			
			if($result) {
				//echo "Congratulations ! Event Created Successfully";
				echo bsalert('S',"Event Created Successfully");
				
			} else {
				//echo "failed to create event";
				echo bsalert('E',"failed to create event");
			}
		
		}	
	}
?>


<?php
				// ############## 	Get event registered users list	################
		if(isset($_POST['getreg'])) {
		
			$REGUSERS = "";
			$allregusers = "No Users";
		
			$eveid = $_POST['getreg'];
			
			$query =  "SELECT userdet.NAME AS REGUSERS,userdet.APTNUM AS REGAPT 
						 FROM userdet  
						 INNER JOIN eventusers 
						 ON userdet.USERID=eventusers.USERID  
						 WHERE eventusers.EVEID=".$eveid."  ";
						 
			$result = mysqli_query($link,$query);
			
			if(mysqli_num_rows($result)) {
				while ($row=mysqli_fetch_array($result)) {
					$REGUSERS[]= $row["REGUSERS"];
					$REGAPT[]= $row["REGAPT"];
				}
				
				$arrcount=count($REGUSERS);
				
				$allregusers = "";
				
				for($i=0;$i<$arrcount;$i++){
					$allregusers .= "<p class='text-center'>".$REGUSERS[$i]." , Apartment: ".$REGAPT[$i]."</p> <hr/>";
				}
			}
			
			echo $allregusers;
			
		}
		
		
?>
