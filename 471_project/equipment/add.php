<html>
	<body style="background-color:#BADFE1">
		<p><a href="../home.php"> Return to home page </a></p>
		
		<h1> Add equipment below </h1>
		
		<form method="post">
			<p>
			  	<label for="eName"> Equipment: </label>
			  	<br>
			  	<input type="text" name="eName">
			</p>
			
			<p>
			  	<label for="cName"> Company: </label>
			  	<br>
			  	<input type="text" name="cName">
			</p>
			
			<br>
			<p> <button type="submit" name="submit"> Submit </button> </p>
		</form>
	</body>
</html>

<?php
	include "../mysql_con.php";
	
	if(isset($_POST["submit"])){
		$equipment=$_POST["eName"];
		$company=$_POST["cName"];
		
		$add=mysqli_query($db, "INSERT INTO Equipment(Name, Company) VALUES('" .$equipment. "', '" .$company. "')");
		
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