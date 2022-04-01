<!-- Display all reviews -->

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../home.php"> Return to home page </a></p>
		
		<h1> View all reviews below </h1>
	</body>
</html>

<?php
	// Run query to show all rows in table
	
	echo "<table border='1'>
	<tr>
		<th> Nurse ID </th>
		<th width> Patient ID </th>
		<th width='700'> Review </th>
		<th width='75'> Rating </th>
		<th width='75'></th>
	</tr>";
	
	include "../mysql_con.php";

	$select=mysqli_query($db, "SELECT * FROM Reviews");
	
	while($row=mysqli_fetch_array($select)){
		echo "<tr>
			<td style='text-align: center'>" .$row["N_ID"]. "</td>
			<td style='text-align: center'>" .$row["P_ID"]. "</td>
			<td>" .$row["Comments"]. "</td>
			<td style='text-align: center'>" .$row["Rating"]. "</td>
			<td style='text-align: center'><a href='update.php?ID=" .$row["R_ID"]. "'> Update </a></td>
		</tr>";
	}
	
	echo "</table>";
?>

<html>
	<p> <a href="./add.php"> Add new review </a> </p>
</html>