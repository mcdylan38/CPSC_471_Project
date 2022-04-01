<html>
	<body style="background-color:#BADFE1">
		<p><a href="../home.php"> Return to home page </a></p>
		
		<h1> Add new doctor below </h1>
		
		<form method="post">
			<p>
				<label for "dName"> Name: </label>
				<br>
				<input type="text" name="dName">
			</p>
			
			<p>
				<label for "dAge"> Age: </label>
				<br>
				<input type="text" name="dAge">
			</p>
			
			<p>
				<label for "dPhone"> Phone number: </label>
				<br>
				<input type="text" name="dPhone">
			</p>
			
			<p>
				<label for "dAddr"> Address: </label>
				<br>
				<input type="text" name="dAddr">
			</p>
			
			<p>
				<label for "dSpec"> Specialization: </label>
				<br>
				<input type="text" name="dSpec">
			</p>
			
			<br>
			<p> <button type="submit" name="submit"> Submit </button> </p>
		</form>
	</body>
</html>

<?php
	include "../mysql_con.php";
	
	if(isset($_POST["submit"])){
		$name=$_POST["dName"];
		$age=$_POST["dAge"];
		$phone=$_POST["dPhone"];
		$address=$_POST["dAddr"];
		$specialization=$_POST["dSpec"];
		
		$add=mysqli_query($db, "INSERT INTO Doctors(Name, Age, Phone_Number, Address, Specialization) VALUES('" .$name. "', '" .$age. "', '" 
			.$phone. "', '" .$address. "', '" .$specialization. "')");
		
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