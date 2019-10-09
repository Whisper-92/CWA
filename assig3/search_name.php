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

<h1>Search for Records by First or Last Name</h1>

	<form 	method="post"	action="search_name.php" >
	

		<fieldset><legend>Search Records:</legend>

		<p class="row">	<label for="searchname">Enter Name: </label>
			<input type="text"	 name="searchname" 	id="searchname"	 placeholder="Search for Name"/></p>
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
	

	if (isset ($_POST["searchname"])){





	$searchname = trim($_POST["searchname"]);

	
	$sql_table = "eoi";
	$query = "SELECT * FROM eoi WHERE CONCAT(`fname`) LIKE '%".$searchname."%' OR CONCAT(`lname`) LIKE '%".$searchname."%' ";



	

	

	
	$result = mysqli_query($conn, $query);


	//$query = "SELECT * FROM eoi WHERE CONCAT(`job_ref`) LIKE '%".$searchfor."%'";
	//$query = "SELECT * FROM eoi";

	//$query = "SELECT * FROM eoi WHERE CONCAT(`fname`, `lname`) LIKE '%".$searchname."%'";

	//$query = "DELETE * FROM eoi WHERE CONCAT(`job_ref`) LIKE '%".$searchfor."%'";


	
	if ($result){
		echo "<table border=\"1\">\n";
		echo "<tr>\n"
			."<th scope=\"col\">	EOI Number</th>\n"
			."<th scope=\"col\">	Reference Number</th>\n"
			."<th scope=\"col\">	First Name</th>\n"
			."<th scope=\"col\">	Last Name</th>\n"
			."<th scope=\"col\">	Street Address</th>\n"
			."<th scope=\"col\">	Suburb / Town</th>\n"
			."<th scope=\"col\">	State</th>\n"
			."<th scope=\"col\">	Postcode</th>\n"
			."<th scope=\"col\">	Email Address</th>\n"
			."<th scope=\"col\">	Mobile</th>\n"
			."<th scope=\"col\">	Skills</th>\n"
			."<th scope=\"col\">	Other Skills</th>\n"
			."<th scope=\"col\">	Status</th>\n"
			."</tr>\n";
			
			
		while ($row = mysqli_fetch_assoc($result)){
			echo "<tr>\n";
			echo "<td>", $row["eoi_number"], "</td>\n";
			echo "<td>", $row["job_ref"], "</td>\n";
			echo "<td>", $row["fname"], "</td>\n";
			echo "<td>", $row["lname"], "</td>\n";
			echo "<td>", $row["street_address"], "</td>\n";
			echo "<td>", $row["suburb"], "</td>\n";
			echo "<td>", $row["state"], "</td>\n";
			echo "<td>", $row["postcode"], "</td>\n";
			echo "<td>", $row["email"], "</td>\n";
			echo "<td>", $row["phone"], "</td>\n";
			echo "<td>", $row["skills"], "</td>\n";
			echo "<td>", $row["other_skills"], "</td>\n";
			echo "<td>", $row["status"], "</td>\n";
			echo "</tr>\n";			
		}
		
		echo "</table>\n ";
		mysqli_free_result($result);




	} else{
				echo "<p>No records retrieved.</p>";
			}
	



mysqli_close($conn);	
} else {
	echo "<p>Database connection faliure</p>";
}

}
?>


</body>
</html>



