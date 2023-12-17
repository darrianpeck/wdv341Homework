<?php
    $firstName = $_POST["fName"];    
    $lastName = $_POST["lName"];
    $middleName = $_POST["mname"];

    if(empty($middleName) ) {
        //a real person entered form data
        $message = "Thank You!";
    }
    else {
        //a bot entered this data
        $message = "NO BOTS ALOUD!!!!!!";
    }
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
    <div id="confrimMessage">
        <p>
            First Name: <?php echo $firstName; ?>
        </p>

        <p>
            ROBOT: <?php echo $message; ?>
        </p>

        <p>
            Last Name: <?php echo $lastName; ?>
        </p>
    </div>
    
    <div id="footer">
        <?php
            echo date("Y");
        ?>
    </div><!--close footer-->

</div>
  
</body>
</html>

