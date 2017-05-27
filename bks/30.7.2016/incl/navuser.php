<div id="bodydiv">
			<div id="logonav" class="container-fluid">
				<div id="logodiv"><a href="fmain.php"><img src="imgs/logo.png" alt="logo" class="img-responsive pull-left"  /></a></div>
				<div id="logobaricons">
						
					
				<ul id="topnavui" class="pull-right">
					<!-- <a href="#notif"><li class="navnotificon"><i class="fa fa-bell" aria-hidden="true"></i><span class="badge navbadge1">6</span></li></a> -->
					<!-- <a href="#loguser"><li><i class="fa fa-user" aria-hidden="true"></i><span id="logsign1">Logout</span></li></a> -->
					<?php include 'testy/trynf.php'; ?>
					<?php echo '<a href="closelogin.php"><li><i class="fa fa-user" aria-hidden="true"></i><span id="logsign1">Logout</span></li></a>'; ?>
				</ul>
				
					
				</div> <!-- logo bar icons -->
	
			</div> <!-- end of logo nav -->
			
			<div id="mainnav" class="container-fluid ">
				<ul id="navui">
					<a href="fmain.php"><li><i class="fa fa-glass" aria-hidden="true"></i><span class="cateText">Events</span></li></a>
					<a href="fcomp.php"><li><i class="fa fa-wrench" aria-hidden="true"></i><span class="cateText">Complaints</span></li></a>
					<a href="fprofile.php"><li><i class="fa fa-user" aria-hidden="true"></i><span class="cateText">My Profile</span></li></a>
					<a href="fcontact.php?cp=0"><li><i class="fa fa-phone" aria-hidden="true"></i><span class="cateText">Contacts</span></li></a>
					<a href="femergency.php"><li><i class="fa fa-fire" aria-hidden="true"></i><span class="cateText">Emergency</span></li></a>
				</ul>
			</div>
			
</div>