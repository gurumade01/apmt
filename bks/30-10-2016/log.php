<?php require_once 'incl/sess_start.php'; ?>
<?php require_once "incl/dbconn.php" ;?>
<?php require_once 'incl/func.php'; ?>

<?php
	//if(isset($_COOKIE['userid'])&&isset($_COOKIE['userpass'])) {
	//	$_SESSION['userlogid'] = $_COOKIE['userid'];
//	}
?>


<?php
	if(isset($_SESSION['userlogid'])) {
		
		$userlogid = $_SESSION['userlogid'];
		/* 
		$query = "SELECT TYPE FROM userdet WHERE USERID=".$userlogid." LIMIT 1";
		$result = mysqli_query($link,$query);
		$row = mysqli_fetch_array($result);
		
		$usertype = $row['TYPE'];
		*/
		
		
		$usertype=getusertype($userlogid);
		
		//echo '<a href="closelogin.php"><li><i class="fa fa-user" aria-hidden="true"></i><span id="logsign1">Logout</span></li></a>';
		
	} else {
			
		//echo '<a href="templogin.php"><li><i class="fa fa-user" aria-hidden="true"></i><span id="logsign1">LOGIN</span></li></a>';
		include 'incl/sess_close.php';
		redirect('logindown.php');
	}
?>

