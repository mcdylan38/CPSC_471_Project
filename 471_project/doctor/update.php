<!-- Updating doctor's info -->

<?php
	include "../mysql_con.php";

	$id=$_GET["ID"];

	$select=mysqli_query($db, "SELECT * FROM Doctors WHERE ID=" .$id);	
	$data=mysqli_fetch_array($select);

	if(isset($_POST["update"])){
		$name=$_POST["dName"];
		$age=$_POST["dAge"];
		$phone=$_POST["dPhone"];
		$address=$_POST["dAddr"];
		$specialization=$_POST["dSpec"];
		
		$update=mysqli_query($db,"UPDATE Doctors SET name='" .$name. "', age='" .$age. "', Phone_Number='" .$phone. "', Address='" 
			.$address. "', Specialization='" .$specialization. "' WHERE ID=" .$id);

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
		
		<h1> Edit doctor <?php echo $data["ID"] ?> below </h1>
		
		<form method="post">
			<p>
				<label for "dName"> Name: </label>
				<br>
				<input type="text" name="dName" value="<?php echo $data["Name"] ?>">
			</p>
			
			<p>
				<label for "dAge"> Age: </label>
				<br>
				<input type="text" name="dAge" value="<?php echo $data["Age"] ?>">
			</p>
			
			<p>
				<label for "dPhone"> Phone number: </label>
				<br>
				<input type="text" name="dPhone" value="<?php echo $data["Phone_Number"] ?>">
			</p>
			
			<p>
				<label for "dAddr"> Address: </label>
				<br>
				<input type="text" name="dAddr" value="<?php echo $data["Address"] ?>">
			</p>
			
			<p>
				<label for "dSpec"> Specialization: </label>
				<br>
				<input type="text" name="dSpec" value="<?php echo $data["Specialization"] ?>">
			</p>
			
			<br>
			<p> <button type="submit" name="update"> Submit </button> </p>
		</form>
	</body>
</html>