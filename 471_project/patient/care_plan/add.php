<!-- Adding new care plan -->

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../../home.php"> Return to home page </a></p>
		
		<h1> View patients' care plans below </h1>
		
		<form method="post">
			<p>
				<label for="pID"> Patient ID: </label>
				<br>
				<input type="text" id="pID" name="pID" value="">
			</p>
			
			<p>
				<label for "eStan"> Economic standing: </label>
				<br>
				<input type="radio" name="eStan" value="Good"> Good
				<input type="radio" name="eStan" value="Mediocre"> Mediocre
				<input type="radio" name="eStan" value="Poor"> Poor
			</p>
			
			<p>
			  	<label for="treat"> Treatments: </label>
			  	<br>
			  	<textarea name="treat" rows="10", cols="155"></textarea>
			</p>
			
			<br>
			<button type="submit" name="submit"> Submit </button> </p>
		</form>
	</body>
</html>

			
<?php
	include "../../mysql_con.php";
	
	if(isset($_POST["submit"])){
		$pID=$_POST["pID"];
		$econStan=$_POST["eStan"];
		$treatments=$_POST["treat"];
		
		$add=mysqli_query($db, "INSERT INTO CarePlans(P_ID, Treatments, EconomicStanding) VALUES('" .$pID. "', '" .$treatments. 
			"', '" .$econStan. "')");
		
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
