<?php 
require("header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<title>Home</title>

	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

	<meta name="keywords" content="" />	
	<meta name="description" content="" />
	<meta name="robots" content="" /><!-- change into index, follow -->
				
	<link rel="stylesheet" href="stylesheets/style.css" type="text/css" />
	
	<!--[if lte IE 6]>
		<script type="text/javascript" src="javascripts/pngfix.js"></script>
		<script type="text/javascript" src="javascripts/ie6.js"></script>
		<link rel="stylesheet" href="stylesheets/ie6.css" type="text/css" />
	<![endif]-->
<script type="text/javascript" src="javascripts/jquery-1.3.1.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {		
	
	//Execute the slideShow
	slideShow();

});

function slideShow() {

	//Set the opacity of all images to 0
	$('#gallery a').css({opacity: 0.0});
	
	//Get the first image and display it (set it to full opacity)
	$('#gallery a:first').css({opacity: 1.0});
	
	//Set the caption background to semi-transparent
	$('#gallery .caption').css({opacity: 0.7});

	//Resize the width of the caption according to the image width
	$('#gallery .caption').css({width: $('#gallery a').find('img').css('width')});
	
	//Get the caption of the first image from REL attribute and display it
	$('#gallery .content').html($('#gallery a:first').find('img').attr('alt'))
	.animate({opacity: 0.7}, 400);
	
	//Call the gallery function to run the slideshow, 6000 = change to next image after 6 seconds
	setInterval('gallery()',6000);
	
}

function gallery() {
	
	//if no IMGs have the show class, grab the first image
	var current = ($('#gallery a.show')?  $('#gallery a.show') : $('#gallery a:first'));

	//Get next image, if it reached the end of the slideshow, rotate it back to the first image
	var next = ((current.next().length) ? ((current.next().hasClass('caption'))? $('#gallery a:first') :current.next()) : $('#gallery a:first'));	
	
	//Get next image caption
	var caption = next.find('img').attr('alt');	
	
	//Set the fade in effect for the next image, show class has higher z-index
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);

	//Hide the current image
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');
	
	//Set the opacity to 0 and height to 1px
	$('#gallery .caption').animate({opacity: 0.0}, { queue:false, duration:0 }).animate({height: '1px'}, { queue:true, duration:300 });	
	
	//Animate the caption, opacity to 0.7 and heigth to 100px, a slide up effect
	$('#gallery .caption').animate({opacity: 0.7},100 ).animate({height: '100px'},500 );
	
	//Display the content
	$('#gallery .content').html(caption);
	
	
}

</script>
<style type="text/css">
#gallery {
	position:relative;
	height:360px
}
	#gallery a {
		float:left;
		position:absolute;
	}
	
	#gallery div {
		float:left;
		position:absolute;
	}
	
	#gallery a img {
		border:none;
	}
	
	#gallery a.show, #gallery div.show {
		z-index:500; position: a
	}

	#gallery .caption {
		z-index:-500; 
		background-color:#000; 
		color:#ffffff; 
		height:100px; 
		width:100%; 
		position:absolute;
		bottom:0;
	}

	#gallery .caption .content {
		margin:5px
	}
	
	#gallery .caption .content h3 {
		margin:0;
		padding:0;
		color:#1DCCEF;
	}
	

</style>

</head>

<body>

<!--  / WRAPPER \ -->
<div id="wrapper">
	
    <!--  / MAIN CONTAINER \ -->
    <div id="mainCntr">

		<!--  / HEADER CONTAINER \ -->
		<div id="headerCntr">
		
			<h1><a href="#">Web Jet</a></h1>
			  
			<!-- / MENU CONTAINER \ -->
			<div id="menuCntr">
			
				<ul>
					<li><a href="index.php" class="active">Home</a></li>
					<li><a href="hub.php">DDoS Attack</a></li>
					<li><a href="mysettings.php">My Account</a></li>
					<li><a href="pinger.php">Pinger</a></li>
					<li><a href="logout.php" onclick='return confirm("Are you sure you want to logout?");'>Logout</a></li>
				</ul>
				
			</div>
			<!-- \  MENU CONTAINER  /-->
			
		</div>
		<!--  \ HEADER CONTAINER / -->
			
		<!-- / BANNER CONTAINER \ -->
		<div id="bannerCntr">
			<div id="bannerCntrinner">
			
				<!--  / BANNER BOX \ -->
				<div class="bannerbox">
				
				<div id="gallery">
				<a href="#" class="show"><img src="images/banner.jpg" title="" alt="&lt;h3&gt;&lt;/h3&gt;" /></a>
				
				<a href="#"><img src="images/banner3.png" alt=""/></a>
				
				<a href="#"><img src="images/banner4.png" alt=""/></a>
				
				<div class="caption" style="display: none;"><div class="content"></div></div>
				</div>	
					
				</div>
				<!--  / BANNER BOX \ -->
				
			</div>	
		</div>
		<!-- \  BANNER CONTAINER  /-->	
			  
       
		
        <!--  / CONTENT CONTAINER \ -->
        <div id="contentCntr">
		
			  <!--  / TOP CONTAINER \ -->
			  <div id="topCntr">
				<div id="topCntrinner">
				
				<!--  / WELCOME BOX \ -->
				<div class="welcomeBox">
				
				 	<h2>Welcome to Our Booter</h2>
					<p>
                    
                    
                    
                    
                    
                    
This week, we cleaned out all the dead shells and added completely new ones now the booter is stronger than ever before, If you would like to improve its strenght please donate so we may buy new shells by the end of this week.


                    
                    
                    
                    
                    
                    
                    
                    
                    </p>
				  	<a href="#">More Info...</a>				 
				  </div>
				<!--  / WELCOME BOX \ -->
				
				<div class="whatBox">
				
				 	<h2>Terms of Service</h2>
					<p>Before starting to use * Booter, you need to read and agreed the Terms of Service. Click on More Info for see these rules. If ou have any question about the feature of this Booter, you can contact our team via the live support.</p>
				  	<a href="tos.php">More Info...</a>
									 
				  </div>
				
				
				<div class="serviceBox">
				
				 	<h2>Last Updates</h2>
					<p>
                    
                    Welcome to * Booter v3, our Team just make a new deisgn for the website. I hope everybody will enjoy the new features and this new template <span id="result_box" lang="en" xml:lang="en"><span title="Cliquer ici pour voir d'autres traductions">exclusive</span></span> to our website. Don't forget, if you find some bugs you can contact the staff or the admin !</p>
				  	<a href="updates.php">More Info...</a>
									 
				  </div>
				
				
				</div>
			  </div>
			  <!--  \ TOP CONTAINER / -->
          
			<!--  / BOTTOM CONTAINER \ -->
			<div id="bottomCntr">
			
				<div class="left">
				
					<!--  / OUR BLOG BOX \ -->
					<div class="ourbloginnerBox">
						<div class="top">
							<div class="bottom">
								
                    
                    






<div id="right">
<div class="small-box"><h2>Welcome, <?php echo $username; ?>!</h2>
    <div class="small-box-content">
        <p>
        Profile ID: <font color="#a5a5a5"><?php echo $id; ?></font> <br />
        Rank: <font color="#a5a5a5"><?php echo $level; ?></font> <br />
        My IP: <font color="#a5a5a5"><?php echo $_SERVER["REMOTE_ADDR"]; ?></font> <br />
        My Attacks: <font color="#a5a5a5"><?php
    $query = mysql_query("SELECT * FROM `users` WHERE id='$id' ");
    while($row = mysql_fetch_array($query)){
    $attacks = $row['myAttacks'];
    echo $attacks;
    }
?></font>
        </p>

    </div></div>

        <div class="small-box"><h2>Members Statistics</h2>
    <div class="small-box-content">
        <p>


                    <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="forms">
                        <font size=1>
          <tr>
            <td><font color="#575757">Total Users</font></td>
            <td><?php echo $all; ?></td></tr></font>
          

          <tr>
            <td><font color="#575757">Active Users</font></td>
            <td><?php echo $active; ?></font></td>
          </tr>

          <tr>
            <td><font color="#575757">Pending Users</font></td>
            <td><?php echo $total_pending; ?></font></td>
          </tr>
          <tr>
            <td><font color="#575757">Total Attacks</font></td>
            <td><?php
                   $result = mysql_query("SELECT * FROM logs", $link);
                   $num_rows4 = mysql_num_rows($result);
                   echo "$num_rows4";
                ?></font></td>
          </tr>
                    </font>
                    </table>
        </p>


    </div></div>

    <div class="small-box"><h2>Shells Statistics</h2>
    <div class="small-box-content">
        <p>


                    <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="forms">
                        <font size="1">
                                      <tr>
            <td><font color="#575757">Shell Rotation</font></td>
            <?php
            if($shellRotation == 0) { ?>
            <td><font color="red">(Off)</font></td>
            <?php } else { ?>
            <td><font color="#00bc00">(On)</font></td>
            <?php
            }
            ?>
           
          </tr>
          
          <tr>
            <td><font color="#575757">Shells Online</font></td>
            <td><font color="#00bc00"><?php echo $shellsOnline; ?></font></td>
          </tr>

          <tr>
            <td><font color="#575757">GET Shells</font></td>
            <td><font color="#00bc00"><?php echo $num_rows; ?></font></td>
          </tr>

          <tr>
            <td><font color="#575757">POST Shells</font></td>
            <td><font color="#00bc00"><?php echo $num_rows2; ?></font></td>
          </tr>

          <tr>
            <td><font color="#575757">Slowloris Shells</font></td>
            <td><font color="#00bc00"><?php echo $num_rows3; ?></font></td>
          </tr>
                        </font>
                    </table>
        </p>


    </div></div>
</div>

      
                    
                    
                    
                    
                    

					
							</div>
						</div>	 
					</div>
					<!--  / OUR BLOG BOX \ -->
					<p>&nbsp;</p>
					<!--  / OUR BLOG BOX \ -->
					<div class="ourblogBox">
						<div class="top">
							<div class="bottom">
									
							<h2>Chat Member</h2>
							
							<object width="250" height="360" id="obj_1320714984338"><param name="movie" value="http://Team313Booter.chatango.com/group"/><param name="wmode" value="transparent"/><param name="AllowScriptAccess" VALUE="always"/><param name="AllowNetworking" VALUE="all"/><param name="AllowFullScreen" VALUE="true"/><param name="flashvars" value="cid=1320714984338&b=60&f=50&l=999999&q=999999&r=100&s=1"/><embed id="emb_1320714984338" src="http://Team313Booter.chatango.com/group" width="250" height="360" wmode="transparent" allowScriptAccess="always" allowNetworking="all" type="application/x-shockwave-flash" allowFullScreen="true" flashvars="cid=1320714984338&b=60&f=50&l=999999&q=999999&r=100&s=1"></embed></object><br>
							
							</div>
						</div>	 
					</div>
					<!--  / OUR BLOG BOX \ -->
				
				</div>
				
				<div class="right">
				
				<!--  / COMPANY BOX \ -->
				<div class="companyBox">
				
					<!--  / COMPANY BOX 1 \ -->
					<div class="companyBox1">
					
				 	<h2 class="icon1">Donate                    </h2>
				 	<span class="first">If you feel generous enough to donate to us, to make the booter stronger click the Donate tab ! -Thanks.
                    
                    
                    <p></p>
                    					<center>
  
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</center>
               
                    
                    
                    </span>
				 	

<!-- Codes by Quackit.com -->
<script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=600,width=400,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
<a href="JavaScript:newPopup('donate.php');">More Info...</a>





					
				  </div>
					<!--  / COMPANY BOX 1 \ -->	
					
					<div class="companyBox2">
					
				 	<h2 class="icon2">IP Grabber</h2>
					<p>This section is for get the ips of people, You need the ip of your friend or someone ? Only you have to do is give him a link with a picture and when he gonna click on it, you will have automaticly this ip adress.</p>
				  	<a href="ipgrabber.php">More Info...</a>
					
					</div>
					
					<div class="companyBox3">
					
						<h2 class="icon3">Friends List</h2>
						<p>In this section of the website, you are able to add the ips you dont want to attack. Putting your friends and websites ips for peoples you don't want to boot, is a good way to dont did a mistake!</p>
						<a href="friends.php">More Info...</a>
					
					</div>
					
					
					<div class="companyBox4">
					
						<h2 class="icon4">Enemies List</h2>
						<p>In this section, is the page where you insert all your ennemies Ips, It makes your flooding faster but dont forget to not abuse of this booter because it will result in suspension of your account without refund</p>
						<a href="enemies.php">More Info...</a>
					
					</div>
					
	<p>&nbsp;</p>			
<?php
include 'footer.php';
?>
					
				  </div>
				<!--  / COMPANY BOX \ -->
				
				</div>
				
			</div>
			<!--  \ BOTTOM CONTAINER / -->
			  
        </div>
        <!--  \ CONTENT CONTAINER / -->
		
	</div>
	<!--  \ MAIN CONTAINER / -->
	
	<!--  / FOOTER CONTAINER \ -->
	
<?php
include 'footer1.php';
?>

	<!--  \ FOOTER CONTAINER / -->
		
</div>
<!--  \ WRAPPER / -->

</body>

</html>