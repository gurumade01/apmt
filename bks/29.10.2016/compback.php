<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>

<?php
	if(isset($_POST['mainCate'])) {
		 $getParent = $_POST['mainCate'];
		 $query = "SELECT * FROM category WHERE CPARENT=".$getParent;
		 $getSubby = getCate($query);
		 
		 if($getSubby === 0) {
			$cave = 0;
		 } else {
			$cave   = '<select id="csubcate" class="form-control" name="csubcate">';
			$cave  .= $getSubby;
			$cave  .= '</select>';
		 }
		echo $cave;
	} 
?>


<?php
	
	if(isset($_POST['csubBut'])) {
		
		if(isset($_POST['csubcate'])) {
			$logvalues = array('compTitle','ccate','csubcate','cprio');
		}else {
			$logvalues = array('compTitle','ccate','cprio');
		}
		
		$emptyCheck = formEmpty($logvalues);
		if($emptyCheck) {
			echo $emptyCheck;
		} else {
			//passed empty check
			
			// NExt: Insert into DB
			
			$ctitle 	= dbescape('compTitle');
			$cdesc	    = dbescape('compDesc');
			$ccate 		= dbescape('ccate');
			$carea		= dbescape('carea');
			$cprio		= dbescape('cprio');
			$cby		= user_logged();
			
			if(isset($_POST['csubcate'])) {
				$csubcat    = dbescape('csubcate');
			} else {
				$csubcat    = "";
			}
			
			if($csubcat == "") {
				$catval = $ccate;
			} else {
				$catval = $csubcat;
			}
			
			$cpocquery = "SELECT CPOC FROM category WHERE CID=".$catval." LIMIT 1" ;
			$cpocresult = mysqli_query($link,$cpocquery); 
			$cpocrow=mysqli_fetch_array($cpocresult);
			$cto= $cpocrow["CPOC"];

			$query = "INSERT INTO complaints (CTITLE,CDESC,CPRIO,CBY,CTO,CAREAID,CCATE,CSUBCATE) 
					  VALUES ('".$ctitle."','".$cdesc."','".$cprio."','".$cby."','".$cto."','".$carea."','".$ccate."','".$csubcat."' )";
			
			$result = mysqli_query($link,$query);
			
			if($result) {
				echo "Success";
			} else {
				echo "some error Dileep";
			}
		
			
		}
		
	}
	
	
?>
