<?php
    session_start(); 
    if($_SESSION['validUser']== "valid"){
        //if($_SESSION['userInputRole']=="valid"){}
    }
    else{
        header("Location: signOn.php");    //where am I taking the user?
    }
    //connect to database:
    require 'dbConnectHost.php';

    $sql = "SELECT recipe_id, recipe_name, recipe_difficulty, recipe_ingredients, recipe_time, recipe_instructions, recipe_servings, recipe_image FROM recipes_book";
    if($sql)
    $stmt = $conn->prepare($sql);

    $stmt->execute();

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
    <title>Document</title>
</head>
<body>
<div id="adminIndexContainer">
        <div id="logo">
            <a href="adminIndex.php"><img id="logo" src="../images/icons/logo.png" alt="spoon and fork logo"></a>
        </div>

        <div id="nav">
            <ul>
                <li><a href="adminIndex.php">HOME</a></li><!--??????? change thing to an admin index page if they are logged in-->
                <li><a href="recipesAdmin.php">RECIPES</a></li>
                <li><a href="contactAdmin.php">CONTACT</a></li>
            </ul>
        </div><!--close nav-->

        <div id="signOn">
            <h3><a href=../logOut.php>LOGOUT</a></h3>
        </div>

        <div id="adminIndex"><!--I want to use AJAX to display the full recipe info from local storage when 'SEE FULL RECIPE' is clicked-->

            <p>Add a your own recipe and it will display here!<p>
            <p>The JavaScript Recipe will add your recipe to local storage.</p>
            <p>The PHP recipe will add your recipe to the database.</p>
            <button><a href="addRecipeJS.php">ADD MY JS RECIPE</a></button>
            <button><a href="addRecipePHP.php">ADD MY PHP RECIPE</a></button>

        </div>

        <div id="footer">
            <?php
                echo date("Y");
            ?>
        </div>

        <?php
            //}//close else branch of ADMIN display area
        ?>
    </div><!--close admin container-->
</body>
</html>