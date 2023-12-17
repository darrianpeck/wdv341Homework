<?php
    session_start();

    if($_SESSION['validUser']== "valid"){
        //valid
        //show page
    }
    else{
        //invalid
        header("Location: login.php");
    }

    $recipeID = $_GET['recipeID'];

    require 'dbConnectHost.php';
    $sql = "SELECT * FROM recipes_book WHERE recipe_id = :recipeID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':recipeID', $recipeID);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $recordData = $stmt->fetch();  


    $recipeNameMsg = "";
    $recipeDifficultyMsg = "";
    $recipeTimeMsg = "";
    $recipeServingsMsg = "";
    $recipeIngredientsMsg = "";
    $recipeInstructionsMsg = "";
    //$recipeImageMsg = "";

    $inRecipeName = $recordData['recipe_name'];
    $inRecipeDifficulty = $recordData['recipe_difficulty'];
    $inRecipeTime = $recordData['recipe_time'];
    $inRecipeServings = $recordData['recipe_servings'];
    $inRecipeIngredients = $recordData['recipe_ingredients'];
    $inRecipeInstructions = $recordData['recipe_instructions'];
    $inRecipeImage =$recordData['recipe_image'];"";

    $confirmMessage = false;

    if(isset($_POST['submit'])){
        //echo "<h3>Submit button was clicked!</h3>";
        $inRecipeName = $_POST['recipeName'];
        $inRecipeDifficulty = $_POST['difficulty'];
        $inRecipeTime = $_POST['time'];
        $inRecipeServings = $_POST['servings'];
        $inRecipeIngredients = $_POST['ingredient'];
        $inRecipeInstructions = $_POST['instruction'];
        //$inRecipeImage = $_POST['image'];

        function validateRecipeName($inName){//do for each field
            if($inName == ""){
                //invalid
                global $validInput, $recipeNameMsg;
                $validInput = false;

                //display error message
                $recipeNameMsg = "Please enter a valid recipe name";
            }
        }

        function validateRecipeDifficulty($inDifficulty){
            if($inDifficulty == ""){
                //invalid
                global $validInput, $recipeDifficultyMsg;
                $validInput = false;

                //display error message
                $recipeDifficultyMsg = "Please enter a valid recipe difficulty";
            }
        }

        function validateRecipeTime($inTime){
            if($inTime == ""){
                //invalid
                global $validInput, $recipeTimeMsg;
                $validInput = false;

                //display error message
                $recipeTimeMsg = "Please enter a valid recipe time";
            }
        }

        function validateRecipeIngredients($inIngredeients){
            if($inIngredeients == ""){
                //invalid
                global $validInput, $recipeIngredientsMsg;
                $validInput = false;

                //display error message
                $recipeIngredientsMsg = "Please enter valid ingredients";
            }
        }

        function validateRecipeInstructions($inInstructions){
            if($inInstructions == ""){
                //invalid
                global $validInput, $recipeInstructionsMsg;
                $validInput = false;

                //display error message
                $recipeInstructionsMsg = "Please enter valid instructions";
            }
        }

        function validateRecipeServings($inServings){
            if($inServings == ""){
                //invalid
                global $validInput, $recipeServingsMsg;
                $validInput = false;

                //display error message
                $recipeServingsMsg = "Please enter a valid serving";
            }
        }

        /*function validateRecipeImage($inImage){
            if($inImage== ""){
                //invalid
                global $validInput, $recipeImageMsg;
                $validInput = false;

                //display error message
                $recipeImageMsg = "Please enter a valid image";
            }
        }*/

        $validInput = true;
        validateRecipeName($inRecipeName);
        validateRecipeDifficulty($inRecipeDifficulty);
        validateRecipeTime($inRecipeTime);
        validateRecipeIngredients($inRecipeIngredients);
        validateRecipeInstructions($inRecipeInstructions);
        validateRecipeServings($inRecipeServings);
        //validateRecipeImage($inRecipeImage);

        if ($validInput){
            require 'dbConnectHost.php';
            $sql = "UPDATE recipes_book SET recipe_name = :recipeName, recipe_difficulty = :recipeDifficulty, recipe_ingredients = :recipeIngredients, recipe_time = :recipeTime, recipe_instructions = :recipeInstructions, recipe_servings = :recipeServings, recipe_image = :recipeImage";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':recipeName', $inRecipeName);
            $stmt->bindParam(':recipeDifficulty', $inRecipeDifficulty);
            $stmt->bindParam(':recipeIngredients', $inRecipeIngredients);
            $stmt->bindParam(':recipeTime', $inRecipeTime);
            $stmt->bindParam(':recipeInstructions', $inRecipeInstructions);
            $stmt->bindParam(':recipeServings', $inRecipeServings);
            $stmt->bindParam(':recipeImage', $inRecipeImage);
            $stmt->bindParam(':recipeID', $recipeID);

            $stmt->execute();

            $confirmMessage = "true";
        }
        else{
            //send add recipe form back to user
        }
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
    <script src="../javaScript/recipe.js"></script>
    <title>FTLOF</title>

    <style>
        .container {
            display: block;
            position: relative;
            cursor: pointer;
        }
        
        .errMsg {
            color: red;
        } 

        #ID {
            display:none;
        }

    </style>

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
            <?php 
                if ($confirmMessage){
            ?>
                <div id="confirmMessage">
                    <h2>Thank you!</h2>
                    <p>Your recipe has been updated.</p>
                    <button><a href="recipesAdmin.php">Return to recipes page.</a></button>
                </div>

                <div id="footer">
                    <?php
                        echo date("Y");
                    ?>
                </div>
            <?php
                }
                else{
            ?>
        <div id="recipeForm">
            <h2>Review the form below to update your recipe.</h2>
            <div>
                <form name="addRecipeForm" id="addRecipeForm" method="post" enctype="multipart/form-data" action="updateRecipe.php?recipeID=<?php echo $recipeID; ?>">
                <p id="ID">
                    <label for="recipeID">Recipe ID: </label>
                    <input type="text" name="recipeID" id="recipeID">
                </p>    
                <p id="nameInput">
                        <b><label for="recipeName">Recipe Name</label></b><br>
                        <input type="text" id="recipeName" name="recipeName" value="<?php echo $inRecipeName; ?>"><br>
                        <span class="errMsg"><?php echo $recipeNameMsg; ?></span>
                    </p>

                    <p id="level">
                        <label>Difficulty Level</label>
                        <label class="container">
                            <input type="text" name="difficulty" id="difficulty" value="<?php echo $inRecipeDifficulty; ?>">
                        </label>
                        <span class="errMsg"><?php echo $recipeDifficultyMsg; ?></span>
                    </p>

                    <p id="servingsInput">
                        <b><label for="servings">Servings</label></b><br>
                        <input type="text" id="servings" name="servings" value="<?php echo $inRecipeServings; ?>"><br>
                        <span class="errMsg"><?php echo $recipeServingsMsg; ?></span>
                    </p>

                    <p id="ingredientList">
                        <label><b>Ingredients</b></label><br>
                        <input type="text" id="ingredient" name="ingredient" value="<?php echo $inRecipeIngredients; ?>" placeholder="Ex: 1/2 cup of sugar, 1 Cup flour, and 1 cup chocolate chips..."><br>
                        <span class="errMsg"><?php echo $recipeIngredientsMsg; ?></span>
                    </p>

                    <p id="timeInput">
                        <b><label for="time">How long does it take to make this recipe?</label></b>
                        <input type="text" id="time" name="time" value="<?php echo $inRecipeTime; ?>"><br>
                        <span class="errMsg"><?php echo $recipeTimeMsg; ?></span>
                    </p>

                    <p id="instructionList">
                        <label><b>Instructions</b></label><br>
                        <input type="text" id="instruction" name="instruction" value="<?php echo $inRecipeInstructions; ?>" placeholder="Ex: Step 1: Preheat oven to 350 degrees... Step 2:... Step 3:..."><br>
                        <span class="errMsg"><?php echo $recipeInstructionsMsg; ?></span>
                    </p>

                    <p>
                        <b><label>Select and upload an image for your recipe</label></b><br>
                        <lable for="image">Select an image:</lable><br>
                        <input type="file" name="image" id="image" value="<?php //echo $inRecipeImage; ?>"><br>
                        <span class="errMsg"><?php //echo $recipeImageMsg; ?></span>
                    </p>

                  <input type="submit" name="submit" value="UPDATE">
                  <input type="reset" name="reset" value="RESET">
                </form>
              </div>
        </div>

        <div id="footer">
            <?php
                echo date("Y");
            ?>
        </div>
        
            <?php
                }
            ?>

    </div>
</body>
</html>