<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ELI Signature Generator</title>
<style type="text/css">
<!--
	form
	{
		display:block;
		width:310px;
		height:120px;
	}
	label
	{
		float:left;
	}
	input
	{
		float:right;
	}
-->
</style>
</head>

<body>

<?

$name = "";
$title = "";
$phone = "";

if(isset($_POST['name']))
{
	$name = $_POST['name'];
	$title = $_POST['title'];
	$phone = $_POST['phone'];
	
	print "<div style=\"float:right;\">";
	print "<h2>Preview:</h2>";
	print "<iframe src=\"signature_preview.php?name=$name&amp;title=$title&amp;phone=$phone\" style=\"width:310px;height:320px;\"> The preview cannot be seen on this browser, please use a browser that supports iframe like firefox</iframe>";
	print "</div>";
}

print <<<EOF

<h1>ELI Signature Generator</h1>

<h2>Information</h2>

<form name="signatures" method="post" action="index.php">
<label for="name">Full Name:</label>
<input type="text" name="name" value="$name" />
<br />
<label for="title">Title:</label>
<input type="text" name="title" value="$title" />
<br />
<label for="phone">Extention number:</label>
<input type="text" name="phone" value="$phone" />
<br />
<span style="font-size:small;">(without 813-974)</span>
<br />
<input type="submit" />
</form>
EOF;

if(isset($_POST['name']))
{
	$servername = "www.didacty.com";
	
	$html = <<<EOF
<img src="http://$servername/signature_generator/ELIlogo.png" width="281" height="92" alt=" " />
<div style="margin-left:7px;margin-bottom:10px;">
<span style="color:rgb(97,22,116);font-size:14pt;">$name</span><br />
<span style="color:rgb(97,22,116);font-size:12pt;">$title</span> <br />
<span style="font-size:10pt;">
English Language Institute<br />
University of South Florida<br />
4202 E. Fowler Avenue, CPR 107<br />
Tampa, FL 33620-5550 <br />
(813) 974-$phone <br />
<a href="http://www.eli.usf.edu" style="color:rgb(97,22,116);text-decoration:none;">www.eli.usf.edu</a>
</span>
</div>
<img src="http://$servername/signature_generator/USFLogo.jpg" alt=" " width="284" height="47" />
EOF;
	
	print "<h3>Outlook users:</h3>";
	print "Click <a href=\"signature_preview.php?name=$name&amp;title=$title&amp;phone=$phone&amp;dl=1\">Here</a> or right click and save.";
	print "<h3>Gmail (or @eli.usf.edu) users</h3>";
	print "<div style=\"float:left;\">Copy the text in the box bellow and paste it in your signature.";
	print "<pre style=\"border:solid 1px black;\">".htmlentities($html)."</pre></div>";
}
?>
</body>
</html>
