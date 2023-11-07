<?php
//HoneyPot
	$firstName = $_POST["firstName"];
	$middleName = $_POST["middleName"];
	$lastName = $_POST["lastName"];
	$email = $_POST["email"];

	if(empty($middleName) ) {
        //a real person entered form data
        $message = "Thank you ".$firstName." ".$lastName."."." A signup confirmation has been sent to ".$email.".". " Thank you for your support!";
    }
    else {
        //a bot entered this data
        $message = "NO BOTS ALLOWED!!!!!!";
    }
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV101 Basic Form Handler Example</title>

<style>
	#review {
		width: 80%;
		margin-right: auto;
		margin-left: auto;
		font-size: 20px;
		border: 2px solid black;
		padding: 20px;
	}

	img  {
		display: block;
  		margin-left: auto;
  		margin-right: auto;
  		width: 20%;
	}
</style>
</head>

<body>
<h1>WDV101 Intro HTML and CSS</h1>
<h2>UNIT 3 Forms - Lesson 2 Server Side Processes</h2>
<h3>Form Name-Value Pairs</h3>
<?php

	/*
	echo "<table border='1'>";
	echo "<tr><th>Field Name</th><th>Value of Field</th></tr>";
	foreach($_POST as $key => $value)
	{
		echo '<tr>';
		echo '<td>',$key,'</td>';
		echo '<td>',$value,'</td>';
		echo "</tr>";
	} 
	echo "</table>";
	echo "<p>&nbsp;</p>";
	*/
?>
<p><?php echo $message; ?></p>

<div id="review">

	<img src="images/dmacc.png" alt="DMACC Life's Calling">

	<p style="padding-bottom: 40px;">Dear <b><?php echo $_POST["firstName"];?></b>,</p>

	<p>Thank for you for your interest in DMACC.</p>

	<p>We have you listed as an <b><?php echo $_POST["academic"];?></b> starting this fall.</p>

	<p>You have declared <b><?php echo $_POST["major"];?></b> as your major.</p>

	<p>Based upon your responses we will provide the following information in our confirmation email to you at <b><?php echo $_POST["email"];?></b>.</p>

	<ul>
		<li><?php echo $_POST["info"];?></li>
		<li><?php echo $_POST["advisor"];?></li>
	</ul>

	<p>You have shared the following comments which we will review:<p>

	<p><?php echo $_POST["message"];?></p>

	<p style="padding-top: 40px;">Best Regards,</p>
	<p>Des Moines Area Community College</p>

</div><!--close review-->

<p style="width: 50%; padding: 10px; margin-right:auto; margin-left:auto;">This page will demonstrate how a server side application will take the data that was entered on a form and display it within an HTML table. This example will work for any form. It is setup to read any or all fields on a form without needing any changes.  Other applications are more specific to the form they process and require updates anytime the form is changed.</p>


</body>
</html>
