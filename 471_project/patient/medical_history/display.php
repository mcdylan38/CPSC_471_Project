<!-- Display all medical histories -->

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../../home.php"> Return to home page </a></p>
		
		<h1> View patients' medical histories below </h1>
	</body>
</html>

<?php
	// Run query to show all table rows
	
	echo "<table border='1'>
	<tr>
		<th> Patient ID </th>
		<th width='275'> Illness(es) </th>
		<th width='110'> Date Contracted </th>
		<th width='650'> Symptoms </th>
		<th width='75'></th>
		<th width='75'></th>
	</tr>";
	
	include "../../mysql_con.php";

	$select=mysqli_query($db, "SELECT * FROM MedicalHistories");
	
	while($row=mysqli_fetch_array($select)){
		echo "<tr>
			<td style='text-align: center'>" .$row["P_ID"]. "</td>
			<td style='text-align: center'>" .$row["Illness"]. "</td>
			<td style='text-align: center'>" .$row["InfectionDate"]. "</td>
			<td style='text-align: center'>" .$row["Symptoms"]. "</td>
			<td style='text-align: center'><a href='update.php?ID=" .$row["MH_ID"]. "'> Update </a></td>
			<td style='text-align: center'><a onClick=\"return confirm('Do you really want to delete this medical history?')
			  \"href='delete.php?ID=" .$row["MH_ID"]. "'> Delete </a></td>
		</tr>";
	}
	
	echo "</table>";
?>

<html>
	<p> <a href="./add.php"> Add new medical history </a> </p>
</html>