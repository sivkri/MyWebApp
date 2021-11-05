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


<?php

$query = "select * from gene_data where biotype = 'snoRNA'";
$result = mysqli_query($conn, $query);

$number = mysqli_num_rows($result);
print "<br /><b>Number of records</b>: $number<br /><br />";

if (mysqli_num_rows($result) > 0) 
{
	
print "
    <table class = 'data'>
        <tr class = 'header'>
            <td>ID</td> 
            <td>Gene</td> 
            <td>Transcript</td> 
            <td>Protein</td> 
            <td>Chromosome: Start-End, Strand</td> 
            <td>Gene name</td> 
            <td>Biotype</td> 
            <td>Description</td>
      ";
	  
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
		


	$id = $row["id"];  
	$gene_id = $row["gene_id"];  
	$transcript_id = $row["transcript_id"];  
	$protein_id = $row["protein_id"];  
	$description = $row["description"];  
	$chr = $row["chr"];  
	$start = $row["start"];  
	$end = $row["end"];  
	$strand = $row["strand"];  
	$gene_name = $row["gene_name"];  
	$biotype = $row["biotype"];  
    
    print "
        <tr class = 'records'>
            <td class = 'records'>$id</td>
            <td class = 'records'><a href = http://www.ensembl.org/Homo_sapiens/Gene/Summary?g=$gene_id>$gene_id</a></td>
            <td class = 'records'><a href = 'http://www.ensembl.org/Homo_sapiens/Transcript/Summary?t=$transcript_id'>$transcript_id</a></td>
            <td class = 'records'><a href = http://www.ensembl.org/Homo_sapiens/Transcript/ProteinSummary?db=core;t=$transcript_id>$protein_id</a></td>
            <td class = 'records'>$chr: $start-$end, $strand</td>
            <td class = 'records'>$gene_name</td>
            <td class = 'records'>$biotype</td>
            <td class = 'records'>$description</td>
        </tr>
          ";
    }
print "</table>";   

} 
else 
{
    echo "0 results";
}

?>

</body>
</html>
