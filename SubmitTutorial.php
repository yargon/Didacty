<?php
session_start();

if(!isset($_SESSION['steps']))
{
	// step counter
	$_SESSION['steps']=1;
	print $_SESSION['steps'];
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
</head>
<body>
<form name="tutorial" action="tutorial1.php" method="post">
Tutorial Title: <input type="text" name="TTitle"><br><br>
Tutorial Description:<br>
<textarea name="TD" rows="3" cols="70">
<?php
if(isset($_POST['TD']))
{
	print $_POST['TD'];
}
?>
</textarea>
<br><br>
<h2>Step 1:</h2>
<?php
if(isset($_POST['rand_submit']) && ($_POST['rand_submit'] == $_SESSION['rand_submit']))
{
	$rand = rand();
	$_SESSION['rand_submit'] = $rand;
	print "<input type=\"hidden\" name=\"rand_submit\" value=\"$rand\" />";
	
	if(isset($_POST['Add']) && $_POST['Add'])
	{
		$_SESSION['steps']++;
		unset($_POST['Add']);
	}
	else if(isset($_POST['Remove']) && $_POST['Remove'])
	{
		$_SESSION['steps']--;
		unset($_POST['Remove']);
	}
}
else
{
	print "<input type=\"hidden\" name=\"rand_submit\" value=\"$_SESSION[rand_submit]\" />";
}
print $_SESSION['steps'];
?>
<br>
<textarea name="TA1" rows="5" cols="70">
<?php
if (isset($_POST['TA1']))
{
	print $_POST['TA1'];
}
?>
</textarea>
<br><br>
<?php
$TAID= "TA".$_SESSION['steps'];
for($i=2;$i<=$_SESSION['steps'];$i++)
{
	$TAID= "TA".$i;
	print "<h2>Step ".$i."<h2>";
	?>
	<br>
	<textarea name="<?php print $TAID;?>" rows="5" cols="70"><?php
	if (isset($_POST[$TAID]))
	{
		print $_POST[$TAID];
	}
	?></textarea>
	<a name="S<?php print $i ?>">
	<br><br>
	<?php
}
?>
<input type="submit" value="Add" name="Add" onClick="document.tutorial.action='tutorial1.php#S'">
<?php
if ($_SESSION['steps']!=1)
{
?>
<input type="submit" value="Remove" name="Remove" onClick="document.tutorial.action='tutorial1.php#S'">
<?php
}
?>
<br>
<input type="submit" value="Submit Tutorial" name="button" onClick="document.tutorial.action='tutorial.php'">
<a name="S">
</body>
</html>