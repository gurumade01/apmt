<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>
<?php include 'incl/top.php'; ?>
<!-- TOP NAV -->
<?php include 'incl/adminnav.php';?>
<?php jumboHead('SEND NOTIFICATION','jcomp'); ?>
<?php
	if(isset($_SESSION['userlogid'])) {
		
		$userlogid = $_SESSION['userlogid'];
		
	} else {
		
		$userlogid = 9999;
	}
?>

<?php include 'createnotif.php'; ?>

<div class="container">
	<form action="" method="POST" role="form">

		<div class="form-group">
			<label for="ntitle">Title: </label>
			<input type="text" class="form-control" id="ntitle" name="ntitle" placeholder="Notification Title">	
		</div>
		
		<!-- <div class="form-group">
			<label for="ndesc">Description: </label>
			<textarea rows=5 class="form-control" id="ndesc" name="ndesc" placeholder="Enter Description"></textarea>
		</div> -->
		
		<div class="form-group">
	
			<label>Notification To :</label>
			
			<div class="radio">
			  <label><input type="radio" id="nto1" name="nto" value="1" checked>To All</label>
			</div>
				
			<div class="radio">
			  <label><input type="radio" id="nto2" name="nto" value="0">To Single Apartment</label>
			</div>
		
		</div>
		
		<div class="form-group" id="inputaptnum" style="display:none;">
			<label for="napt">Apartment Number</label>
			<input type="number" class="form-control" id="napt" name="napt" maxlength="3" placeholder="Apartment Number">
		</div>
		

		<button type="submit" id="notisubmit" name="notisubmit" class="btn btn-success"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Send Notification</button>
	</form>
</div>




	<!-- jQuery 
		<script src="http://code.jquery.com/jquery.js"></script>-->	
		<script src="srcs/jquery-1.11.3.min.js"></script>
		<script>
		$('input[name="nto"]').on('change', function() {
		  var radioValue = $('input[name="nto"]:checked').val();        
		  if(radioValue == 0) {
			$("#inputaptnum").css("display","block");
		  } else {
			$("#inputaptnum").css("display","none");
		  }
		});
		</script>
		
		<!-- Bootstrap JavaScript 
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
		<script src="srcs/bs/js/bootstrap.min.js"></script>
	</body>
</html>