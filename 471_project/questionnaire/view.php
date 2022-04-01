<?php session_start(); ?>

<html>
	<body style="background-color:#BADFE1">
		<p><a href="../home.php"> Return to home page </a></p>
	</body>
</html>

<?php
	// Show patient's answers to questionnaire
	include "../mysql_con.php";
	
	$id=$_GET["ID"];
	$select=mysqli_query($db, "SELECT Results FROM Questionnaires WHERE P_ID=" .$id);
	
	$questions=array("Do you feel at ease when interacting with others?", "Do you have a problem chewing?", "Does the patient have an 
		adequate living environment?", "How is your personal hygiene? Are you able to comb your hair, brush your teeth, wash your face 
		without difficulty?", "Do you have any skin conditions or changes in a skin condition in each of the last 3 days?", "In the 
		last 3 days, how the client go up and down stairs?", "What is the patients primary mode of locomotion?", "Has the patient 
		complained or shown evidence of pain?");
	
	echo "<h3> View results for patient " .$id. "</h3>";
	
	echo "<table border='1'>
	<tr>
		<th width='800'> Question </th>
		<th width='100'> Response </th>
	</tr>";
	
	$i=0;
	while($row=mysqli_fetch_array($select)){
		echo "<tr>";
			echo "<td>" .$questions[$i]. "</td>";
			echo "<td style='text-align: center'>" .$row["Results"]. "</td>";
		echo "</tr>";
		$i++;
	}
	
	echo "</table>";
?>

<html>
	<br>
	<h3> Legend: </h3>
	
	<table border="1">
		<th width="110"> Question # </th>
		<th width="200"> Possible responses </th>
		
		<tr>
			<td style="text-align: center"> 1 </td>
			<td>
				0 = No <br>
				1 = Yes
			</td>
		</tr>
			
		<tr>
			<td style="text-align: center"> 2 </td>
			<td>
				0 = No <br>
				1 = Yes
			</td>
		</tr>
			
		<tr>
			<td style="text-align: center"> 3 </td>
			<td>
				0 = No <br>
				1 = Yes
			</td>
		</tr>
			
		<tr>
			<td style="text-align: center"> 4 </td>
			<td>
				0 = No <br>
				1 = Yes
			</td>
		</tr>
		
		<tr>
			<td style="text-align: center"> 5 </td>
			<td>
				0 = No <br>
				1 = Yes
			</td>
		</tr>
		
		<tr>
			<td style="text-align: center"> 6 </td>
			<td>
				0 = No help <br>
				1 = Needs help
			</td>
		</tr>
		
		<tr>
			<td style="text-align: center"> 7 </td>
			<td>
				0 = No assistance <br> 
				1 = Cane <br> 
				2 = Walker <br>
				3 = Wheelchair <br>
				4 = Electric scooter <br>
				5 = Cannot move
			</td>
		</tr>
		
		<tr>
			<td style="text-align: center"> 8 </td>
			<td>
				0 = No pain <br>
				1 = Less than daily <br> 
				2 = Daily <br>
				3 = Multiple times a day <br>
			</td>
		</tr>
	</table>
	<br>
</html>
