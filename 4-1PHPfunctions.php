<?php
include_once("/code/configs.php");
//Create a function that will accept a timestamp and format it into mm/dd/yyyy format.
    function dateMMDDYYYY() {
        echo date("n/j/Y");       //mm/dd/yyyy      
    }

//Create a function that will accept a timestamp and format it into dd/mm/yyyy format to use when working with international dates.
    function dateDDMMYYYY() {
        echo date("j/n/Y")  ;      //dd/mm/yyyy      
    }

//Create a function that will accept a string input.  It will do the following things to the string
$myName = "Darrian";
//echo $myName;       

function displayName($myName) {
    global $myName;
    echo $myName;
    echo "<br>";
    //Display the number of characters in the string
    echo "There are ".strlen($myName)." letters in my name.";

    //Trim any leading or trailing whitespace

    //Display the string as all lowercase characters
    echo "<br>";
    echo "My name in lowercase letters: ". strtolower($myName).".";

    //Will display whether or not the string contains "DMACC" either upper or lowercase
    echo "<br>";
    echo "If my name contains DMACC, there will be a '0'. If not, there will be a different number below."."<br>".substr_compare($myName,"DMACC",0);     //returns 0 if they are equal 
}

//Create a function that will accept a number and display it as a formatted phone number.   Use 1234567890 for your testing.
    $phoneNumber = "+1234567890";   
    function displayNumber($phoneNumber) {
       // global $myNumber;
       // echo $myNumber; 
        $format_phone =
            substr($phoneNumber, -10, -7) . "-" .
            substr($phoneNumber, -7, -4) . "-" .
            substr($phoneNumber, -4);

            echo $format_phone;
    }


//Create a function that will accept a number and display it as US currency with a dollar sign.  Use 123456 for your testing.
    $currencyAmount = 123456;
    function displayCurrency($currencyAmount) {
        global $currencyAmount;
        echo "$", number_format($currencyAmount);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4-1 Functions</title>

    <style>
        body {
            width: 90%;
            margin-right: auto;
            margin-left: auto;
            font-size: 20px;
        }
        
        p {
            margin: 25px;
        }

        #style {
            background-color: lightgray;
            padding: 15px;
            box-shadow: 8px 8px gray;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h1>PHP 4-1 Functions</h1>

<div id="style">
    <p>Today is <?php echo dateMMDDYYYY()?>.</p>

    <p>Today is <?php echo dateDDMMYYYY()?>.</p>

    <p>My name is <?php echo displayName($myname)?>.</p>

    <p>My number is <?php echo displayNumber($phoneNumber)?>.</p>

    <p>I wish my bank account had <?php echo displayCurrency($currencyAmount)?> in it.</p>
</div>
</body>
</html>