<?php require_once 'incl/func.php'; ?>
<?php include 'incl/top.php'; ?>
<?php include 'incl/navbars.php'; ?>

<?php jumboHead('EVENTS'); //jumbotron text function ?>
<?php include 'backevent.php';?>

<div class="container-fluid eveToday">
	<div class="panel-group">
	
	<!-- Panel  -->
		
			
				<?php 
					
					
					if(isset($_GET['evepg']) && $_GET['evepg']=='M') {
					
					include 'fbregeve.php';
					
					$firout  = "<h4 class='text-center'>REGISTERED EVENTS</h4>";
					$firout .= '<div class="panel panel-default insidePanel">';
					$firout .= '<div class="panel-body">';

					echo $firout;
					
						echo $eoutput1;
						
					$firout1 =	"</div>";
					$firout1 .=	"</div>";
							
		
					echo $firout1;
					
					echo "<h4 class='text-center'>OWN EVENTS</h4>";
					
					}
						
				?>
				
			
<!-- End Panel  -->	

<!-- Panel  -->
		
		<!-- <div class="panel panel-default insidePanel"> -->
		<div class="panel panel-group insidePanel">
			<!-- <div class="panel-body"> -->
				
				<?php 
				
						echo $eoutput;

				?>
				
			<!-- </div> -->
			
		</div>
<!-- End Panel  -->	

	</div>
</div>



		<!-- jQuery 
		<script src="http://code.jquery.com/jquery.js"></script>-->	
		<script src="srcs/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="js/everegdb.js"></script>
		
		<!-- Bootstrap JavaScript 
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
		<script src="srcs/bs/js/bootstrap.min.js"></script>
	</body>
</html>