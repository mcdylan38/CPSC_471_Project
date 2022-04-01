<!-- Find signed out equipment -->

<html>
	<p><a href="../home.php"> Return to home page </a></p>
	<h1> Equipment sign in </h1>

	<body style="background-color:#BADFE1">		
		<form method="POST">
			<label for "nID"> Enter your nurse ID: </label>
			<input type="text" name="nID">
			<button type="submit" name="submit"> Submit </button>
		</form>
	</body>
</html>

<?php
	include "../mysql_con.php";
	
	if(isset($_POST["submit"])){
		$nID=$_POST["nID"];
		
		$select=mysqli_query($db, "SELECT Equipment.ID AS EID, Equipment.Name AS eName, Nurses.Name AS nName, Patients.Name
			AS pName FROM Equipment INNER JOIN Nurses ON Equipment.nurseID=Nurses.ID INNER JOIN Patients ON Equipment.patientID
			=Patients.ID WHERE Equipment.Signed_Out=true and Nurses.ID=" .$nID);
	
		echo "<table border='1'>
		<tr>
			<th width='150'> Equipment </th>
			<th width='200'> Nurse </th>
			<th width='200'> Patient </th>
			<th width='70'></th>
		</tr>";
		
		while($row=mysqli_fetch_array($select)){
			echo "<tr>";
				echo "<td style='text-align: center'>" .$row["eName"]. "</td>";
				echo "<td style='text-align: center'>" .$row["nName"]. "</td>";
				echo "<td style='text-align: center'>" .$row["pName"]. "</td>";
				echo "<td style='text-align: center'><a href='sign-in.php?ID=" .$row["EID"]. "'> Sign in </a></td>";
			echo "</tr>";
		}
	}
?>
