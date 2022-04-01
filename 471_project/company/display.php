<!-- Displaying all companies -->

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../home.php"> Return to home page </a></p>
		
		<h1> View all companies below </h1>
	</body>
</html>

<?php
	// Run query to display all rows in table
	
	echo "<table border='1'>
	<tr>
		<th width='500'> Company Name </th>
		<th width='250'> Location </th>
		<th width='110'> Number of Employees </th>
		<th width='75'> </th>
	</tr>";
	
	include "../mysql_con.php";

	$select=mysqli_query($db, "SELECT * FROM Companies");
	
	while($row=mysqli_fetch_array($select)){
		echo "<tr>
			<td style='text-align: center'>" .$row["Name"]. "</td>
			<td style='text-align: center'>" .$row["Location"]. "</td>
			<td style='text-align: center'>" .$row["NoEmployee"]. "</td>
			<td style='text-align: center'><a onClick=\"return confirm('Do you really want to delete this company?')
				  \"href='delete.php?Name=" .$row["Name"]. "'> Delete </a></td>
		</tr>";
	}
	
	echo "</table>";
	
	echo "</table>";
?>

<html>
	<p> <a href="./add.php"> Add new company </a> </p>
</html>