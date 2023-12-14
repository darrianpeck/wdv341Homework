//STORE DATA: 
    function storeRecipeData(){        
        //need to make a NEW recipe object with new inputs everytime someone submits form
        //get values of input fields
        //JSON.stringify each field
        //store them in proper variable in local storage
        //JSON.parse when taking them out
        //get out of local storage with new variable

        //get values from ingredient and instructions fields, double loop?
        //.push() the ingredients and instructions into an empty array
        //JSON.stringify each array, like during turkey and cookie recipes
        //store in local storage with new variable
        //JSON.parse arrays
        //new variables to use 

        //getting values from form:
        let recipeObject = {
            recipeName: document.querySelector("#recipeName").value,   
            recipeDifficultyLevel: document.querySelector("input[type='radio']:checked").value,
            //recipeIngredients: document.querySelector("#ingredient").value, //need to make the double loop??
            recipeTime: document.querySelector("#time").value,
            //recipeInstructions: document.querySelector("#instructions").value,//need to make the double loop??
            recipeServings: document.querySelector("#servings").value,
            recipeImage: document.querySelector("#getImage").value
        }

        //convert recipeObject to JSON format:
        let recipeObjectJSON = JSON.stringify(recipeObject); 
            //console.log(recipeObjectJSON);

        //PUTTING IT IN LOCAL STORAGE:
            //create a new object with this data and put it in local storage
        localStorage.setItem("recipe", recipeObjectJSON);
            console.log(localStorage.getItem("recipe"));
            //console.log(localStorage);

        //submit the form (same as type='submit')
        //querySelector("form").submit();
                
    }
//===========================================================================================
//MAKING SURE ALL FIELDS ARE FILLED OUT:
/*function validateForm($inRecipeName) {
    let name = document.forms["recipeForm"]["recipeName"].value;
    if (name == "") {
        alert("Please fill out recipe name");
        return false;
    }

    let ingredients = document.forms["recipeForm"]["ingredient"].value;
    if (ingredients == "") {
        alert("Please enter ingredients");
        return false;
    }
    

    let time = document.forms["recipeForm"]["time"].value;
    if (time == "") {
        alert("Please enter how long the recipe takes to make");
        return false;
    }

    let instructions = document.forms["recipeForm"]["instructions"].value;
    if (instructions == "") {
        alert("Please enter instructions for recipe");
        return false;
    }
}*/ //ingredients was not working

//try if statements and display the error in span tags??