<html>
<head>
<title>Factories</title>
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
$query = "select Article_name from jewellery";

?>
<h1>from which factories article are imported </h2>
<form method="post">
<?php 
$result = mysqli_query($conn,$query);
	echo"<p>";
	echo"<select name='drop' id='drop'>";
	echo"<option>--article--</option>";
	while($row=mysqli_fetch_array($result))
	{
		echo"<option value='$row[Article_name]'>".$row[Article_name]."</option>";	
	}
	echo"</select>";
	echo"</p>";
	?>
	<br>
	<br>
<center><input type="submit" name="submit" id="submit"></input></center>
</form>
<table>
				<tr>
					<th>Factory id</th>
					<th>Factory Name</th>
					<th>Location</th>
				</tr> <br>
<?php		
			if(isset($_REQUEST["submit"])){
			$aname = $_POST["drop"]; 
			$query2 = "select f.factory_name,f.Location,factory_id from factories f inner join imported_from im on im.f_id = f.factory_id inner join jewellery j on im.art_id = j.article_id where j.article_name in (select article_name from jewellery where j.article_name=\"$aname\") order by f.factory_id";
			$result = mysqli_query($conn,$query2);
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
						?>
							<tr>
								<td><?php echo $row['factory_id']; ?></td>
								<td><?php echo $row['factory_name']; ?></td>
								<td><?php echo $row['Location']; ?></td>
							</tr><br/>
						<?php
					
				}
			}
		}
		?>
</table>		
</body>
</html>