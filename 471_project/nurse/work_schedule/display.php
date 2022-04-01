<!-- Display all work schedules -->

<html>
	<body style="background-color:#BADFE1">
		<p> <a href="../../home.php"> Return to home page </a> </p>
		
		<h1> View nurses' work schedules below </h1>
	</body>
</html>

<?php
	// Run query to display info here
	
	echo "<table border='1'>
	<tr>
		<th> Nurse ID </th>
		<th width='125'> Date </th>
		<th width='115'> Start Time </th>
		<th width='115'> End Time </th>
		<th> Patient ID </th>
		<th width='75'></th>
		<th width='75'></th>
	</tr>";
	
	include "../../mysql_con.php";

	$select=mysqli_query($db, "SELECT * FROM WorkSchedules");
	
	while($row=mysqli_fetch_array($select)){
		echo "<tr>
			<td style='text-align: center'>" .$row["N_ID"]. "</td>
			<td style='text-align: center'>" .$row["Date"]. "</td>
			<td style='text-align: center'>" .$row["StartTime"]. "</td>
			<td style='text-align: center'>" .$row["EndTime"]. "</td>
			<td style='text-align: center'>" .$row["P_ID"]. "</td>
			<td style='text-align: center'><a href='update.php?ID=" .$row["WS_ID"]. "'> Update </a></td>
			<td style='text-align: center'><a onClick=\"return confirm('Do you really want to delete this work schedule?')
				  \"href='delete.php?ID=" .$row["WS_ID"]. "'> Delete </a></td>
		</tr>";
	}
	
	echo "</table>";
?>

<html>
	<p> <a href="./add.php"> Add new work schedule </a> </p>
</html>