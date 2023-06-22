<?php 

    //terminating a session and redirecting to home page

        session_start();

        //session destroy or session unset

    session_unset();
    session_destroy();

        // redirecting to the home page 
    header("Location: "."home.php");

?>