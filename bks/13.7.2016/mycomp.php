<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>

<?php
	//check if user logged in 
	/* 
		if(isset($_SESSION['USERID'])) {
		 // Perform all comp
	} else {
		echo "<br/>You need to login to view your complaints";
	}
	
	*/
	
	
	//get all comp from fb based on user id -- display as li
	$userId = 9999;
	
	$query = "SELECT CID,CTITLE,CSTATUS FROM complaints where CBY=".$userId." ORDER BY CDOR DESC " ;
	
	$result = mysqli_query($link,$query);
	
	if(mysqli_num_rows($result)) {
		while ($row=mysqli_fetch_array($result)) {	
			$cid[]= $row["CID"];
			$ctitle[]= $row["CTITLE"];
			$cstatus[]= $row["CSTATUS"];
		}

		$arrcount=count($cid);
		$clist = "<ul>";
		for($i=0;$i<$arrcount;$i++){
			$listview  = "Complaint Number: ".$cid[$i]. "<br/>";
			$listview .= "Complaint: ".$ctitle[$i]. "<br/>";
		 
			$cstatus1 = compStatus($cstatus[$i]);
			
			$listview .= "Status: ".$cstatus1."<br/>";
			
			$listview .= " <a href=cindi.php?cid=".$cid[$i].">See full details >></a> <br/>";
			
			$clist .= "<li>".$listview."</li> <br/> <hr/>";
		}
		$clist .= "</ul>";
		
		echo $clist;
	}
	
?>
