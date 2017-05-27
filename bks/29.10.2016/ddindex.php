<?php require_once 'incl/func.php'; ?>
<?php include 'incl/top.php'; ?>
<?php include 'incl/navbars.php'; ?>

<?php
	if($usertype==0) {
		redirect('fmain.php');
	} else {
		redirect('fadmin.php');
	}
?>
