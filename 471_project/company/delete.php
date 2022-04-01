<!-- Delete copmany -->

<?php
	include "../mysql_con.php";
	
	$name=$_GET["Name"];
	
	$delete=mysqli_query($db, "DELETE FROM Companies WHERE Name='" .$name. "'");
	
	if($delete){
		mysqli_close($db);
		header("Location: ../success.php");
		exit;
	}
	else{
		echo mysqli_error($db);		// Error will automatically close the database
	}
?>