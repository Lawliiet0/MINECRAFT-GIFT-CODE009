<?xml version="1.0" encoding="UTF-8" ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>G! - Home</title>
    <meta http-equiv="Content-Type" content="text/html; UTF-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/form.css" type="text/css" />
    <script type="text/javascript" src=""></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/valide.js"></script>
</head>
<?php session_start(); ?>
<body>
   <div class="navbg" >
	<ul id="nav"> 
		 <li><a href="home.php">Home</a></li> 
		 <li><a href="shipping.php">Shipping</a></li> 
		 <li><a href="http://www.divcss5.com/rumen/">Billing</a></li> 
		 <li><a href="postinfo.php">Accout info</a></li> 
		 <li><a href="http://www.divcss5.com/css-texiao/">Readme</a></li> 
	</ul>
   </div> 
   <div class=" bg">
	<div class="contain">
		<div class="left">
                     lalalala
		</div>
                <div class="right">
		<?php if(empty($_SESSION['username'])){ ?>
			<form action="postlog.php" method="post" class="basic-grey" id="formlogin">
				<h1>Login
				</h1>
				<label>
				<span>Username :</span>
				<input id="username" type="text" name="username"  placeholder="Username"  required />
				</label>
				<label>
				<span>Password :</span>
				<input id="pwd" type="password" name="pwd" placeholder="Your password" required />
				</label>
				<?php if($_GET['failure']=='wrong'){
                                ?>
                                <label>
                                        <h3 style="color:red"><strong>Username or password is wrong!</strong></h3>
                                </label>
                                <?php
                                  }
                                ?>

				<label>
				<span>&nbsp;</span>
				<input type="submit" class="button" value="Login" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                <a type="button"  href="register.php">Register</a>
				</label>
			</form>
                <?php
		   }else{
		?>
			<div class="basic-grey">
				<h1><strong>Dear <font color="red"><?php echo $_SESSION['username']; ?></font>,Welcome !</strong></h1>
                                <h2><center>You have successfully registed and logged in</center></h2>
                                <hr>
                                <h2 style="text-align:right"><a type="button" class="button" href="logoff.php">Logoff</a></h2>
			</div>
		<?php
		   }
		  ?>
                </div>
	</div>

   </div>
</body>
</html>
