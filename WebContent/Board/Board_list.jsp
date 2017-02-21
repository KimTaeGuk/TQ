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
<script src="../js/jquery-3.1.1.min.js"></script><!-- 합쳐지고 최소화된 최신 CSS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<!-- <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="./bootstrap/css/bootstrap-theme.min.css">
<script src="./bootstrap/js/bootstrap.min.js"></script> -->

<script>
		function board_write(){
			var id="<%=session.getAttribute("id")%>";
			if(id == "null" || id =="" || id == undefined){
					alert("로그인 후 가능합니다.");
			}	else {
					window.location="./Board_write.jsp";
			}
		}
	function Go_view(num){
		window.location="./Board_view.jsp?num="+num;
	}
	
	function notice_view(num){
		var num=num+1;
		window.location="./notice/notice_view.jsp?num="+num;
	}
</script>
</head>
<body>
<%
	request.setCharacterEncoding("UTF-8");

	int total=Board_Access.count();
	ArrayList<BoardBean> list=Board_Access.Board_List();
	int size=list.size();
	
	int notice_sum=Notice_Access.notice_count();
	ArrayList<NoticeBean> noticelist=Notice_Access.Notice_list();
	int notice_size=noticelist.size();
%>
<%
	String seller_id=(String)session.getAttribute("id");
	String seller_pw=(String)session.getAttribute("pw");

	if(Board_Access.Seller_pasing(seller_id, seller_pw)){
%>
<input type="button" onclick="window.location='./notice/notice_write.jsp'" value="공지사항 글 쓰기" /><br>
<%
	}
%>
	<table class="table">
		<thead class="thead-inverse">
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
								<th scope="row"><%=notice_num%></th>
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
						<tr onclick="Go_view(<%=num%>);">
							<th scope="row">
								<%=num%>
							</th>
							<td>
								<%=title%>
								<%
								
								//댓글 달린 갯수
									int comment_num=Board_Access.comment_count(num);
									if(comment_num!=0){
										out.print("["+comment_num+"]");
									}
									if(new_img.equals("1")){
								%>
									<img src="../img/new.jpg" />
								<%
									}
								%>
							</td>
							<td><%=id%></td>
							<td><%=content%></td>
							<td><%=Board_Access.date_eq(date)%></td>
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
				<td class="row" colspan=6 style="text-align: center;">
					<input type="text" name="ser" />
					<input type="submit" value="검색" />
				</td>
		</form>
				<td>
					<input type="button" onclick="board_write();" value="글쓰기" />
				</td>
			</tr>
	</tfoot>
	</table>
</body>
</html>