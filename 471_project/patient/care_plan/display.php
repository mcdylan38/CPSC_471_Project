<!-- Displaying all care plans -->

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../../home.php"> Return to home page </a></p>
		
		<h1> View patients' care plans below </h1>
	</body>
</html>

<?php
	// Add query to display table info here
	
	echo "<table border='1'>
	<tr>
		<th> Patient ID </th>
		<th width='800'> Treatments </th>
		<th width='100'> Economic Standing </th>
		<th width='75'></th>
		<th width='75'></th>
	</tr>";
	
	include "../../mysql_con.php";

	$select=mysqli_query($db, "SELECT * FROM CarePlans");
	
	while($row=mysqli_fetch_array($select)){
		echo "<tr>
			<td style='text-align: center'>" .$row["P_ID"]. "</td>
			<td style='text-align: center'>" .$row["Treatments"]. "</td>
			<td style='text-align: center'>" .$row["EconomicStanding"]. "</td>
			<td style='text-align: center'><a href='update.php?ID=" .$row["CP_ID"]. "'> Update </a></td>
			<td style='text-align: center'><a onClick=\"return confirm('Do you really want to delete this care plan?')
				  \"href='delete.php?ID=" .$row["CP_ID"]. "'> Delete </a></td>
		</tr>";
	}
	
	echo "</table>";
?>

<html>
	<p> <a href="./add.php"> Add new care plan </a> </p>
</html>