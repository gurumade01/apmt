<?php
	$cookie_name = 'userid';
	$cookie_name1 = 'userpass';
	if(isset($_COOKIE[$cookie_name])&&isset($_COOKIE[$cookie_name1])) {
		setcookie($cookie_name, "", time() - 3600);
		setcookie($cookie_name1, "", time() - 3600);
	}
?>
