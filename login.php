<!-- This is template php file with header and footer -->
<!-- Header -->
<?php
include("header.php");
?>

<!-- LOGIN -->
<form method="post" action="loginValidation.php">
<p>For marker: username and password is in the file: login.txt</p>
<div align="center">
<table style="margin:50px;">
		<tr>
			<th>User name</th>
			<td><label>
				<input id="username" name="username" type="text" size="30px" onkeyup="validateName()"/>
			</label></td>
		<tr>
			<th>Password</th>
			<td><input type="password" name="password" size="30px" onkeyup="validatePW()"></td>
		</tr>
	</form>
	<tr>
		<td></td>
		<td width="10px"><font size="1px"> 
			A username can contain letters (both upper and lower case) and digits only. A password must be at least 6 characters long (characters are to be letters and digits only), have at least one letter and at least one digit.
		</font></td>
	</tr>
	<tr>
		<td>
		</td>
		<td align="center"><font color="red">
			<!-- PHP: Login failed, display message create by the session, then unset the session -->
			<?php
				if(isset($_SESSION["message"])){
					echo $_SESSION["message"];
					unset($_SESSION['message']);
				} 
			?></font>
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td align="center">
			<input id="login_buttom" type="submit" value="Login" />
		</td>
	</tr>
</table>
</div>

<!-- Footer -->
<?php
include("footer.php");
?>