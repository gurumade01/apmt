<?php require_once 'incl/func.php'; ?>
<?php include 'incl/top.php'; ?>
<?php include 'incl/navbars.php'; ?>
<?php include 'mycomp.php'; ?>



<?php// jumboHead('COMPLAINTS','jcomp'); ?>



	
<!-- Panel  -->

<div class="container-fluid eveToday">
	<div class="panel-group">
	
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