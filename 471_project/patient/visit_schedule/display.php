<!-- Display all visitor schedules -->

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../../home.php"> Return to home page </a></p>
		
		<h1> View patients' visitor schedules below </h1>
	</body>
</html>

<?php
	// Run query to display all table rows
	
	echo "<table border='1'>
	<tr>
		<th> Patient ID </th>
		<th width='110'> Date </th>
		<th width='110'> Start Time </th>
		<th width='100'> End Time </th>
		<th width='700'> Visitors </th>
		<th width='75'> </th>
		<th width='75'> </th>
	</tr>";
	
	include "../../mysql_con.php";

	$select=mysqli_query($db, "SELECT * FROM VisitSchedules");
	
	while($row=mysqli_fetch_array($select)){
		echo "<tr>
			<td style='text-align: center'>" .$row["P_ID"]. "</td>
			<td style='text-align: center'>" .$row["Date"]. "</td>
			<td style='text-align: center'>" .$row["StartTime"]. "</td>
			<td style='text-align: center'>" .$row["EndTime"]. "</td>
			<td style='text-align: center'>" .$row["VisitorNames"]. "</td>
			<td style='text-align: center'><a href='update.php?ID=" .$row["VS_ID"]. "'> Update </a></td>
			<td style='text-align: center'><a onClick=\"return confirm('Do you really want to delete this visit schedule?')
				  \"href='delete.php?ID=" .$row["VS_ID"]. "'> Delete </a></td>
		</tr>";
	}
	
	echo "</table>";
?>

<html>
	<p> <a href="./add.php"> Add new visitory schedule </a> </p>
</html>