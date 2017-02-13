<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.util.ArrayList" %>
<%@ page import="java.sql.*" %>

<%@ page import="java.util.Date" %>
<%@ page import="java.text.SimpleDateFormat" %>

<%@ page import="DTO.BoardBean" %>
<jsp:useBean id="Board_Access" class="DAO.Board_Access" />
<jsp:useBean id="BoardBean" class="DTO.BoardBean" />

<jsp:setProperty name="BoardBean" property="*" />

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<script>
	function Go_view(num){
		var num=num+1;
		window.location="./Board_view.jsp?num="+num;
	}
</script>
<style>
	td{
		border: 1px double black;
	}
</style>
</head>
<body>
<%
	request.setCharacterEncoding("UTF-8");

	int total=Board_Access.count();
	out.print("총 개시물 갯 수 : " + total+"<br>");
	
	ArrayList<BoardBean> list=Board_Access.Board_List();

	int size=list.size();
%>
<input type="button" onclick="window.location='./Board_write.jsp'" value="글쓰기" />
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
				<%				
					for(int i=0; i<size;i++){
						BoardBean bean=list.get(i);
						int num=bean.getBoard_num();
						int star=bean.getBoard_star();
						int count=bean.getBoard_count();
						
						String id=bean.getBoard_id();
						String content=bean.getBoard_content();
						String title=bean.getBoard_title();
						String date=bean.getBoard_date();
						
						String new_img=Board_Access.today_new(date);
				%>
						<tr onclick="Go_view(<%=i%>);">
							<td>
								<%=num%>
							</td>
							<td>
								<%=title%>
								<%
									if(new_img.equals("1")){
								%>
									<img src="../img/new.jpg" />
								<%
									}
								%>
							</td>
							<td><%=id%></td>
							<td><%=content%></td>
							<td><%=date%></td>
							<td><%=count%></td>
							<td><%
								if(star==5) out.print("★★★★★");
								if(star==4) out.print("★★★★");
								if(star==3) out.print("★★★");
								if(star==2) out.print("★★");
								if(star==1) out.print("★");
							%></td>
						</tr>					
				<%		
					}				
				%>

	</tbody>
	</table>
</body>
</html>