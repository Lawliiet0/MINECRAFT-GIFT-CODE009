<?php
   session_start();
   //check if session is alive
   if(empty($_SESSION['username']))
   {
      //echo "session is null";
      header("location: myaccount.php");
      exit;
   }
   /*get post value, filter special character*/
   $username =addslashes(htmlspecialchars($_POST['username']));
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
   echo $email; 
   /*create sql query to check if the username if in the dababase*/
   $sql="update P1User set FirstName='$first',LastName='$last',Passwd='$pwd',Email='$email',NewsLetter='$newsletter' where Login='$username'";
   $result=mysql_query($sql); 
   
   if($result)// if the count is 0, we can insert the new user into the db
   {
      //echo "update success";
      //session_start(); //start session to check login state
      //$_SESSION['username'] = $username;
      header("location: postinfo.php?flag=true");
   }else
   {
      header("location: postinfo.php?flag=false");
      //header("location: register.php?code=wrong");
      //exit;
   }
?>
