<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>

<?php include 'incl/navbars.php'; ?>
<?php include 'incl/top.php'; ?>



<?php
	if(isset($_SESSION['userlogid'])) {
		
		$userlogid = $_SESSION['userlogid'];
		
	} else {
		
		$userlogid = "9999";
	}
?>



<?php
	if(isset($_GET['eid'])){
		if(isset($_GET['etitle'])){$etitle	 	= $_GET['etitle'];} else {$etitle	 	= "";};
		if(isset($_GET['ebyname'])){$ebyname 	= $_GET['ebyname'];} else {$ebyname 	= "";};
		if(isset($_GET['eby'])){$eby		= $_GET['eby'];} else {$eby		= "";};
		if(isset($_GET['edate'])){$edate		= $_GET['edate'];} else {$edate		= "";};
		//if(isset($_GET['userevereg'])){$userevereg = $_GET['userevereg'];} else {$userevereg = "";};
	
		$query = "SELECT EDESC FROM eventdetails WHERE EID=".$_GET['eid'];
		
		$result = mysqli_query($link,$query);
	
		if(mysqli_num_rows($result)) {
			$row=mysqli_fetch_array($result);
			$edesc = $row['EDESC'];
		}
		
		
		$query2 = "SELECT * FROM eventusers WHERE EVEID=".$_GET['eid']." AND USERID=".$userlogid." LIMIT 1";
		
		$result2 = mysqli_query($link,$query2);
	
		if(mysqli_num_rows($result2)) {
			$userevereg =1;
		} else {
			$userevereg ="";
		}
		
		
		
		
		$outputval = '<div class="container-fluid ieveUnit">';

		$outputval .= '<h4 class="well well-sm ievewell" id="ieveTitle">'.$etitle.'</h4>';
		
		$outputval .= '<p class="well well-sm text-justify ievewell" id="ieveDesc">'.$edesc.'</p>';
		
		$outputval .= '<div id="ieveDetails" class="well well-sm ievewell">';

					$outputval .= '<p><i class="fa fa-user" aria-hidden="true"></i> By: <span id="eveBy">'.$ebyname.'</span></p>';
						
					$outputval .= '<p><i class="fa fa-home spa" aria-hidden="true"></i> Place: <span  id="eveByHome">'.$eby.'</span></p>';
					
					$outputval .= '<p><i class="fa fa-calendar" aria-hidden="true"></i> Date: <span id="eveDate" class="ievedate">'.$edate.'</span></p>';
			
					$outputval .= '<p><i class="fa fa-clock-o spa" aria-hidden="true"></i> Time: <span  id="eveTime">12:30PM</span></p>';

		$outputval .= '</div>';
		
		
		$outputval .= '<div id="ievebtnblock">';

	
			if ($userevereg == 1)
			{
				$outputval .= '<p class="ieveRegStat text-center"><i class="fa fa-info-circle" aria-hidden="true"></i> You Registered to this event</p>';
				$outputval .= '<button type="button" onclick=eusermgmt("D","'.$_GET["eid"].'")  class="btn btn-warning btn-block"><i class="fa fa-times" aria-hidden="true"></i>&nbsp; Can\'t Attend</button>';

			} else {
				$outputval .= '<button type="button" onclick=eusermgmt("I","'.$_GET["eid"].'")  class="btn btn-success btn-block"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Register</button>';
			}
	
	$outputval .= '</div>';

	$outputval .= '</div>';
	
	
	} else {

		$outputval ='<div class="panel panel-warning">';
			$outputval .= '<div class="panel-body text-center">You are unauthorized to view this. Go back</div>';
		 $outputval .='</div>';
	}
	echo $outputval;
?>



		<!-- jQuery -->	
		<script src="http://code.jquery.com/jquery.js"></script>
		<script type="text/javascript" src="js/everegdb.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>