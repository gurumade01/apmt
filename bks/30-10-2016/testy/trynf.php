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
				
				
				
				<a href="#" class="dropdown-toggle" id="menu1"  data-toggle="dropdown"><i class="fa fa-bell"></i></a>
				
			  
				<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
				  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">HTML</a></li>
				  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>
				  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>
				  <li role="presentation" class="divider"></li>
				  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
				</ul>
		</span>