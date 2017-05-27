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

<?php jumboHead('Admin Controls','jevents'); ?>

<br/>

  <div class="container">
	<div class="list-group subcate">
		<a href="newnotif.php" class="list-group-item"><i class="fa fa-bell" aria-hidden="true"></i>  &nbsp; Create Notification</a>
		<a href="complaint.php" class="list-group-item"><i class="fa fa-wrench" aria-hidden="true"></i> &nbsp; Create Complaint</a>
		<a href="facreateuser.php" class="list-group-item "><i class="fa fa-user-plus" aria-hidden="true"></i> &nbsp; Create New User</a>
		<a href="#" class="list-group-item "><i class="fa fa-server" aria-hidden="true"></i> &nbsp; Manage Category</a>
		<a href="#" class="list-group-item "><i class="fa fa-tty" aria-hidden="true"></i> &nbsp; Manage Emergency</a>
		<a href="#" class="list-group-item "><i class="fa fa-users" aria-hidden="true"></i> &nbsp; Manage Workers</a>
  </div>
 </div> 


<?php include 'incl/bottom.php'; ?>