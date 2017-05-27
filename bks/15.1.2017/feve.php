<?php require_once 'incl/func.php'; ?>
<?php include 'incl/top.php'; ?>
<?php include 'incl/navbars.php'; ?>

<?php include 'backevent.php';?>

<div class="container eveToday">
	<div class="panel-group">	
	
	<!-- Panel  -->
		
			
				<?php 
					
					
					if(isset($_GET['evepg']) && $_GET['evepg']=='M') {
					
						include 'fbregeve.php';
						
						echo "<h4 class='text-center'>REGISTERED EVENTS</h4>";
					
					//	echo '<div class="panel panel-group">';
							
							echo $eoutput1;
							
					//	echo "</div>";
						echo "<hr/>";
						
						echo "<h4 class='text-center'>OWN EVENTS</h4>";
					}
						
				?>
				
</div>
</div>			
<!-- End Panel  -->	

<!-- Panel  -->
		
			
				<?php 
				
						echo $eoutput;

				?>

<!-- End Panel  -->	

	



		<!-- jQuery 
		<script src="http://code.jquery.com/jquery.js"></script>-->	
		<script src="srcs/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="js/everegdb.js"></script>
		
		<!-- Bootstrap JavaScript 
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
		<script src="srcs/bs/js/bootstrap.min.js"></script>
	</body>
</html>