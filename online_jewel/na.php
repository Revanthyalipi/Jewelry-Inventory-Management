<html>
<head>
<title>Total Order</title>
<style>
	body{
		background-color:pink;
		background-image:url(bg3.jpg);
		background-position:cover;
		background-repeat:no-repeat;
		background-attachment:fixed;
		background-size:100% 100%;
	}
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
	h1{
		color:grey;
	}
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.css">
	<script src="bootstrap.js"></script>
</style>
</head>
<body>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "onlinejewellery";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);
?>
<h1>Total orders placed by customers</h2>
<table>
				<tr>
					<th>Name</th>
					<th>Article name</th>
					<th>Order Id</th>
				</tr> <br>
<?php		
			$query2 = "select CONCAT(c.fname,' ',c.lname) as Name,j.article_name,au.o_id from customers c join order_author au on c.customer_id = au.c_id join order_items oi on au.o_id = oi.o_id join jewellery j on oi.art_id = j.article_id order by au.o_id";
			$result = mysqli_query($conn,$query2);
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
						?>
							<tr>
								<td><?php echo $row['Name']; ?></td>
								<td><?php echo $row['article_name']; ?></td>
								<td><?php echo $row['o_id']; ?></td>
							</tr><br/>
						<?php
					
				}
			}
		
		?>
</table><br>	
<button type="button" onclick="myFunction()">Print</button>
<script>
function myFunction() {
  window.print();
}
</script>	
</body>
</html>