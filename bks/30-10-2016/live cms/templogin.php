<?php require_once 'incl/sess_start.php'; ?>
<?php require 'incl/dbconn.php'; ?>
<?php require 'incl/func.php'; ?> 		
<?php include "incl/top.php"; ?>
<?php include "incl/logincore.php"; ?>


	<h4>LOGIN PAGE - MAIN</h4>

    <form name="loginform" method="post">
	  <span class="phpgot"></span>
	  <input type="number" name="reguserid" id="reguserid" placeholder="enter your USER ID" value="<?php if(isset($_COOKIE['userid'])) { echo $_COOKIE['userid'];} ?>"/>
	  <input type="password" name="regpassword" id="regpassword" placeholder="enter password" value="<?php if(isset($_COOKIE['userpass'])) { echo $_COOKIE['userpass'];} ?>"/>
	  <input type="submit" name="loginsubmit" id="loginsubmit" value="LOGIN"/>
	  <label for="remme"><input type="checkbox" name="remmebox" id="remmebox" value="rem"/> Remember me</label>	
	  <br/>
	  <a href="#" id="other">forget password?</a>
	  <a href="signup.php">SIGN UP?</a>
	</form>

<!-- jQuery -->
<script src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="loginjs.js"> </script>

<?php include "incl/bottom.php"; ?>