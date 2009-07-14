<?php
session_start();
if(!isset($_SESSION['boolSubmit']))
{
  //0 if not submitted 1 if submitted and 2 to validate
  $_SESSION['boolSubmit']=0;
}

if(!isset($_SESSION['steps']))
{
  // step counter
  $_SESSION['steps']=1;
}
 
if(!isset($_SESSION['rand_submit']))
{
  $rand = rand();
  $_SESSION['rand_submit'] = $rand;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Submit Tutorial- Didacty.com</title>
<script type="text/javascript">
</script>
</head>
<body>
<?php
if(isset($_POST['button']) && $_POST['button'])
{
  $_SESSION['boolSubmit']=1;
}
if($_SESSION['boolSubmit']==1)
{
  $completed=1;
  if($_POST['TTitle']=="")
	$completed=0;
  if($_POST['TD']=="")
	$completed=0;
  if($_POST['TA1']=="")
	$completed=0;
  for($i=2;$i<=$_SESSION['steps'];$i++)
  {
    $TAID= "TA".$i;
	if($_POST[$TAID]=="")
	  $completed=0;
  }
  if($completed==1)
    $_SESSION['boolSubmit']=2;
}
if($_SESSION['boolSubmit']!=2)
{
?>
<form name="tutorial" action="SubmitTutorial.php#S" method="post">
<?php
// adds or removes step, and checks if the page was reloaded.
if(isset($_POST['rand_submit']) && ($_POST['rand_submit'] == $_SESSION['rand_submit']))
{
  $rand = rand();
  $_SESSION['rand_submit'] = $rand;
  print "<input type=\"hidden\" name=\"rand_submit\" value=\"$rand\" />";
  
  if(isset($_POST['add']) && $_POST['add'])
  {
    $_SESSION['steps']++;
    unset($_POST['add']);
	$_SESSION['boolSubmit']=0;
  }
  else if(isset($_POST['remove']) && $_POST['remove'])
  {
    $_SESSION['steps']--;
    unset($_POST['remove']);
	$_SESSION['boolSubmit']=0;
  }
}
else
{
  print "<input type=\"hidden\" name=\"rand_submit\" value=\"$_SESSION[rand_submit]\" />";
}
?>
Tutorial Title: <input type="text" name="TTitle" value="
<?php
// rewrites whats in the title textbox
if(isset($_POST['TTitle']))
{
  print $_POST['TTitle'];
}
?>
">
<?php
if($_SESSION['boolSubmit']==1)
{
  if($_POST['TTitle']=="")
  {
    print("<div style='color: #ff0000;' >Your Missing a Title</div>");
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
Tutorial Description: (this will show up when someone searches for your tutorial and is required)<br />
<textarea name="TD" rows="3" cols="70">
<?php
// rewrites what is in the tutorial description textarea.
if(isset($_POST['TD']))
{
  print $_POST['TD'];
}
?>
</textarea>
<?php
if($_SESSION['boolSubmit']==1)
{
  if($_POST['TD']=="")
  {
    print("<div style='color: #ff0000;' >Your Missing the Title Discription</div>");
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
Tutorial Introduction(not required)<br />
<textarea name="TI" rows="3" cols="70">
<?php
// rewrites what is in the tutorial introduction textarea.
if(isset($_POST['TI']))
{
  print $_POST['TI'];
}
?>
</textarea>
<br />
<?php
print $_SESSION['steps']; 
?>
<h2>Step 1</h2>
<br />
<textarea name="TA1" rows="5" cols="70">
<?php
// rewrites what is in Step 1's textarea.
if (isset($_POST['TA1']))
{
  print $_POST['TA1'];
}
?>
</textarea>
<?php
if($_SESSION['boolSubmit']==1)
{
  if($_POST['TA1']=="")
  {
    print("<div style='color: #ff0000;' >Your Missing the Step Directions</div>");
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
//generates each step
for($i=2;$i<=$_SESSION['steps'];$i++)
{
  //step ID
  $TAID= "TA".$i;
  print "<h2>Step ".$i."</h2>";
  ?>
  <textarea name="<?php print $TAID;?>" rows="5" cols="70"><?php
  //rewrites what is in the step textarea
  if (isset($_POST[$TAID]))
  {
    print $_POST[$TAID];
  }
  ?></textarea>
  <?php
  if($_SESSION['boolSubmit']==1)
  {
    if($_POST[$TAID]=="")
    {
      print("<div style='color: #ff0000;' >Your Missing the Step Directions</div>");
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
?>
<input type="submit" value="Add" name="add" onClick="document.tutorial.action='SubmitTutorial.php#S'">
<?php
if ($_SESSION['steps']!=1)
{
?>
<input type="submit" value="Remove" name="remove" onClick="document.tutorial.action='SubmitTutorial.php#S'">
<?php
}
?>
<br />
<input type="submit" value="Submit Tutorial" name="button" onClick="document.tutorial.action='SubmitTutorial.php'">
<a name="S">
<?php
}
else
{
//code that deals with the submition of the data.

}
?>
</body>
</html>