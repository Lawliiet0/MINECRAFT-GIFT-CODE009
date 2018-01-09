<?php
   session_start();
   //check if session is alive
   if(empty($_SESSION['username']))
   {
      //echo "session is null";
      header("location: myaccount.php");
      exit;
   } 
   $username = $_SESSION['username'];//get username from session
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
   /*create sql query to get the infomation on the username */
   $sql="select * from P1User where Login='$username'";
   $rs=mysql_query($sql,$con);
   $show=mysql_fetch_array($rs);
   //echo "location: index.php?username=".$show[0]."&first=".$show[1]."&last=".$show[2]."&pwd=".$show[3]."&Email=".$show[4]."";
   if(!empty($show))
   {
      $flag = $_GET['flag'];
      header("location: myaccount.php?first=".$show[1]."&last=".$show[2]."&Email=".$show[4]."&flag=".$flag."");
   }else
   {
      session_unset();
      session_destroy();//clear the session
      header("location: myaccount.php?flag=".$flag."");
   }
   /*
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
   }*/
?>
