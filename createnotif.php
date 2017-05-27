<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>

<?php
	
	if(isset($_POST['notisubmit'])) {
		
		if(isset($_POST['nto'])&&$_POST['nto']==0) {
			$logvalues = array('ntitle','napt');
		}else {
			$logvalues = array('ntitle');
		}
		
		
		$emptyCheck = formEmpty($logvalues);
		
		if($emptyCheck) {
			echo $emptyCheck;
		} else {
			//passed empty check
			
			// NExt: Insert into DB
			
			$ntitle		= dbescape('ntitle');
			if(isset($_POST['nto'])&&$_POST['nto']==0) {
				$nto 	= dbescape('nto');
			} else {
				$nto 	= 0;
			}
			$napt		= dbescape('napt');
			$ntype		= 'G';		

			$query = "INSERT INTO notif (NUSERID,NTYPE,NTEXT,NTO) 
					  VALUES ('".$napt."','".$ntype."','".$ntitle."','".$nto."')";
			
			$result = mysqli_query($link,$query);
			
			if($result) {
				//echo "Successfully sent notiication";
				 echo bsalert('S',"Successfully sent notification.","","p");
			} else {
				//echo "some error in creating notiication";
				 echo bsalert('E',"some error in creating notification.","","p");
			}
		
			
		}
		
	}
	
	
?>