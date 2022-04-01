<!-- Delete doctor -->

<?php
	include "../mysql_con.php";
	
	$id=$_GET["ID"];
	
	$delete=mysqli_query($db, "DELETE FROM Doctors WHERE ID=" .$id);
	
	if($delete){
		mysqli_close($db);
		header("Location: ../success.php");
		exit;
	}
	else{
		echo mysqli_error($db);		// Error will automatically close the database
	}
?>