<!-- Updating care plan -->

<?php
	include "../../mysql_con.php";

	$id=$_GET["ID"];

	$select=mysqli_query($db, "SELECT * FROM CarePlans WHERE CP_ID=" .$id);	
	$data=mysqli_fetch_array($select);

	if(isset($_POST["update"])){
		$treatments=$_POST["treat"];
		$econStand=$_POST["eStan"];
		
		$update=mysqli_query($db,"UPDATE CarePlans SET Treatments='" .$treatments. "', EconomicStanding='" .$econStand. 
			"' WHERE CP_ID=" .$id);

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
		
		<form method="post">
			<p>
				<h3> Editing Patient <?php echo $data["P_ID"] ?>'s care plan </h3>
			</p>
			
			<p>
				<label for "eStan"> Economic standing: </label>
				<br>
				<?php
					// Fill in radio button based on previous response
				
					if($data["EconomicStanding"] == "Good"){
						echo "<input type='radio' name='eStan' value='Good' checked='checked'> Good
						<input type='radio' name='eStan' value='Mediocre'> Mediocre
						<input type='radio' name='eStan' value='Poor'> Poor";
					}
					if($data["EconomicStanding"] == "Mediocre"){
						echo "<input type='radio' name='eStan' value='Good'> Good
						<input type='radio' name='eStan' value='Mediocre' checked='checked'> Mediocre
						<input type='radio' name='eStan' value='Poor'> Poor";
					}
					if($data["EconomicStanding"] == "Poor"){
						echo "<input type='radio' name='eStan' value='Good'> Good
						<input type='radio' name='eStan' value='Mediocre'> Mediocre
						<input type='radio' name='eStan' value='Poor' checked='checked'> Poor";
					}
				?>
			</p>
			
			<p>
			  	<label for="treat"> Treatments: </label>
			  	<br>
			  	<textarea name="treat" rows="10", cols="155"><?php echo $data["Treatments"] ?></textarea>
			</p>
			
			<br>
			<button type="submit" name="update"> Update </button> </p>
		</form>
	</body>
</html>