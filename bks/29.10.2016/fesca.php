<?php
	/* 

		PRIORITY LEVEL codes 
		0 :	URGENT WITH IN 2 HOURS
		1 : BY TODAY
		2 : BY WEEKEND
		3 : NOT VERY URGENT
		
		
		Active
		Raised date and time
		prio
		
		UPDATE complaints 
		SET CSTATUS = 2 
		WHERE CID="id"
	*/
	
	$query = "SELECT * FROM complaints WHERER CSTATUS !=1 AND CPRIO!=3 ";
	$result = mysqli_query($link,$query);
	if($result) {
		while ($row=mysqli_fetch_array($result)) {
		 $CID[]= $row["CID"];
		 $CDOR[]= $row["CDOR"];
		 $CPRIO[]= $row["CPRIO"];
		}
		
		for($i=0;$i<$arrcount;$i++){
			// Core function here 
			$getprio =  $CPRIO[$i];
			
			SWITCH ($getprio) {
				case '0' :
					if($CDOR[$i] <  ) {
						
					}
					exit();
				case '1' :
				
					exit();
				default : 
					
			}
			
		}
	}
	
?>
