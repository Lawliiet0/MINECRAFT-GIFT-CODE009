<?php
   /*get post value, filter special character*/
   session_start(); //start session to check login state
   $username = addslashes(htmlspecialchars($_POST['username']));
   $pwd = addslashes(htmlspecialchars($_POST['pwd']));
   //echo $username;
   //echo $newsletter;
   /*connect mysql*/
   $con = mysql_connect("localhost", "root", "mysql");//("localhost", "yourID", "yourPass");
   mysql_select_db("Gdb", $con);//select database, "Gdb" is my database name
   // check to see if connection was successful
   if(!$con)
   {
      echo "Error: Could not connect to database.  Please try again later.";
      exit;
   }
   //echo $email; 
   /*create sql query to check if the username if in the dababase*/
   $sql="select count(Login) as num from P1User where Login='$username' and Passwd='$pwd'"; 
   $result=mysql_query($sql); 
   $count =mysql_result($result,0,"num");
   if($count)// if the count is 1, we can login successfully
   {
      //echo "get";
      $_SESSION['username'] = $username;
      header("location: index.php");
   }else
   {
      //echo "wrong";
      session_unset();
      session_destroy();//clear the session
      header("location: index.php?failure=wrong");
      //exit;
   }
?>
