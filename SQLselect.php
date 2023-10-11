<?php
    //database workflow
        //1. Connect to the database
        //2. Create your SQL command
        //3. Prepare your SQL Statement.......PDO Prepared Statements
        //4. Bind any parameters as needed
        //5. execute your SQL command/prepared statment
        //6. Process your result-set/object

    //include an external PHP file into this file
        //inclued
        //require

        //1.
        require 'dbConnectHost.php';        //copies content of dbConnectHost.php INTO this page

        //2.
        $sql = "SELECT events_name, events_description, events_presenter, events_date, events_time FROM wdv341_events";     //all rows in that table

        //3. prepare out statement object PDO Prepared Statements
        $stmt = $conn->prepare($sql);           //$conn is in dpConnect file        //-> is used instead of . for object->property or object->method

            //$stmt = $conn.prepare($sql);            //concatenating $connect with prepare()

       //4. no parameters

       //5. 
       $stmt->execute();        //runs prepared statement and stores results within the statement

       //6.  fetch
       $stmt->setFetchMode(PDO::FETCH_ASSOC);       //setting ALL fetch commands to return associative array
       


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit 7</title>

    <style>

        #head {
            text-align: center;
        }

        .eventBox {
            background-color:lightgray;
            box-shadow: 6px 6px gray;
            padding: 10px;
            margin-right: auto;
            margin-left: auto;
            margin-bottom: 20px;
            width: 50%;
            border-radius: 7px;
        }
    </style>
</head>
<body>
    <div id="head">
        <h2>PHP Unit 7 - SQL Select</h2>
        <h3>Event Names From Table in PHP MyAdmin</h3>
    </div>
    <?php
        //$stmt->execute();       //executes it again when statement is declared again
        while($row = $stmt->fetch() ) {
            echo "<div class='eventBox'>";
                echo "<h2>";
                echo $row["events_name"];
                echo "</h2>";

                echo "<h3>";
                echo "Description:";
                echo "</h3>";
                echo "<p>";
                echo $row["events_description"];
                echo "</p>";

                echo "<h3>";
                echo "Presenter:";
                echo "</h3>";
                echo "<p>";
                echo $row["events_presenter"];
                echo "</p>";

                echo "<h3>";
                echo "Date:";
                echo "</h3>";
                echo "<p>";
                echo $row["events_date"];
                echo "</p>";

                echo "<h3>";
                echo "Time:";
                echo "</h3>";
                echo "<p>";
                echo $row["events_time"];
                echo "</p>";
            echo "</div>";
            
        }
    ?>
</body>
</html>