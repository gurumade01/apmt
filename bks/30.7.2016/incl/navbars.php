<?php include 'log.php'; ?>		

<?php
	if($usertype==0) {
		include 'navuser.php';
	} else if($usertype==1) {
		include 'adminnav.php';
	}
?>

	