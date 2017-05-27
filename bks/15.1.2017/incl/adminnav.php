<!-- TOP NAV -->
<div id="bodydiv">
			<div id="logonav">
				<div class="container">
					<div id="logodiv"><a href="fadmin.php"><img src="imgs/logo.png" alt="logo" class="img-responsive pull-left"  /></a></div>
					<div id="logobaricons">
					<?php include 'log.php'; ?>
						
					<ul id="topnavui" class="pull-right">
						<?php echo '<div class="pull-right"><a href="closelogin.php" ><li><i class="fa fa-user" aria-hidden="true"></i><span id="logsign1">Logout</span></li></a></div>
								'; ?>
								
						  <div class="dropdown  pull-right notidropdiv">
							<a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-bell" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu">
							  
							  <?php
								include 'incl/notifcore.php';
								
								if(isset($arrcount)) {
									$nbadge =  '<span class="badge navbadge1">'.$arrcount.'</span>';
								}  else {
									$nbadge = '';
								}
								
								echo $notifi;
								?>
							
							</ul>
						  </div>
					</ul>
					
						
					</div> <!-- logo bar icons -->
				</div>
			</div>
</div>

 <!-- NAVIGATION BUTTONS -->

