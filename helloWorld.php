<?php
    /*
        MVC - a very simple way to do it within a page
        Model - data, variables usually put near top of the page
        Controller - rest of the top of the page, under the page
        View - HTML section/output  (keep as much PHP code out of the view as possible!!)
    */

    //PHP Loosely data typed, same as JavaScript

    $studentName = "Darrian";       //scope = global (not in a function)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>

    <script>
        //let studentName = "Dan";
        //let studentName = "<?php echo $studentName; ?>";
        let studentName = "Karter";
    </script>

</head>
<body>
    <h1 <?php echo "style=color:green";?>>Intro to PHP, August 29th</h1>
    <h2><?php echo "Welcome to PHP";?></h2>
    <h3>Hello, <?php echo $studentName;?></h3>
    <p>JavaScript thinks your name is <script>document.write(studentName);</script></p>


    <?php
    //file extension matters!!!! .php not .html
        //this is a p=PHP code block
        echo "Hello World";             //echo is similar to document.write()

        //the PHP processor will send nonPHP code to the Response Object
        //PHP processor will only output to the Response what you tell it - echo command

       //It looks like all server side is/remains on the server. Not exposed to the public/cloinet/user

       echo "<p>This is a paragraph.</p>";
       echo "<ol><li>Item 1</li> <li>Item 2</li></ol>"
    ?>

</body>
</html>