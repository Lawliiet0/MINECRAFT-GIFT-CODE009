<?php
   /*get post value, filter special character*/
   $username = addslashes(htmlspecialchars($_POST['username']));
   $first = addslashes(htmlspecialchars($_POST['first']));
   $last = addslashes(htmlspecialchars($_POST['last']));
   $pwd = addslashes(htmlspecialchars($_POST['pwd']));
   $email = addslashes(htmlspecialchars($_POST['email']));
   $newsletter = addslashes(htmlspecialchars($_POST['newsletter']));
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
   $sql="select count(Login) as num from P1User where Login='$username'"; 
   $result=mysql_query($sql); 
   $count =mysql_result($result,0,"num");
   echo $count;
   if(!$count)// if the count is 0, we can insert the new user into the db
   {
      $sql="insert into P1User(Login,FirstName,LastName,Passwd,Email,NewsLetter) values('$username','$first','$last','$pwd','$email','$newsletter')";
      mysql_query($sql,$con);//insert the new record into the table P1User
      session_start(); //start session to check login state
      $_SESSION['username'] = $username;
      header("location: index.php");
   }else
   {
      header("location: register.php?code=wrong");
      exit;
   }
?>
