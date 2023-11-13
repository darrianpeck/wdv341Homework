<?php 
    //this file is a self posting form that will get the Event data
    //and INSERT the data into the wdv341_events table of our data

    $confirmMessage = false;    //make this variable available to the whole page
    if(isset($_POST['submit'])) { 

       echo "<h1>PROCESS the form. It has been submitted.</h1>";         // testing

        //process form data into PHP variables
        
            $inEventsName = $_POST['eventName'];     //get data from form fields
            $inEventsDescription = $_POST['eventDescription'];
            $inEventsPresenter = $_POST['eventPresenter'];
            $inEventsDate = $_POST['eventDate'];
            $inEventsTime = $_POST['eventTime'];
    


        //create our SQL command and INSERT into database
        //update database  
            require 'dbConnectHost.php';

            //build mySQL
            $sql ="INSERT INTO wdv341_events";
            $sql .="(events_name, events_description, events_presenter, events_date, events_time, events_date_entered, events_date_updated)";
            $sql .="VALUES ";
            $sql .="(:eventsName, :eventsDesc, :eventsPresenter, :eventsDate, :eventsTime, :eventsDateEntered, :eventsDateUpdated)";

            //prepare statement
            $stmt = $conn->prepare($sql);       //what do I change $conn to? $mysqli?

            //bind parameters
            $today = date("Y-m-d");
            $stmt->bindParam(':eventsName', $inEventsName);
            $stmt->bindParam(':eventsDesc', $inEventsDescription);
            $stmt->bindParam(':eventsPresenter', $inEventsPresenter);
            $stmt->bindParam(':eventsDate', $inEventsDate);
            $stmt->bindParam(':eventsTime', $inEventsTime);
            $stmt->bindParam(':eventsDateEntered', $today);
            $stmt->bindParam(':eventsDateUpdated', $today);
            

            //execute
            $stmt->execute();



        //provide comformation message, display html
        $confirmMessage = "true";       //this will be set once all data is in database
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Processing Forms PHP</title>

        <style>
            body {
                border: 2px solid purple;
                padding: 50px;
                width: 70%;
                margin-left: auto;
                margin-right:auto;
                text-align: center;
            }

            .confirmMessage {
                width: 500px;
                padding: 15px;
                background-color: pink;
                margin-left: auto;
                margin-right:auto;
            }

            #ID {
                display:none;
            }
        </style>
    </head>

    <body>

        <h1>Insert New Event</h1>

        <?php
            /*
                if we have updated the database then we will display confirmMessage
                else display the form
            */
            if ($confirmMessage){
        ?>
            <div class="confirmMessage">
                <h2> Thank you! We have received your information!</h2>
            </div>
        <?php
            }
            else{
        ?>
            <h2>Please fill out the form below:</h2>
            <form method="post" action="inputEvent.php">
                <p>
                    <label for="eventName">Event Name: </label>
                    <input type="text" name="eventName" id="eventName">
                </p>

                <p>
                    <label for="eventDescription">Event Description: </label>
                    <input type="text" name="eventDescription" id="eventDescription">
                </p>

                <p id="ID">
                    <label for="eventID">Event ID: </label>
                    <input type="text" name="eventID" id="eventID">
                </p>

                <p>
                    <label for="eventPresenter">Event Presenter: </label>
                    <input type="text" name="eventPresenter" id="eventPresenter">
                </p>

                <p>
                    <label for="eventDate">Event Date: </label>
                    <input type="date" name="eventDate" id="eventDate">
                </p>

                <p>
                    <label for="eventTime">Event Time: </label>
                    <input type="time" name="eventTime" id="eventTime">
                </p>

                <p>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset">
                </p>
            </form>
        <?php
            }
            $ID = $_POST["eventID"];
            if(empty($ID) ) {
                //a real person entered form data
                $message = "Thank you for your submission!";
            }
            else {
                //a bot entered this data
                $message = "NO BOTS ALLOWED!!!!!!";
 
            }
        ?>

    </body>
</html>