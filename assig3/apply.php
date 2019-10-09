<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="description" 			content="Creating Web Applications - Assignment 3" />
	<meta name="keywords" 				content="HTML, CSS, XML" />
	<meta name="author" 				content="Hams H" />

	<title>Apply</title>
	<link rel="stylesheet" href="styles/styles.css" />
	<script src="scripts/apply.js"></script>

	<!-- Applying Page, Created: 	[20/03/19] -->	
	<!-- Last update:				[15/05/19] -->
</head>


<body id="applypage">


<?php	include("header.inc");	?>




<form id="applyForm"		novalidate=”novalidate”		method="post" action="processEOI.php">


<p id="err"> </p>

<p><label for = "refNo">Job Reference Number: </label>
	<input  name= "refNo" id="refNo"  readonly/></p>




<fieldset>

		<legend>Personal details:</legend>

		<p><label for="fname">First Name: </label>
		<input type="text" 		name="fname"			id="fname"			pattern="^[A-Za-z]+"		required="required" 	maxlength="20"/></p>

		<p><label for="lname">Last Name: </label>
		<input type="text" 		name="lname"			id="lname"			pattern="^[A-Za-z]+"		required="required" 	maxlength="20"/></p>

		<p><label for="dob">Date of Birth</label>
		<input type="text" name= "dob" id="dob"	placeholder="dd/mm/yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" maxlength="10"/>
		</p>


				<fieldset>
						<legend>Gender</legend>

						<p><label for="male">Male</label>
						<input type="radio" 	id="male" 		name="sex"	 	value="male"/>

						<label for="female">Female</label>
						<input type="radio" 	id="female" 	name="sex"	 	value="female"/>

						<label for="other">Other</label>
						<input type="radio" 	id="other" 		name="sex" 		value="other"/></p>

				</fieldset>






	<p><label for="street">Street Address: </label>
	<input 			type="text"		name="street" 		id="street"		maxlength="40" 		pattern="^[A-Za-z]+"		required="required"/></p>

	<p><label for="town">Suburb/town:</label>
	<input 		type="text" 		name="town"			id="town" 		maxlength="40" 		pattern="^[A-Za-z]+"		required="required" /></p>

	<label for="state">State:</label>

		<select name="state" 	id="state" 		required="required">

			<option value="">Please Select </option>

			<option value="VIC">	VIC</option>
			<option value="NSW">	NSW</option>
			<option value="QLD">	QLD</option>
			<option value="NT">		NT</option>
			<option value="WA">		WA</option>
			<option value="SA">		SA</option>
			<option value="TAS">	TAS</option>
			<option value="ACT">	ACT</option>

		</select>

	<p><label for="postcode">Postcode:</label>
	<input type="text" 		name="postcode" 		id="postcode" 		pattern="[0-9]{4}" 		maxlength="4"		required="required" /></p>








				<!-- 	FIX PATTERNS	 -->


				<p><label for="email">E-mail address</label>
				<input 		type="email"		name="email"		id="email"		placeholder="example@example.com"		pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"		required="required" /></p>


				<p><label for="mobile">Phone number:</label>
				<input 		type="tel"			name="mobile" 		id="mobile"		pattern="[0-9 ]{8,12}" 		placeholder="0000000000" 		required="required" /></p>


</fieldset>


<fieldset>
	<legend>Skills list: </legend>






	<p><label for="skill1">HTML5</label>
	<input 	type="checkbox"		id="skill1" 			name="category[]" 	value="skill1" 	checked="checked"	/>

	<label for="skill2">CSS3</label>
	<input 	type="checkbox" 	id="skill2" 			name="category[]"	value="skill2"/>

	<label for="skill3">JavaScript</label>
	<input 	type="checkbox" 	id="skill3" 			name="category[]"	value="skill3"/>

	<label for="skill4">PHP</label>
	<input 	type="checkbox" 	id="skill4" 			name="category[]"	value="skill4"/>

	<label for="skill5">Other Skills</label>
	<input 	type="checkbox" 	id="skill5" 			name="otherCheck"	value="skill5"/></p>












	<p>Other  skills: </p><textarea 	id="comment" 	name="comment" 	rows="4" 	cols="40" 	placeholder="Please enter your skills here...."></textarea>


</fieldset>









<input type= "submit" value="Apply"/>
<input type= "reset" value="Reset Form"/>

</form>
<?php	include("footer.inc");	?>

</body>
</html>
