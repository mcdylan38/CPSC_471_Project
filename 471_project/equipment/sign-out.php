<!-- Signing out equipment -->

<?php
	include "../mysql_con.php";
	
	$eID=$_GET["ID"];
	
	$select=mysqli_query($db, "SELECT * FROM Equipment WHERE ID=" .$eID);
	$data=mysqli_fetch_array($select);
	
?>
	
	<html>
	<p><a href="../home.php"> Return to home page </a></p>
	<h1> "<?php echo $data["Name"] ?>" sign out </h1>

	<body style="background-color:#BADFE1">
		<form method="POST">
			<p>
				<label for "nID"> Nurse ID: </label>
				<br>
				<input type="text" name="nID" id="nID" value="">	
			</p>
			
			<p>
				<label for "pID"> Patient ID: </label>
				<br>
				<input type="text" name="pID" id="pID" value="">
			</p>
			
			<br>
			
			<p><button type="submit" name="submit"> Submit </button></p>
		</form>
	</body>
</html>

<?php
	if(isset($_POST["submit"])){
		$nID=$_POST["nID"];
		$pID=$_POST["pID"];
		
		$update=mysqli_query($db, "UPDATE Equipment SET nurseID=" .$nID. ", patientID=" .$pID. ", Signed_Out=true WHERE ID=" .$eID);
	
		if($update){
			mysqli_close($db);
			header("Location: ../success.php");
			exit;
		}
		else{
			echo "Error, nurse or patient ID is invalid";
			mysqli_error($db);		// Error will automatically close database
		}
	}
?>

