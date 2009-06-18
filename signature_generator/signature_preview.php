<?
if(isset($_GET['name']) && isset($_GET['title']) && isset($_GET['phone']))
{
	$name = $_GET['name'];
	$title = $_GET['title'];
	$phone = $_GET['phone'];
	
	$servername = "www.didacty.com";
	
	$output = <<<EOF
	
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

	if(isset($_GET['dl']))
	{
		$special_chars = array(" ","`","!","@","#","$","%","^","&","*","(",")","+","=","}","{","[","]",":",";","'","\"","\\","|","~","/","?","<",">",",",".");
		$filename = str_replace($special_chars,"_",$name);
		header('Content-type: text/html');
		header('Content-Disposition: attachment; filename="'.$filename.'_signature.html"');
	}
	print $output;
}
else
{
	print "error";
}