
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Orders Placed</title>
<!--font awesome bootstrap CDN-->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="min.css">

  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.css">
	<script src="bootstrap.js"></script>
	<style>
	body{
	background-color:pink; 
	}
	</style>
</head>

<body>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "onlinejewellery";
	

// Create connection
$conn = new mysqli($servername, $username, $password,$db);
  ?>
  <div class="container-fluid">
  <?php
	//		$query = "select * from orders";
//			$result = mysqli_query($conn,$query);
			session_start();
			$username = 'Pragathi0';
			$query2 = "select j.Article_name,j.Article_weight,j.Article_type,j.Purity,oi.Quantity,oi.Discount,oi.Price from jewellery j ,order_items oi where j.Article_id = oi.Art_id and oi.O_id in (select order_id from v1 where fname='$username')";
			$result = mysqli_query($conn,$query2);
			try{
				if(mysqli_num_rows($result) > 0){
				
				while($row = mysqli_fetch_assoc($result)){
						?>
					<div class = "row">	
					<div class="col-lg-12">
					<div class ="col-lg-3 col-md-4 col-sm-6">
			<div class="card">
					<div class="image">
					<img src="j.jpg"/>
					</div>
			<div class="details">
				<div class="center">
				<h1><?php echo $row['Article_name']; ?></h1>
				<p>Type:<?php echo $row['Article_type'];?></p>
				<ul>
				<li>Weight-<?php echo $row['Article_weight']; ?></li>
				<li>Purity-<?php echo $row['Purity']; ?></li>
				<li>Quantity-<?php echo $row['Quantity']; ?></li>
				<li>Discount-<?php echo $row['Discount']; ?>%</li>
				<li>Price-<?php echo $row['Price']; ?>Rs</li>
				</ul>
				<center><button>Click</button></center>
				</div>
				</div>
				</div>
				</div>
				</div>
				</div>
				<?php
						}
					}
			}				
		catch(Exception $e)
		{
			echo $e."asd";
		}
  ?>
  </div>
</body>
</html>