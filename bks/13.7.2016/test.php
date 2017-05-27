<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
    
	<?php 
		$eid = "ding";
		echo "<input type='button' value='Join this event' id=join".$eid." onClick='event_function(".$eid.")' />";
	?>

<!-- jQuery -->
<script src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
function event_function(a) {

		//var gov = 	$("#join+a").html("");
		alert('gov');
 }
</script>
</body>
</html>
