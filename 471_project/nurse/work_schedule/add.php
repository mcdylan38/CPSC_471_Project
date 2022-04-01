<!-- Adding new work schedule -->

<html>
	<body style="background-color:#BADFE1">
		<p><a href="localhost/471_project/home.php"> Return to home page </a></p>
		
		<h1> Add new work schedule for nurse below </h1>
		
		<form method="post">
			<p>
			  	<label for="nID"> Nurse ID: </label>
			  	<br>
			  	<input type="text" name="nID">
			</p>
			
			<p>
				<label for "date"> Date (YYYY-MM-DD): </label>
				<br>
				<input type="text" name="date">
			</p>
			
			<p>
				<label for "sTime"> Start time (in 24 hour format): </label>
				<br>
				<input type="text" name="sTime">
			</p>
			
			<p>
				<label for "eTime"> End time (in 24 hour format): </label>
				<br>
				<input type="text" name="eTime">
			</p>
			
			<p>
			  	<label for="pID"> Patient ID: </label>
			  	<br>
			  	<input type="text" name="pID">
			</p>
			
			<br>
			<p> <button type="submit" name="submit"> Submit </button> </p>
		</form>
	</body>
</html>

<?php
	include "../../mysql_con.php";
	
	if(isset($_POST["submit"])){
		$nID=$_POST["nID"];
		$date=$_POST["date"];
		$start=$_POST["sTime"];
		$end=$_POST["eTime"];
		$pID=$_POST["pID"];
		
		$add=mysqli_query($db, "INSERT INTO WorkSchedules(N_ID, P_ID, Date, StartTime, EndTime) VALUES('" .$nID. "', '" .$pID.
			"', '" .$date. "', '" .$start. "', '" .$end. "')");
		
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
