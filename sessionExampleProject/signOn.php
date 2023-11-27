<?php
    session_start();    //join an exising session if any, otherwise start a new session!!!
/* Algorithm for a sign on page

provide a signon form - username and password, self posting

if(form has been submitted)
{
    x process form data
    x validate input data
        if error 
            displayForm
            validData = false       //bad data switch on!
    if(validData)
        access database
            (SQL SELECT WHERE clause username/password )
        if you find the username/password in the database
            -you are valid user
            -display Admin Page/content
            -set session variables to maintain the state / keep you signed on and have access to pages
        else
            -Invalid username/password - ERROR
            display login form OR return to home page
    else
        ERROR - Invalid username or password
        x display login form 
}
else{
    x display the form
}
//VIEW - HTML area

if(validUser - signed on){
    display the admin content
}
else{
    display the login form
}

*/

$inUsername = "";
$inPassword = "";
$usernameErrMsg = "";
$passwordErrMsg = "";
$signOnErrMsg = "";


if( isset($_POST['submit'])){
   // echo "<h1>Form has Been Submitted</h1>";
    $displayForm = false;

    $inUsername = $_POST['username'];
    $inPassword = $_POST['password'];

    //validate input values

    $validData = true;          //assume the input data is good
    if($inUsername == ""){
        //display error message on the form
        $usernameErrMsg = "Please enter a username";
        $validData = false;
        //put the input values back into the form fields
        //display the form
    }
    if($inPassword == ""){
        //display error message on the form
        $passwordErrMsg = "Please enter a password";
        $validData = false;
        //put the input values back into the form fields
        //display the form
    }

    if($validData){
        //process the database
            //database workflow
        //1. Connect to the database
        //2. Create your SQL command
        //3. Prepare your SQL Statement.......PDO Prepared Statements
        //4. Bind any parameters as needed
        //5. execute your SQL command/prepared statment
        //6. Process your result-set/object
        require 'dbConnect.php';
       // $sql = "SELECT event_user_name, event_user_password FROM wdv341_event_users WHERE event_user_name = :userName";
        $sql = "SELECT COUNT(*) FROM wdv341_event_users WHERE event_user_name = :userName";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userName', $inUsername);
        //$stmt->bindParam(':password', $inPassword);
        $stmt->execute();
        //How do I know whether or not I found a matching username/password in the database?
        $numberOfRows = $stmt->fetchColumn();       //get the number of rows from the result
        echo "<h1>$numberOfRows</h1>";

        if($numberOfRows > 0){
            //found a valid username/password - continue processing this as a valid user
            //display Admin page
            $displayForm = false;   //DO NOT DISPLAY THE FORM, instead display the admin page
        }
        else{
            //invalid username/password combo...error messages and display form again
            $displayForm = true;    //invalid username/password - show the form to the user
            echo "<h1 class='errMsg'>Incorrect Username/Password. Please try again</h1>";
        }
    }   
        else{
            //display the form
            $inUsername = "";
            $inPassword = "";
            $displayForm = true;        //set our displayForm flag/switch to true 
            $signOnErrMsg = "Invalid Username or password. Please try again.";
        }
}
    else{
        //echo "<h1>Display Login Form</h1>";
        $displayForm = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .errMsg {
            color: red;
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
    <h1>Session Project Example!!!</h1>
    <h1>Login to the Event System</h1>
        <?php
            if($displayForm){
                //the user has SIGNED ON and should display the Admin System
                //echo "<h2>Display Form</h2>";
        ?>
            <form method="post" action="signOn.php">
                <div style="color:red;">
                    <?php echo $signOnErrMsg; ?>
                </div>

            <p>
                <label for="username">Username: </label>
                <input type="text" name="username" id="username"  value="<?php echo $inUsername; ?>">
                <span class="errMsg"><?php echo $usernameErrMsg; ?></span>
        </p>
        <p>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" value="<?php echo $inPassword; ?>">
                <span class="errMsg"><?php echo $passwordErrMsg; ?></span>
        </p>
        <p>
                <input type="submit" name="submit" value="Submit">
                <input type="reset">
        </p>

        </form>
        <?php
            }
            else{
                //the user needs to display the form - to sign on OR fix their input
                $_SESSION['validUser'] ="valid";    //check this on all Admin pages

                //to make the logged in user's page different than regular user:
                    //$_SESSION['userRole'] = "admin";
                    //header("Location: admin/adminMain.php");

        ?>
        <div id="adminMenu">
            <ol><h4>ADMIN Functions:</h4>
                <li><a href="inputEvent.php">Add Event</a></li>
                <li><a href="showEvents.php">Events</a></li>
                <li><a href="signOut.php">Sign Out</a></li>
            </ol>
        </div>

        <?php
            echo  $_SESSION['validUser'];
            }//close else branch of ADMIN display area
        ?>
</body>
</html>