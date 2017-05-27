<?php require_once 'incl/sess_start.php'; ?>
<?php require 'incl/dbconn.php'; ?>
<?php require 'incl/func.php'; ?>
<?php include "incl/top.php"; ?>
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
				echo "<br/> You email registered with us";
			
				$passdbcheck = dbselectone('UPASS','regpassword','userm');
				
				if($passdbcheck) {
					echo "  <br/> password matched";
					
					if($remmebox) {
						// create cookie for username and password
						$cookie_name = "userid";
						$cookie_value = $loguid ;
						setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
						
						$cookie_name = "userpass";
						$cookie_value = $logpass;
						setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
						
						echo "  <br/> Cookie Created";
					}
					
					$_SESSION["userlogid"] = $loguid;
					
					redirect('fmain.php');
					
					//redirect him to required page from here 
					
				} else {
				echo "<br/> Invalid Password, retry again please.";
				}
			
			} else {
				echo "<br/> Invalid USER ID, retry again please.";
			}
		} // end of db empty else loop

	} // end of if submit loop

?>

	<h4>LOGIN PAGE - MAIN</h4>

    <form name="loginform" method="post">
	  <span class="phpgot"></span>
	  <input type="number" name="reguserid" id="reguserid" placeholder="enter your USER ID" value="<?php if(isset($_COOKIE['userid'])) { echo $_COOKIE['userid'];} ?>"/>
	  <input type="password" name="regpassword" id="regpassword" placeholder="enter password" value="<?php if(isset($_COOKIE['userpass'])) { echo $_COOKIE['userpass'];} ?>"/>
	  <input type="submit" name="loginsubmit" id="loginsubmit" value="LOGIN"/>
	  <label for="remme"><input type="checkbox" name="remmebox" id="remmebox" value="rem"/> Remember me</label>	
	  <br/>
	  <a href="#" id="other">forget password?</a>
	  <a href="signup.php">SIGN UP?</a>
	</form>

<!-- jQuery -->
<script src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
	$( "#other" ).click(function() {
	  var userid = $("#reguserid").val();
	  if(userid=="") {
		$(".errclass").empty();
		$(".phpgot").empty();
		var emptyerr = "<span class='errclass'> Enter your user id </span>";   
		$("#reguserid").after(emptyerr);
	  } else {
		//$( "#target" ).submit();
		$.post("forgetpass.php",
		{
			usermail: userid,
			uid: "123"
		},
		function(data, status){
			$(".phpgot").html(data);
		});
		
	  }
	});
</script>

<?php include "incl/bottom.php"; ?>