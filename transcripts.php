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

$transcript_id = $_GET['transcript_id'];

$query = "select * from sequences where transcript_id like '$transcript_id'";

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)) 
	{
	$sequence = $row["sequence"];  
	print "<pre style = 'margin-left: 1cm; background-color: lightgrey; padding: 10px; width: 800px'>";
	print ">$transcript_id<br />";
	for($i = 0; $i < strlen($sequence); $i++)
		{
		$nt = $sequence[$i];
		if($i%100 == 0 && $i > 0)
			{
			print "<br />";
			}
		print $nt;
		}
	print "</pre>";
	}

?>

</body>

</html>