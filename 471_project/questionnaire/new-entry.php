<html>
	<body style="background-color:#BADFE1">
		<p><a href="../home.php"> Return to home page </a></p>
		
		<h1> Fill in questionnaire below </h1>
		
		<form method="post">
			<p>
			  	<label for="pID"> Patient ID: </label>
			  	<br>
			  	<input type="text" id="pID" name="pID" value="">
			</p>
			
			
			<p>
				<label for="q1"> Do you feel at ease when interacting with others? </label>
				<br>
				<input type="radio" name="a1" value="1"> Yes
				<input type="radio" name="a1" value="0"> No
			</p>
			
			<p>
				<label for "q2"> Do you have a problem chewing? (e.g. immobile jaw, pain while eating) </label>
				<br>
				<input type="radio" name="a2" value="1"> Yes
				<input type="radio" name="a2" value="0"> No
			</p>
			
			<p>
				<label for "q3"> Does the patient have an adequate living environment? (e.g. lighting in evening, kitchen, access to 
								 home) </label>
				
				<br>
				<input type="radio" name="a3" value="1"> Yes
				<input type="radio" name="a3" value="0"> No
			</p>
			
			<p>
				<label for "q4"> How is your personal hygiene? Are you able to comb your hair, brush your teeth, wash your face without 
								 difficulty? (yes/no) </label>
				
				<br>
				<input type="radio" name="a4" value="1"> Yes
				<input type="radio" name="a4" value="0"> No
			</p>
			
			<p>
				<label for "q5"> Do you have any skin conditions or changes in a skin condition? e.g. rashes, burns, bruises exhibited 
								 in each of the last 3 days? (yes/no) </label>
								 
				<br>
				<input type="radio" name="a5" value="1"> Yes
				<input type="radio" name="a5" value="0"> No
			</p>
			
			<p>
				<label for "q6"> In the last 3 days, how does the client go up and down stairs? </label>
								 
				<br>
				<input type="radio" name="a6" value="0"> No help
				<input type="radio" name="a6" value="1"> Needs help
			</p>
			
			<p>
				<label for "q7"> What is the patient's primary mode of locomotion? </label>
				
				<br>
				<input type="radio" name="a7" value="0"> No assistance
				<input type="radio" name="a7" value="1"> Cane
				<input type="radio" name="a7" value="2"> Walker
				<input type="radio" name="a7" value="3"> Wheelchair
				<input type="radio" name="a7" value="4"> Electric scooter
				<input type="radio" name="a7" value="5"> Cannot move
			</p>
			
			<p>
				<label for "q8"> Has the patient complained or shown evidence of pain? </label>
								 
				<br>
				<input type="radio" name="a8" value="0"> No pain
				<input type="radio" name="a8" value="1"> Less than daily
				<input type="radio" name="a8" value="2"> Daily
				<input type="radio" name="a8" value="3"> Multiple times a day
			</p>
			
			<br>
			<p> <button type="submit" name="submit"> Submit </button> </p>
		</form>
	</body>
</html>

<?php
	include "../mysql_con.php";
	
	if(isset($_POST["submit"])){
		$pID=$_POST["pID"];
		
		$check=mysqli_query($db, "SELECT * FROM Questionnaires WHERE P_ID=" .$pID);
		
		if(mysqli_num_rows($check) == 0){
			// If patient has not filled in questionnaire before, add answers to database
			for($i=1; $i <= 8; $i++){
				$ans=$_POST["a" .$i];
				
				$add=mysqli_query($db, "INSERT INTO Questionnaires(P_ID, Q_ID, Results) VALUES(" .$pID. ", " .$i. "," .$ans. ")");
				
				if(!$add){
					echo mysqli_error($db);		// Error will automatically close the database
				}
			}
			
			mysqli_close($db);
			header("Location: ../success.php");
			exit;
		}
		else{
			// If patient has already filled in questionnaire, print error message and don't add answers to database
			echo "<h2 style='color: red'> ERROR: Patient with ID " .$pID. " already filled out questionnaire </h2>";
		}
	}
?>