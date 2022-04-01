<!-- Signing in equipment -->

<?php
	include "../mysql_con.php";

	$id=$_GET["ID"] ?? null;	// Second part defaults ID to null

	$update=mysqli_query($db, "UPDATE Equipment set Signed_Out=false, nurseID=NULL, patientID=NULL WHERE ID=" .$id);
	
	if($update){
		mysqli_close($db);
		header("Location: ../success.php");
		exit;
	}
	else{
		mysqli_error($db);		// Error will automatically close database
	}
?>