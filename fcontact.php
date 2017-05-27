<?php require_once 'incl/func.php'; ?>
<?php include 'incl/top.php'; ?>
<?php include 'incl/navbars.php'; ?>
<?php include 'backcontact.php'; ?>

<?php jumboHead('CONTACTS','jcon'); ?>

		<!-- 
			<div class="container-fluid eveToday">
			<div class="panel-group">
		-->
		<div class="container">
			<div class="list-group subcate">
		<?php
			
			
			echo $eoutput;
		?>
			</div>
		</div>
		
		<!-- jQuery 
		<script src="http://code.jquery.com/jquery.js"></script>-->
		<script src="srcs/jquery-1.11.3.min.js"></script>
		<!-- Bootstrap JavaScript 
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 	-->
		<script src="srcs/bs/js/bootstrap.min.js"></script>
	
	</body>
</html>