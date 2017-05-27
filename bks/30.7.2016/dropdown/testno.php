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
		<link rel="stylesheet" type="text/css" href="notifcake.css" />
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
		
			<div class="dropdown notif">
	
			  <a href="#notif"><li class="navnotificon dropdown-toggle"><i class="fa fa-bell" data-toggle="dropdown" aria-hidden="true" ></i><span class="badge navbadge1">6</span></li></a>
			  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
				<li role="presentation">
					<a role="menuitem" id="nid" href="dil.html">
						<i class="fa fa-taxi" aria-hidden="true"></i>
						<span class="notiftext"> HTML</span>		
					</a>
				</li>
				
				<?php
					$notifi = "";
					
					
					$query = "SELECT NID,NTYPE,NTEXT,NHREF FROM notif where NUSERID=".$userlogid." AND NSTATUS=0 ORDER BY NDATE LIMIT 5" ;
				
					$result = mysqli_query($link,$query);

					if(mysqli_num_rows($result)) {
						while ($row=mysqli_fetch_array($result)) {	
							$NID[]= $row["NID"];
							$NTYPE[]= $row["NTYPE"];
							$NTEXT[]= $row["NTEXT"];
							$NHREF[]= $row["NHREF"];
						}

						$arrcount=count($NID);
						
						for($i=0;$i<$arrcount;$i++){
							$notifi .= '<li role="presentation">';
							$notifi .= '<a role="menuitem" href="'.$NHREF[$i].'">';
							
							$notificon = $NTYPE[$i];
								switch ($notificon) {
									case "E":
										$notificon = "fa-glass";
										break;
									case "C":
										$notificon = "fa-wrench";
										break;
									case "M":
										$notificon = "fa-user";
										break;
									case "P":
										$notificon = "fa-phone";
										break;
									case "Y":
										$notificon = "fa-fire";
										break;
									case "G":
										$notificon = "fa-envelope";
										break;
									default:
										$notificon = "fa-bell-o";
								}
								
							$notifi .= '<i class="fa '.$notificon.'" aria-hidden="true"></i>';
							$notifi .= '<span class="notiftext"> '.$NTEXT[$i].'</span>';
							$notifi .= '</a></li>';
						}

						
					} else {
							$notifi = 'No Notifications';
					}
							echo $notifi;
					
				?>
				
				
				<li role="presentation">
					<a role="menuitem"  href="dil.html">
						<i class="fa fa-taxi" aria-hidden="true"></i>
						<span class="notiftext"> HTML</span>		
					</a>
				</li>

				<li role="presentation" id="nfoot" class="text-center"><a role="menuitem" href="#">View All <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></li>
			  </ul>
			</div>

		<!-- jQuery -->
		<script src="http://code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/drop.js"></script>

	</body>
</html>