<!-- Adding new employee -->

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../home.php"> Return to home page </a></p>
		
		<h1> Add employee below </h1>
		
		<form method="post">
			<p>
			 	<label for="nID"> Nurse ID: </label>
			  	<br>
			  	<input type="text" name="nID">
			</p>
		
			<p>
			  	<label for="cName"> Company Name: </label>
			  	<br>
			  	<input type="text"name="cName">
			</p>
			
			<br>
			<p> <button type="submit" name="submit"> Submit </button> </p>
		</form>
	</body>
</html>

<?php
include "../mysql_con.php";
	
	if(isset($_POST["submit"])){
		$cName=$_POST["cName"];
		$nID=$_POST["nID"];
		
		$add=mysqli_query($db, "UPDATE Nurses SET Company='" .$cName. "' WHERE ID=" .$nID);
		
		if(!$add){
			echo mysqli_error($db);		// Error will automatically close the database
		}
		else{
			$newEmp=mysqli_query($db, "UPDATE Companies SET NoEmployee=NoEmployee + 1 WHERE Name='" .$cName. "'");
			
			mysqli_close($db);
			header("Location: ../success.php");
			exit;
		}
	}
?>