<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>

<?php include 'incl/navbars.php'; ?>
<?php include 'incl/top.php'; ?>
<?php jumboHead('COMPLAINT DETAILS','jcomp'); ?>
<!-- body starts here  -->
<?php
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
			
			
			// ==============================================================	
				/* 
					Complaint status codes 
					0 :	Opened
					1 : Closed
					2 : Escalated
					3 : Reopened
				*/
				switch ($cstatus) {
					case '0' : 
						$cstatus = "Complaint Opened";
						break;
						
					case '1' : 
						$cstatus = "Complaint Closed";
						break;
						
					case '2' : 
						$cstatus = "Complaint Escalated";
						break;
						
					case '3' : 
						$cstatus = "Complaint Reopened";
						break;
					
					default :
						$cstatus = "No Data Available";
				} // end of switch comp stat
				
	
				
		// ==============================================================	
				/* 
					PRIORITY LEVEL codes 
					0 :	URGENT WITH IN 2 HOURS
					1 : BY TODAY
					2 : BY WEEKEND
					3 : NOT VERY URGENT
				*/
				switch ($cprio) {
					case '0' : 
						$cprio = "Urgent with in 3 hours";
						break;
						
					case '1' : 
						$cprio = "By today";
						break;
						
					case '2' : 
						$cprio = "By weekend";
						break;
						
					case '3' : 
						$cprio = "Not urgent";
						break;
					
					default :
						$cprio = "No Data Available";
				} // end of switch comp stat
			
		// ==============================================================
				// SQL for TO, BY, CATE, SUBCATE  ::   USERID-CID
					$cbyapmt = ""; // if aprtment number is not available 
					
					if(isset($_GET['CM'])) {
						$getcate = "SELECT CNAME FROM category WHERE CID=".$ccate." ";	
						$maincate1 = dbresultone($getcate);
						$ccate = $maincate1['CNAME'];
						
						if($csubcate!="") {
							$getsubcate = "SELECT CNAME FROM category WHERE CID=".$csubcate." ";	
							$subcate1 = dbresultone($getsubcate);
							$csubcate = $subcate1['CNAME'];
						}
					
						// get assin and by 
						
						$getby = "SELECT NAME,APTNUM FROM `userdet` WHERE USERID=".$cby." ";
						$cbyget = dbresultone($getby);
						$cby = $cbyget['NAME'];
						$cbyapmt = "Apartment No ".$cbyget['APTNUM'];
						
						$getto = "SELECT NAME FROM `userdet` WHERE USERID=".$cto." ";
						$cto = dbresultone($getto);
						$cto = $cto['NAME'];
					}
				
		
				
				
		// ==============================================================
					
				/* 
					AREA ID CODES
					0 : Apartment
					1 : Outer Area
				*/
				if($careaid == 0) {
					$careaid = $cbyapmt;
				} else {
					$careaid = "Outer Area";
				}
				
		// ==============================================================	

		} else {
			echo "Invalid Complaint Number <br/>";
		}
	} else {
			fcexit();
	}
	
?>

<div class="container">
	<div id="compDethead" class="panel-group">
		<div class="panel panel-default insidePanel">
			<div class="panel-body">
				<h4 class="text-center compindihead"><i class="fa fa-barcode" aria-hidden="true"></i> COMPLAINT ID # <?php echo $cid; ?> </h4>
			</div>
		</div>
		
		<div class="panel panel-default insidePanel">
			<div class="panel-body">
				<b>Title: </b><?php echo $ctitle; ?>
			</div>
		</div>
		
		<div class="panel panel-default insidePanel">
			<div class="panel-body">
				<b>Description: </b>
				<p>
					<?php echo nl2br($cdesc); ?>
				</p>
			</div>
		</div>
		
		<div class="panel panel-default insidePanel">
			<div class="panel-body">
				<b>Current Status: </b> <?php 
				
				echo $cstatus; ?>
	
				
			</div>
		</div>
		

		<div  class="panel panel-default insidePanel">
			<div class="panel-body">
				<p><b>Priority: </b> <?php echo $cprio; ?></p>
				<p><b>Raised By: </b> <?php echo $cby; ?></p>
				<p><b>Assigned To: </b> <?php echo $cto; ?></p>
				<p><b>Problem Location: </b> <?php echo $careaid; ?></p>
				<p><b>Category: </b> <?php echo $ccate; ?></p>
				<?php
					if($csubcate!="") {
						echo '<p><b>Sub-Category: </b>'.$csubcate.'</p>';
					}
				?>
				<p><b>Created Date: </b> <?php echo $cdor; ?></p>
			</div>
		</div>
		
	</div> <!-- end of panel group -->

</div>

<!-- body ends here  -->

		<!-- jQuery 
		<script src="http://code.jquery.com/jquery.js"></script>-->	
		<script src="srcs/jquery-1.11.3.min.js"></script>
		
		
		<!-- Bootstrap JavaScript 
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
		<script src="srcs/bs/js/bootstrap.min.js"></script>
	</body>
</html>