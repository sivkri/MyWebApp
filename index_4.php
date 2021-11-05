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
$biotypes = mysqli_query($conn, "SELECT distinct biotype from gene_data order by biotype");
$chromosomes = mysqli_query($conn, "SELECT distinct chr from gene_data order by chr");

print "
<br /><br />
<form action = 'index.php' method = 'POST' >
    <table class = 'search'>
        <tr> 
            <td>Gene name</td> 
            <td>Biotype</td> 
            <td>Chromosome</td> 
            <td>Description</td> 
         </tr>
         <tr>
            <td>
                <input type = 'text' name = 'gene_name_selected'>
            </td> 
            <td>
                <select name = 'biotype_selected'>";
    
                    while($row = mysqli_fetch_assoc($biotypes))  
                        {
                        $biot = $row["biotype"];
                        print "<OPTION>" . $biot;
                        }
print "
                </select>
            </td>
            <td>
                <select name = 'chromosome_selected'>";
				
                    while($row = mysqli_fetch_assoc($chromosomes)) 
                        {
                        $chr = $row["chr"];
                        print "<OPTION>" . $chr;
                        }
print "
                </select>
            </td>
            <td>
                <input type = 'text' name = 'description_selected'>
            </td>
        </tr>
    </table>
    <input type='submit' value='Search' class = 'submit'  />
</form> <br />
      ";


	  
	  

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
