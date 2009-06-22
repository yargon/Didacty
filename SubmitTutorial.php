<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Submit Tutorial- Didacty.com</title>
</head>
<body>
<?php
Print <<<EOP
<form action="Tutorial.php" method="post">
Title: <input type="text" name="TTitle"><br />
Steps: 
EOP;
$output = "<select name=\"steps\">/n";
for($i=0;$i<51;$i++)
{
  $output .= "/t<option value=\"$i\">$i</option>/n";
}
$output .= "<input type=\"submit\" /><br>";
Print $output;
Print "</form>";
?>
</body>
</html>