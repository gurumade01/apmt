<?php require_once 'incl/sess_start.php'; ?>
<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>
<?php include 'incl/top.php'; ?>
<?php include 'incl/navbars.php'; ?>

<?php jumboHead('Reset Password','jprof');?>
<?php 
	$userlogid = user_logged();
?>


<?php 

if(isset($_POST['rpassSubmit'])) {
	$logvalues = array('cpass','npass1','npass2');
	$emptyCheck = formEmpty($logvalues);
	
	if($emptyCheck) {
		$err = "All fields are mandatory ";
	} else {
		$cpass = dbescape('cpass');
		$npass1 = dbescape('npass1');
		$npass2 = dbescape('npass2');
		
		$err = "";
		
		if($npass1 !== $npass2) {
			$err = "New Passwords don't match. ";
			
		}else{
			$query1 = "SELECT * FROM userm WHERE USERID=".$userlogid." AND UPASS='".$cpass."' LIMIT 1";
			$result1 = mysqli_query($link,$query1);
			
			if(mysqli_num_rows($result1)=='') {
				$err = "Please check the password. ";
			} else {
				//change password now
				$query2 = "UPDATE userm SET UPASS='".$npass2."' WHERE USERID=".$userlogid."  LIMIT 1";
				$result2 = mysqli_query($link,$query2);
			}
			
		}

		
		
	
	}
	
	if($err==""){
			$finalRes = '<div class="alert alert-success fade in widSmallCenter">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Success!</strong> password changed.
			</div>';
			
			header( "refresh:1;url=fprofile.php" );
			
		} else {
			$finalRes = '<div class="alert alert-danger fade in widSmallCenter">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Error! </strong>'. $err .'
			</div>';
		}
		
		echo $finalRes;
}

//check current password match

//if pass then update in user details
?>

<div class="container">

	<div class="widSmallCenter">
		<br/>
			<form  method="POST" role="form">
				<div class="form-group">
					<label for="cpass">Current Password:</label>
					<input type="password" class="form-control" id="cpass" name="cpass" placeholder="enter current password">
				</div>
				
				<div class="form-group">
					<label for="npass1">New Password:</label>
					<input type="password" class="form-control" id="npass1" name="npass1" autocomplete="off" placeholder="enter new password">
				</div>
				
				<div class="form-group">
					<label for="npass2">Retype New Password:</label>
					<input type="password" class="form-control" id="npass2" name="npass2" autocomplete="off" placeholder="re-enter new password">
				</div>		

				<button type="submit" class="btn btn-primary" name="rpassSubmit">Change Password</button>
			</form>		
		<br/>
	</div>


</div>


<?php include 'incl/bottom.php'; ?>