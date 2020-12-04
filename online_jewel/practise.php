<?php 
$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "onlinejewellery";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);
$query = "select Article_name from jewellery";
$result = mysqli_query($conn,$query);
	echo"<center>";
	echo"<select>";
	echo"<option>--article--</option>";
	while($row=mysqli_fetch_array($result))
	{
		echo"<option value='$row[Article_name]'>".$row[Article_name]."</option>";	
	}
	echo"</select>";
	echo"</center>";
	mysqli_close($conn);
?>