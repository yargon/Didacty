<?php
session_start();
//http://eli-web3.cas.usf.edu/dev/createtutorial.php
//create username variable
if(!isset($_SESSION['username']))
{
	$_SESSION['username']='username';
}
//create step variable
if(!isset($_SESSION['step']))
{
	$_SESSION['step']=0;
}
//create validate variable
if(!isset($_SESSION['validate']))
{
	$_SESSION['validate']=0;
}
//create revalidate variable
if(!isset($_SESSION['revalidate']))
{
	$_SESSION['revalidate']=0;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> Didacty - Tutorial Submition Form</title>
</head>
<body>
<form action="createtutorial.php" method="post" enctype="multipart/form-data">
<?php
//checks if validating
if(isset($_POST['next']) && $_POST['next'])
{
  $_SESSION['validate']=1;
}
//checks if user is at the start of the tutorial submition
if($_SESSION['step']==0)
{
	//checks if form is validated, and sets revalidate = 1 if it is error free
	if($_SESSION['validate']==1)
	{	
		$_SESSION['revalidate']=1;
		if($_POST['ttitle']=="")
			$_SESSION['revalidate']=0;
		if($_POST['tsd']=="")
			$_SESSION['revalidate']=0;
	}
	//checks if you should move on to the next step
	if($_SESSION['revalidate']==1)
	{
		$_SESSION['validate']=2;
	}
	if($_SESSION['validate']!=2)
	{
//html for tutorial title and description
	?>
<label for="ttitle">Tutorial Title:</label> 
<input type="text" name="ttitle" value="<?php
// rewrites the title
if(isset($_POST['ttitle']))
{
  print $_POST['ttitle'];
}
?>" />(required)
<?php
//writes error message if needed
if($_SESSION['validate']==1)
{
  if($_POST['ttitle']=="")
  {
    print("<div style='color: #ff0000;' >You're missing the title</div>");
  }
  else
  {
    print("<br />");
  }
}
else
{
  print ("<br />");
}
?>
<br />
<label for="tsd">Tutorial Description:</label><br />
<textarea name="tsd" rows="3" cols="70">
<?php
// rewrites the tutorial description
if(isset($_POST['tsd']))
{
  print $_POST['tsd'];
}
?>
</textarea><br />
This shows when someone searches for your tutorial(required)
<?php
//writes error message if needed
if($_SESSION['validate']==1)
{
  if($_POST['tsd']=="")
  {
    print("<div style='color: #ff0000;' >You're missing the title description</div>");
  }
  else
  {
    print("<br />");
  }
}
else
{
  print ("<br />");
}
?>
<br />
<label for="td">Tutorial Introduction:</label><br />
<textarea name="td" rows="3" cols="70">
<?php
// rewrites the tutorial introduction
if(isset($_POST['td']))
{
  print $_POST['td'];
}
?>
</textarea><br />
This will show before the steps in your tutorial(optional)
<br /><br />
<?php
	}
	//if validate = 2, resets values for next part of the form and stores the necessary values in a database.
	if($_SESSION['validate']==2)
	{
		$_SESSION['validate']=0;
		$_SESSION['revalidate']=0;
		$_SESSION['step']++;
		$date_time=date("Y-m-d h:i:s");
		$con=mysql_connect(eli-web3,didacty,didacty);
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("didacty",$con);
		$query = "INSERT INTO `tutorial` (`version`, `author`, `email`, `date`, `title`, `shortdesc`, `desc`)
		VALUES ('1', '$_SESSION[username]', '','$date_time', '$_POST[ttitle]', '$_POST[tsd]', '$_POST[td]')";
		mysql_query($query);
		mysql_close($con);
	}
}
//if step != 0, code to create steps for the tutorial
if($_SESSION['step']!=0)
{
?>
<label for="s<?php print $_SESSION['step'] ?>">Step <?php print $_SESSION['step'] ?>:</label><br />
<textarea name="s<?php print $_SESSION['step'] ?>" rows="3" cols="70"><?php
// rewrites the tutorial introduction
$sid='s'.$_SESSION['step'];
if(isset($_POST[$sid]))
{
  print $_POST[$sid];
}
?></textarea><br />
<?php
//writes error message if needed
if($_SESSION['validate']==1)
{
  if($_POST[$sid]=="")
  {
    print("<div style='color: #ff0000;' >You're missing the Step</div>");
  }
  else
  {
    print("<br />");
  }
}
else
{
  print ("<br />");
}
?>
<br />
<label for="image">Insert Image:</label>
<input type="file" name="image" id="I<?php print($_SESSION['step']); ?>" />(optional)
<br /><br />
<?php
}
?>
<input type="submit" name="next" value="Next" />
</form>
</body>
</html>