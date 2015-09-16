<html>
<head>
<title>Submit Tutorial-Didacty.com</title>
</head>
<body>
<?php
function WriteSteps($step)
{
  $output = "";
  for($i=1;$i<=$step;$i++)
  {
    $output .= <<<EOP
    <h2> Step $i:</h2><br>
    <textarea rows="10" cols="30" name="step$i"></textarea> 
    <br /><br />
EOP;
  }
  return $output;
}
print <<<EOP
<form action="tutorial2.php" method="post">
<h1>$_POST[TTitle]</h1><br /><br />
EOP;

print WriteSteps($_POST["steps"]);
print "<input type=\"submit\" /></form>";
?>
</body>
</html>