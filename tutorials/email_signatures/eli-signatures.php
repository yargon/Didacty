<?
function genItem($num,$content)
{
	$theme = "default";
	$output = <<<EOF
	<div style="background-image:url(./theme/$theme/bullets/$num.png)" class="step">
		<div class="inner">
			$content
		</div>
	</div>
EOF;
	return $output;
}

$servername = "www.didacty.com";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ELI Signatures (Tutorial)</title>
<style type="text/css">
<!--
body
{
	margin:0px;
	padding:0px;
	top:0px;
	position:absolute;
	width:100%;
	color:#525146;
}
div.step
{
	background-repeat:no-repeat;
	background-position:left top;
	margin-left:10px;
	padding-top:35px;
	padding:20px;
	display:block;
}
div.inner
{
	margin-left:60px;
}
a.external
{
	color:#339900;
	text-decoration:none;
}
a:hover.external
{
	background-image:url(page_go.png);
	background-repeat:no-repeat;
	background-position:right;
	padding-right:18px;
}

a.link_top, a:link.link_top
{
	background-image: url(../../media/title_top.png);
	width: 400px;
	height: 114px;
	text-indent: -999em;
	display: block;
}
a:hover.link_top 
{
	background-position: 0 114px;
}

#menu
{
	text-align:center;
	color:#ba3030;
}

#menu a
{
	text-decoration:none;
	color:#ba3030;
}
#menu a:hover
{
	border-bottom: solid 3px #ba3030;
}
-->
</style>
</head>

<body style="font-size:large;" onload="document.getElementById('browserSelection').style.display = 'block';document.getElementById('outlook').style.display = 'none';document.getElementById('gmail').style.display = 'none';">
<div style="margin:0px;padding:0px;top:0px;position:relative;background-image:url(../../media/bg_top.png);background-repeat:repeat-x;height:155px;">
<a href="../index.php" class="link_top">Didacty.com</a>
</div>
<div id="menu">
	<a href="../../index.php">Home</a> - <a href="#">Search</a> - <a href="#">Submit</a> - <a href="#">Contact</a>
</div>
<div style="margin-left:10px;">
  <h1 style="height:64px;background-image:url(email_icon.png);background-repeat:no-repeat;background-position:left;padding-left:70px;padding-top:20px;">Email Signatures</h1>
  <p>This tutorial will guide you on the creation of your email signature for the ELI.</p>
<div id="browserSelection" style="display:none;">
<p>Please select your email client:</p>
<form id="form1" name="form1" method="post" action="none" style="margin-left:15px;">
  <p>
    <input name="browser" type="radio" value="outlook" onclick="document.getElementById('outlook').style.display = 'block';document.getElementById('gmail').style.display = 'none';" /> 
  Outlook (using your email ending in @cas.usf.edu) </p>
  <p>
    <input name="browser" type="radio" value="gmail" onclick="document.getElementById('gmail').style.display = 'block';document.getElementById('outlook').style.display = 'none';" />
    Gmail (or emails ending in @eli.usf.edu) 
  </p>
</form>
</div>

<!-- Menu for browsers with disabled Javascript -->
<noscript>
<ul>
<li><a href="#outlookInfo" style="color:#000000;">See information for Outlook (addresses in @cas.usf.edu)</a></li>
<li><a href="#gmailInfo" style="color:#000000;">See information for Gmail (addresses in @eli.usf.edu)</a></li>
</ul>
</noscript>

<div id="outlook">
<h2>Outlook</h2>
<a name="outlookInfo">&nbsp;</a>
<?
print genItem(1,"Go to the <a href=\"http://$servername/signature_generator/index.php\" class=\"external\" target=\"blank\">Signature Generator</a> using the following link: <a class=\"external\" href=\"http://$servername/signature_generator/index.php\" target=\"blank\">http://$servername/signature_generator/index.php</a>");

print genItem(2,'Fill in your name, title, and extension number<p><img src="outlook/prestep_1.png" alt="Fill in your name, title, and extension number" width="266" height="169" /></p>');

print genItem(3,"Make sure the signature has the proper information by reviewing the preview window, then save the file somewhere you'll be able to find later (e.g. Desktop)
<p><img src=\"outlook/prestep_2.png\" alt=\"Save the file on your computer\" width=\"511\" height=\"285\" /></p>");

print genItem(4,'Open Outlook and click Tools and select Options<p><img src="outlook/step_1.png" alt="Click on Tools and then Options" width="353" height="128" /> </p>');

print genItem(5,'Click on the Mail Format tab and select Signatures on the lower right section.<p><img src="outlook/step_2.png" alt="Choose Mail Format and click on Signatures" width="342" height="370" /></p>');

print genItem(6,'In the Create Signature window that opens, click New<p><img src="outlook/step_3.png" alt="Click on New" width="400" height="172" /></p>');

print genItem(7,'Name your signature and select &quot;Use this file as template&quot;<p><img src="outlook/step_4.png" alt="Type in a name and select use a file" width="323" height="302" /></p>');

print genItem(8,'Click on Browse and select the HTML signature file you saved previously, then hit the &quot;Next&quot; button. Now hit &quot;Finish&quot; and then hit &quot;OK.&quot;');

print genItem(9,'Now you need to select your signature in &quot;Signature for new messages&quot;<p><img src="outlook/step_5.png" alt="Set default signature" width="334" height="372" /></p>');

print genItem(10,'Now click on Internet Format (on the upper left of the same tab) and uncheck the first check box <span style="font-size:small;">(to disable the automatic copy of the pictures as attachement)</span><p><img src="outlook/step_6.png" alt="Uncheck the first checkbox" width="250" height="284" /></p>');
?>

Congratulations! You have successfully set up your signature!
</div>

<div id="gmail">
<?
if(!strpos($_SERVER['HTTP_USER_AGENT'],"Firefox"))
{
	print "<span style=\"color:#ff0000;font-weight:bold;\">Warning the gmail signature requires that you use Firefox</span>";
}

print genItem(1,'First you need to install the &quot;Blank Canvas&quot; addon, you can download it <a class="external" href="https://addons.mozilla.org/en-US/firefox/addon/7757" target="blank">here</a>. If you need instructions on how to install it follow this <a class="external" href="http://blankcanvasweb.com/pages/detail/id_16/n_install_guide/" target="blank">link</a>.');

print genItem(2,'Optionnal: you can also install &quot;<a href="https://addons.mozilla.org/en-US/firefox/addon/6076" target="blank" class="external">Better Gmail v2</a>&quot; <br /><span style="font-size:small;margin-left:15px;">(Note that if you have better gmail v1 you should unistall it.)</span>');

print genItem(3,'Go to the <a href="http://'.$servername.'/signature_generator/index.php" class="external" target="blank">Signature Generator</a> using the following link: <a class="external" href="http://'.$servername.'/signature_generator/index.php" target="blank">http://'.$servername.'/signature_generator/index.php</a>');

print genItem(4,'Fill in your name, title, and extension number<p><img src="outlook/prestep_1.png" alt="Fill in your name, title, and extension number" width="266" height="169" /></p>');

print genItem(5,"Make sure the signature contains the proper information by reviewing it in the preview, then copy the code that appears in the box.
<p><img src=\"gmail/generator.png\" alt=\"Copy the text\" width=\"650\" height=\"407\" /></p>");

print genItem(6,'Go to Gmail and log in');

print genItem(7,'Click on &quot;Compose Mail&quot; <p><img src="gmail/click_compose.png" alt="Click Compose Mail" width="155" height="200" /></p>');

print genItem(8,'Click on &quot;Create&quot;<p><img src="gmail/create_sig.png" alt="Click on Create" width="936" height="322" /></p>');

print genItem(9,'Paste the HTML code into the Signature HTML field, then click on the Save Signature button<p><img src="gmail/paste_html.png" alt="Paste the HTML code" width="600" height="280" /></p>');

print "Congratulations! Your signature is now ready and will appear in your message each time you compose one.";
?>


<br />
<br />
<p style="font-size:small;text-align:center;">If you have any question please contact Morgan Attias at mattias@cas.usf.edu</p>
</div>
</body>
</html>
