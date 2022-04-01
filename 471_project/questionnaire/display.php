<html>
	<body style="background-color:#BADFE1">
		<p><a href="../home.php"> Return to home page </a></p>
		
		<h1> View all questionnaire results below </h1>
	</body>
</html>

<?php
	include "../mysql_con.php";

	$select=mysqli_query($db, "SELECT DISTINCT P_ID FROM Questionnaires");
	
	echo "<table border='1'>
	<tr>
		<th> Patient ID </th>
		<th width='115'></th>
	</tr>";
	
	// For testing
	while($row=mysqli_fetch_array($select)){
		echo "<tr>
			<td style='text-align: center'>" .$row["P_ID"]. "</td>
			<td style='text-align: center'> <a href='./view.php?ID=" .$row["P_ID"]. "'> View results </a> </td>
		</tr>";
	}
	
	echo "</table>";
?>

<html>
	<p> <a href="./new-entry.php"> Fill out questionnaire </a> </p>
</html>