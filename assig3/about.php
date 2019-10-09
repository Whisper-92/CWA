<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="description" 			content="Creating Web Applications - Assignment 3" />
	<meta name="keywords" 				content="HTML, CSS, XML" />
	<meta name="author" 				content="Hams H. " />

	<title>Apply</title>
	<link rel="stylesheet" href="styles/styles.css" />

	<!-- Applying Page, Created: 	[20/03/19] -->
	<!-- Last update:				[15/05/19] -->
</head>


<body id="aboutpage">


<?php	include("header.inc");	?>


<section>

<h2>Student Detials:</h2>

<img src="images/iPhoto.png" alt="Photo of Me" id="iPhoto" />



<dl>
  <dt>Name:</dt>
  <dd>Hams H</dd>

  <dt>ID:</dt>
  <dd>N/A</dd>

  <dt>Tutor:</dt>
  <dd>Hongwang</dd>

  <dt>Course:</dt>
  <dd>Graduate Diploma in Information Technology</dd>

</dl>


<table id="timetable">
<caption>Timetable</caption>
	<tr>
		<th>Time/Day</th>
		<th>Mo</th>
		<th>Tu</th>
		<th>We</th>
		<th>Th</th>
		<th>Fr</th>
	</tr>


	<tr>
		<td>8:30AM - 10:30AM</td>
		<td></td>
		<td></td>
		<td>COS60004: Lab</td>
		<td></td>
		<td></td>
	</tr>


	<tr>
		<td>10:30AM - 12:30PM</td>
		<td></td>
		<td></td>
		<td>COS70006: Lec</td>
		<td></td>
		<td>INF80031: Lec</td>
	</tr>

	<tr>
		<td>12:30PM - 2:30PM</td>
		<td>INF60010 Lec</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>

	<tr>
		<td>2:30PM - 4:30PM</td>
		<td></td>
		<td></td>
		<td>COS70006: Lab</td>
		<td></td>
		<td>INF80031: Lab</td>
	</tr>

	<tr>
		<td>4:30PM - 6:30PM</td>
		<td>COS60004: Lec</td>
		<td></td>
		<td></td>
		<td>COS70006: WS</td>
		<td></td>
	</tr>

</table>

<h3>Contact Details: </h3>

<dl>
	<dt>Email:</dt>
	<dd><a href="N/A" >Click Here to E-mail Me!</a></dd>

	<dt>Phone:</dt>
	<dd><a href="tel:0-000-000-0000">Click Here to Call Me!</a></dd>

</dl>


</section>

<section>

<h4>Personal Profile: </h4>


<p> ......................... </p>
<p>I like photography and I do it whenever I have the time, I take random pictures in Australia and manily in Melbourne</p>

<img src="images/001.png" 		alt="Photos of Melbourne" 		class="melb"/>
<img src="images/002.png" 		alt="Photos of Melbourne" 		class="melb"/>
<img src="images/003.png"		alt="Photos of Melbourne" 		class="melb"/>

<h3>Resume:</h3>
<img src="images/cv.png" alt="cv" />




</section>




<?php	include("footer.inc");	?>


</body>
</html>
