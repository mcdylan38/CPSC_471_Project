<!-- Adding new visitor schedule -->

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../../home.php"> Return to home page </a></p>
		
		<h1> Add new visitor schedule for patient below </h1>
		
		<form method="post">
			<p>
			  	<label for="pID"> Patient ID: </label>
			  	<br>
			  	<input type="text" name="pID">
			</p>
			
			<p>
			  	<label for="date"> Date (YYYY-MM-DD): </label>
			  	<br>
			  	<input type="text" name="date">
			</p>
			
			<p>
			  	<label for="sTime"> Start Time (in 24 hour format): </label>
			  	<br>
			  	<input type="text" name="sTime">
			</p>
			
			<p>
			  	<label for="eTime"> End Time (in 24 hour format): </label>
			  	<br>
			 	<input type="text" name="eTime">
			</p>
			
			<p>
			  	<label for="visits"> Visitors: </label>
			  	<br>
			  	<textarea type="text" name="visits" rows="5" cols="50"></textarea>
			</p>
			
			<br>
			<p> <button type="submit" name="submit"> Submit </button> </p>
		</form>
	</body>
</html>

<?php
	include "../../mysql_con.php";
	
	if(isset($_POST["submit"])){
		$pID=$_POST["pID"];
		$date=$_POST["date"];
		$start=$_POST["sTime"];
		$end=$_POST["eTime"];
		$visitors=$_POST["visits"];
		
		$add=mysqli_query($db, "INSERT INTO VisitSchedules(P_ID, Date, StartTime, EndTime, VisitorNames) VALUES('" .$pID. "', '" .$date. 
			"', '" .$start. "', '" .$end. "', '" .$visitors. "')");
		
		if(!$add){
			echo mysqli_error($db);		// Error will automatically close the database
		}
		else{
			mysqli_close($db);
			header("Location: ../../success.php");
			exit;
		}
	}
?>