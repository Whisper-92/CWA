
<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="utf-8" />
	<meta name="description" 		content="CWA"/>
	<meta name="keywords" 			content="Assignment3"/>
	<meta name="author" 			content="Hams"/>
  
  	<title>TITLE</title>

</head>

<body>


<?php

function sanitise_input($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;

	}

$errMsg= "";


if (isset ($_POST["fname"])){
	$firstname = $_POST["fname"];
	$temp = $_POST["fname"];
	$fname = sanitise_input($temp);
}
else {
    header ("location: apply.php");
}




if (isset ($_POST["lname"])){
	$lname = $_POST["lname"];
	$lname = sanitise_input($lname);
}


if (isset ($_POST["refNo"])){
	$ref = $_POST["refNo"];
	$ref = sanitise_input($ref);
}


if (isset ($_POST["dob"])){
	$dob = $_POST["dob"];
	$dob = sanitise_input($dob);
}


if (isset ($_POST["street"])){
	$street = $_POST["street"];
	$street = sanitise_input($street);
}


if (!isset ($_POST["sex"])){
	$errMsg .= "<p>Please select your gender.</p>";
} else{
	$sex = $_POST["sex"];
}


if (isset ($_POST["town"])){
	$suburb = $_POST["town"];
	$suburb = sanitise_input($suburb);
}




if (isset ($_POST["state"])){
	$state = $_POST["state"];
	$state = sanitise_input($state);
}



if (isset ($_POST["postcode"])){
	$postcode = $_POST["postcode"];
	$postcode = sanitise_input($postcode);
}

if (isset ($_POST["email"])){
	$email = $_POST["email"];
	$email = sanitise_input($email);
}

if (isset ($_POST["mobile"])){
	$mobile = $_POST["mobile"];
	$mobile = sanitise_input($mobile);
}




$otherText = $_POST["comment"];
if (isset($_POST['otherCheck']) && trim($otherText)=="") 
{
	$errMsg .= "You need to enter some skills in the text area.";
} else {
	$otherText = $_POST["comment"];
	$otherText = sanitise_input($otherText);
}





//1 REFNO VALIDATION
if ($ref==""){
	$errMsg .= "<p>Please enter a reference number.</p>";
} else if (!preg_match("/^[A-Za-z0-9]{5}/", $ref)){
	 $errMsg .= "<p>Incorrect reference number.</p>";
}

//2 FIRST NAME VALIDATION
if ($fname==""){
	$errMsg .= "<p>Please enter your first name.</p>";
}else if (!preg_match("/^[A-Za-z0-9]{2,20}/", $fname)){
	 $errMsg .= "<p>Only alpha lettrs allowed in your first name.</p>";
}

//3 LAST NAME VALIDATION
if ($lname==""){
	$errMsg .= "<p>Please enter your last name.</p>";
}else if (!preg_match("/^[A-Za-z0-9]{2,20}/", $lname)){
	 $errMsg .= "<p>Only alpha lettrs allowed in your last name.</p>";
}


//4 DATE OF BIRTH VALIDATION
//("/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/")
if ($dob==""){
	$errMsg .= "<p>Please enter your date of birth.</p>";
} else if (!preg_match("/^((0[1-9]|[12][0-9]|3[01])(\/)(0[13578]|1[02]))|((0[1-9]|[12][0-9])(\/)(02))|((0[1-9]|[12][0-9]|3[0])(\/)(0[469]|11))(\/)\d{4}$/", $dob)){
	$errMsg .= "<p>Invalid date of birth, please enter dd/mm/yyyy.</p>";
} else{


	$dob = $_POST["dob"];
	$userDob = new DateTime($dob);
	$now = new DateTime();
	$difference = $now->diff($userDob);
	$age = $difference->y;

	if ($age < 15 || $age > 80){
    $errMsg .= "<p>You must be beetween 15 and 80</p>";
} 
}


//5 GENDER VALIDATION

//6 STREET ADDRESS VALIDATION
if ($street==""){
	$errMsg .= "<p>Please enter your street address.</p>";
}else if (!preg_match("/^[A-Za-z0-9]{2,40}/", $street)){
	 $errMsg .= "<p>Invalid address.</p>";
}

//7 SUBURB / TOWN VALIDATION
if ($suburb==""){
	$errMsg .= "<p>Please enter your suburb/town.</p>";
}else if (!preg_match("/^[A-Za-z0-9]{2,40}/", $suburb)){
	 $errMsg .= "<p>Invalid input.</p>";
}

//8 STATE VALIDATION
if ($state==""){
	$errMsg .= "<p>Please select your state.</p>";}

//9 POSTAL CODE VALIDATION
/*$pcPattern = "";

 switch ($state) {
    case "VIC":
        $pcPattern = new $reg("/(^3[0-9]{4}|^8[0-9]{4})/");
        break;
		//"/^DN(1[5-9]|[23][0-9]|4[01])/", $postcode)

     case "NSW":
        $pcPattern = new RegExp("/^(3|8)\d+/");
        break;

     case "QLD":
        $pcPattern = new RegExp("/(4|9)\d+/");
        break;

     case "NT":
        $pcPattern = new RegExp("/0\d+/");
        break;

     case "WA":
        $pcPattern = new RegExp("/6\d+/");
        break;

     case "SA":
        $pcPattern = new RegExp("/5\d+/");
        break;

     case "TAS":
        $pcPattern = new RegExp("/7\d+/");
        break;

     case "ACT":
        $pcPattern = new RegExp("/0\d+/");
        break;
 }


 if ($postcode==""){
	$errMsg .= "<p>Please enter your postcode.</p>";
} else if(!preg_match("$pcPattern", $postcode)){
   $errMsg .= "<p>Postcode does not match your state.</p>";
   
 //  result = false;
 }

 if ($email==""){
	$errMsg .= "<p>Please enter your email address.</p>";
}else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
		return FALSE;
}else if($domain = explode("@", $email, 2)){
		return checkdnsrr($domain[1]); 


}

*/



//10 EMAIL ADDRESS VALIDATION
if ($email==""){
	$errMsg .= "<p>Please enter your email address.</p>";
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $errMsg .= "<p>Please enter correct email address.</p>";
} 

//11 PHONE NUMBER VALIDATION
if ($mobile==""){
	$errMsg .= "<p>Please enter your mobile number.</p>";
}else if (!preg_match("/^[0-9\s]{8,12}/", $mobile)){
	 $errMsg .= "<p>Invalid mobile number.</p>";
}

//12 OTHER SKILLS VALIDATION




if ($errMsg != "") {
echo "<p>$errMsg</p>";
} else{








	require_once ("settings.php");
	
	
	
	$conn = @mysqli_connect(
	$host,
	$user,
	$pwd, 
	$sql_db
	);
	

	
if ($conn){


//DATABASE 



	$sql_table = "CREATE TABLE IF NOT EXISTS eoi(
	eoi_number INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	job_ref VARCHAR (5) NOT NULL,
	fname VARCHAR (20) NOT NULL,
	lname VARCHAR (20) NOT NULL,
	street_address VARCHAR(40),
	suburb VARCHAR(40),
	state ENUM('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'),
	postcode VARCHAR(4),
	email VARCHAR (200),
	phone VARCHAR (12),
	skills VARCHAR (50),
	other_skills TEXT,
	status ENUM('New', 'Current', 'Final') DEFAULT 'New'
	)";


	$result = mysqli_query($conn, $sql_table);

	if (!$result){
		echo "<p>Something is wrong with", $sql_table, "</p>";
	} else {

		$fname = 		trim($_POST["fname"]);
		$lname = 		trim($_POST["lname"]);
		$ref = 			trim($_POST["refNo"]);
		$street = 		trim($_POST["street"]);
		$suburb =		trim($_POST["town"]);
		$state = 		trim($_POST["state"]);
		$postcode = 	trim($_POST["postcode"]);
		$email = 		trim($_POST["email"]);
		$mobile =		trim($_POST["mobile"]);
		$others = 		trim($_POST["comment"]);

		$skills =		 $_POST["category"];


		$query = "INSERT INTO `eoi`(`job_ref`, `fname`, `lname`, `street_address`, `suburb`, `state`, `postcode`, `email`, `phone`, `skills`, `other_skills`) 
		VALUES ('$ref', '$fname', '$lname', '$street', '$suburb', '$state', '$postcode', '$email', '$mobile', '" . implode(", ", $skills) . "', '$others')";




		$result = mysqli_query($conn, $query);

		if (!$result){
		echo "<p>Something is wrong with", $query, "</p>";
	}	else{
		echo "<p>Thank you, your applicati is being proccessed</p>";
		header("location:index.php");
		exit ();
	}

	}





mysqli_close($conn);
} 
}








/*
*	CREDITS: 
*	https://thisinterestsme.com/
*	https://stackoverflow.com/
*
*
*/



?>


	





</body>



</html>



	