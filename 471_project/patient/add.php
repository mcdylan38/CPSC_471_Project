<!-- Adding new patient -->

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../home.php"> Return to home page </a></p>
		
		<h1> Add new patient below </h1>
		
		<form method="post">
			<p>
				<label for="pName"> Patient name: </label>
				<br>
				<input type="text" name="pName">
			</p>
			
			<p>
				<label for="pAge"> Age: </label>
				<br>
				<input type="text" name="pAge">
			</p>
			
			<p>
				<label for "pPhone"> Phone number: </label>
				<br>
				<input type="text" name="pPhone">
			</p>
			
			<p>
				<label for "pAddr"> Home address: </label>
				<br>
				<input type="text" name="pAddr">
			</p>
			
			<br>
			<p> <button type="submit" name="submit"> Submit </button> </p>
		</form>
	</body>
</html>

<?php
	include "../mysql_con.php";
	
	if(isset($_POST["submit"])){
		$name=$_POST["pName"];
		$age=$_POST["pAge"];
		$phone=$_POST["pPhone"];
		$address=$_POST["pAddr"];
		
		$add=mysqli_query($db, "INSERT INTO Patients(Name, Age, Phone_Number, Address) VALUES('" .$name. "', '" .$age. "', ' " 
			.$phone. "', '" .$address. "')");
		
		if(!$add){
			echo mysqli_error($db);		// Error will automatically close the database
		}
		else{
			mysqli_close($db);
			header("Location: ../success.php");
			exit;
		}
	}
?>
