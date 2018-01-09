<?xml version="1.0" encoding="UTF-8" ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>G! - Home</title>
    <meta http-equiv="Content-Type" content="text/html; UTF-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/form.css" type="text/css" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/valide.js"></script>

</head>

<body>
	<div class="navbg" >
		<ul id="nav"> 
			 <li><a href="index.php">Home</a></li> 
			 <li><a href="http://www.divcss5.com/html/">Shipping</a></li> 
			 <li><a href="http://www.divcss5.com/rumen/">Billing</a></li> 
			 <li><a href="http://www.divcss5.com/css-tool/">Accout info</a></li> 
			 <li><a href="http://www.divcss5.com/css-texiao/">Readme</a></li> 
		</ul>
	</div> 
	<div class="contain">
			<form action="postreg.php" method="post" class="basic-grey" id="Form" name="Form">
				<h1>Register
				</h1>
				<label>
				<span>Username :</span>
				<input id="username" type="text" name="username" placeholder="Username" required />
				</label>
				<label>
				<span>First Name :</span>
				<input id="first" type="text" name="first" placeholder="First Name" required />
				</label>
				<label>
				<span>Last Name :</span>
				<input id="last" type="text" name="last" placeholder="Last Name" required />
				</label>
				<label>
				<span>Password :</span>
				<input id="pwd" type="password" name="pwd" placeholder="Your password" required />
				</label>
				<label>
				<span>Email :</span>
				<input id="email" type="email" name="email" placeholder="Email" required />
				</label>
                                <label>
                                <span>Subscribe to our newsletter?</span>
                                <input  type="radio" name="newsletter" value="y"  checked="checked" />Yes
                                <input  type="radio" name="newsletter" value="n" />NO
                                </label>
				<?php if($_GET['code']=='wrong'){ 
				?>
                                <label>
                                        <h3 style="color:red"><strong>Username has already existed, please change the user name</strong></h3>
                                </label>
                                <?php 
                                  } 
                                ?>

				<label>
				<span>&nbsp;</span>
				<input type="submit" class="button" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</label>
			</form>
	</div>

</body>
</html>
