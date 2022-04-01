<!-- Adding new company -->

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../home.php"> Return to home page </a></p>
		
		<h1> Add company below </h1>
		
		<form method="post">
			<p>
				<label for="cName"> Company Name: </label>
				<br>
				<input type="text" id="cName" name="cName" value="">
			</p>
			
			<p>
				<label for="cLoc"> Location: </label>
			  	<br>
			  	<input type="text" id="cLoc" name="cLoc" value="">
			</p>
			
			<br>
			<p> <button type="submit" name="submit"> Submit </button> </p>
		</form>
	</body>
</html>

<?php
	include "../mysql_con.php";
	
	if(isset($_POST["submit"])){
		$name=$_POST["cName"];
		$location=$_POST["cLoc"];
		
		$add=mysqli_query($db, "INSERT INTO Companies(Name, Location) VALUES('" .$name. "', '" .$location. "')");
		
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