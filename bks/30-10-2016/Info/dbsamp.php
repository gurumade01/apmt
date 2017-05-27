<?php

	$link = mysqli_linkect("localhost","root","","showcase");
	
	
	if (!$link) {
    die("linkection failed: " . mysqli_linkect_error());
	}
	
	
	$query = "SELECT * FROM members";
	
	$result = mysqli_query($link,$query);
	
	while ($row=mysqli_fetch_array($result)) {
		$dairy[]= $row["EMAIL"];
	}
	
	$arrcount=count($dairy);
	for($i=0;$i<$arrcount;$i++){
	echo $dairy[$i];
	echo "<br>";
	}
	
?>