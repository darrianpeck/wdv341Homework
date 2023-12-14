<?php
    $recipeID = $_GET['recipeID'];     //must match the index/name from showEvents.php

    require 'dbConnectHost.php'; 

    $sql = "DELETE FROM recipes_book WHERE recipe_id = :recipeID";

    $stmt = $conn->prepare($sql);       

    $stmt->bindParam(':recipeID', $recipeID);

    $stmt->execute();        //runs prepared statement and stores results within the statement

    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

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
    <script src="../javaScript/recipe.js"></script>
    <title>FTLOF</title>
</head>
<body>
<div id="addRecipeContainer">
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
        <h2>Your recipe has been deleted.</h2> <br>
        <button><a href="recipesAdmin.php">Return to recipes page.</a></button>
    </div>

    <div id="footer">
        <?php
            echo date("Y");
        ?>
    </div>
</div>
</body>
</html>