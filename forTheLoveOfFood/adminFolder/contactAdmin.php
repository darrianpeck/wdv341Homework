<?php   
/*  
    ======================================================
    ============ THIS IS A SELF POSTING FORM =============
    ======================================================
*/
    //echo "<pre>";   
        //print_r($_POST);
    //echo "</pre>";
    $message_sent = false;
    if(isset($_POST['email']) && $_POST['email'] != ''){
        //if email is valid:
        if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
            //submit form
            //getting input fields form contact form:
            $myEmail = "darrian98@me.com";
            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['textArea'];
            //echo "<p>".$firstName."</p>";
            //echo "<p>".$lastName."</p>";
            //echo "<p>".$email."</p>";
            //echo "<p>".$subject."</p>";
            //echo "<p>".$message."</p>";

            $to = $myEmail. $email;
            $header = "From: phpLover123@dmacc.edu";
            $body = "";

            $body .= "From: ".$firstName." ".$lastName ."\r\n";
            $body .= "Email: ".$email. "\r\n";
            $body .= "Message: ".$message ."\r\n";

            mail($to, $subject, $body, $header);   //uncomment when finished!!!!! just dont want to send myself a ton of emails
            $message_sent = true;
        }
    }

//refer to form handler assignment to get name for thank you message
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet" type="text/css">
    <link href="../style.scss" rel="stylesheet" type="text/scss">
    <link href="../style800.css" rel="stylesheet" type="text/css">
    <link href="../style800.scss" rel="stylesheet" type="text/scss">
    <title>FTLOF</title>
    <style>
        #mname {
            display: none;
        }
    </style>
</head>
<body>
    <?php
        if($message_sent){
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet" type="text/css">
    <link href="../style.scss" rel="stylesheet" type="text/scss">
    <link href="../style800.css" rel="stylesheet" type="text/css">
    <link href="../style800.scss" rel="stylesheet" type="text/scss">
    <title>FTLOF</title>
</head>
<body>

    <div id="contactAdminContainer">
        <div id="logo">
            <a href="adminIndex.php"><img id="logo" src="../images/icons/logo.png" alt="spoon and fork logo"></a>
        </div>
 
        <div id="nav">
            <ul>
                <li><a href="adminIndex.php">HOME</a></li>
                <li><a href="recipesAdmin.php">RECIPES</a></li>
                <li><a href="contactAdmin.php">CONTACT</a></li>
            </ul>
        </div><!--close nav-->

        <div id="signOn">
            <h3><a href=../login.php>LOGOUT</a></h3>
        </div>

        <div id="confirmMessage">
            <h3>Thank you!</h3>
            <p>Someone will get back to you soon.</p>
        </div>

        <div id="footer">
            <?php
                echo date("Y");
            ?>
        </div><!--close footer-->

    </div>
</body>
</html>

    <?php
        }//close if
        else{
    ?>

    <div id="contactAdminContainer">
        <div id="logo">
            <a href="adminIndex.php"><img id="logo" src="../images/icons/logo.png" alt="spoon and fork logo"></a>
        </div>
 
        <div id="nav">
            <ul>
                <li><a href="adminIndex.php">HOME</a></li>
                <li><a href="recipesAdmin.php">RECIPES</a></li>
                <li><a href="contactAdmin.php">CONTACT</a></li>
            </ul>
        </div><!--close nav-->

        <div id="signOn">
            <h3><a href=../login.php>LOGOUT</a></h3>
        </div>

        <div id="contactAdmin">
            <form name="contactForm" id="contactForm" method="POST" action="contactAdmin.php"><!--self posting!!!!-->
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname">

                <label for="mname" id="mname">Middle Name</label>
                <input type="text" id="mname" name="mname">
            
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname">

                <label for="email">Email</label>
                <input type="text" id="email" name="email">
            
                <label for="subject">Subject</label>
                <select id="subject" name="subject">
                    <option value="selectOne">Please select a reason for contact</option>
                    <option value="Recipes">Recipes</option>
                    <option value="CustomerService">Customer Service</option>
                    <option value="TechSupport3">Technical Support</option>
                    <option value="Other">Other</option>
                </select>
            
                <label for="textArea">Message</label>
                <textarea id="textArea" name="textArea" style="height:200px"></textarea>
            
                <input type="submit" value="SUBMIT">
                <input type="reset" value="RESET">
            </form>
        </div>

        <div id="messageAdmin">
            <h2>Pickle for your thoughts?</h2>
            <p>Fill out the form with your message 
                And someone will get back to you
                As soon as possible!
            </p>
            <p>Thank you!</p>
        </div>

        <div id="footer">
            <?php
                echo date("Y");
            ?>
        </div><!--close footer-->

    </div>
    <?php
        }//closing else
    ?>
</body>
</html>