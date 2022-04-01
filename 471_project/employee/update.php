<!-- Update employee -->

<?php
	include "../mysql_con.php";

	$id=$_GET["ID"];

	$select=mysqli_query($db, "SELECT * FROM Nurses WHERE ID=" .$id);	
	$data=mysqli_fetch_array($select);
	
	if(isset($_POST["update"])){
		$cName=$_POST["cName"];
		
		$update1=mysqli_query($db,"UPDATE Nurses SET Company='" .$cName. "' WHERE ID=" .$id);

		if($update1){
			// Update employee counts
			mysqli_query($db, "UPDATE Companies SET NoEmployee=NoEmployee + 1 WHERE Name='" .$cName. "'");
			mysqli_query($db, "UPDATE Companies SET NoEmployee=NoEmployee - 1 WHERE Name='" .$data["Company"]. "'");
			
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
		
		<h1> Edit employee below </h1>
		
		<label> Nurse ID: <?php echo $data["ID"] ?> </label>
		
		<form method="post">
			<p>
				<label for="cID"> Company (make blank to signal no company): </label>
				<br>
				<input type="text" name="cName" value="<?php echo $data["Company"] ?>">
			</p>
			
			<br>
			<p> <button type="submit" name="update"> Update </button> </p>
		</form>
	</body>
</html>