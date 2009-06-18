<?
require_once("./includes/core.inc.php");

$servername = "www.didacty.com";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Didacty.com</title>
<link rel="stylesheet" type="text/css" href="./style/default.css" title="Default">
</head>

<body style="font-size:large;">
<div style="margin:0px;padding:0px;top:0px;position:relative;background-image:url(./media/bg_top.png);background-repeat:repeat-x;height:155px;">
<a href="index.php" class="link_top">Didacty.com</a>
</div>
<div id="menu">
<a href="index.php">Home</a> - <a href="#p">Search</a> - <a href="#">Submit</a> - <a href="#">Contact</a>
</div>
<div style="margin-left:25px;">
  <h1>Welcome to Didacty.com</h1>
	The purpose of Didacty.com is to provide tutorials that aim to facilitate peoples daily life when using technology.
	<h2>Latest Tutorials</h2>
	<div style="height:64px;background-image:url(./tutorials/email_signatures/email_icon.png);background-repeat:no-repeat;background-position:left;"><div style="margin-left:70px;padding-top:10px;">Email Signatures
	<div style="font-size:x-small;font-family:Helvetica, sans-serif;">
		<img src="media/date.png" alt="date" /> 
		<span style="vertical-align:top;">2008-09-12</span>
		<img src="media/tag.png" alt="tag" /> 
		<span style="vertical-align:top;">ELI, E-mail</span>
	</div>
	<span style="font-size:medium;">This tutorial will guide you on the creation of your email signature for the ELI. <a href="./tutorials/email_signatures/eli-signatures.php" class="internal">read tutorial</a></span></div></div>
	
	<br />
<br />
<br />
<br />

	<? #print loginForm(); ?>
</div>

<p style="font-size:small;text-align:center;"><span style="vertical-align:top;">If you have any question please contact us at </span><img src="email_small.png" alt="webmaster@Didacty.com" /></p>

</body>
</html>
