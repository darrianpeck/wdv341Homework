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
    </style>

    <script>
        //ADD ANOTHER INGREDIENT INPUT FIELD FOR ADDRECIPE.HTML FORM:
        let ingredientNumber=4;
        function addIngredient(){
            ingredientNumber++;
            /* user can add an input field to add any number of ingredients for recipe
                create the input with #ingredient
                    createElement("input")
                set attributes:<input type="text" id="ingredient" name="ingredient">
                display it to the page when the button is clicked
            */
            let recipeInput = document.createElement("input");
            recipeInput.setAttribute("type","text");
            recipeInput.setAttribute("id","ingredient" + ingredientNumber);
            recipeInput.setAttribute("name","ingredient" + ingredientNumber);
                console.log(ingredientNumber);
            
            let ingredientList = document.querySelector("#ingredientList");
            ingredientList.appendChild(recipeInput);
        }
        //===========================================================================================
        //ADD ANOTHER INSTRUCTION INPUT FIELD FOR ADDRECIPE.HTML FORM:
        let instructionNumber = 4;
        function addInstruction(){
            instructionNumber++;
            let recipeInput = document.createElement("input");
            recipeInput.setAttribute("type","text");
            recipeInput.setAttribute("id","instruction" + instructionNumber);
            recipeInput.setAttribute("name","instruction" + instructionNumber);
                console.log(instructionNumber);
                
            let instructionList = document.querySelector("#instructionList");
            instructionList.appendChild(recipeInput);
        }
    </script>
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
        <div id="recipeForm">
            <h2>Fill out the form below to add your recipe.</h2>
            <div>
                <form name="addRecipeForm" id="addRecipeForm" method="post" enctype="multipart/form-data" action="addRecipe.php">
                    <!--
                        send form to a php page, when submit is clicked, it will store data in
                        local storage and send it to the database!!
                    -->
                    <p id="nameInput">
                        <b><label for="recipeName">Recipe Name</label></b><br>
                        <input type="text" id="recipeName" name="recipeName">
                    </p>

                    <p id="level">
                        <b><label>Difficulty Level</label></b>
                        <label class="container">
                            <input type="radio" name="radio" id="easy" value="Easy">
                            Easy
                        </label>
                        <label class="container">
                            <input type="radio" name="radio" id="medium" value="Medium">
                            Mediummm
                        </label>
                        <label class="container">
                            <input type="radio" name="radio" id="hard" value="Hard">
                            Hard
                        </label><br>
                    </p>

                    <p id="servingsInput">
                        <b><label for="servings">Servings</label></b><br>
                        <input type="text" id="servings" name="servings"><br>
                    </p>

                    <div id="ingredientInput">
                        <p id="ingredientList">
                            <label><b>Ingredients</b> (please enter ingredient name and amount needed)</label>
                            <input type="text" id="ingredient1" name="ingredient1" placeholder="Ex: 1/2 cup of sugar">
                            <input type="text" id="ingredient2" name="ingredient2">
                            <input type="text" id="ingredient3" name="ingredient3">
                        </p>
                        <span class="errMsg"></span><br>
                        <input type="button" onclick="addIngredient()" value="Add Ingredient"><!--dynamically add a new input field-->
                    </div>

                    <p id="timeInput">
                        <b><label for="time">How long does it take to make this recipe?</label></b>
                        <input type="text" id="time" name="time" value="<?php echo $inRecipeTime; ?>"><br>
                        <span class="errMsg"></span>
                    </p>

                    <div id="instructionsInput">
                        <p id="instructionList">
                            <label><b>Instructions</b> (please enter instructions one step at a time)</label>
                            <input type="text" id="instruction1" name="instruction1" placeholder="Ex: Step 1: Preheat oven to 350 degrees...">
                            <input type="text" id="instruction2" name="instruction2">
                            <input type="text" id="instruction3" name="instruction3">
                        </p>
                        <input type="button" onclick="addInstruction()" value="Add Instruction"><!--dynamically add a new input field-->
                    </div>

                    <p>
                        <b><label>Select and upload an image for your recipe</label></b><br>
                        <lable for="getImage">Select an image:</lable><br>
                        <input type="file" name="getImage" id="getImage"><br>
                    </p>
                    <!--    <input type="button" value="SHOW" onclick="displayNewInputs()">     testing purposes-->

                  <input type="submit" name="submit" value="Submit to Local Storage" onclick="storeRecipeData()"><!--do I want this to be input type=submit? yes because I want it to connect with the server, but for testing/JS purposes it is type=button until I get php set up-->
                  <input type="reset" name="reset" value="Reset">
                </form>
              </div>
        </div>

        <div id="footer">
            <?php
                echo date("Y");
            ?>
        </div>
        

    </div>
</body>
</html>