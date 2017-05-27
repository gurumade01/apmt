<?php require_once 'incl/func.php'; ?>
<?php include 'incl/top.php'; ?>
<?php include 'incl/navbars.php'; ?>

<?php jumboHead('EVENTS','jevents'); ?>
<?php include 'fbevecount.php'; ?>

<div class="container-fluid">
	<div class="list-group subcate">
	  <a href="feve.php?evepg=T" class="list-group-item"><i class="fa fa-clock-o" aria-hidden="true"></i>Events Today <span class="badge"><?php echo $todayCount;?></span></a>
	  <a href="feve.php?evepg=U" class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i>Upcoming Events </a>
	  <a href="feve.php?evepg=M" class="list-group-item"><i class="fa fa-user-secret" aria-hidden="true"></i>My Events </a>
	  <a href="newevent.php" class="list-group-item"><i class="fa fa-plus" aria-hidden="true"></i>Create New</a>
	</div>
</div>


		<!-- jQuery -->	
		<script src="http://code.jquery.com/jquery.js"></script>
		<script type="text/javascript">
			
			
		</script>
		<!-- Bootstrap JavaScript -->
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>