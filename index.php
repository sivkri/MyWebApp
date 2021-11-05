<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
<style>
table.search
    {
    border: 1px solid #FF00FF;
    padding: 10px;
    background-color: #00FFFF;
    font-weight: bold;
    }

table.data
    {
    font-size: 12px;
    width: 100%;
    }

table.data, td.records
    {
    border: 1px solid #F7BE81;
    border-collapse: collapse;
    }

tr.header
    {
    background-color: #A9BCF5;
    font-weight: bold;
    }

tr.header:hover
    {
    background-color: #90EE90;
    }

tr.records 
    {
    background-color: #FFF8DC;
    border-bottom: 1px solid black;
    }

tr.records:hover
    {
    background-color: #E8E8E8;
    }

td  
    {
    padding: 5px;
    white-space: nowrap;
    }

input.submit
    {
    color: white; 
    font-weight: bold;
    font-size: 14px; 
    background-color: #101010; 
    border: 1px solid black;
    padding: 5px;
    }
    
input.submit:hover
    {
    background-color: green;
    cursor:pointer;
    }

ul#menu 
    {
    padding: 8px;
    }

ul#menu li 
    {
    display: inline;
    }

ul#menu li a 
    {
    background-color: #800000;
    color: white;
	font-weight: bold;
    padding: 10px 40px;
    text-decoration: none;
    border-radius: 4px 4px 0 0;
    }

ul#menu li a:hover 
    {
    background-color: #339900;
    }
	
p
{
    border: 4px dashed Red;
    padding: 15px;
    margin-left: 1cm;
	margin-right: 2cm;
    margin-top: 10px;
    color: #00008B;
    font-weight: bold;
    text-align: center;
    text-transform: uppercase;
    font-size: 24px;
    font-family: "Times New Roman", Times, serif;
    text-indent: 50px;
    background-image: url("bh.jpg");
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

<p>
BUILDING BIOLOGICAL DATABASE
</p>


<?php
$biotypes = mysqli_query($conn, "SELECT distinct biotype from gene_data order by biotype");
$chromosomes = mysqli_query($conn, "SELECT distinct chr from gene_data order by chr");


if(isset($_POST['gene_name_selected']))
    {
    $gene_name_selected = $_POST['gene_name_selected'];
    }
else
    {
    $gene_name_selected = '';
    }
if(isset($_POST['chromosome_selected']))
    {
    $chromosome_selected = $_POST['chromosome_selected'];
    }
else
    {
    $chromosome_selected = '1';
    }
if(isset($_POST['biotype_selected']))
    {
    $biotype_selected = $_POST['biotype_selected'];
    }
else
    {
    $biotype_selected = 'antisense';
    }
if(isset($_POST['description_selected']))
    {
    $description_selected = $_POST['description_selected'];
    }
else
    {
    $description_selected = '';
    }

print "

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
                <input type = 'text' name = 'gene_name_selected' value = '$gene_name_selected'>
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
                <input type = 'text' name = 'description_selected' value = '$description_selected'>
            </td>
        </tr>
    </table>
    <input type='submit' value='Search' class = 'submit'  />
</form> 
<br />
      ";


if($gene_name_selected)
    {
    print "<b>Gene name</b>: $gene_name_selected<br />";
    }
if($biotype_selected)
    {
    print "<b>Biotype</b>: $biotype_selected<br />";
    }
if($chromosome_selected)
    {
    print "<b>Chromosome</b>: $chromosome_selected<br />";
    }
if($description_selected)
    {
    print "<b>Description</b>: $description_selected<br />";
    }
	
$query = "select * from gene_data where gene_name like '%$gene_name_selected%' and biotype = '$biotype_selected' and chr = '$chromosome_selected' and description like '%$description_selected%'";
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
            <td class = 'records'>$id <a href = edit.php?id=$id>Edit</a>  <a href = remove.php?id=$id>Remove</a></td>
			<td class = 'records'><a href = http://www.ensembl.org/Homo_sapiens/Gene/Summary?g=$gene_id>$gene_id</a></td>
            <td class = 'records'><a href = 'http://www.ensembl.org/Homo_sapiens/Transcript/Summary?t=$transcript_id'>$transcript_id</a> <a href = transcripts.php?transcript_id=$transcript_id>SEQUENCE</a></td>
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