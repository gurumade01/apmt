<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>

<?php
	if(isset($_SESSION['userlogid'])) {
		
		$userlogid = $_SESSION['userlogid'];
		
	} else {
		
		$userlogid = 9999;
	}
?>

<?php include 'incl/top.php'; ?>

<!-- TOP NAV -->
<?php include 'incl/adminnav.php';?>

<?php jumboHead('Create New User','jprof'); ?>


<div class="container">

	<form action="" method="POST" role="form">
	
		<div class="form-group text-center">
	
			<label>Select User Type :</label>
			
			<div class="radio">
			  <label><input type="radio" id="uto1" name="uto" value="1" checked>Worker</label>
				&nbsp;&nbsp;&nbsp;
			  <label><input type="radio" id="uto2" name="uto" value="0">Resident</label>
			  
			</div>
		
		</div>
	
		<button class="btn btn-primary btn-block" name="newuserbut" id="newuserbut"><i class="fa fa-user"></i> Create New User</button>
		
	
	</form>
	

</div>







<?php include 'incl/bottom.php'; ?>

