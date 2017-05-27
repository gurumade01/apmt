<div class="jumbotron headimage eventjumbo">
  <h3 class="text-center">EVENTS</h3> 
</div>

<?php
	function jumboHead($title) {
		$con  = '<div class="jumbotron headimage eventjumbo">';
		$con .= '<h3 class="text-center">'.$title.'</h3> ';
		$con .= '</div>';
		
		echo $con;
	}
?>
