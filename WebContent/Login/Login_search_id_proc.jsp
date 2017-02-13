<%@ page import="java.io.Console"%>
<%@ page import="java.sql.*" %>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>    
<%@ page import="DAO.Register_Access" %>
<%@ page import="DTO.RegisterBean" %>

<jsp:useBean id="Register_Access" class="DAO.Register_Access"/>
<jsp:useBean id="RegisterBean" class="DTO.RegisterBean"/>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Login_search_id_proc</title>
</head>
<body>
	
<%
	request.setCharacterEncoding("UTF-8");
	
	if(request.getParameter("name")==""){
%>
		<script>
			alert("이름이 없습니다.");
			history.back();
		</script>
<%
		out.close();
	}	else {	
			String search_name=request.getParameter("search_name");
	
			String Get_year=request.getParameter("search_year");
			String Get_month=request.getParameter("search_month");
			String Get_day=request.getParameter("search_day");

			String search_birth=Get_year + "." + Get_month + "." + Get_day;
		
			RegisterBean searchID_bean=Register_Access.Search_id(search_name, search_birth);
		
			String id=searchID_bean.getRegister_id();
		
			if(id!=null)	out.print(id);	
			
			else 	out.print("ID가 존재하지 않습니다");
	}
%>
</body>
</html>