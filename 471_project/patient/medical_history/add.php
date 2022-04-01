<!-- Adding new medical history -->

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../../home.php"> Return to home page </a></p>
		
		<h1> Add new medical history for patient below </h1>
		
		<form method="post">
			<p>
			  	<label for="pID"> Patient ID: </label>
			  	<br>
			  	<input type="text" name="pID">
			</p>
			
			<p>
			 	<label for="ill"> Illness(es): </label>
			 	<br>
			  	<textarea name="ill" rows="4" cols="155"></textarea>
			</p>
			
			<p>
			  	<label for="infDate"> Date contracted (YYYY-MM-DD): </label>
			  	<br>
			  	<input type="text" name="infDate">
			</p>
			
			<p>
			  	<label for="symp"> Symptoms: </label>
			  	<br>
			  	<textarea type="text"  name="symp" rows="4" cols="155"></textarea>
			</p>
			
			<br>
			<p> <button type="submit" name="submit"> Submit </button> </p>
		</form>
	</body>
</html>

<?php
	include "../../mysql_con.php";
	
	if(isset($_POST["submit"])){
		$pID=$_POST["pID"];
		$illness=$_POST["ill"];
		$date=$_POST["infDate"];
		$symptoms=$_POST["symp"];
		
		$add=mysqli_query($db, "INSERT INTO MedicalHistories(P_ID, Illness, InfectionDate, Symptoms) VALUES('" .$pID. "', '" .$illness. 
			"', '" .$date. "', '" .$symptoms. "')");
		
		if(!$add){
			echo mysqli_error($db);		// Error will automatically close the database
		}
		else{
			mysqli_close($db);
			header("Location: ../../success.php");
			exit;
		}
	}
?>