<html>
	<body style="background-color:#BADFE1">
		<p><a href="../home.php"> Return to home page </a></p>
		
		<h1> View all doctors below </h1>
	</body>
</html>

<?php
	// Run query to show all table rows
	
	echo "<table border='1'>
	<tr>
		<th> ID </th>
		<th width='250'> Doctor </th>
		<th width='50'> Age </th>
		<th width='150'> Phone Number </th>
		<th width='250'> Address </th>
		<th width='550'> Specialization </th>
		<th width='75'></th>
		<th width='75'></th>
	</tr>";
	
	include "../mysql_con.php";

	$select=mysqli_query($db, "SELECT * FROM Doctors");
	
	while($row=mysqli_fetch_array($select)){
		echo "<tr>
			<td style='text-align: center'>" .$row["ID"]. "</td>
			<td style='text-align: center'>" .$row["Name"]. "</td>
			<td style='text-align: center'>" .$row["Age"]. "</td>
			<td style='text-align: center'>" .$row["Phone_Number"]. "</td>
			<td style='text-align: center'>" .$row["Address"]. "</td>
			<td style='text-align: center'>" .$row["Specialization"]. "</td>
			<td style='text-align: center'><a href='update.php?ID=" .$row["ID"]. "'> Update </a></td>
			<td style='text-align: center'><a onClick=\"return confirm('Do you really want to delete this doctor?')
				  \"href='delete.php?ID=" .$row["ID"]. "'> Delete </a></td>
		</tr>";
	}

	echo "</table>";

	mysqli_close($db);
?>

<html>
	<p> <a href="./add.php"> Add new doctor </a> </p>
</html>