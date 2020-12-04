<html>
<head>
<title>Scheme Interval</title>
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
<h1>Summary of Scheme details of customers</h2>

<table>
				<tr>
					<th>Name</th>
					<th>Scheme name</th>
					<th>Interval</th>
				</tr> <br>
<?php		
			$query2 = "select CONCAT(c.fname,' ',c.lname) as Name,s.scheme_name,CONCAT(s.start_date,' to ',s.end_date) as timeinterval from customers c join takes_schemes ts on ts.c_id = c.customer_id join schemes s on s.scheme_id = ts.sch_id";
			$result = mysqli_query($conn,$query2);
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
						?>
							<tr>
								<td><?php echo $row['Name']; ?></td>
								<td><?php echo $row['scheme_name']; ?></td>
								<td><?php echo $row['timeinterval']; ?></td>
							</tr><br/>
						<?php
					
				}
			}
		
		?>
</table>		
</body>
</html>