<!-- Updating information of existing patient -->

<?php
	include "../mysql_con.php";

	$id=$_GET["ID"];

	$select=mysqli_query($db, "SELECT * FROM Patients WHERE ID=" .$id);	
	$data=mysqli_fetch_array($select);

	if(isset($_POST["update"])){
		$name=$_POST["pName"];
		$age=$_POST["pAge"];

		$update=mysqli_query($db, "UPDATE Patients SET name='" .$name. "', age=" .$age. " WHERE ID=" .$id);

		if($update){
			mysqli_close($db);
			header("Location: ../success.php");
			exit;
		}
		else{
			echo mysqli_error($db);		// Error will automatically close the database
		}
	}
?>

<html>
   <p><a href="../home.php"> Return to home page </a></p>
   <h1> Update patient information </h1>

	<body style="background-color:#BADFE1">
		<form method="POST">
			<p>
			   <label for "pName"> Name: </label>
			   <br>
			   <input type="text" name="pName" value="<?php echo $data["Name"]?>">
			</p>
			
			<p>
			   <label for "pAge"> Age: </label>
			   <br>
			   <input type="text" name="pAge" value="<?php echo $data["Age"]?>">
			</p>
			
			<p>
				<label for "pPhone"> Phone number: </label>
				<br>
				<input type="text" name="pPhone" value="<?php echo $data["Phone_Number"]?>">
			</p>
			
			<p>
				<label for "pAddr"> Home address: </label>
				<br>
				<input type="text" name="pAddr" value="<?php echo $data["Address"]?>">
			</p>
			
			<p><button type="submit" name="update"> Update </button></p>
	  	</form>
   </body>
</html>
