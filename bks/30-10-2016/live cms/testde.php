<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>sample title</title>

		<!-- Bootstrap CSS -->
		<link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<h1 class="text-center">Hello World</h1>
		
			
			
			<!-- Trigger the modal with a button
			<button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#myModal">Open Modal</button>  -->
			<button type="button"  onclick="getusers(9)" id="reglist" class="btn btn-warning btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-users"></i>&nbsp; Registered Members List <span class="badge">8</span></button>
			
			
			
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-sm">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center">Registered Users List</h4>
				  </div>
				  <div class="modal-body" id="reglistbody">
					<p>Loading..</p>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
			
			
			
			
		<!-- jQuery -->
		<script src="http://code.jquery.com/jquery.js"></script>
		<script type="text/javascript">
			function getusers(eve) {
				
					$.post("backevent.php",
					{
						getreg: eve,
					},
					function(data, status){
						//alert("Data: " + data + "\nStatus: " + status);
						$("#reglistbody").html(data);
					});
				
			
			}
			
		    
		</script>
		<!-- Bootstrap JavaScript -->
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>