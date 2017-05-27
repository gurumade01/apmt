<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>

<?php
	if(isset($_SESSION['userlogid'])) {
		
		$userlogid = $_SESSION['userlogid'];
		
	} else {
		
		$userlogid = 9999;
	}
?>

<?php include 'incl/top.php'; ?>

<!-- TOP NAV -->
<?php include 'incl/adminnav.php';?>

<?php
	echo '<div class="container">';
	
	if(isset($_GET['cid'])) {
		
		$compId = $_GET['cid'];
	
		$query = "SELECT * FROM complaints where CID=".$compId." ORDER BY CDOR DESC, CSTATUS ASC " ;
		
		$result = mysqli_query($link,$query);
		
		if(mysqli_num_rows($result)) {
			$row=mysqli_fetch_array($result);
			
			$cid	=$row["CID"];
			$ctitle	=$row["CTITLE"];
			$cdesc	=$row["CDESC"];
			$cprio	=$row["CPRIO"];
			$cby	=$row["CBY"];
			$cto	=$row["CTO"];
			$careaid=$row["CAREAID"];
			$ccate	=$row["CCATE"];
			$csubcate=$row["CSUBCATE"];
			$cstatus=$row["CSTATUS"];
			$cnotes	=$row["CNOTES"];
			$cdor	=$row["CDOR"];

			$cstatus1 = compStatus($cstatus);
			
			echo "Details for complaint number: ".$cid."<br/>";
			
			$cdetails  = "Complaint: ".$ctitle."<br/>";
			$cdetails .= "Description: ".$cdesc."<br/>";
			$cdetails .= "Priority: ".$cprio."<br/>";
			$cdetails .= "Raised by: ".$cby."<br/>"; //
			$cdetails .= "Assigned to: ".$cto."<br/>"; //
			$cdetails .= "Problem Area: ".$careaid."<br/>";
			$cdetails .= "Category: ".$ccate."<br/>";
			$cdetails .= "Sub-category: ".$csubcate."<br/>";
			$cdetails .= "Status: ".$cstatus."<br/>";
			$cdetails .= "Additional Notes: ".$cnotes."<br/>";
			$cdetails .= "Date & Time of complaint raised: ".$cdor."<br/>";
			
			echo $cdetails;
			
			echo "<br/><hr/>";
			
			
			
		} else {
			echo "Invalid Complaint Number <br/>";
		}
		
		
	}
	else {
		echo "CID is required";
	}
	
	echo "</div>";
?>

<?php include 'incl/bottom.php'; ?>
