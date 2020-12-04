<html>
<head>
<title>My Orders </title>
<style>
	table{
		width:100%;
		text-align:left;
	}
	table,th,td{
		border:1px solid #ccc;
		border-collapse:collapse;
		text-align:center;
		padding:5px;
	}
	table tr:nth-child(even){
	background-color: #eee;
	}
	table tr:nth-child(odd){
	background-color: #fff;
	}
</style>
</head>
<body>
<br>
<br>
	<center>
	<form action="rp.php" method="POST">
				<input type="text" name ="id" placeholder="enter order id"/>
				<input type="submit" name="search" value="Search by Order id"/>
	</form>
	</center>	
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "onlinejewellery";
	

// Create connection
$conn = new mysqli($servername, $username, $password,$db);
?>
<table>
				<tr>
					<td>Order Id</td>
					<td>Order Date</td>
					<td>Order Time</td>
					<td>Amount</td>
					<td>GST</td>
				</tr>
<?php
	//		$query = "select * from orders";
//			$result = mysqli_query($conn,$query);
			$username = "Pruthvi";
			$query2 = "select Order_id,Order_date,Order_time,Amount,GST from v1 where Fname=\"$username\"";
			$result = mysqli_query($conn,$query2);
			if(mysqli_num_rows($result) > 0){
				
				while($row = mysqli_fetch_assoc($result)){
						?>
							<tr>
								<td><?php echo $row['Order_id']; ?></td>
								<td><?php echo $row['Order_date']; ?></td>
								<td><?php echo $row['Order_time']; ?></td>
								<td><?php echo $row['Amount']; ?></td>
								<td><?php echo $row['GST']; ?></td>
							</tr><br>
						<?php
					
				}
			}
		
		?>
</table>		
</body>
</html>