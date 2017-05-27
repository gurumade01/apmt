<?php
					
		
		//$userlogid=9999;
		
		$query = "SELECT NID,NTYPE,NTEXT,NHREF FROM notif WHERE NUSERID=".$userlogid." AND NSTATUS=0 ORDER BY NDATE LIMIT 5" ;
	
		$result = mysqli_query($link,$query);

		if(mysqli_num_rows($result)) {
			while ($row=mysqli_fetch_array($result)) {	
				$NID[]= $row["NID"];
				$NTYPE[]= $row["NTYPE"];
				$NTEXT[]= $row["NTEXT"];
				$NHREF[]= $row["NHREF"];
			}

			$arrcount=count($NID);
			$notifi = "";
			$notifi1 = "";
			for($i=0;$i<$arrcount;$i++){
					
						$notifi .= '<li class="linotif" role="presentation">';
						$notifi .= '<a role="menuitem" href="'.$NHREF[$i].'">';
						
						$notificon = notifdet($NTYPE[$i]); // just gets icon
							
						$notifi .= '<i class="fa '.$notificon.'" aria-hidden="true"></i>';
						$notifi .= '<span class="notiftext"> '.$NTEXT[$i].'</span>';
						$notifi .= '</a></li>';
					if(isset($_GET['NT'])) {
						
						$notifi1 .='<div class="panel panel-default ">';
						$notifi1 .='<div class="panel-body notifpanel">';
						
							$notifi1 .= '<a href="'.$NHREF[$i].'">';
					
							$notificon = notifdet($NTYPE[$i]); // just gets icon
								
							$notifi1 .= '<i class="fa '.$notificon.' iconnotif" aria-hidden="true"></i>';
							$notifi1 .= '<span class="notiftext"> '.$NTEXT[$i].'</span>';
							
							$notifi1 .= '</a>';
							
						$notifi1 .='</div>';
						$notifi1 .='</div>';
						
					}
			} // END OF FOR  DECIDER

			
		} else {
				$notifi = 'No Notifications';
				$notifi1 = 'No Notifications';
		}
		
		//echo $notifi;

?>