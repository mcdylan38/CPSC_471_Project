<!-- Adding new nurse -->

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../home.php"> Return to home page </a></p>
		
		<h1> Add new nurse below </h1>
		
		<form method="post">
			<p>
			  	<label for="nName"> Nurse name: </label>
			  	<br>
			 	<input type="text" name="nName">
			</p>
			
			<p>
			  	<label for="nAge"> Age: </label>
			  	<br>
			  	<input type="text" name="nAge">
			</p>
			
			<p>
				<label for "nPhone"> Phone number: </label>
				<br>
				<input type="text" name="nPhone">
			</p>
			
			<p>
				<label for "nEmail"> Email: </label>
				<br>
				<input type="text" name="nEmail">
			</p>
			
			<p>
				<label for "nAddr"> Home address: </label>
				<br>
				<input type="text" name="nAddr">
			</p>
			
			<br>
			<p> <button type="submit" name="submit"> Submit </button> </p>
		</form>
	</body>
</html>

<?php
	include "../mysql_con.php";
	
	if(isset($_POST["submit"])){
		$name=$_POST["nName"];
		$age=$_POST["nAge"];
		$phone=$_POST["nPhone"];
		$email=$_POST["nEmail"];
		$address=$_POST["nAddr"];
		
		$add=mysqli_query($db, "INSERT INTO Nurses(Name, Age, Phone_Number, Email, Address) VALUES('" .$name. "', '" .$age. "', '" 
			.$phone. "', '" .$email. "', '" .$address. "')");
		
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
