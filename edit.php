<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
    <style>
    table
        {
        padding: 20px;
        line-height: 40px;
        border: 1px solid black;
		background-color: #FFB6C1;
        font-weight: bold;
        }
    </style>
</head>

<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "genes";

$conn = mysqli_connect($servername, $username, $password, $dbname);

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

<br />

<?php

if(isset($_GET['id']))
    {
    $id = $_GET['id'];
    }

if(isset($_POST['id']))
	{
	$id = $_POST['id'];
	}

if(isset($_POST['gene_id']))
	{
	$gene_id = $_POST['gene_id'];
	}
else
	{
	$gene_id = '';
	}
    
if(isset($_POST['transcript_id']))
	{
	$transcript_id = $_POST['transcript_id'];
	}
else
	{
	$transcript_id = '';
	}
	
if(isset($_POST['protein_id']))
	{
	$protein_id = $_POST['protein_id'];
	}
	else
	{
	$protein_id = '';
	}
	
if(isset($_POST['chr']))
	{
	$chr = $_POST['chr'];
	}
else
	{
	$chr = '';
	}
    
if(isset($_POST['start']))
	{
	$start = $_POST['start'];
	}
	else
	{
	$start = '';
	}
    
if(isset($_POST['end']))
	{
	$end = $_POST['end'];
	}
else
	{
	$end = '';
	}
    
if(isset($_POST['strand']))
	{
	$strand = $_POST['strand'];
	}
else
	{
	$strand = '';
	}

if(isset($_POST['gene_name']))
	{
	$gene_name = $_POST['gene_name'];
	}
else
	{
	$gene_name = '';
	}
	
if(isset($_POST['biotype']))
	{
	$biotype = $_POST['biotype'];
	}
else
	{
	$biotype = '';
	}
    
if(isset($_POST['description']))
	{
	$description = $_POST['description'];
	}
else
	{
	$description = '';
	}
	
if($gene_id && $transcript_id && $chr && $start && $end && $strand && $biotype)
	{
	$query = "update gene_data set gene_id = '$gene_id', transcript_id = '$transcript_id', protein_id = '$protein_id', chr = '$chr', start = '$start', end = '$end', strand = '$strand', gene_name = '$gene_name', description = '$description' where id = '$id'";
	if ($conn->query($query) === TRUE) 
		{
		echo "Updated successfully<br />";
		} 
	else 
		{
		echo "Error updating record: " . $conn->error;
		}
	}
	
	
$query = "select * from gene_data WHERE id = '$id'";
$result = mysqli_query($conn, $query);


while($row = mysqli_fetch_assoc($result)) 
	{
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
    <form action = 'edit_example.php' method = 'post' >
        <input type = 'hidden' name = 'id' value = '$id'>
        EDIT THIS RECORD<br />
        <table>
            <tr>
                <td>Gene id</td>
                <td> <input type = 'text' name = 'gene_id' value = '$gene_id' size = 40></td>
                <td>Transcript id</td>
                <td> <input type = 'text' name = 'transcript_id' value = '$transcript_id' size = 40></td>
            </tr><tr>
                <td>Protein id</td>
                <td> <input type = 'text' name = 'protein_id' value = '$protein_id' size = 40></td>
                <td>Chromosome</td>
                <td> <input type = 'text' name = 'chr' value = '$chr' size = 40></td>
            </tr><tr>
                <td>Start</td>
                <td> <input type = 'text' name = 'start' value = '$start' size = 40></td>
                <td>End</td>
                <td> <input type = 'text' name = 'end' value = '$end' size = 40></td>
            </tr><tr>
                <td>Strand</td>
                <td> <input type = 'text' name = 'strand' value = '$strand' size = 40></td>
                <td>Gene name</td>
                <td> <input type = 'text' name = 'gene_name' value = '$gene_name' size = 40></td>
            </tr><tr>
                <td>Description</td>
                <td> <br /><textarea name = 'description' cols = 30>$description</textarea></td>
                <td>Biotype</td>
                <td> <input type = 'text' name = 'biotype' value = '$biotype' size = 40></td>
            </tr>
        </table>
        <br />
        <input type='submit' value='Update' class = 'submit'  />
    </form>
        ";
	}
	
?>

</body>
</html>