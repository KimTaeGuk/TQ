<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
 <%@ page import="DTO.BoardBean" %>
 <%@ page import="java.util.ArrayList" %>
 <jsp:useBean id="Board_Access" class="DAO.Board_Access" />
 <jsp:useBean id="BoardBean" class="DTO.BoardBean" />
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="../js/jquery-3.1.1.min.js" ></script>
<title>Insert title here</title>
<script>
	function ser_refresh(){
		ser=$('#Search').val();
		location.href="./Board_ser.jsp?ser="+ser;
	}
</script>
</head>
<body>
<table style="border:1px solid black;">
<thead>
	<tr>
		<th>No. </th>
		<th>Title </th>
		<th>Id </th>
		<th>Content </th>
		<th>Date</th>	
		<th>Count</th>
		<th>Star</th>
	</tr>
</thead>
<tbody>
	<tr>
<%
	String search=request.getParameter("ser");

	ArrayList<BoardBean> list=Board_Access.board_search(search);

	for(int i=0; i<list.size();i++){
		BoardBean boardbean=list.get(i);
		
		int board_num=boardbean.getBoard_num();
		int board_count=boardbean.getBoard_count();
		int board_star=boardbean.getBoard_star();
		
		String board_title=boardbean.getBoard_title();
		String board_content=boardbean.getBoard_content();
		String board_id=boardbean.getBoard_id();
		String board_date=boardbean.getBoard_date();
%>
		<tr onclick="window.location='./Board_view.jsp?num=<%=board_num%>'">
			<td><%=board_num%></td>
			<td><%=board_title%></td>
			<td><%=board_id%></td>
			<td><%=board_content%></td>
			<td><%=board_date%></td>
			<td><%=board_count%></td>		
			<td>
			<%
						if(board_star==5) out.print("★★★★★");
						if(board_star==4) out.print("★★★★");
						if(board_star==3) out.print("★★★");
						if(board_star==2) out.print("★★");
						if(board_star==1) out.print("★");
			%>
			</td>
		</tr>
<%
	}
%>
</tbody>
<tfoot>
<tr>
<th colspan=7>
	<input type="text" name="Search" id="Search" />
	<input type="button" name="Se_btn" value="Search" onclick="ser_refresh();" >
</th>
</tr>
</tfoot>
</table>
</body>
</html>