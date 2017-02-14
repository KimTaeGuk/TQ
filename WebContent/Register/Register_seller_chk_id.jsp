<%@ page import="java.sql.*" %>
<%@ page import="java.io.Console" %>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@page import="DAO.Register_Access" %>
<%@page import="DTO.RegisterBean" %>

<jsp:useBean id="Register_Access" class="DAO.Register_Access"/>
<jsp:useBean id="RegisterBean" class="DTO.RegisterBean"/>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Check ID</title>
<script src="../js/jquery-3.1.1.min.js"></script>
</head>
<body>
<%	
		String Get_id=request.getParameter("id");
		RegisterBean bean=Register_Access.Chk_id(Get_id);
		
		String id=bean.getRegister_id();
		
		if(id!=null){
%>
			<span id="span_id">중복</span><br>
			<input type="hidden" id="exists" value="true" />
<%
		}
		else {
%>
			<span id="span_id">사용가능</span><br>
			<input type="hidden" id="exists" value="false" />
<%
		}
%>
		<input type="button" value="창닫기">

<script>
	$(document).ready(function(){
		var val=$("#span_id").text();
		var val_hidden=$("#exists").val();
		
		$('div span',opener.document).html(val);
		$('#id_hidden',opener.document).val(val_hidden);
	});
	
	function close_popUp(){
		
	}
</script>
</body>
</html>