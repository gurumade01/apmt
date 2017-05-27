<?php require_once 'incl/sess_start.php'; ?>
<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>
<?php include 'incl/top.php'; ?>
<?php include 'incl/navbars.php'; ?>


<?php
	
	// Checks user id
	$userlogid = user_logged();
	
	//Show profile details
	$query = "SELECT * FROM  userdet WHERE USERID=".$userlogid." LIMIT 1";
	
	$result = mysqli_query($link,$query);
	
	while ($row=mysqli_fetch_array($result)) {
		 $user_id= $row["USERID"];
		 $user_name= $row["NAME"];
		 $user_type= $row["TYPE"];
		 $user_phone= $row["PHONE"];
		 $user_email= $row["EMAIL"];
		 $user_cate= $row["WCATE"];
		 $user_apt= $row["APTNUM"];
	}
	

	
	
	//display form in front
$profOutput =<<<EOD
<div class="panel panel-default" id="profPanel">
  
	<ul class="profDetails">
			
			<li><span class="formHead"><i class="fa fa-user" aria-hidden="true"></i> Name :</span> <span class="formAns">$user_name</span></li>
		
			
		
			<li><span class="formHead"><i class="fa fa-info-circle" aria-hidden="true"></i> User id :</span> <span class="formAns">$user_id</span></li>
		
			
	
			<li><span class="formHead"><i class="fa fa-volume-control-phone" aria-hidden="true"></i> Phone :</span> <span class="formAns">$user_phone</span></li>
	
			
	
			<li><span class="formHead"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email :</span> <span class="formAns">$user_email</span></li>
			
			
	
EOD;
		if( $user_type == 1) {
$profOutput .= '<li><span class="formHead"><i class="fa fa-suitcase" aria-hidden="true"></i> Role :</span> <span class="formAns">'.$user_cate.'</span></li>';
		} else {
$profOutput .=  '<li><span class="formHead"><i class="fa fa-home" aria-hidden="true"></i> Apartment No:</span> <span class="formAns">'.$user_apt.'</span></li>';
		}
$profOutput .= '</ul></div>';
	
	
?>

<?php jumboHead('Profile Details','jprof');?>

<div class="container">
	
	<?php echo $profOutput; ?>

</div>



<?php include 'incl/bottom.php'; ?>