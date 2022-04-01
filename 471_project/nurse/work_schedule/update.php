<!-- Update work schedule -->

<?php
	include "../../mysql_con.php";

	$id=$_GET["ID"];

	$select=mysqli_query($db, "SELECT * FROM WorkSchedules WHERE WS_ID=" .$id);	
	$data=mysqli_fetch_array($select);

	if(isset($_POST["update"])){
		$date=$_POST["date"];
		$start=$_POST["sTime"];
		$end=$_POST["eTime"];
		$pID=$_POST["pID"];
		
		$update=mysqli_query($db,"UPDATE WorkSchedules SET Date='" .$date. "', StartTime='" .$start. "', EndTime='" .$end. 
			"', P_ID='" .$pID. "' WHERE WS_ID=" .$id);

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
		
		<h1> Update nurse <?php echo $data["N_ID"] ?>'s work schedule </h1>
		
		<form method="post">			
			<p>
				<label for "date"> Date: </label>
				<br>
				<input type="text" name="date" value="<?php echo $data["Date"] ?>">
			</p>
			
			<p>
				<label for "sTime"> Start time: </label>
				<br>
				<input type="text" name="sTime" value="<?php echo $data["StartTime"] ?>">
			</p>
			
			<p>
				<label for "eTime"> End time: </label>
				<br>
				<input type="text" name="eTime" value="<?php echo $data["EndTime"] ?>">
			</p>
			
			<p>
			  	<label for="pID"> Patient ID: </label>
			  	<br>
			  	<input type="text" name="pID" value="<?php echo $data["P_ID"] ?>">
			</p>
			
			<br>
			<p> <button type="submit" name="update"> Update </button> </p>
		</form>
	</body>
</html>