<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<jsp:useBean id="Register_Access" class="DAO.Register_Access" />
<jsp:useBean id="RegisterBean" class="DTO.RegisterBean" />
<jsp:setProperty name="RegisterBean" property="*" />
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
out.print(RegisterBean.getRegister_email()+"<br>");
out.print("name : "+RegisterBean.getRegister_name()+"<br>");
out.print("ID : "+RegisterBean.getRegister_id()+"<br>");
out.print("pw : "+RegisterBean.getRegister_pw()+"<br>");
out.print("year : "+RegisterBean.getRegister_year()+"<br>");
out.print("month : "+RegisterBean.getRegister_month()+"<br>");
out.print("day : "+RegisterBean.getRegister_day()+"<br>");

Register_Access.Register_seller_insert(RegisterBean);
%>
</body>
</html>