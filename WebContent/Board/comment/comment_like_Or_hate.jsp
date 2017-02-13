<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<jsp:useBean id="CommentBean" class="DTO.CommentBean" />
<jsp:useBean id="Comment_Access" class="DAO.Comment_Access" />

<jsp:setProperty name="CommentBean" property="board_num" />
<jsp:setProperty name="CommentBean" property="comment_id" />
<jsp:setProperty name="CommentBean" property="comment_num" />
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<!-- -------------------------- 좋아요 1 / 싫어요 2-------------------------------------- -->
<% 
	int like_cnt=0, hate_cnt=0;
	if(request.getParameter("likeOrhate").equals("1"))	{
		CommentBean.setComment_like(1);
		
		Comment_Access.CommentLike_Up(CommentBean.getBoard_num(), CommentBean.getComment_num());
	
		like_cnt=Comment_Access.Comment_Like_cnt(CommentBean.getBoard_num(), CommentBean.getComment_num());	
		hate_cnt=Comment_Access.Comment_Hate_cnt(CommentBean.getBoard_num(), CommentBean.getComment_num());
%>
		<input type="button" name="CancelLike_btn" value="<%=like_cnt%> 좋아요취소" onclick="alert('이미 좋아요를 눌렀당')"/>
		<input type="button" value="<%=hate_cnt%> 싫어요" onclick="alert('이미 좋아요를 눌렀당')"/>
<%
	}
	else {
		CommentBean.setComment_hate(1);
	
		Comment_Access.CommentHate_Up(CommentBean.getBoard_num(), CommentBean.getComment_num());

		like_cnt=Comment_Access.Comment_Like_cnt(CommentBean.getBoard_num(), CommentBean.getComment_num());	
		hate_cnt=Comment_Access.Comment_Hate_cnt(CommentBean.getBoard_num(), CommentBean.getComment_num());
%>
		<input type="button" value="<%=like_cnt%> 좋아요" onclick="alert('이미 싫어요를 눌렀당')"/>
		<input type="button" value="<%=hate_cnt%> 싫어요취소" onclick="alert('이미 싫어요를 눌렀당')"/>
<%
	}
%>

</body>
</html>