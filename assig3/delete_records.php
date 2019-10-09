<!DOCTYPE html>

<html lang="en">
<head>
	<title>EOI Records</title>
	<meta charset="utf-8"/>
	<meta name="description"	content="ASSIGNMENT3" />
	<meta name="keywords" 		content="php, sql" />
	<meta name="author"  		content="Hams H" />
	<link rel="stylesheet" href="styles/styles.css" />
</head>
<body>
	<?php	include("manage_header.inc");	?>

<h1>Delete Records by EOI Number</h1>

	<form 	method="post"	action="delete_records.php" >
	<fieldset><legend>Delete Records by EOI Number:</legend>

		<p class="row">	<label for="deleteeoi">EOI Number: </label>
			<input type="text"	 name="deleteeoi" 	maxlength ="5"	id="deleteeoi"	 placeholder="Search..."/></p>
		</fieldset>

	
		



		<p>	<input type="submit" value="Search" /></p>

	</form>


<?php
	require_once ("settings.php");
	
	$conn = @mysqli_connect(
	$host,
	$user,
	$pwd,
	$sql_db
	);
	
if ($conn){
	






	if (isset ($_POST["deleteeoi"])){

	$deleteeoi = trim($_POST["deleteeoi"]);

	
	$sql_table = "eoi";
	$query = "DELETE FROM eoi WHERE CONCAT(`job_ref`) LIKE '%".$deleteeoi."%' ";

	$result = mysqli_query($conn, $query);


	//$query = "SELECT * FROM eoi WHERE CONCAT(`job_ref`) LIKE '%".$searchfor."%'";
	//$query = "SELECT * FROM eoi";

	//$query = "SELECT * FROM eoi WHERE CONCAT(`fname`, `lname`) LIKE '%".$searchfor."%'";

	//$query = "DELETE * FROM eoi WHERE CONCAT(`job_ref`) LIKE '%".$searchfor."%'";


	
	if ($result){
		echo "<p>Records Successfuly Deleted.</p>";
	}	
	
	} else {
				echo "<p>No records retrieved.</p>";
			}
	
	

	


mysqli_close($conn);	
} else {
	echo "<p>Database connection faliure</p>";
}


?>


</body>
</html>



