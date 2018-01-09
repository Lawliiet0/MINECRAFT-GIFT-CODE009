<?php
   session_start();
   //check if session is alive
   if(empty($_SESSION['username']))
   {
      //echo "session is null";
      header("location: shipping.php");
      exit;
   }
   $username = $_SESSION['username'];//get username from session

   /*get post value, filter special character*/
   $addressid = addslashes(htmlspecialchars($_POST['addressid']));
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
   $sql="update ShippingAddress set Name='$name',Address1='$address1',Address2='$address2',City='$city',State='$state',Zip='$zip' where Login='$username' and AddressID='$addressid'";
   $result=mysql_query($sql);
   if($result)// if the count is 0, we can insert the new user into the db
   {
      //echo " success";
      //header("location: shipping.php?addflag=true");
      header("location: shipping.php?update=true");
   }else
   {
      echo "failure";
      header("location: shipping.php?update=false");
      //header("location: shipping.php?addflag=false");
      exit;
   }
?>
