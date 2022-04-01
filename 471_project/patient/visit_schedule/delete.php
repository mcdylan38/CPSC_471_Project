<!-- Delete visitor schedule -->

<?php
	include "../../mysql_con.php";
	
	$id=$_GET["ID"];
	
	$delete=mysqli_query($db, "DELETE FROM VisitSchedules WHERE VS_ID=" .$id);
	
	if($delete){
		mysqli_close($db);
		header("Location: ../../success.php");
		exit;
	}
	else{
		echo mysqli_error($db);		// Error will automatically close the database
	}
?>