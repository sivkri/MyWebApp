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
		background-color: #E9967A;
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
    <li><a href="home.php">Home</a></li>
    <li><a href="index.php">Search</a></li>
    <li><a href="add.php">Upload</a></li>
    <li><a href="#">Download</a></li>
    <li><a href="contact.php">Contact</a></li>
</ul>  

<br />

<?php

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
	$query = "insert into gene_data (gene_id, transcript_id, protein_id, chr, start, end, strand, gene_name, description, biotype) values ('$gene_id', '$transcript_id', '$protein_id', '$chr', '$start', '$end', '$strand', '$gene_name', '$description', '$biotype') ;";
	if (mysqli_query($conn, $query)) 
		{
		echo "New record created successfully<br />";
		} 
	else 
		{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

	}
	
    print "
    <form action = 'add_example.php' method = 'post' style = 'margin-left: 10px;'>
        DATA UPLOAD<br />
        <table>
            <tr>
                <td>Gene id</td>
                <td> <input type = 'text' name = 'gene_id' size = 40></td>
                <td>Transcript id</td>
                <td> <input type = 'text' name = 'transcript_id' size = 40></td>
            </tr><tr>
                <td>Protein id</td>
                <td> <input type = 'text' name = 'protein_id' size = 40></td>
                <td>Chromosome</td>
                <td> <input type = 'text' name = 'chr' size = 40></td>
            </tr><tr>
                <td>Start</td>
                <td> <input type = 'text' name = 'start' size = 40></td>
                <td>End</td>
                <td> <input type = 'text' name = 'end' size = 40></td>
            </tr><tr>
                <td>Strand</td>
                <td> <input type = 'text' name = 'strand' size = 40></td>
                <td>Gene name</td>
                <td> <input type = 'text' name = 'gene_name' size = 40></td>
            </tr><tr>
                <td>Description</td>
                <td> <br /><textarea name = 'description' cols = 30></textarea></td>
                <td>Biotype</td>
                <td> <input type = 'text' name = 'biotype' size = 40></td>
            </tr>
        </table>
        <br />
        <input type='submit' value='Upload to database' class = 'submit'  />
    </form>
        ";
?>

</body>
</html>