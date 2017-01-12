<!DOCTYPE HTML>
<html>
<meta charset="utf-8" />
<head><title>Search_PW</title></head>
<body>
	<H3>Search_PW</H3>
	<hr style="color:skyblue; background-color:skyblue; height:5px; border:none;" />
	<form method=post action='./Search_pw_proc.php' />
	<table>
		<tr>
			<td>ID</td>
			<td><input type='text' name='id' /></td>
		</tr>
		<tr>
			<td>Birthday</td>
			<td><?php include("./birth.php"); ?></td>
		</tr>
		<tr><td align='center' colspan='2'>
			<input type='submit' value='submit' /></td>
		</tr>
	</table>
	</form>
</body>
</html>
