<?php  
    //set a SESSION VARIABLE to restrict this page to only a valid user / must sign on to use the page:
        session_start();    //join an existing session, if any, otherwise start a new session / must sign on to see the page
        if($_SESSION['validUser']== "valid"){
            //true branch says: valid user, let them see the page
            //if($_SESSION['userInputRole']=="valid"){}
        }
        else{
            //false branch, INVALID user, return them to login page or home page
            header("Location: signOn.php");    //where am I taking the user?
        }


    //this file is a self posting form that will get the Event data
    //and INSERT the data into the wdv341_events table of our data

    $eventNameMsg = ""; //define a global variable with no content
    $eventDescMsg = "";
    $eventPresenterMsg = "";
    $eventDateMsg = "";
    $eventTimeMsg = "";

    $inEventsName = ""; //default value to display on the form the first time it is requested
    $inEventsDescription = "";
    $inEventsPresenter = "";
    $inEventsDate = "";
    $inEventsTime = ""; 

    $confirmMessage = false;    //make this variable available to the whole page

    if(isset($_POST['submit'])) { 

      // echo "<h1>You hit the submit button.</h1>";         // testing

        //process form data into PHP variables
        
            $inEventsName = $_POST['eventName'];                //get data from form fields
            $inEventsDescription = $_POST['eventDescription'];
            $inEventsPresenter = $_POST['eventPresenter'];
            $inEventsDate = $_POST['eventDate'];
            $inEventsTime = $_POST['eventTime'];

        //when a field is not filled out, can do this for each input
            function validateEventName($inName){
                if($inName == ""){
                    //invalid
                    global $validInput, $eventNameMsg;
                    $validInput = false;
    
                    //display error message
                    $eventNameMsg = "Please enter a valid event name";
                }
            }

        /*validate input data
            assume all input is valid $validInput=true
            validate input data field by field

            if input data is invalid
                $validInput = false
                DO NOT PROCESS THE DATA TO THE DATABASE!!!!!
                display error message 
                send form back to user so they can fix
                user will resubmit the form
            else
                process data into the database

            if($validInput){
                all input is good, then process data into the database
            }
            else{
                send form back to user so they can fix
                user will resubmit the form
            }
        */
        $validInput = true;
            validateEventName($inEventsName);
        if ($validInput){
            //process into database

            /*
                TDD Test Driven Development
                    plan all inputs and expectations BEFORE you write the code

            */


            //create our SQL command and INSERT into database
            //update database  
                require 'dbConnect.php';

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
        }//closes the if statement that shows the form

        else{
            //send the form back to the user
        }
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
                text-align: left;
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
            
            .errMsg{
                color:red;
            }

            #adminMenu{
            padding:15px;
            width: 70%;
            }

            ol {
                list-style-type: none;

                li {
                    
                }
            }
        </style>
    </head>

    <body>
    <h2>Event ADMIN System</h2>

    <div id="adminMenu">
        <ol><h4>ADMIN Functions:</h4>
            <li><a href="inputEvent.php">Add Event</a></li>
            <li><a href="showEvents.php">Events</a></li>
            <li><a href="signOut.php">Sign Out</a></li>
        </ol>
    </div>
        
        <h1>Session Project Example!!!</h1>
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
                    <input type="text" name="eventName" id="eventName" value="<?php echo $inEventsName; ?>">
                    <span class="errMsg"><?php echo $eventNameMsg;?></span>
                </p>

                <p>
                    <label for="eventDescription">Event Description: </label>
                    <input type="text" name="eventDescription" id="eventDescription" value="<?php echo $inEventsDescription; ?>">
                    <span class="errMsg"><?php echo $eventDescMsg;?></span>
                </p>

                <p id="ID">
                    <label for="eventID">Event ID: </label>
                    <input type="text" name="eventID" id="eventID">
                </p>

                <p>
                    <label for="eventPresenter">Event Presenter: </label>
                    <input type="text" name="eventPresenter" id="eventPresenter" value="<?php echo $inEventsPresenter; ?>">
                    <span class="errMsg"><?php echo $eventPresenterMsg;?></span>
                </p>

                <p>
                    <label for="eventDate">Event Date: </label>
                    <input type="date" name="eventDate" id="eventDate" value="<?php echo $inEventsDate; ?>">
                    <span class="errMsg"><?php echo $eventDateMsg;?></span>
                </p>

                <p>
                    <label for="eventTime">Event Time: </label>
                    <input type="time" name="eventTime" id="eventTime" value="<?php echo $inEventsTime; ?>">
                    <span class="errMsg"><?php echo $eventTimeMsg;?></span>
                </p>

                <p>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset">
                </p>
            </form>
        <?php
            }
        ?>

    </body>
</html>