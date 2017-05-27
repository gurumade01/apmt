<?php require_once "incl/dbconn.php" ;?>

<?php
	//$userlogid = 9999;
	

		$query ="SELECT eventdetails.ETITLE AS ETITLE,eventdetails.EBYNAME AS EBYNAME,eventdetails.EBY AS EBY,eventdetails.EDATE AS EDATE,eventusers.EVEID AS EID
				 FROM eventdetails 
				 INNER JOIN eventusers 
				 ON eventdetails.EID=eventusers.EVEID 
				 WHERE eventusers.USERID=".$userlogid."  ";
				 
		$result = mysqli_query($link,$query);
		
		$eoutput1 = "";
		
		if(mysqli_num_rows($result)) {
			while ($row=mysqli_fetch_array($result)) {
				$eidOWN[]    	 = $row['EID'];
				$etitleOWN[]     = $row['ETITLE'];
				$ebyOWN[]		 = $row['EBY'];
				$ebynameOWN[]	 = $row['EBYNAME'];
				$edateOWN[]	     = $row['EDATE'];
			}
			
			$arrcount = count($eidOWN);
			
			
			
		//	$userevereg = 1;
			
			for($i=0;$i<$arrcount;$i++){
				$eoutput1 .='<div class="panel panel-default insidePanel">';
				$eoutput1 .='<div class="panel-body">';
			
				$eoutput1 .= "<a href=feveindi.php?eid=".$eidOWN[$i]."&etitle=".$etitleOWN[$i]."&eby=".$ebyOWN[$i]."&ebyname=".$ebynameOWN[$i]."&userevereg=".$userevereg."&edate=".$edateOWN[$i].">";
				$eoutput1 .= "<span class='eveTitle text-left'>".$etitleOWN[$i]." &nbsp;&nbsp; </span>";
				
				$eoutput1 .= "</a>";
				$eoutput1 .= "<br/>";
				
				$eoutput1 .='<div class="eveSchedule">';
				$eoutput1 .='<i class="fa fa-user" aria-hidden="true"></i> <span id="eveBy">'.$ebyname[$i].'</span>';
				
				$eoutput1 .=	'<i class="fa fa-home spa" aria-hidden="true"></i> <span  id="eveByHome">'.$eby[$i].'</span>';

				$eoutput1 .=	'<br/>';
						
				$eoutput1 .=	'<i class="fa fa-calendar" aria-hidden="true"></i> <span id="eveDate" >'.$edate[$i].'</span>';
						
				$eoutput1 .=	'<i class="fa fa-clock-o spa" aria-hidden="true"></i> <span  id="eveTime">'.'12:30PM'.'</span>';

				$eoutput1 .=	'</div>';
				
				$eoutput .=	'<div class="eveBut">';
			
					$eoutput1 .=	'<div class="ieveRegStat pull-right"><i class="fa fa-info-circle" aria-hidden="true"></i> You Registered</div>';
					$eoutput1 .=	'<button type="button" onclick=eusermgmt("D","'.$eidOWN[$i].'")  class="btn btn-warning btn-xs"><i class="fa fa-times" aria-hidden="true"></i>&nbsp; Can\'t Attend</button>';

				
			
			
				$eoutput1 .=	"</div>";
				
				
				$eoutput1 .= "</div>";	
				$eoutput1 .= "</div>";
			}
			
		} else {
				$eoutput1 = "";
		}
		
		

?>
