<?php
	// Change database later!
	$db=mysqli_connect("localhost", "root", "draGGun.!382", "471_test");
	
	if(!$db){
		die("Connection failed: " . mysqli_connect_error());
	}
?>