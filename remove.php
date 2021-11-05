<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
</head>


<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "genes";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>


<ul id="menu">
    <li><a href="#">Home</a></li>
    <li><a href="index.php">Search</a></li>
    <li><a href="add.php">Upload</a></li>
    <li><a href="#">Download</a></li>
    <li><a href="#">Contact</a></li>
</ul>  

<br /><br />

<?php

if(isset($_GET['id']))
	{
	$id = $_GET['id'];
	print "
	<form action = 'remove.php' method = 'POST'>
    <input type = 'hidden' name = 'id' value = '$id'>
    Are you sure you want to remove record $id?<br />
    <input type = 'submit' value = 'yes'>
	";
	}


if(isset($_POST['id']))
	{
	$id = $_POST['id'];
    $query = "DELETE FROM gene_data WHERE id = $id";
    if ($conn->query($query) === TRUE) 
		{
		echo "Record(s) deleted successfully<br />";
		} 
	else 
		{
		echo "Error deleting record: " . $conn->error;
		}
	}


if(!isset($_GET['id']) && !isset($_POST['id']))
	{
	die("No record ID provided!");
	}

?>

</body>

</html>