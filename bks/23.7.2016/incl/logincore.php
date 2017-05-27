<?php 
	$logerr = "";
	if(isset($_POST['loginsubmit'])) {
		// check if empty
		$formvalues = array('reguserid','regpassword');
		$formempty = formEmpty($formvalues);

		if($formempty) {
			echo $formempty;
		}
		else {
			// check if exists in dba_close
			$loguid = $_POST['reguserid'];
			$logpass = $_POST['regpassword'];
			$remmebox = isset($_POST['remmebox']);
			// check if email already exist
			
			$emaildbcheck = dbselectone('USERID','reguserid','userm');
			
			if($emaildbcheck) {
				//echo "<br/> You email registered with us";
			
				$passdbcheck = dbselectone('UPASS','regpassword','userm');
				
				if($passdbcheck) {
				//echo "  <br/> password matched";
					
					if($remmebox) {
						// create cookie for username and password
						$cookie_name = "userid";
						$cookie_value = $loguid ;
						setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
						
						$cookie_name = "userpass";
						$cookie_value = $logpass;
						setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
						
					//	echo "  <br/> Cookie Created";
					}
					
					$_SESSION["userlogid"] = $loguid;
					
					redirect('fmain.php');
					
					//redirect him to required page from here 
					
				} else {
				echo "<br/> Invalid Password";
				}
			
			} else {
				echo "<br/> Invalid USER ID";
			}
		} // end of db empty else loop

	} // end of if submit loop

?>