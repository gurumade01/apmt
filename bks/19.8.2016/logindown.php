<?php require_once 'incl/sess_start.php'; ?>
<?php require 'incl/dbconn.php'; ?>
<?php require 'incl/func.php'; ?> 

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>sample title</title>

		<!-- Bootstrap CSS -->
		<link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/loginbackpic.css" rel="stylesheet">
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
	
<?php include "incl/logincore.php"; ?>

		<div class="container">
  
		  <div class="row" id="pwd-container">
			<div class="col-md-4"></div>
			
			<div class="col-md-4">
			  <section class="login-form">
				<form method="post" name="loginform" role="login">
				  <img src="http://i.imgur.com/RcmcLv4.png" class="img-responsive" id="loginlogo" alt="" />
				  <p class='text-center'>Client: Brundavan Apartments</p>
				  <span class="phpgot"></span>
				  
				  <input type="number" required name="reguserid" id="reguserid" class="form-control input-lg" placeholder="USER ID" value="<?php if(isset($_COOKIE['userid'])) { echo $_COOKIE['userid'];} ?>"/>
				 
				  <input type="password" required name="regpassword" id="regpassword" class="form-control input-lg" placeholder="PASSWORD" value="<?php if(isset($_COOKIE['userpass'])) { echo $_COOKIE['userpass'];} ?>"/>
			
				  <div class="checkbox remboxdiv pull-left">
					  <label for="remmebox" id="remlabel"><input type="checkbox"  name="remmebox" id="remmebox" checked value="rem"/> Remember me</label>
				  </div>
				  
				  <input type="submit" name="loginsubmit" class="btn btn-lg btn-primary btn-block" id="loginsubmit" value="LOGIN"/>
				  
				  <a href="#" id="other" class="pull-right">forgot password?</a>				  
				  
				</form>

			  </section>  
			  </div>
			  
			  <div class="col-md-4"></div>
			  

		  </div>
		  
		   
		  
		  
		</div>
			

<!-- jQuery -->
<script src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="js/loginjs.js"> </script>

<?php include "incl/bottom.php"; ?>