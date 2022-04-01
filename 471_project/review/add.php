<!-- Add new review -->

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../home.php"> Return to home page </a></p>
		
		<h1> Add review below </h1>
		
		<form method="post">
			<p>
			  	<label for="nID"> Nurse ID: </label>
			  	<br>
			  	<input type="text" name="nID">
			</p>
			
			<p>
				<label for="pID"> Patient ID: </label>
				<br>
			  	<input type="text" name="pID">
			</p>
			
			<p>
				<label for "comments"> Review: </label>
				<br>
				<textarea name="comments" rows="18", cols="150"></textarea>
			</p>
			
			<p>
				<label for="rating"> Rating (1 = bad, 5 = excellent): </label>
				<br>
			  	<input type="radio" name="rating" value="1"> 1
				<input type="radio" name="rating" value="2"> 2
				<input type="radio" name="rating" value="3"> 3
				<input type="radio" name="rating" value="4"> 4
				<input type="radio" name="rating" value="5"> 5
			</p>
			
			<br>
			<p> <button type="submit" name="submit"> Submit </button> </p>
		</form>
	</body>
</html>

<?php
	include "../mysql_con.php";
	
	if(isset($_POST["submit"])){
		$nID=$_POST["nID"];
		$pID=$_POST["pID"];
		$comments=$_POST["comments"];
		$rating=$_POST["rating"];
		
		$add=mysqli_query($db, "INSERT INTO Reviews(N_ID, P_ID, Comments, Rating) VALUES('" .$nID. "', '" .$pID. "', \"" 
			.$comments. "\", '" .$rating. "')");
		
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