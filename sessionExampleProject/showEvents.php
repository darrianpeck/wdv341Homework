<?php
    /*
        DELETE ALGORITHM - a set of steps / tasks to accomplish a task

        what to delete? 
            get a list of content froom database and display it
            should be able to 'choose' / 'select' and item to be deleted
            delete that selected item
    */

    require 'dbConnect.php'; 

    $sql = "SELECT events_id, events_name, events_description, events_presenter, events_date, events_time FROM wdv341_events";     //all rows in that table

    $stmt = $conn->prepare($sql);       

    $stmt->execute();        //runs prepared statement and stores results within the statement

    $stmt->setFetchMode(PDO::FETCH_ASSOC);       

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Example</title>

    <style>
        .flexContainer{
            display: flex;
        }

        .flexContainer div {
            width: 200px;
            border: 1px solid lightblue;
            border-bottom: 3px solid blue;
            padding: 10px;
        }

        #bold {
            font-weight: bold;
            font-size: 20px;
        }

        button {
            background-color: #f44336;
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
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

    <h3>Delete Events</h3>

    <section>
        <div class="flexContainer" id="bold">
            <div>Event Name</div>
            <div>Event Description</div>
            <div>Event Presenter</div>
            <div>Event Date</div>
            <div>Event Time</div>
            <div>Delete</div>
        </div>
    </section>

    <section>
        <?php //display the events in a table
            while($row = $stmt->fetch() ){      //$row is an associative array
                echo "<div class = 'flexContainer'>";
                    echo "<div>" .$row["events_name"] . "</div>";
                    echo "<div>" .$row["events_description"] . "</div>";
                    echo "<div>" .$row["events_presenter"] . "</div>";
                    echo "<div>" .$row["events_date"] . "</div>";
                    echo "<div>" .$row["events_time"] . "</div>";
                    $eventID = $row['events_id'];
                    echo "<div><a href='deleteEvent.php?eventID=$eventID'><button>Delete</button></a></div>";
                echo "</div>";
            }
        ?>
    </section>  

</body>
</html>