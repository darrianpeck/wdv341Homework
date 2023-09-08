<?php

//Create a variable called yourName.  Assign it a value of your name.
$yourName = "Darrian";

//Display the assignment name in an h1 element on the page. Include the elements in your output. 
echo "<h1>2-1 PHP Basics</h1>";

//Use HTML to put an h2 element on the page. Use PHP to display your name inside the element using the variable.
echo "<h2>$yourName</h2>";

//Create the following variables:  number1, number2 and total.  Assign a value to them.  
$number1 = "547";

$number2 = "8";

$total = $number1 + $number2;


//Display the value of each variable and the total variable when you add them together. 
echo "<p>$number1</p>";
echo "<p>$number2</p>";
echo "<p>$total</p>";

//Create a PHP variable that is an array containing the values 'PHP', 'HTML' and 'Javascript'. Then, use a PHP loop to iterate through the 
    //array and create a javascript array that contains those values. Lastly, write a javascript script that displays the values of the array on the page.
$course = array("PHP", "HTML", "JavaScript");

foreach ($course as $value) {
  echo "$value <br>";
}

//This may seem trivial and repetetive, but often times PHP objects/arrays will be returned to your javascript so that you can use the data to interact with 
//the DOM. Especially when using AJAX to talk to your PHP.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2-1 PHP Basics</title>

    <style>
        body {
            margin: 80px;
            padding: 20px;
            border: 5px solid lightblue;
            border-radius: 20px;
            text-align: center;
        }

        h1, h2 {
            color: blue;
        }

        p {
            font-size: 25px;
        }
    </style>
</head>
<body>
<script>
        let course = ["PHP", "HTML", "JavaScript"];
        console.log(course);
        document.write(course);
    </script>
</body>
</html>
