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

<?php //jumboHead('WORKS TODAY','jprof'); ?>




	
<!-- Panel  -->

<div class="container-fluid eveToday">
	<div class="panel-group">
	<?php include 'mycomp.php'; ?>
	
				<ul class="compListDet">
					<?php						
						echo $listview;
					?>
					
				</ul>
				
		</div>
</div>
<!-- End Panel  -->	



<!-- END OF HTML MAIN -->
		<!-- jQuery -->	
		<script src="http://code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>