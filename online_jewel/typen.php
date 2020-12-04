<html>
<head>
<title>Articles</title>
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
<h1>orders placed by customers of types and article</h2>
<form method="post">
<p>Artile name-<input type="text" name="art" id="art"></input></p>
<p>Artile type-<input type="text" name="typ" id="typ"></input></p>
<input type="submit" name="submit" id="submit"></input>
</form>
<table>
				<tr>
					<th>Name</th>
					<th>Order Id</th>
				</tr> <br>
<?php		
			if(isset($_REQUEST["submit"])){
			$art = $_POST["art"];
			$typ = $_POST["typ"];
			
			$query2 = "select CONCAT(c.fname,' ',c.lname)as Name,oa.o_id 

from customers c,order_author oa 

where c.customer_id = oa.c_id and oa.o_id IN (select o.o_id 

				              from order_items o 

					      where o.o_id = oa.o_id and o.art_id IN (select j.article_id 

										      from jewellery j 

										      where j.article_id = o.art_id and j.article_type = \"$art\" and exists (select * from made_of m where m.art_id = j.article_id and m.m_type = \"$typ\")));
			
";
			$result = mysqli_query($conn,$query2);
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
						?>
							<tr>
								<td><?php echo $row['Name']; ?></td>
								<td><?php echo $row['o_id']; ?></td>
							</tr><br/>
						<?php
					
				}
			}
		}
		?>
</table>		
</body>
</html>