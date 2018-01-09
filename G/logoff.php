<?php
   // check to see if connection was successful
      //echo "get";
   session_start(); //start session to check login state
   session_unset();
   session_destroy();//clear the session 
   header("location: index.php");
?>
