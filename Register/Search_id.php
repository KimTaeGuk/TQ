<!DOCTYPE HTML>
<html>
<meta charset="utf-8" />
<head><title>Search_ID</title></head>
<body>
	<H3>Search_ID</H3>
	<hr style="color:skyblue; background-color:skyblue; height:5px; border:none;" />
	<form method=post action='./Search_id_proc.php' />
	<table>
		<tr>
			<td>Name</td>
			<td><input type='text' name='name' /></td>
		</tr>
		<tr>
			<td>Birthday</td>
			<td><?php require_once("./birth.php"); ?></td>
		</tr>
		<tr><td align='center' colspan='2'>
			<input type='submit' value='submit' /></td>
		</tr>
	</table>
	</form>
</body>
</html>
