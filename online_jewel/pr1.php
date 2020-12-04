
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
	session_start();
// Create connection
$conn = new mysqli($servername, $username, $password,$db);
  ?>
  <div class="container-fluid">
  <?php
	//		$query = "select * from orders";
//			$result = mysqli_query($conn,$query);
			$username = 'Pragathi';
			$query2 = "select Order_id,Order_date,Order_time,Amount,GST from v1 where Fname=\"$username\" order by Order_date";
			$result = mysqli_query($conn,$query2);
			if(mysqli_num_rows($result) > 0){
				
				while($row = mysqli_fetch_assoc($result)){
						?>
					<div class = "row">	
					<div class="col-lg-12">
					<div class ="col-lg-3 col-md-4 col-sm-6">
			<div class="card" id="{<?php $row['Order_id']?>}">
					<div class="image">
					<a href="rp1.php?ord=<?php echo $row['Order_id']?>"> <img src="j.jpg"/> </a>
					</div>
			<div class="details">
				<div class="center">
				<p>orderid</p>
				<h1><?php echo $row['Order_id']; ?></h1>
				<ul>
				<li>date:<?php echo $row['Order_date'];?></li>
				<li>amount-<?php echo $row['Amount']; ?>Rs</li>
				<li>gst-<?php echo $row['GST']; ?>%</li>
				</ul>
				</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			<?php
		}
			}		
  
  ?>
  </div>
</body>
</html>