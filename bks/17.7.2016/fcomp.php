<?php require_once 'incl/func.php'; ?>
<?php include 'incl/top.php'; ?>
<?php include 'incl/navbars.php'; ?>



<?php jumboHead('COMPLAINTS'); ?>


<div class="container-fluid">
	<div class="list-group subcate">
	  <a href="fcopen.php?comptype=CO" class="list-group-item"><i class="fa fa-tasks" aria-hidden="true"></i>Open Complaints <span class="badge">3</span></a>
	  <a href="fcopen.php?comptype=CC" class="list-group-item"><i class="fa fa-flag" aria-hidden="true"></i>Closed Complaints</a>
	  <a href="complaint.php" class="list-group-item"><i class="fa fa-plus" aria-hidden="true"></i>Raise New Complaint</a>
	</div>
</div>



<!-- END OF HTML MAIN -->
		<!-- jQuery -->	
		<script src="http://code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>