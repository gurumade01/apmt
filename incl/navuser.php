<div id="bodydiv">
			<div id="logonav">

				<div class="container">
					<div id="logodiv"><a href="fmain.php"><img src="imgs/logo.png" alt="logo" class="img-responsive pull-left"  /></a></div>
						<div id="logobaricons">
								
							
							<div id="topnavui">
								
								<?php echo '<div class="pull-right"><a href="closelogin.php" ><li><i class="fa fa-user" aria-hidden="true"></i><span id="logsign1">Logout</span></li></a></div>
								'; ?>
								
								  <div class="dropdown  pull-right notidropdiv">
									<a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-bell" aria-hidden="true"></i>
									</a>
									<ul class="dropdown-menu">
									  <?php // include 'incl\notifcore.php';?>
									  <?php //echo $notifi; ?>
									  
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
							</div>
						
							
						</div> <!-- logo bar icons -->
				</div>
			
	
			</div> <!-- end of logo nav -->
			
			<div id="mainnav" class="container-fluid ">
				<ul id="navui">
					<!-- <a href="#" class="backpage"><li class="pull-left" id="backnav"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i><span class="cateText">back</span></li></a> -->
					<a href="fmain.php"><li><i class="fa fa-birthday-cake" aria-hidden="true"></i><span class="cateText">Events</span></li></a>
					<a href="fcomp.php"><li><i class="fa fa-wrench" aria-hidden="true"></i><span class="cateText">Complaints</span></li></a>
					<a href="fprofile.php"><li><i class="fa fa-user" aria-hidden="true"></i><span class="cateText">My Profile</span></li></a>
					<a href="fcontact.php?cp=0"><li><i class="fa fa-phone" aria-hidden="true"></i><span class="cateText">Contacts</span></li></a>
					<a href="femergency.php"><li><i class="fa fa-fire" aria-hidden="true"></i><span class="cateText">Emergency</span></li></a>
				</ul>
			</div>
			
</div>