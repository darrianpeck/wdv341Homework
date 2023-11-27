<?php

    $eventID = $_GET['eventID'];     //must match the index/name from showEvents.php
   // echo "<h1>$eventID</h1>";
    require 'dbConnect.php'; 

    $sql = "DELETE FROM wdv341_events WHERE events_id = :eventID";

    $stmt = $conn->prepare($sql);       

    $stmt->bindParam(':eventID', $eventID);

    $stmt->execute();        //runs prepared statement and stores results within the statement

    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Event</title>
</head>
<body>
    <h2>Event System</h2>
    <h3>Event Delete</h3>
    <p>Your event has been deleted. <a href="showEvents.php">Return to events page.</a></p>
</body>
</html>