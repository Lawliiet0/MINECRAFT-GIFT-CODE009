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

   /*get post value, filter special character*/
   $addressid = addslashes(htmlspecialchars($_POST['addressname']));
   $name = addslashes(htmlspecialchars($_POST['name']));
   $address1 = addslashes(htmlspecialchars($_POST['address1']));
   $address2 = addslashes(htmlspecialchars($_POST['address2']));
   $city = addslashes(htmlspecialchars($_POST['city']));
   $state = addslashes(htmlspecialchars($_POST['state']));
   $zip = addslashes(htmlspecialchars($_POST['zip']));
   //echo $addressid.$name.$address1.$address2.$city.$state.$zip;
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
   $sql="select count(Login) as num from ShippingAddress where Login='$username' and AddressID='$addressid'"; 
   $result=mysql_query($sql); 
   $count =mysql_result($result,0,"num");
   echo $count;
   if(!$count)// if the count is 0, we can insert the new user into the db
   {
      $sql="insert into ShippingAddress(AddressID,Login,Name,Address1,Address2,City,State,Zip) values('$addressid','$username','$name','$address1','$address2','$city','$state','$zip')";
      mysql_query($sql,$con);//insert the new record into the table P1User
      //echo "insert success";
      header("location: shipping.php?addflag=true");
      //header("location: index.php");
   }else
   {
      //echo "failure";
      header("location: shipping.php?addflag=false");
      exit;
   }
?>
