<!-- Displaying all employees -->

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../home.php"> Return to home page </a></p>
		
		<h1> View all employees below </h1>
	</body>
</html>

<?php
	// Run query to display all rows in table
	
	echo "<table border='1'>
	<tr>
		<th width> Nurse ID </th>
		<th width='750'> Company Name </th>
		<th width='75'></th>
	</tr>";
	
	include "../mysql_con.php";

	$select=mysqli_query($db, "SELECT * FROM Nurses ORDER BY Company");
	
	while($row=mysqli_fetch_array($select)){
		echo "<tr>
			<td style='text-align: center'>" .$row["ID"]. "</td>
			<td style='text-align: center'>" .$row["Company"]. "</td>
			<td style='text-align: center'><a href='update.php?ID=" .$row["ID"]. "'> Update </a></td>
		</tr>";
	}
	
	echo "</table>";
	
	echo "</table>";
?>

<html>
	<p> <a href="./add.php"> Add new employee </a> </p>
</html>