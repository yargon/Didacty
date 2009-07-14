<?php
session_start();
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
	//checks if you should move on to the next step
	if($_SESSION['revalidate']==1)
	{
		$_SESSION['validate']=2;
	}
	//checks if form is validated, and sets revalidate = 1 if it is error free
	if($_SESSION['validate']==1)
	{	
		$_SESSION['revalidate']=1;
		if($_POST['ttitle']=="")
			$_SESSION['revalidate']=0;
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
<?php
	}
	//if validate = 2, resets values for next part of the form and stores the values in a database.
	else
	{
		$_SESSION['validate']=0;
		$_SESSION['revalidate']=0;
		$_SESSION['step']++;
	}
}
//if steps != 0, code to create steps for the tutorial
else
{
?>
<label for="image">Insert Image:</label>
<input type="file" name="image" id="I<?php print(SESSION['step']); ?>" />(optional)
<br />
<?php
}
?>
<input type="submit" name="next" value="Next" />
</form>
</body>
</html>