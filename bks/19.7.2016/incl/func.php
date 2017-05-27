<?php
	function dbescape($inputid,$p = 'POST') { // fn for input real escape string
		global $link;
		if($p == 'POST') {
		$compose = mysqli_real_escape_string($link,trim($_POST[$inputid]));
		} else {
		$compose = mysqli_real_escape_string($link,trim($_.$p.[$inputid]));
		}
		return $compose;
	}
	
	function formEmpty($logvalues,$p = 'POST') { // form values empty check
			// pass array of needed form values
		
			$logerr='';
			
			for($i=0;$i<count($logvalues);$i++) {
			if($p == 'POST') {
			$postvalprep = $_POST[$logvalues[$i]];
			} else {
			$postvalprep = $_.$p.[$logvalues[$i]];
			}
			
			if(empty($postvalprep)) {
				$logerr .=  $logvalues[$i]." cant be empty <br/>";
			}
				
			} // end of for loop empty
		
			if($logerr!="") {
				return $logerr;
			}
	}
		
	function mailer($mainTo,$mainSub,$mainMsg) { // mail fn 
		$to = $mainTo;
		$subject = $mainSub;
		$message = $mainMsg;

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <gurumade01@gmail.com>' . "\r\n";
		//$headers .= 'Cc: guru@example.com' . "\r\n";

		if(mail($to,$subject,$message,$headers)) {
			return true;
		}
		else {
			return false;
		}
	}
		
	function dbselectone($colid,$inputid,$table = "members"){ // do one db select query to check if exists
		global $link;
		
		$query = "SELECT * FROM ".$table." WHERE ".$colid."='".dbescape($inputid) ."' LIMIT 1";
			
		$result = mysqli_query($link,$query);
		
		$dbresults =mysqli_num_rows($result);
		
		if($dbresults) {
			return $dbresults;
		} 
	}
	
	function test_input($data,$p = 'POST') { // validate received form values
	  if($p == 'POST') {
	  $data = $_POST[$data];
	  } else {
	  $data = $_.$p.[$data];
	  }
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	function user_logged(){ // check if user logged in else treats guest
	  if(isset($_SESSION['MUSER'])) {
	   $dil =  $_SESSION['MUSER']; 
	  } else { 
	   $dil = 9999; 
	  }
	  return $dil;
	 }
	 
	function optionif($dbval,$optval){
		if($dbval == $optval) return 'selected';
	}
	
	function getCate($query) { // get all categoies in options of drop down
		global $link;
		global $ccate;
		$result = mysqli_query($link,$query);
		
		if(mysqli_num_rows($result)) {

			while ($row=mysqli_fetch_array($result)) {
				$cID[]     = $row["CID"];
				$cName[]   = $row["CNAME"];	
				$cLevel[]  = $row["CLEVEL"];
				$cParent[] = $row["CPARENT"];
				$cStatus[] = $row["CSTATUS"];
			}

			$dbextrcount=count($cID);

			// Main cate
			
			$maincate ='<br/> <option value="9999">-Select Category-</option>';
			for($i=0;$i<$dbextrcount;$i++){
				
				  $maincate .='<br/> <option id='.$cID[$i].' name='.$cID[$i].' value='.$cID[$i].' '.optionif($ccate,$cID[$i]).' >'.$cName[$i].'</option>';
					
			}
			 
			return  $maincate;
		} else {
			$maincate = 0;
			return  $maincate;
		}
	}
	
	
	function compStatus($stat) {
		switch ($stat) {
			case 0:
				$cstatus1 = "Initiated";
				break;
			case 1:
				$cstatus1 = "In Progress";
				break;
			case 2:
				$cstatus1 = "Escalated";
				break;
			case 3:
				$cstatus1 = "Completed";
				break;
			default:
				$cstatus1 =  "Status Unavailable";
			}
		
			return $cstatus1;
	}

	function allval($dbval="",$postval="") {
		if($dbval=="") {
			if(isset($_POST[$postval])) {
				echo $_POST[$postval]; 
			} else {
				echo "";
			}
		} else {
			echo $dbval;
		}
	}
	
	
	function jumboHead($title,$bcolor='#CC99CC') { // for jumbotran head
		$con  = '<div class="jumbotron headimage eventjumbo" style="background-color:'.$bcolor.';">';
		$con .= '<h3 class="text-center">'.$title.'</h3> ';
		$con .= '</div>';
		
		echo $con;
	}

	

	function redirect($url) {
		ob_start();
		header('Location: '.$url);
		ob_end_flush();
		die();
	}
	
?>