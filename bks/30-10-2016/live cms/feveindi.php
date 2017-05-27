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
	
		$query = "SELECT EBY,EDESC FROM eventdetails WHERE EID=".$_GET['eid'];
		
		$result = mysqli_query($link,$query);
	
		if(mysqli_num_rows($result)) {
			$row=mysqli_fetch_array($result);
			$edesc = $row['EDESC'];
			$eby = $row['EBY'];
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
		
		$outputval .= '<p class="well well-sm text-justify ievewell" id="ieveDesc">'.nl2br($edesc).'</p>';
		
		$outputval .= '<div id="ieveDetails" class="well well-sm ievewell">';

					$outputval .= '<p><i class="fa fa-user" aria-hidden="true"></i> By: <span id="eveBy">'.$ebyname.'</span></p>';
						
					$outputval .= '<p><i class="fa fa-home spa" aria-hidden="true"></i> Place: <span  id="eveByHome">'.$eby.'</span></p>';
					
					$outputval .= '<p><i class="fa fa-calendar" aria-hidden="true"></i> Date: <span id="eveDate" class="ievedate">'.$edate.'</span></p>';
			
					$outputval .= '<p><i class="fa fa-clock-o spa" aria-hidden="true"></i> Time: <span  id="eveTime">12:30PM</span></p>';

		$outputval .= '</div>';
		
		
		$outputval .= '<div id="ievebtnblock">';
			
		
			
			
			
			if($eby == $userlogid) {
					$q = "select count(USERID) AS ERCOUNT FROM eventusers WHERE EVEID=".$_GET["eid"]." ";
					$row = dbresultone($q);
					$eregcount = $row['ERCOUNT'];
			
				$outputval .= '<button type="button"  onclick="getusers('.$_GET["eid"].')" id="reglist" class="btn btn-warning btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-users"></i>&nbsp; Registered Members List <span class="badge">'.$eregcount.'</span></button>';
				//$outputval .= '<button type="button"   class="btn btn-warning btn-block"><i class="fa fa-users" data-toggle="modal" data-target="#myModal" aria-hidden="true"></i>&nbsp; Registered Members List <span class="badge">'.$eregcount.'</span></button>';
				$outputval .= '<button type="button" onclick=eusermgmt("C","'.$_GET["eid"].'")  class="btn btn-danger btn-block"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; C a n c e l </button>';
			} else {
			
				if ($userevereg == 1)
				{
					$outputval .= '<p class="ieveRegStat text-center"><i class="fa fa-bookmark" aria-hidden="true"></i> You Registered to this event</p>';
					$outputval .= '<button type="button" onclick=eusermgmt("D","'.$_GET["eid"].'")  class="btn btn-warning btn-block"><i class="fa fa-times" aria-hidden="true"></i>&nbsp; C a n \'t &nbsp; A t t e n d</button>';

				} else {
					$outputval .= '<button type="button" onclick=eusermgmt("I","'.$_GET["eid"].'")  class="btn btn-success btn-block"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; R e g i s t e r</button>';
				}
				
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

		
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-sm">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center">Registered Users ( <?php echo $eregcount?> )</h4>
				  </div>
				  <div class="modal-body" id="reglistbody">
					<p>Loading..</p>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
		
		
		

			<!-- jQuery 
		<script src="http://code.jquery.com/jquery.js"></script>-->	
		<script src="srcs/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="js/everegdb.js"></script>
		
		<script type="text/javascript">
			function getusers(eve) {
				
					$.post("backevent.php",
					{
						getreg: eve,
					},
					function(data, status){
						//alert("Data: " + data + "\nStatus: " + status);
						$("#reglistbody").html(data);
					});
				
			
			}
			
		    
		</script>
		
		<!-- Bootstrap JavaScript 
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
		<script src="srcs/bs/js/bootstrap.min.js"></script>
	</body>
</html>