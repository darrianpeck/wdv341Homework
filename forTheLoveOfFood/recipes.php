<?php
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
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="style.scss" rel="stylesheet" type="text/scss">
    <link href="style800.css" rel="stylesheet" type="text/css">
    <link href="style800.scss" rel="stylesheet" type="text/scss">
    <script src="javaScript/recipe.js"></script>

    <style>
        #turkeyRecipeDisplay, #cookieRecipeDisplay, #cookieAmountDropDown, #servingAmountDropDown, #servingsDropDown{
            display: none;
        }

        img[alt~="recipePhoto"]{
            width: 100%;
            height: 200px;
            border-radius: 10px;
        }    
    </style>
    <title>FTLOF</title>
    <script>

        function pageLoad(){
            //alert("page loaded");
            //TURKEY RECIPE:================================================================================================================

            document.querySelector("#viewTurkeyRecipe").onclick = function() {//if time, place make <p> tags with ids to style...
                //alert("see turkey recipe clicked");
                document.querySelector("#turkeyRecipeName").innerHTML = recipeNameStoredJS;
                //document.querySelector("#turkeyRecipeTime").innerHTML = "Time: " + recipeTimeStoredJS; 
                document.querySelector("#turkeyRecipeDifficultyLevel").innerHTML = "Difficulty: " + recipeDifficultyLevelStoredJS;
                document.querySelector("#servingsChoices").onchange = function (){
                    //HALF:
                    if (document.querySelector("#servingsChoices").value === "half"){
                        for(let x = 0; x < halfTurkeyIngredientAmountJS.length; x++){   //looping through ingredients with variable I made to store half amount in local storage
                            document.querySelector("#turkeyRecipeIngredients").innerHTML = 
                                "Igredients: " + "<p>" + halfTurkeyIngredientAmountJS[x] + "</p>";//not looping through ingredients                                ;
                            document.querySelector("#turkeyRecipeServings").innerHTML = "Servings: 5";
                            document.querySelector("#turkeyRecipeTime").innerHTML = "Time: 2.5 hours"
                            //console.log("HALF: " + halfTurkeyIngredientAmountJS[x]);
                        }
                    }
                    if (document.querySelector("#servingsChoices").value === "half"){
                        for(let i = 0; i < halfTurkeyInstructionsAmountJS.length; i++){   //looping through instructions with variable I made to store half amount in local storage
                            document.querySelector("#turkeyRecipeInstructions").innerHTML = 
                                "Instructions: " + "<p>" + halfTurkeyInstructionsAmountJS[i] + "</p>";//not looping through instructions                                ;
                            //console.log("HALF: " + halfTurkeyInstructionsAmountJS[i]);
                        }
                    }

                    //REGULAR:
                    if (document.querySelector("#servingsChoices").value === "regular"){
                        for(let x = 0; x < regularTurkeyIngredientAmountJS.length; x++){   
                            document.querySelector("#turkeyRecipeIngredients").innerHTML = "Igredients: " + "<p>" + regularTurkeyIngredientAmountJS[x] + "</p>";
                            document.querySelector("#turkeyRecipeServings").innerHTML = "Servings: 10";
                            document.querySelector("#turkeyRecipeTime").innerHTML = "Time: 5 hours";
                            //console.log("REGULAR: " + regularTurkeyIngredientAmountJS[x]);
                        }
                    }
                    if (document.querySelector("#servingsChoices").value === "regular"){
                        for(let i = 0; i < regularTurkeyInstructionsAmountJS.length; i++){   //looping through instructions with variable I made to store half amount in local storage
                            document.querySelector("#turkeyRecipeInstructions").innerHTML = 
                                "Instructions: " + "<p>" + regularTurkeyInstructionsAmountJS[i] + "</p>";//not looping through instructions                                ;
                            //console.log("REGULAR: " + regularTurkeyInstructionsAmountJS[i]);
                        }
                    }

                    //DOUBLE:
                    if (document.querySelector("#servingsChoices").value === "double"){
                        for(let x = 0; x < doubleTurkeyIngredientAmountJS.length; x++){   
                            document.querySelector("#turkeyRecipeIngredients").innerHTML = "Igredients: " + "<p>" + doubleTurkeyIngredientAmountJS[x] + "</p>";
                            document.querySelector("#turkeyRecipeServings").innerHTML = "Servings: 20";
                            document.querySelector("#turkeyRecipeTime").innerHTML = "Time: 10 hours";
                            //console.log("DOUBLE: " + doubleTurkeyIngredientAmountJS[x]);
                        }
                    }
                    if (document.querySelector("#servingsChoices").value === "double"){
                        for(let i = 0; i < doubleTurkeyInstructionsAmountJS.length; i++){   //looping through instructions with variable I made to store half amount in local storage
                            document.querySelector("#turkeyRecipeInstructions").innerHTML = 
                                "Instructions: " + "<p>" + doubleTurkeyInstructionsAmountJS[i] + "</p>";//not looping through instructions                                ;
                            //console.log("DOUBLE: " + doubleTurkeyInstructionsAmountJS[i]);
                        }
                    }
                }//end turkey ingredient/instructions change
                                
                //hide cookie recipe:
                document.querySelector("#turkeyRecipeDisplay").style.display = "inline";
                document.querySelector("#servingAmountDropDown").style.display = "inline";
                document.querySelector("#cookieRecipeDisplay").style.display = "none";
                document.querySelector("#cookieAmountDropDown").style.display = "none";
            }//end turkey recipe

            //COOKIE RECIPE:================================================================================================================
            document.querySelector("#viewCookieRecipe").onclick = function() {//if time, place make <p> tags with ids to style...
                //alert("see cookie recipe clicked");
                document.querySelector("#cookieRecipeName").innerHTML = sugarCookiesRecipeNameStoredJS;
                document.querySelector("#cookieRecipeDifficultyLevel").innerHTML = "Difficulty: " + sugarCookiesRecipeDifficultyLevelStoredJS;
                document.querySelector("#cookieServingsChoices").onchange = function (){
                    //HALF:
                    if (document.querySelector("#cookieServingsChoices").value === "half"){
                        for(let x = 0; x < halfCookieIngredientsAmountJS.length; x++){   //looping through ingredients with variable I made to store half amount in local storage
                            document.querySelector("#cookieRecipeIngredients").innerHTML = 
                                "Igredients: " + "<p>" + halfCookieIngredientsAmountJS[x] + "</p>";//not looping through ingredients                                ;
                            document.querySelector("#cookieRecipeServings").innerHTML = "Servings: 12";
                            document.querySelector("#cookieRecipeTime").innerHTML = "Time: 1 hour";
                        }
                    }
                    if (document.querySelector("#cookieServingsChoices").value === "half"){
                        for(let i = 0; i < halfCookieInstructionsAmountJS.length; i++){   //not looping through instructions  
                            document.querySelector("#cookieRecipeInstructions").innerHTML = 
                                "Instructions: " + "<p>" + halfCookieInstructionsAmountJS[i] + "</p>";                               
                        }
                    }

                    //REGULAR:
                    if (document.querySelector("#cookieServingsChoices").value === "regular"){
                        for(let x = 0; x < regularCookieIngredientsAmountJS.length; x++){  
                            document.querySelector("#cookieRecipeIngredients").innerHTML = 
                                "Igredients: " + "<p>" + regularCookieIngredientsAmountJS[x] + "</p>";                               
                            document.querySelector("#cookieRecipeServings").innerHTML = "Servings: 24 Cookies";
                            document.querySelector("#cookieRecipeTime").innerHTML = "Time: 2 hours";
                        }
                    }
                    if (document.querySelector("#cookieServingsChoices").value === "regular"){
                        for(let i = 0; i < regularCookieInstructionsAmountJS.length; i++){   
                            document.querySelector("#cookieRecipeInstructions").innerHTML = 
                                "Instructions: " + "<p>" + regularCookieInstructionsAmountJS[i] + "</p>";                            
                        }
                    }

                    //DOUBLE:
                    if (document.querySelector("#cookieServingsChoices").value === "double"){
                        for(let x = 0; x < doubleCookieIngredientsAmountJS.length; x++){   
                            document.querySelector("#cookieRecipeIngredients").innerHTML = 
                                "Igredients: " + "<p>" + doubleCookieIngredientsAmountJS[x] + "</p>";                               
                            document.querySelector("#cookieRecipeServings").innerHTML = "Servings: 48 Cookies";
                            document.querySelector("#cookieRecipeTime").innerHTML = "Time: 4 hours";
                        }
                    }
                    if (document.querySelector("#cookieServingsChoices").value === "double"){
                        for(let i = 0; i < doubleCookieInstructionsAmountJS.length; i++){   
                            document.querySelector("#cookieRecipeInstructions").innerHTML = 
                                "Instructions: " + "<p>" + doubleCookieInstructionsAmountJS[i] + "</p>";                              
                        }
                    }
                }//end cookie ingredient/instructions change
                //document.querySelector("#cookieRecipeServings").innerHTML = "Servings: " + recipeServingsStoredJS;
                //document.querySelector("#cookieRecipeImage").innerHTML = "Image: " + recipeImageStored;
                //hide turkey recipe
                    document.querySelector("#cookieRecipeDisplay").style.display = "inline";
                    document.querySelector("#cookieAmountDropDown").style.display = "inline";
                    document.querySelector("#turkeyRecipeDisplay").style.display = "none";
                    document.querySelector("#servingAmountDropDown").style.display = "none";
            }//end cookie recipe
        }
        
    
    </script>
</head>
<body onload="pageLoad()">

    <div id="recipePageContainer">
        <!--signOn, nav and logo into 3 columns??-->

        <div id="logo">
           <a href="index.php"><img id="logo" src="images/icons/logo.png" alt="spoon and fork logo"></a>
        </div>
 
        <div id="nav">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="recipes.php">RECIPES</a></li>
                <li><a href="contact.php">CONTACT</a></li>
            </ul>
        </div><!--close nav-->

        <div id="signOn">
            <h3><a href=login.php>LOGIN</a></h3>
        </div>

        <div id="recipe">
            <div class="row">
                <div id="recipeCard" class="column">
                    <img src="images/turkeyDinner.jpg" alt="recipePhoto">
                    <h3><a>The Perfect Christmas Turkey</a></h3>
                    <p id="servingAmountDropDown">
                        <label for="servings">Servings</label>
                        <select id="servingsChoices" name="servingsChoices">
                            <option value="choose">Please Choose a Serving Amount</option>
                            <option value="half">Half</option>
                            <option value="regular">Regular</option>
                            <option value="double">Double</option>
                        </select>
                    </p>
                    <div id = "turkeyRecipeDisplay">
                        <p id="turkeyRecipeName"></p>
                        <p id="turkeyRecipeDifficultyLevel"></p>
                        <p id="turkeyRecipeTime"></p>
                        <p id="turkeyRecipeIngredients"></p>
                        <p id="turkeyRecipeInstructions"></p>
                        <p id="turkeyRecipeServings"></p>
                        <p id="turkeyRecipeImage"></p>
                    </div>
                    <button type="button" id="viewTurkeyRecipe">SEE FULL RECIPE</button>
                </div><!--close recipe card-->

                <div id="recipeCard" class="column">
                    <img src="images/sugarCookies.jpg" alt="recipePhoto">
                    <h3><a>Best Sugar Cookies for the Holiday</a></h3>
                    <p id="cookieAmountDropDown">
                        <label for="cookieServings">Servings</label>
                        <select id="cookieServingsChoices" name="cookieServingsChoices">
                            <option value="choose">Please Choose a Serving Amount</option>
                            <option value="half">Half</option>
                            <option value="regular">Regular</option>
                            <option value="double">Double</option>
                        </select>
                    </p>
                    <div id = "cookieRecipeDisplay">
                        <p id="cookieRecipeName"></p>
                        <p id="cookieRecipeDifficultyLevel"></p>
                        <p id="cookieRecipeTime"></p>
                        <p id="cookieRecipeIngredients"></p>
                        <p id="cookieRecipeInstructions"></p>
                        <p id="cookieRecipeServings"></p>
                        <p id="cookieRecipeImage"></p>
                    </div>
                    <button type="button" id="viewCookieRecipe">SEE FULL RECIPE</button>
                </div><!--close recipe card-->
            </div><!--close row-->
    
            <?php //display the events in a table
                while($row = $stmt->fetch() ){      //$row is an associative array
                    echo "<div class='row'>";
                        echo "<div id='recipeCard' class='column'>";
                            echo "<img src='images/".$row["recipe_image"]."' alt='recipePhoto'>";
                            echo "<div><h3>" .$row["recipe_name"] . "</h3></div>";
                            ?>
                            <p id="#">
                                <label for="servingsDropDown#">Servings</label>
                                <select id="servingsDropDown" name="servingsChoices">
                                    <option value="choose">Please Choose a Serving Amount</option>
                                    <option value="half">Half</option>
                                    <option value="regular">Regular</option>
                                    <option value="double">Double</option>
                                </select>
                            </p>
                            <?php
                            echo "<div><p>Difficulty: " .$row["recipe_difficulty"] . "</p></div>";
                            echo "<div><p>Time: " .$row["recipe_time"] . "</p></div>";
                            echo "<div><p>Servings: " .$row["recipe_servings"] . "</p></div>";
                            echo "<div><p>Ingredients: " .$row["recipe_ingredients"] . "</p></div>";
                            echo "<div><p>Instructions: " .$row["recipe_instructions"] . "</p></div>";//will have to make into a loop
                            //$eventID = $row['events_id'];
                            //cho "<div><a href='deleteEvent.php?eventID=$eventID'><button>Delete</button></a></div>";
                            //echo "<div><a href='updateEvent.php?eventID=$eventID'><button class='update'>Update</button></a></div>";
                            //echo "<button type='button' id='viewCookieRecipe'>SEE FULL RECIPE</button>";
                        echo "</div>";//close column
                    echo "</div>";//close .row
                }
            ?>

        </div><!--close recipe-->

        <div id="footer">
            <?php
                echo date("Y");
            ?>
        </div><!--close footer-->

    </div>
</body>
</html>