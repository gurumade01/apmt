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
	
if(isset($_GET['cp'])) { 
	
	$cparent = $_GET['cp'];

	$query = "SELECT CID,CNAME,CPOC FROM category WHERE CSTATUS=1 AND CPARENT=".$cparent." ";
	
	$result = mysqli_query($link,$query);
	
	if(mysqli_num_rows($result)) {
		while ($row=mysqli_fetch_array($result)) {
			$CID[]= $row["CID"];
			$CNAME[]= $row["CNAME"];
			$CPOC[]= $row["CPOC"];
		}
		
		$arrcount = count($CID);
			
		$eoutput = "";

		for($i=0;$i<$arrcount;$i++){
		
					
			$eoutput .= "<a class='list-group-item text-center' href=fcontact.php?cp=".$CID[$i]."&cpoc=".$CPOC[$i]."&cname=".$CNAME[$i].">".$CNAME[$i]."</a>";
			
		
		
		} // end of for loop
	} else {
		$eoutput = "Thats all left";
		// Name / Contact / Notes / Reviews
		
		$cpoc = $_GET['cpoc'];
		$cname = $_GET['cname'];
		
		$query = "SELECT NAME,PHONE FROM userdet WHERE ASTATUS=1 AND USERID=".$cpoc." LIMIT 1";
		$result = mysqli_query($link,$query);
		if(mysqli_num_rows($result)) {
			while ($row=mysqli_fetch_array($result)) {
				$C0NNAME[]= $row["NAME"];
				$CONPHONE[]= $row["PHONE"];
			}

			//$eoutput  ='<div class="panel panel-default panel-small insidePanel">';
			$eoutput  ='<div class="panel-body list-group-item text-center">';
			
			$eoutput .= "Name : ".$C0NNAME[0];
			$eoutput .= "<br/>";
			$eoutput .= "Phone : ".$CONPHONE[0];
			
			$eoutput .=	'</div>';
			//$eoutput .=	'</div>';
		} else {
			$eoutput =  "<p class='text-center'>Sorry, No Contact Number Available for category <b> ".$cname."</b></p>";
			$eoutput .= "<p class='text-center'> <a href=fcontact.php?cp=0> << Go Back </a></p>";
		}
		
	}

		/* 
			$query ="SELECT eventdetails.ETITLE AS ETITLE,eventdetails.EBYNAME AS EBYNAME,eventdetails.EBY AS EBY,eventdetails.EDATE AS EDATE,eventusers.EVEID AS EID
				 FROM eventdetails 
				 INNER JOIN eventusers 
				 ON eventdetails.EID=eventusers.EVEID 
				 WHERE eventusers.USERID=".$userlogid."  ";
				 */
				 
	
} else {
	
	$eoutput = "You are in wrong space. Go Back";
}


?>

