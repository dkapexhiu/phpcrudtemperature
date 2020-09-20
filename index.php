<?php

include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");

$maximum = mysqli_query($mysqli, "SELECT MAX(age) AS MaxAge FROM users;");

$minimum = mysqli_query($mysqli, "SELECT MIN(age) AS MinAge FROM users;");

$average = mysqli_query($mysqli, "SELECT AVG(age) AS AvgAge FROM users;");

$total = mysqli_query($mysqli, "SELECT SUM(age) AS SumAge FROM users;");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Age</td>
		<td>Email</td>
		<td>Update</td>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['age']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";	
	}
	?>
	</table>
	<?php 
	while($max = mysqli_fetch_array($maximum)) { 		
		echo "<h3>Max: ".$max[0]."</h3>";		
	}
	?>
	<?php 
	while($min = mysqli_fetch_array($minimum)) { 	
		echo "<h3>Min: ".$min[0]."</h3>";		
	}
	?>
	<?php 
	while($avg = mysqli_fetch_array($average)) { 	
		echo "<h3>Avg: ".$avg[0]."</h3>";		
	}
	?>
	<?php 
	while($sum = mysqli_fetch_array($total)) { 	
		echo "<h3>Sum: ".$sum[0]."</h3>";		
	}
	?>
</body>
</html>
