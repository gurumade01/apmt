<?php  // #########  LIST OF COMPLAINTS OPEN/CLOSEE #########?>

<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>

<?php
	if(isset($_SESSION['userlogid'])) {
		
		$userlogid = $_SESSION['userlogid'];
		
	} else {
		
		$userlogid = 9999;
	}
?>

<?php
	
	/* 
		Complaint status codes 
		
		0 :	Opened
		1 : Closed
		2 : Escalated
		3 : Reopened
		
	*/
	

	$comptype = $_GET['comptype'];
	
	if($comptype == 'CO') {
		jumboHead('OPEN COMPLAINTS','jcomp'); 
		$query = "SELECT CID,CTITLE,CSTATUS FROM complaints where CBY=".$userlogid." AND CSTATUS=0 ORDER BY CDOR DESC " ;
	} else if($comptype == 'CC') {
		jumboHead('CLOSED COMPLAINTS','jcomp'); 
		$query = "SELECT CID,CTITLE,CSTATUS FROM complaints where CBY=".$userlogid." AND CSTATUS=1 ORDER BY CDOR DESC " ;
	} 
	
	
	$result = mysqli_query($link,$query);
	
	$listview = "";
	
	if(mysqli_num_rows($result)) {
		while ($row=mysqli_fetch_array($result)) {	
			$cid[]= $row["CID"];
			$ctitle[]= $row["CTITLE"];
			$cstatus[]= $row["CSTATUS"];
		}

		$arrcount=count($cid);
		
		for($i=0;$i<$arrcount;$i++){
			$listview  .= '<div class="panel panel-default insidePanel">';
			$listview  .= '<div class="panel-body">';
			$listview  .=	"<li>";
			$listview  .=		"<a href=cindi.php?cid=".$cid[$i].">";
			$listview  .=			"<span class='eveTitle'>".$ctitle[$i]."</span>";
			$listview  .=		"</a>";
			$listview  .=	"</li>";
				
			$listview  .=	"<li>" ;
			$listview  .=		'<i class="fa fa-hashtag" aria-hidden="true"></i>';
			$listview  .=		'<span class="cTextDef">ID: </span>';
			$listview  .=		'<span class="cTextDet">'.$cid[$i].'</span>';
			$listview  .=	'</li>';
				
			$listview  .=	'<li>';
			$listview  .=		'<i class="fa fa-server" aria-hidden="true"></i>';
			$listview  .=		'<span class="cTextDef">Status: </span>';
			if($cstatus[$i] == 0) {
				$cstatustext = "Complaint Opened";
			} else if($cstatus[$i] == 1) {
				$cstatustext = "Complaint Closed";
			}  else if($cstatus[$i] == 2) {
				$cstatustext = "Complaint Escalated";
			} 
			$listview  .=		'<span class="cTextDet">'.$cstatustext.'</span>';
			$listview  .=	'</li>';
			$listview  .=	'</div>';
			$listview  .=	'</div>';
			
			
		}
	} else {
			$listview  = '<p class="text-center">-------  No Complaints  -------</p>';
	}
?>
