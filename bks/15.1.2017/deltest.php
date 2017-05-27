<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>

<?php
	if(isset($_SESSION['userlogid'])) {
		
		$userlogid = $_SESSION['userlogid'];
		
	} else {
		
		$userlogid = "9999";
	}
?>


<?php
	
	
$d = basename(__FILE__, '.php'); 

echo $d;

if($d== 'deltest') {
	echo "hello";
}
	
?>
