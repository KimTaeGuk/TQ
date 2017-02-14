<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.util.ArrayList" %>
<%@ page import="java.sql.*" %>

<%@ page import="java.util.Date" %>
<%@ page import="java.text.SimpleDateFormat" %>
<%@ page import="DTO.NoticeBean" %>
<%@ page import="DTO.BoardBean" %>

<jsp:useBean id="LoginBean" class="DTO.LoginBean" />
<jsp:useBean id="Login_Access" class="DAO.Login_Access" />

<jsp:setProperty name="BoardBean" property="*" />
<jsp:useBean id="Board_Access" class="DAO.Board_Access" />
<jsp:useBean id="BoardBean" class="DTO.BoardBean" />

<jsp:setProperty name="NoticeBean" property="*" />
<jsp:useBean id="Notice_Access" class="DAO.Notice_Access" />
<jsp:useBean id="NoticeBean" class="DTO.NoticeBean" />

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
	
	function notice_view(num){
		var num=num+1;
		window.location="./notice/notice_view.jsp?num="+num;
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
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////공지사항 최 상단에 위치시키기////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////
	
	int notice_sum=Notice_Access.notice_count();
	out.print("총 공지사항 갯 수 : " + notice_sum +"<br>");
	
	ArrayList<NoticeBean> noticelist=Notice_Access.Notice_list();
	
	int notice_size=noticelist.size();
	
	//////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////
	
	
%>
<%
	String seller_id=(String)session.getAttribute("id");
	String seller_pw=(String)session.getAttribute("pw");

	if(Board_Access.Seller_pasing(seller_id, seller_pw)){
%>
<input type="button" onclick="window.location='./notice/notice_write.jsp'" value="공지사항 글 쓰기" />
<%
	}
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
				///////// 공지사항 최 상단 /////////
					if(notice_sum>0){
						for(int j=0;j<notice_size;j++){
							NoticeBean noticebean=noticelist.get(j);
							
							int notice_num=noticebean.getNotice_num();
							int notice_count=noticebean.getNotice_count();
							
							String notice_id=noticebean.getNotice_id();
							String notice_title=noticebean.getNotice_title();
							String notice_content=noticebean.getNotice_content();
							String notice_date=noticebean.getNotice_date();
				%>
							<tr onclick="notice_view(<%=j%>);" bgcolor="skyblue"  >
								<td><%=notice_num%></td>
								<td><%=notice_title%></td>
								<td><%=notice_id%></td>
								<td><%=notice_content%></td>
								<td><%=notice_date%></td>
								<td colspan=2><%=notice_count%></td>
							</tr>
				<%
						}
					}
				//////////////////////////////////
				
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
	<tfoot>
		<form method="POST" action="./Board_ser.jsp">
			<tr>
				<td colspan=7 style="text-align: center;">
					<input type="text" name="ser" />
					<input type="submit" value="검색" />
				</td>
			</tr>
		</form>
	</tfoot>
	</table>
</body>
</html>