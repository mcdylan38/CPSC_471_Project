<!-- Update medical history -->

<?php
	include "../../mysql_con.php";

	$id=$_GET["ID"];

	$select=mysqli_query($db, "SELECT * FROM MedicalHistories WHERE MH_ID=" .$id);	
	$data=mysqli_fetch_array($select);

	if(isset($_POST["update"])){
		$illness=$_POST["ill"];
		$dateContracted=$_POST["infDate"];
		$symptoms=$_POST["symp"];

		
		$update=mysqli_query($db,"UPDATE MedicalHistories SET Illness='" .$illness. "', InfectionDate='" .$dateContracted. 
			"', Symptoms='" .$symptoms. "' WHERE MH_ID=" .$id);

		if($update){
			mysqli_close($db);
			header("Location: ../../success.php");
			exit;
		}
		else{
			echo mysqli_error($db);		// Error will automatically close the database
		}
	}
?>

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../../home.php"> Return to home page </a></p>
		
		<h1> View patients' medical histories below </h1>
		
		<form method="post">
			<p>
			  	<h3> Editing patient <?php echo $data["P_ID"] ?>'s medical history </h3>
			</p>
			
			<p>
			  	<label for="ill"> Illness(es): </label>
			  	<br>
			  	<input type="text" name="ill" value="<?php echo $data["Illness"] ?>">
			</p>
			
			<p>
			  	<label for="infDate"> Date contracted (YYYY-MM-DD): </label>
			  	<br>
			  	<input type="text" name="infDate" value="<?php echo $data["InfectionDate"] ?>">
			</p>
			
			<p>
			  	<label for="symp"> Symptoms: </label>
			  	<br>
			  	<textarea type="text" name="symp" rows="4" cols="100"><?php echo $data["Symptoms"] ?></textarea>
			</p>
			
			<br>
			<p> <button type="create" name="update"> Update </button> </p>
		</form>
	</body>
</html>