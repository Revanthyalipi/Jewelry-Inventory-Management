<html>
<head>
<title>UpdateArticle</title>
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
<h1>For updation of the article  </h2>
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
<p>New Name-<input type="text" name="new" id="new"></input></p>
</form>
<h1>After updating article name</h1>
<table>
				<tr>
					<th>Article names</th>
				</tr> <br>
<?php		
			if(isset($_REQUEST["submit"])){
			$aname = $_POST["drop"]; 
			$new = $_POST["new"];
			$query2 = "update jewellery set article_name = \"$new\" where article_name = \"$aname\"";
			$result1 = mysqli_query($conn,$query2);
			$query1 = "select article_name from jewellery";
			$result = mysqli_query($conn,$query1);
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
						?>
							<tr>
								<td><?php echo $row['article_name']; ?></td>
							</tr>
						<?php
					
				}
			}
		}
		?>
</table>		
</body>
</html>