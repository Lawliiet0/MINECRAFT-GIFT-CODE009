<?xml version="1.0" encoding="UTF-8" ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?php session_start(); ?>
<head>
    <title>G! - Home</title>
    <meta http-equiv="Content-Type" content="text/html; UTF-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/form.css" type="text/css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>

</head>

<body>
	<div class="navbg" >
		<ul id="nav"> 
			 <li><a href="index.php">Home</a></li> 
			 <li><a href="http://www.divcss5.com/html/">Shipping</a></li> 
			 <li><a href="http://www.divcss5.com/rumen/">Billing</a></li> 
			 <li><a href="postinfo.php">Accout info</a></li> 
			 <li><a href="http://www.divcss5.com/css-texiao/">Readme</a></li> 
		</ul>
	</div> 
	<div class="contain">
                <h1>Shipping Information</h1>
                <?php if(empty($_SESSION['username'])){ ?>
                 You must login firstly!
                <?php }else{ 
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
$sql="select * from ShippingAddress where Login='$username'";
$rs=mysql_query($sql,$con);
?>
<div class="shippingleft">
                        <div class ="basic-grey">
                                <h2>Shipping infomation lists:
                                </h2>
                                <?php if($_GET['update']=='true'){
                                ?>
                                <label>
                                        <h3 style="color:red"><strong>Shipping update successfully!</strong></h3>
                                </label>
                                <?php
                                  }else if($_GET['update']=='false'){
                                ?>
                                <label>
                                        <h3 style="color:red"><strong>Shipping update failed!</strong></h3>
                                </label>
                                <?php
                                  }
                                ?>
				<?php if($_GET['del']=='true'){
                                ?>
                                <label>
                                        <h3 style="color:red"><strong>Shipping delete successfully!</strong></h3>
                                </label>
                                <?php
                                  }else if($_GET['del']=='false'){
                                ?>
                                <label>
                                        <h3 style="color:red"><strong>Shipping delete failed!</strong></h3>
                                </label>
                                <?php
                                  }
                                ?>

<?php
//$show=mysql_fetch_array($rs);
$i=0;
while($row = mysql_fetch_array($rs, MYSQL_ASSOC))
{
   //echo $row['AddressID'];
?>
<ul>
    <li>Address Name : <?php echo $row['AddressID'];?></li>
    <li>Name : <?php echo $row['Name'];?></li>
    <li>Address1 : <?php echo $row['Address1'];?></li>
    <li>Address2 : <?php echo $row['Address2'];?></li>
    <li>City : <?php echo $row['City'];?></li>
    <li>State : <?php echo $row['State'];?></li>
    <li>Zip : <?php echo $row['Zip'];?></li>
    </br>
    <a type="button" href="shippingupdate.php?addressid=<?php echo $row['AddressID'];?>&name=<?php echo $row['Name'];?>&address1=<?php echo $row['Address1'];?>&address2=<?php echo $row['Address2'];?>&city=<?php echo $row['City'];?>&state=<?php echo $row['State'];?>&zip=<?php echo $row['Zip'];?>" class="button">Update</a>
    <a type="button" href="shippingdel.php?addressid=<?php echo $row['AddressID'];?>" class="button">Delete</a>
    </br>
    <hr>
</ul>
<?php
 }
 ?>
</div>
</div>
		<div class="shippingright">
			<form action="shipadd.php" method="post" class="basic-grey" id="formadd" name="formadd">
				<h2>ADD Shipping
				</h2>
				<label>
				<span>Address Name :</span>
				<input id="addressname" type="text" name="addressname"  required />
				</label>
				<label>
				<span>Name :</span>
				<input id="name" type="text" name="name"  required />
				</label>
				<label>
				<span>Address1 :</span>
				<input id="address1" type="text" name="address1"  required />
				</label>
				<label>
				<span>Address2 :</span>
				<input id="address2" type="text" name="address2"  required />
				</label>
				<label>
				<span>City :</span>
				<input id="city" type="text" name="city"  required />
				</label>
				<label>
				<span>State :</span>
				<input id="state" type="text" name="state"  required />
				</label>
				<label>
				<span>Zip Code :</span>
				<input id="zip" type="digits"  name="zip"  />
				</label>
				<?php if($_GET['addflag']=='true'){
                                ?>
                                <label>
                                        <h3 style="color:red"><strong>Shipping add successfully!</strong></h3>
                                </label>
                                <?php
                                  }else if($_GET['addflag']=='false'){
                                ?>
				<label>
                                        <h3 style="color:red"><strong>Shipping add failed!Please change the Address name that has exited!</strong></h3>
                                </label>
				<?php
                                  }
                                ?>
				<label>
				<span>&nbsp;</span>
				<input type="submit" class="button" value="ADD NEW SHIPPING ADDRESS" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</label>
			</form>
		</div>
		<?php 
                  } 
                 ?>
	</div>
<script>
$("#formadd").validate();

</script>
</body>
</html>
