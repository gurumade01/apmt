		<span class="dropdown notif">
	
				<?php require_once "incl/dbconn.php" ;?>
				<?php require_once "incl/func.php" ;?>
				<?php
					include 'incl/notifcore.php';
					
					if(isset($arrcount)) {
						$nbadge =  '<span class="badge navbadge1">'.$arrcount.'</span>';
					}  else {
						$nbadge = '';
					}
				?>
				
				
				
				<a href="#notif"  class="dropdown-toggle" data-toggle="dropdown" aria-hidden="true"><li class="navnotificon dropdown-toggle"><i class="fa fa-bell"></i><?php echo $nbadge; ?></li></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">

				<?php
					
					echo $notifi;
				?>
				
				
				

				<li role="presentation" id="nfoot" class="text-center"><a role="menuitem" href="#">View All <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></li>
			  </ul>
		</span>