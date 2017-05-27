<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>
<?php include 'incl/top.php'; ?>
<?php include 'incl/navbars.php'; ?>

<?php jumboHead('NOTIFICATIONS'); ?>


<?php 		
		if(isset($_GET['NT'])) {
			echo '<div class="panel-group npangroup">';
			echo $notifi1;
			echo "</div>";
		}
?>

<!-- END OF HTML MAIN -->
		<!-- jQuery -->	
		<script src="http://code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>