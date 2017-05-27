<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>

<?php
	if(isset($_SESSION['userlogid'])) {
		
		$userlogid = $_SESSION['userlogid'];
		
	} else {
		
		$userlogid = 9999;
	}
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>sample title</title>

		<!-- Bootstrap CSS -->
		<link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/notifcake.css" />
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	

	</head>
	<body>
		
			<div class="dropdown notif">
	
			  <a href="#notdif"  class="dropdown-toggle" data-toggle="dropdown" aria-hidden="true"><li class="navnotificon dropdown-toggle"><i class="fa fa-bell"></i><span class="badge navbadge1">6</span></li></a>
			  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
				
				
				<?php
					include 'incl/notifcore.php';	
					echo $notifi;
				?>
				
				
				

				<li role="presentation" id="nfoot" class="text-center"><a role="menuitem" href="#">View All <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></li>
			  </ul>
			</div>

		<!-- jQuery -->
		<script src="http://code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/drowp.js"></script>

	</body>
</html>