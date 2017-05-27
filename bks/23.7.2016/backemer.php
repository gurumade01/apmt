<?php require_once "incl/dbconn.php" ;?>
<?php require_once 'incl/func.php'; ?>
<?php include 'incl/top.php'; ?>
<?php include 'incl/navbars.php'; ?>

	<?php
		if(isset($_GET['e'])) {
			$emerType = $_GET['e'];
			
			if($emerType == 'M') {
				jumboHead('EMERGENCY-MEDICAL','jemer');
				$query = "SELECT EID,ETYPE,ENAME,EPHONE,EADDRESS,EMAP FROM emergency WHERE EACTIVE=0 AND ECATE='".$emerType."' ORDER BY ETYPE ASC";
			} else if($emerType == 'P') {
				jumboHead('EMERGENCY-POLICE','jemer');
				$query = "SELECT EID,ETYPE,ENAME,EPHONE,EADDRESS,EMAP FROM emergency WHERE EACTIVE=0 AND ECATE='".$emerType."' ORDER BY ETYPE ASC";
			} else if($emerType == 'F') {
				jumboHead('EMERGENCY-FIRE','jemer');
				$query = "SELECT EID,ETYPE,ENAME,EPHONE,EADDRESS,EMAP FROM emergency WHERE EACTIVE=0 AND ECATE='".$emerType."' ORDER BY ETYPE ASC";
			} else if($emerType == 'S') {
				jumboHead('EMERGENCY-GATE SECURITY','jemer');
				$query = "SELECT EID,ETYPE,ENAME,EPHONE,EADDRESS,EMAP FROM emergency WHERE EACTIVE=0 AND ECATE='".$emerType."' ORDER BY ETYPE ASC";
			}
			
			$result = mysqli_query($link,$query);
	
			if(mysqli_num_rows($result)) {
				while ($row=mysqli_fetch_array($result)) {
					$EID[]= $row["EID"];
					$ETYPE[]= $row["ETYPE"];
					$ENAME[]= $row["ENAME"];
					$EPHONE[]= $row["EPHONE"];
					$EADDRESS[]= $row["EADDRESS"];
					$EMAP[]= $row["EMAP"];
				} // end of while 
				
				$arrcount = count($EID);
			
				$eoutput = "";
				
					$eoutput .=	'<div class="panel-group">';
				for($i=0;$i<$arrcount;$i++){
					
					$eoutput .='<div class="panel panel-default panel-small insidePanel">';
					$eoutput .='<div class="panel-body list-group-item text-center">';
					if($ETYPE[$i]==0) {
						$eoutput .= "<p class='text-center'><b><u>INSIDE APARTMENT</u></b></p>";
					}
					$eoutput .= "<b>Name :</b> ".$ENAME[$i];
					$eoutput .= "<br/>";
					$eoutput .= "<b>Phone :</b> ".$EPHONE[$i];
					$eoutput .= "<br/>";
					if($ETYPE[$i]==0) {
						$eoutput .= "<b>APARTMENT :</b> ".$EADDRESS[$i];
					} else {
						$eoutput .= "<b>Address :</b> ".$EADDRESS[$i];
					}
					
					$eoutput .= "<br/>";
					if($EMAP[$i]!= "") {
						$eoutput .= "<b>MAP :</b> <a href=".$EMAP[$i].">".$EMAP[$i]."</a>";
					}
					$eoutput .=	'</div>';
					$eoutput .=	'</div>';
					
				} // end of for
				$eoutput .=	'</div>';
				
				
				echo $eoutput;
				
				
			} // end of num_rows if
			
		} // end of GET loop 
		else {
			$eoutput = "<p class='text-center'>You are in wrong place. Go Back.</p>";
			echo $eoutput;
		}
	?>
	

		<!-- jQuery 
		<script src="http://code.jquery.com/jquery.js"></script>-->
		<script src="srcs/jquery-1.11.3.min.js"></script>
		<!-- Bootstrap JavaScript 
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 	-->
		<script src="srcs/bs/js/bootstrap.min.js"></script>
	
	</body>
</html>