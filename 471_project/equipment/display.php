<!-- Equipment list -->

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../home.php"> Return to home page </a></p>
		<h1> List of equipment </h1>
	</body>
</html>

<?php
	include "../mysql_con.php";

	$equipment=mysqli_query($db, "SELECT * FROM Equipment WHERE Equipment.Signed_Out=false");

	echo "<table border='1'>
		<tr>
			<th> ID </th>
			<th width='150'> Equipment </th>
			<th width='400'> Belongs to </th>
			<th width='90'> </th>
			<th width='75'> </th>
		</tr>";

	while($row=mysqli_fetch_array($equipment)){		
		echo "<tr>";
			echo "<td style='text-align: center'>" .$row["ID"]. "</td>";
			echo "<td style='text-align: center'>" .$row["Name"]. "</td>";
			echo "<td style='text-align: center'>" .$row["Company"]. "</td>";
			echo "<td style='text-align: center'><a href='sign-out.php?ID=" .$row["ID"]. "'> Sign out </a></td>";
			echo "<td style='text-align: center'><a onClick=\"return confirm('Do you really want to delete this equipment?')
				  \"href='delete.php?ID=" .$row["ID"]. "'> Delete </a></td>";
		echo "</tr>";
	}

	echo "</table>";

	mysqli_close($db);
?>
