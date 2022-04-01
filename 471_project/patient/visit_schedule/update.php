<!-- Update visitor schedule -->

<?php
	include "../../mysql_con.php";

	$id=$_GET["ID"];

	$select=mysqli_query($db, "SELECT * FROM VisitSchedules WHERE VS_ID=" .$id);	
	$data=mysqli_fetch_array($select);

	if(isset($_POST["update"])){
		$date=$_POST["date"];
		$start=$_POST["sTime"];
		$end=$_POST["eTime"];
		$visitors=$_POST["visits"];
		
		$update=mysqli_query($db,"UPDATE VisitSchedules SET Date='" .$date. "', StartTime='" .$start. "', EndTime='" .$end. 
			"', VisitorNames='" .$visitors. "' WHERE VS_ID=" .$id);

		if($update){
			mysqli_close($db);
			header("Location: ../../success.php");
			exit;
		}
		else{
			echo mysqli_error($db);		// Error will automatically close the database
		}
	}
?>

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../../home.php"> Return to home page </a></p>
		
		<h1> Editing patient <?php echo $data["P_ID"] ?>'s visitor schedule </h1>
		
		<form method="post">			
			<p>
			  	<label for="date"> Date (YYYY-MM-DD): </label>
			  	<br>
			  	<input type="text" name="date" value="<?php echo $data["Date"] ?>">
			</p>
			
			<p>
			  	<label for="sTime"> Start Time (in 24 hour format): </label>
			  	<br>
			  	<input type="text" name="sTime" value="<?php echo $data["StartTime"] ?>">
			</p>
			
			<p>
			  	<label for="eTime"> End Time (in 24 hour format): </label>
			  	<br>
			 	<input type="text" name="eTime" value="<?php echo $data["EndTime"] ?>">
			</p>
			
			<p>
			  	<label for="visits"> Visitors: </label>
			  	<br>
			  	<textarea type="text" name="visits" rows="5" cols="50"><?php echo $data["VisitorNames"] ?></textarea>
			</p>
			
			<br>
			<p> <button type="submit" name="update"> Update </button> </p>
		</form>
	</body>
</html>