<?php session_start(); ?>
<!DOCTYPE HTML>
<HTML>
<HEAD><TITLE>Board_write</TITLE></HEAD>
<BODY>
<form action="Board_write_proc.php" method="POST">

<table>
<tr>
	<td colspan=2><?=$_GET[name]?><input type="hidden" name="name" value="<?=$_GET[name]?>"></td>
</tr>
<tr>
	<td>Title</td>
	<td><input type="text" name="title" size="70"></td>
</tr>
<tr>
	<td>Content</td>
	<td><textarea name="content" cols="40" rows="10"></textarea></td>
</tr>
<tr>
	<td>Star</td>
	<td>
		<select name="star">
			<option value=1>★</option>
			<option value=2>★★</option>
			<option value=3>★★★</option>
			<option value=4>★★★★</option>
			<option value=5>★★★★★</option>
		</select>
	</td>
</tr>
<tr>
	<td><input type="submit" value="submit"></td>
</tr>
</table>
<input type="hidden" name="id" value="<?=$_SESSION[id]?>">
</form>
</BODY>
</HTML>