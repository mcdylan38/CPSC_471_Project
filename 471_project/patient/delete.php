<!-- Deleting patient -->

<?php
	include "../mysql_con.php";
	
	$id=$_GET["ID"];
	
	// Sign in equipment and remove ID from review
	mysqli_query($db, "UPDATE Equipment SET P_ID=NULL, N_ID=NULL, Signed_Out=false WHERE P_ID=" .$id);
	mysqli_query($db, "UPDATE Reviews SET P_ID=NULL WHERE P_ID=" .$id);
	
	// Delete rows in other tables where patient is foreign key
	mysqli_query($db, "DELETE FROM VisitSchedules WHERE P_ID=" .$id);
	mysqli_query($db, "DELETE FROM CarePlans WHERE P_ID=" .$id);
	mysqli_query($db, "DELETE FROM MedicalHistories WHERE P_ID=" .$id);
	mysqli_query($db, "DELETE FROM Questionnaires WHERE P_ID=" .$id);
	mysqli_query($db, "DELETE FROM WorkSchedules WHERE P_ID=" .$id);
	
	$delete=mysqli_query($db, "DELETE FROM Patients WHERE ID=" .$id);
	
	if($delete){
		mysqli_close($db);
		header("Location: ../success.php");
		exit;
	}
	else{
		echo mysqli_error($db);		// Error will automatically close the database
	}
?>
