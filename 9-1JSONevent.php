<?php
    /*
        1. Create a SELECT statement that will pull ONE row/event from your wdv341_events table. 
            Use SQL WHERE clause to limit the result set to one, and prepare your statement before execution.

        2. Format the result into a PHP associative array by setting the PDO fetch style. This will turn the result object row into an 
            associative array using the column names as the indexes.
        
        3. Create a Class called Event and give it a property for every column in your wdv341_events table (excluding the date_inserted/update 
            columns). There are a couple of ways to make the properties editable by your code. Both have their place and will work. 
            Please understand why you would use either of them.
            a. You can make the properties public so they can be mutated on the fly
            b. You can make the properties private and create public getters and setters to let users modify their values
        
        4. Create a PHP object called $outputObj and assign it to be an instance of the Event class.
        
       5.  Assign a value to each property of your $outputObj instance based on the row you pulled from yoru DataBase (DB). 
            There are a few of ways to do this
            a. You can manually set each property value (if the properties are public)
            b. You can set them in the constructor as long as your Class constructor is set up for this
            c. You can use your setters if you set them up
        
        6. Encode the $outputObj into a JSON object using json_encode
        
        7. Echo the JSON object
        
        8. Test you page and view the response in your localhost browser.
    */

 
    //1. 
    require 'dbConnectHost.php';    

        $sql = "SELECT events_name, events_description, events_presenter, events_date, events_time FROM wdv341_events WHERE events_id=:eventID";     
        $stmt = $conn->prepare($sql); 

        $eventID = 1;
        $stmt->bindParam(':eventID', $eventID);

        $stmt->execute();     
    //

    //2. 
        $stmt->setFetchMode(PDO::FETCH_ASSOC);    

        $eventRecord = $stmt->fetch();              
           // echo " ".$eventRecord["events_name"];
    //

    //3. 
    class Event {
        //public - the property or method can be accessed from everywhere. 
            //This is default. 
        //private - the property or method can ONLY be accessed within the class.
        //reminds me of global vs local
        public $events_name;
        public $events_description;
        public $events_presenter;
        public $events_date;
        public $events_time;
    }

    //4. 
        $outputObj = new Event();   

    //5. 
        $outputObj->events_name = $eventRecord['events_name']; 
        $outputObj->events_description = $eventRecord['events_description'];
        $outputObj->events_presenter = $eventRecord['events_presenter'];
        $outputObj->events_date = $eventRecord['events_date'];
        $outputObj->events_time = $eventRecord['events_time'];
        //var_dump($outputObj);

    //6. 
        echo json_encode($outputObj);

    //formatting
        //for each loop to display contents
            echo "<br>";
            foreach($outputObj as $key => $value) {
                echo $key . " : " . $value . "<br>";
            }

        //
            echo "<p>";
               echo "I feel weird not formatting this";
            echo "</p>";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>9-1</title>
    <style>
        #style {
            background-color: lightblue;
            padding: 20px;
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
    </style>
</head>

<body>
    
</body>
</html>