<?php include 'backevent.php';?>

<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
    <h4>Events Upcoming</h4>
	<hr/>
	
	<?php 
		echo $eoutput;
	?>
	
	

<!-- jQuery -->
<script src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
  function event_function(joinid) {
	
	  $.post("compback.php",
		{
			postJoinid: joinid
		},
		function(data, status){
			
			alert("you are successfully registered");
			
		});
  }
</script>
</body>
</html>
