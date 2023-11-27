<?php   
    session_start();

    session_unset();
    session_destroy();

    //$conn->close();     //closes your database connection

    header("Location:/PHPWDV341/sessionExampleProject/signOn.php");  //redirect to home or login page

?>