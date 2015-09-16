<?
function loginForm()
{
	$form = "<!-- Validation Form Script -->

	<script language=\"JavaScript\" type=\"text/javascript\">
	<!-- //
	function checkform ( form )
	{
	  // USER
	  if (form.userid.value == \"\") 
	  	{
	    alert( \"Please enter your user.\" );
	    form.userid.focus();
	    return false ;
	  	}
  	
	  // PASSWORD
	  if (form.password.value == \"\") 
	  	{
	    alert( \"Please enter your password.\" );
	    form.password.focus();
	    return false ;
	  	}
	  // Good
	  return true ;
	}
	//-->
	</script>

	<!-- Login Form -->
	<form method=\"post\" action=\"./index.php\" onsubmit=\"return checkform(this);\">
		<table align=\"center\">	
			<tr>
				<td>
					Account type:
				</td>
				<td>
					<select name=\"accounttype\">
						<option value=\"didacty\">Didacty</option>
						<option value=\"odysseus\">Odysseus</option>
						<option value=\"openID\">OpenID</option>
					</select>
				</td>
			</tr>
			<tr class=\"login\">
				<td>User:</td>
				<td><input type=\"text\" name=\"userid\"></td>
			</tr>
			<tr class=\"login\">
				<td>Password:</td>
				<td><input type=\"password\" name=\"password\"></td>
			</tr>
			<tr>
				<td colspan=\"2\" style=\"text-align:center;\">
					<input type=\"submit\" value=\"Login\" class=\"submit\">
				</td>
			</tr>
		</table>
	</form>";
	
	return $form;
}