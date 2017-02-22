<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    
<%@page import="java.util.*"%>
<%@page import="com.oreilly.servlet.MultipartRequest" %>
<%@page import="com.oreilly.servlet.multipart.DefaultFileRenamePolicy" %>
<%@page import="java.io.*" %>
    
<jsp:useBean id="Login_Access" class="DAO.Login_Access" />
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
	String id=(String)session.getAttribute("id");
	String pw=(String)session.getAttribute("pw");
	String savePath="C:\\Users\\itwill\\workspace\\PortPolio\\WebContent\\upload\\";

	Login_Access.login_del(id, pw);	
	
	try{
		//기존 이미지 삭제
		String oldFileName=Login_Access.photo_mod((String)session.getAttribute("id"));
		File oldFile=new File(savePath+oldFileName);
		if(oldFile.isFile())	{oldFile.delete();}
		
	}	catch(Exception e){
			e.printStackTrace();
	}	finally{
		
	}
	
	session.invalidate();
	// 삭제 후 index 로 이동
	response.sendRedirect("../index.jsp");
%>
</body>
</html>