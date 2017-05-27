<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Main Home</title>

		<!-- Bootstrap CSS -->
		<link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
		  body {
				border: 1px solid grey;
			}

			#sidenav {
				width:10%;
				height:100%;
				background-color:yellow;
				margin-left:-1px;
				margin-right:1px;
				padding:0px;
				position:fixed;
				word-wrap: break-word;
			}

			#maincontent {
				width:100%;
				height:100%;
				border:1px solid brown;
				background-color:#f2f2f2;
				margin-left:10%;
			}	

			#logodiv {
				border-bottom:1px solid grey;
			}

			#Brundavanlogo {
				text-align:center;
				font-size:1.7em;
			}

			.nomarpad{
				margin:0px;
				padding:0px;
			}

			#ulCate li{
				list-style:none;
				padding:8px 12px;
				border-bottom:1px solid grey;
			}

			.cateText {
				margin-left:10px;
			}

			.subcateul {
				background-color:#f2f2f2;
			}

			ul.subcateul li{ 
				border-bottom:1px dotted red !important;
				padding-left:20px !important;
			}
		</style>
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
	</head>
	<body>
		<div id="bodymain">
		
		<div id="sidenav" class="container-fluid">
			<div id="logodiv"><p id="Brundavanlogo">APMT</p></div>
			
			<!-- Categories goes here -->
			<ul id="ulCate" class="nomarpad">
				<li><span class="glyphicon glyphicon-glass cateIcon"></span><span class="cateText">Events</span></li>
					<ul class="nomarpad subcateul">
						<li><span class="glyphicon glyphicon-time cateIcon"></span><span class="cateText">Today</span></li>
						<li><span class="glyphicon glyphicon-calendar cateIcon"></span><span class="cateText">Upcoming</span></li>
						<li><span class="glyphicon glyphicon-user cateIcon"></span><span class="cateText">My Events</span></li>
						<li><span class="glyphicon glyphicon-plus cateIcon"></span><span class="cateText">Make Event</span></li>	
					</ul>
				<li><span class="glyphicon glyphicon-wrench cateIcon"></span><span class="cateText">Complaints</span></li>
					<ul class="nomarpad subcateul">
						<li><span class="glyphicon glyphicon-user cateIcon"></span><span class="cateText">All</span></li>
						<li><span class="glyphicon glyphicon-plus cateIcon"></span><span class="cateText">Raise New</span></li>
					</ul>
				<li><span class="glyphicon glyphicon-phone-alt cateIcon"></span><span class="cateText">Contacts</span></li>
					
				<li><span class="glyphicon glyphicon-fire cateIcon"></span><span class="cateText">Emergency</span></li>
				
			</ul>
			
		</div>
		<div id="maincontent" class="container-fluid">
			<p>MAIN PART</p>
			
			
		</div>
	
		
		</div>
		<!-- jQuery -->
		<script src="http://code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script type="text/javascript">
		  $("#sidenav").height($(window).height());
		  
		  
		</script>
	</body>
</html>