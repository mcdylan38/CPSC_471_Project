<!-- Displaying information of all existing patients -->

<html>
  <body style="background-color:#BADFE1">
	<p><a href="../home.php"> Return to home page </a></p>
	<h1> List of patients </h1>
  </body>
</html>

<?php
  include "../mysql_con.php";

  $select=mysqli_query($db, "SELECT * FROM Patients");

  echo "<table border='1'>
	<tr>
	  <th> ID </th>
	  <th width='250'> Patient </th>
	  <th width='50'> Age </th>
	  <th width='150'> Phone Number </th>
	  <th width='300'> Home Address </th>
	  <th width='90'></th>
	  <th width='85'></th>
	</tr>";

  while($row=mysqli_fetch_array($select)){
	echo "<tr>
		<td style='text-align: center'>" .$row["ID"]. "</td>
		<td style='text-align: center'>" .$row["Name"]. "</td>
		<td style='text-align: center'>" .$row["Age"]. "</td>
		<td style='text-align: center'>" .$row["Phone_Number"]. "</td>
		<td style='text-align: center'>" .$row["Address"]. "</td>
		<td style='text-align: center'><a href='update.php?ID=" .$row["ID"]. "'> Update </a></td>
		<td style='text-align: center'><a onClick=\"return confirm('Do you really want to delete this patient?')
			  \"href='delete.php?ID=" .$row["ID"]. "'> Delete </a></td>
	</tr>";
  }

  echo "</table>";

  mysqli_close($db);
?>

<html>
	<p> <a href="./add.php"> Add new patient </a> </p>
</html>
