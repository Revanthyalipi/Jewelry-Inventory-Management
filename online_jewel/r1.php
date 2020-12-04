<?php
	session_start();
	$user = $_SESSION["username"];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "onlinejewellery";
	

// Create connection
$conn = new mysqli($servername, $username, $password,$db);
	?>