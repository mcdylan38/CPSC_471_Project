<!-- Updating information of existing nurse -->

<?php
	include "../mysql_con.php";

	$id=$_GET["ID"];

	$select=mysqli_query($db, "SELECT * FROM Nurses WHERE ID=" .$id);	
	$data=mysqli_fetch_array($select);

	if(isset($_POST["update"])){
		$name=$_POST["nName"];
		$age=$_POST["nAge"];
		$phone=$_POST["nPhone"];
		$email=$_POST["nEmail"];
		$address=$_POST["nAddr"];
		
		$update=mysqli_query($db,"UPDATE Nurses SET name='" .$name. "', age='" .$age. "', Phone_Number='" .$phone. "', Email='" 
			.$email. "', Address='" .$address. "' WHERE ID=" .$id);

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
   <h1> Update nurse information </h1>

	  <body style="background-color:#BADFE1">
		 <form method="POST">
			<p>
			   <label for "nName"> Name: </label>
			   <br>
			   <input type="text" name="nName" value="<?php echo $data["Name"]; ?>">
			</p>
			<p>
			   <label for "nAge"> Age: </label>
			   <br>
			   <input type="text" name="nAge" value="<?php echo $data["Age"]?>">
			</p>
			
			<p>
				<label for "nPhone"> Phone number: </label>
				<br>
				<input type="text" name="nPhone" value="<?php echo $data["Phone_Number"]?>">
			</p>
			
			<p>
				<label for "nEmail"> Email: </label>
				<br>
				<input type="text" name="nEmail" value="<?php echo $data["Email"]?>">
			</p>
			
			<p>
				<label for "nAddr"> Home address: </label>
				<br>
				<input type="text" name="nAddr" value="<?php echo $data["Address"]?>">
			</p>

			<br>
			<p> <button type="submit" name="update"> Update </button> </p>
	  </form>
   </body>
</html>