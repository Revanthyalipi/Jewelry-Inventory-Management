<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "onlinejewellery";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);
?>

<html>
	<body>
	
		<?php
		
			$query = "select * from orders";
			$result = mysqli_query($conn,$query);
			if(mysqli_num_rows($result) > 0){
				
				while($row = mysqli_fetch_assoc($result)){
					echo "<div style=\"color:red\"> {$row['Order_id']} </div>";
				}
			}
		
		?>
	
	</body>
</html>