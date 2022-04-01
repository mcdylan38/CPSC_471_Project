<!-- Deleting existing nurse -->

<?php
	include "../mysql_con.php";
	
	$id=$_GET["ID"];
	
	// Delete rows in other tables where nurse is foreign key
	mysqli_query($db, "DELETE FROM WorkSchedules WHERE N_ID=" .$id);
	mysqli_query($db, "DELETE FROM Reviews WHERE N_ID=" .$id);
	
	// Remove employee from company
	$company=mysqli_fetch_array(mysqli_query($db, "SELECT Company FROM Nurses WHERE ID=" .$id));
	mysqli_query($db, "UPDATE Companies SET NoEmployee=NoEmployee - 1 WHERE Name='" .$company["Company"]. "'");
	
	// Sign in equipment
	mysqli_query($db, "UPDATE Equipment SET N_ID=NULL, P_ID=NULL, Signed_Out=false WHERE N_ID=" .$id);
	
	$delete=mysqli_query($db, "DELETE FROM Nurses WHERE ID=" .$id);
	
	if($delete){
		mysqli_close($db);
		header("Location: ../success.php");
		exit;
	}
	else{
		echo mysqli_error($db);		// Error will automatically close the database
	}
?>
