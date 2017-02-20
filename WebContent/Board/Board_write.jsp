<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<script src="../ckeditor/ckeditor.js"></script>
</head>
<body>
<form action="./Board_write_proc.jsp" method="POST">
	<table>
		<tr>
			<td>Title</td>
			<td><input type="text" name="board_title" size="70"></td>
		</tr>
		<tr>
			<td>Content</td>
			<td><textarea name="board_content" id="editor1" cols="80" rows="10"></textarea></td>
		</tr>
		<tr>
			<td>Star</td>
			<td>
				<select name="board_star" id="board_star">
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
	<input type="hidden" name="board_id" value="<%=session.getAttribute("id")%>">
	<input type="hidden" name="board_kategory" value="Test" />
</form>
<script>
	CKEDITOR.replace('board_content');
</script>
</body>
</html>