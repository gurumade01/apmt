
<?php require_once 'incl/func.php'; ?>
<?php include 'incl/top.php'; ?>
<?php include 'incl/navbars.php'; ?>

<?php 
jumboHead('NEW EVENT','jevents');
 ?>
<?php include 'fbevecount.php'; ?>
<?php include 'backevent.php';?>


	<div class="container">
		<form name="neweveform" method="post" role="form">
	
		<div class="form-group">
		  <label for="neTitle">Event Title</label>
		  <input type="text" class="form-control" name="netitle" id="netitle" placeholder="Enter event title"/>
		</div> 
		 

		 <div class="form-group"> 
		  <label for="neDesc">Event Description</label><br/>
		  <textarea name="neDesc" class="form-control" id="neDesc" rows=10 cols=40 placeholder="Detailed event Description"></textarea>
		 </div>

		 <div class="form-group">
		  <label for="nedate">Event Date </label>
		  <input type="date" class="form-control" id="nedate" name="nedate" />
		 </div>
		 
		 <div class="form-group">
		  <label for="netime">Event Time </label>
		  <input type="time" class="form-control" name="netime" id="netime"/>
		 </div>
		
		  <input type="submit" name="esubmit" id="esubmit" class="btn btn-primary" value="Create Event"/>
		  
		  
		</form>
	</div>
	
	

<!-- jQuery -->
<script src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
	
	var tomorrow = new Date();
	document.getElementById('nedate').valueAsDate = tomorrow.setDate(tomorrow.getDate() + 1);
	document.getElementById("netime").defaultValue = "18:00";
</script>
</body>
</html>
