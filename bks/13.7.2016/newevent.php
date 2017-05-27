<?php include 'backevent.php';?>

<!DOCTYPE html>
<html>
<head>
    <title>create event</title>
</head>
<body>
    <h4>New event</h4>
	
	<form name="neweveform" method="post">
	  <label for="neTitle">Title</label>
	  <input type="text" name="netitle" id="netitle" placeholder="Enter event title"/>
	  
	  <br/><br/>
	  
	  <label for="neDesc">Description</label><br/>
	  <textarea name="neDesc" id="neDesc" rows=10 cols=40 placeholder="Detailed event Description"></textarea>
	  
	  <br/><br/>
	  
	  <label for="nedate">Event Date </label>
	  <input type="date"  id="nedate" name="nedate" />
	  
	  
	  <label for="netime">Event Time </label>
	  <input type="time" name="netime" id="netime"/>
	  
	  <br/><br/>
	  
	  <input type="submit" name="esubmit" id="esubmit" value="Create Event"/>
	  
	  
	</form>
	

<!-- jQuery -->
<script src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">

	document.getElementById('nedate').valueAsDate = new Date();
	document.getElementById("netime").defaultValue = "18:00";
</script>
</body>
</html>
