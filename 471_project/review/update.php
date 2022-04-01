<!-- Add new review -->

<?php
	include "../mysql_con.php";
	
	$id=$_GET["ID"];
	
	$select=mysqli_query($db, "SELECT * FROM Reviews WHERE R_ID=" .$id);	
	$data=mysqli_fetch_array($select);

	if(isset($_POST["update"])){
		$nID=$_POST["nID"];
		$pID=$_POST["pID"];
		$comments=$_POST["comments"];
		$rating=$_POST["rating"];
		
		$update=mysqli_query($db,"UPDATE Reviews SET N_ID='" .$nID. "', P_ID='" .$pID. "', Comments='" .$comments. "',
			Rating=" .$rating. " WHERE R_ID=" .$id);

		if($update){
			mysqli_close($db);
			header("Location: ../success.php");
			exit;
		}
		else{
			echo mysqli_error($db);		// Error will automatically close the database
		}
	}
?>

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../home.php"> Return to home page </a></p>
		
		<h1> Edit review below </h1>
		
		<form method="post">
			<p>
			  	<label for="nID"> Nurse ID: </label>
			  	<br>
			  	<input type="text" name="nID" value="<?php echo $data["N_ID"] ?>">
			</p>
			
			<p>
				<label for="pID"> Patient ID: </label>
				<br>
			  	<input type="text" name="pID" value="<?php echo $data["P_ID"] ?>">
			</p>
			
			<p>
				<label for "comments"> Review: </label>
				<br>
				<textarea name="comments" rows="18", cols="150"><?php echo $data["Comments"] ?></textarea>
			</p>
			
			<p>
				<label for="rating"> Rating (1 = bad, 5 = excellent): </label>
				<br>
				<?php
					if($data["Rating"] == "1"){
						echo "<input type='radio' name='rating' value='1' checked='checked'> 1
						<input type='radio' name='rating' value='2'> 2
						<input type='radio' name='rating' value='3'> 3
						<input type='radio' name='rating' value='4'> 4
						<input type='radio' name='rating' value='5'> 5";
					}
					if($data["Rating"] == "2"){
						echo "<input type='radio' name='rating' value='1'> 1
						<input type='radio' name='rating' value='2' checked='checked'> 2
						<input type='radio' name='rating' value='3'> 3
						<input type='radio' name='rating' value='4'> 4
						<input type='radio' name='rating' value='5'> 5";
					}
					if($data["Rating"] == "3"){
						echo "<input type='radio' name='rating' value='1'> 1
						<input type='radio' name='rating' value='2'> 2
						<input type='radio' name='rating' value='3' checked='checked'> 3
						<input type='radio' name='rating' value='4'> 4
						<input type='radio' name='rating' value='5'> 5";
					}
					if($data["Rating"] == "4"){
						echo "<input type='radio' name='rating' value='1'> 1
						<input type='radio' name='rating' value='2'> 2
						<input type='radio' name='rating' value='3'> 3
						<input type='radio' name='rating' value='4' checked='checked'> 4
						<input type='radio' name='rating' value='5'> 5";
					}
					if($data["Rating"] == "5"){
						echo "<input type='radio' name='rating' value='1'> 1
						<input type='radio' name='rating' value='2'> 2
						<input type='radio' name='rating' value='3'> 3
						<input type='radio' name='rating' value='4'> 4
						<input type='radio' name='rating' value='5' checked='checked'> 5";
					}
				?>
			</p>
			
			<br>
			<p> <button type="submit" name="update"> Update </button> </p>
		</form>
	</body>
</html>